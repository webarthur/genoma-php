<?php

class DNA {

  public $genoma; // project patterns
  public $sequence; // html
  public $chromosomes; // selectors -> components/tags
  public $genes; // selectors -> attributes
  public $encode_pattern=''; // tags
  public $decode_pattern='.'; // classes
  public $decode_dest; // classes

  function __construct( $code=NULL ) {

    if( is_null($code) ) return;

    require_once('simple_html_dom.php');

    $this->sequence = str_get_html( $code,
      $lowercase=true,
      $forceTagsClosed=true,
      $target_charset = DEFAULT_TARGET_CHARSET,
      $stripRN=false, # DONT STRIP MY DNA
      $defaultBRText=DEFAULT_BR_TEXT
    );

    $this->sequence->set_callback( array($this, 'encode_callback') );

    return $this;
  }

  public function __toString() {
    return str_replace('="____dna____"', '', (string)$this->sequence);
  }


  // components
  // public function transcode($html){
  // public function transcode_callback($el){
  public function encode_callback($el){

    $classes = explode(' ', $el->class);
    // return;
    foreach($classes as $gene) {

      // if( $k = array_search($gene, $this->chromosomes) ) {
      //
      //   $new_gene = is_numeric($k)? $this->chromosomes[$k] : $k;
      //
      //   $el->class = trim(str_replace(" $gene ", ' ', " ".$el->class." "));
      //   $el->tag = $new_gene;
      // }
      // print_r($this->genes);
      // echo ".$gene\n";
      if( $k = array_search(".$gene", array_keys($this->genes)) ) {

        // echo $gene.'<br />';

        $new_gene = is_numeric($k)? $this->genes[".$gene"] : $k;

        if( strpos($new_gene, ',')>-1 ) {
          $arr=explode(',', $new_gene);
          $new_gene = reset($arr);
        }

        echo $new_gene.'<br />';

        if( strpos($new_gene, '[')>-1 ) {

          $new_gene = preg_replace("/^[^\[]*/", '', $new_gene);
          $new_gene = preg_replace("/^\[/", '', $new_gene);
          $new_gene = preg_replace("/\]$/", '', $new_gene);
          echo '> '.$new_gene.'<br />';
          $el->class = trim(str_replace(" $gene ", ' ', " ".$el->class." "));
          $el->$new_gene = "____dna____";
        } else {
          $el->class = trim(str_replace(" $gene ", ' ', " ".$el->class." "));
          $el->tag = $new_gene;
        }

      }
    }
  }

  // genoma rules
  public function genoma($src) {

    $genoma = json_decode(file_get_contents($src));

    if(!$genoma) die('Can\'t read genoma.');

    // $this->genoma = $genoma;
    $chromosomes = (array)$genoma->chromosomes;
    $genes = [];

    // s = selector
    foreach($chromosomes as $s=>$chromosome) {

      // check if is object
      if( is_object($chromosome) ) {

        $chromosome = (array)$chromosome;

// print_r($chromosome);

        // gs = gene selector
        foreach($chromosome as $gs=>$gene) {

          if( $gs=='_' )
            $genes[$s] = $gene;
          elseif( $s=='*' )
            $genes[$gs] = $gene;
          elseif( strpos($gene, '--')>-1 )
            $genes[$gs] = str_replace('--', '', $gene);
          else {
            // ps = parent selector
            $ps = @$chromosome['_'];
            if( $ps && strpos($ps, ',')>0 )
              $genes[$gs] = str_replace(',', $gene.',', $ps) . $gene;
            else
              $genes[$gs] = $ps . $gene;
          }
        }

      }
      else {
        $genes[$s] = $chromosome;
      }
    }

    $this->genes = $genes;

  }

  // components
  public function decode($pattern, $dest='') {

    if( !$this->decode_dest ) $this->decode_dest = dirname($pattern);

    // generate sass genoma
    $sass_genoma = '';
    $sass_genoma .= "# Chromosomes\n";
    foreach ($this->chromosomes as $gene => $transcoded)
      $sass_genoma .= sprintf('$%s:"%s";',$gene, $transcoded)."\n";

    $sass_genoma .= "\n# Genes\n";
    foreach ($this->genes as $gene => $transcoded)
      $sass_genoma .= sprintf('$%s:"[%s]";',$gene, $transcoded)."\n";

    file_put_contents($dest.'/genoma.scss', $sass_genoma);

    echo "SCSS Genoma decoded: ".$dest.'/genoma.scss'."<br />";

    // extract dna
    foreach (glob($pattern) as $chromosome) {

        if( is_dir($chromosome) ) {

          $this->decode($chromosome.'/'.basename($pattern), $dest);

        } else {

          $code = file_get_contents($chromosome);

          $genes = array_merge($this->chromosomes, $this->genes);

          foreach ($genes as $gene => $transcoded)
            $code = preg_replace(
              // '/\\'.$this->decode_pattern.$static_gene.'([^-^a-z^A-Z])/',
              '/\\'.$this->decode_pattern.$gene.'([^-])/',
              '#{\\$'.$this->encode_pattern.$gene.'}$1',
              $code
            );

          $dna = $code;

          // set decoded dna file
          $new_chromosome = str_replace($this->decode_dest, $dest, $chromosome);

          // check if directory exists
          if(!is_dir(dirname($new_chromosome)))
            mkdir(dirname($new_chromosome));

          // save decoded dna
          file_put_contents($new_chromosome, $dna);

          echo "Decoded: ".$new_chromosome."<br />";
          // echo $code;
        }
    }

    $this->decode_dest = NULL;
  }

}
