<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class.dna.php';

if( isset($_POST) && isset($_POST['encode']) ):

  $code = $_POST['encode'];

  $dna = new DNA($code);
  $dna->genoma('genoma-bootstrap.json');

  $html = str_replace(' class=""', '', $dna);

  $size1 = strlen($code);
  $size2 = strlen($html);

  echo '<div>---------</div>';
  echo $size1;
  echo '<pre>'.htmlentities($code).'</pre>';
  echo $size2;
  echo '<pre>'.htmlentities($html).'</pre>';
  echo round(100/$size1*$size2).'% menor';

  die;

endif;

?>

<form action="" method="post">
  <center>
    <h1 style="text-align:center">DNA-UI</h1>
    <p>
      <b>Encode:</b>
    </p>
    <textarea name="encode" cols="100" rows="10"></textarea>
    <br /> <button>Send</button>
  </center>
</form>
