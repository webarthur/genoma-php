<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Genoma-CSS</title>
    <link rel="shortcut icon" type="image/png" href="genoma-css.png"/>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="dna.css" rel="stylesheet">
    <link href="dna-plus.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <?php # include 'navbar.html' ?>

    <navbar default no-margin no-radius no-border style="background:#fff">
      <container-fluid>
        <!-- Brand and toggle get grouped for better mobile display -->
        <header>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" collapsed>
            <span sr-only>Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" brand>Brand</a>
        </header>

        <nav class="collapse navbar-collapse">
          <ul nav navbar="nav">
            <li active><a href="#">Link <span sr-only>(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <caret /></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li divider></li>
                <li><a href="#">Separated link</a></li>
                <li divider></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form navbar="form left" role="search">
            <group form>
              <input form-control type="text" placeholder="Search">
            </group>
            <button default type="submit">Submit</button>
          </form>
          <ul nav navbar="nav right">
            <li><a href="#">Link</a></li>
            <li tabindex="0" class="dropdown button">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul menu>
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
              <!-- <menu>
                <a href="#">Action</a>
                <a href="#">Another action</a>
                <a href="#">Something else here</a>
                <div class="divider"></div>
                <a href="#">Separated link</a>
              </menu> -->
            </li>
          </ul>
        </nav>
      </container-fluid>
    </navbar>

    <well bg-primary large text-center clearfix no-radius no-border>
      <img src="genoma-css.png" />
      <h1>Genoma-CSS</h1>
      <p>
        Atomic CSS framework for smarty guys!
      </p>
      <p>
        <button type="button" success large>Download</button>
      </p>
    </well>

  <container style="max-width:1180px;margin:auto">
    <column class="col-xs-6">
      <h2>Lean and Clean HTML5</h2>
      <p>
        The framework is a mix of concepts and Design Patterns like Atomic Design, DRY, Bootstrap, Kube, etc.
      </p>
      <p>
        Gemona CSS produces a dna.css that removes a lot of CLASSES diseases.
      </p>
    </column>

    <column class="col-xs-6">
      <h3>Code:</h3>
      <pre>
&lt;group inputs&gt;
  &lt;addon &gt;@&lt;/addon&gt;
  &lt;input form-control type=&quot;text&quot; placeholder=&quot;Username&quot; &gt;
&lt;/group&gt;</pre>
    </column>

    <hr clearfix style="clear:both; margin:30px 0;" />

    <column text-center>
      <h2>Chromosomes</h2>
      <p>
        Chromosomes (as molecules in Atomic Design) is the HTML5 components.
      </p>
    </column>

    <row clearfix style="padding-bottom:30px">
      <column class="col-xs-4">
        <h3>Toolbar buttons</h3>
        <toolbar>
          <group button>
            <button primary>1</button>
            <button danger>2</button>
            <button warning>3</button>
          </group>
          <group button>
            <button default>5</button>
            <button default>6</button>
          </group>
          <group button>
            <button default>8</button>
          </group>
        </toolbar>


        <h3>Input Group</h3>

        <group input mb-10>
          <addon>$</addon>
          <input type="text" form-control>
          <addon>.00</addon>
        </group>

        <group input>
          <addon>https://</addon>
          <input type="text" form-control>
        </group>


        <h3>Tabs</h3>

        <!-- <ul nav="tabs"> -->
        <ul nav tabs>
          <li active><a href="#">Home</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Messages</a></li>
        </ul>

      </column>

      <column class="col-xs-4">
        <alert warning>
          <icon class="glyphicon-exclamation-sign" aria-hidden="true"></icon>
          <span sr-only>Error:</span>
          Enter a valid email address
        </alert>
      </column>

      <column class="col-xs-4">

      </column>
    </row>

    <row clearfix>
      <div text-center>
        <h2>DNA Engineering</h2>
        <p>
          Need different behaviors? So you must to change the genes!
        </p>
      </div>
      <column class="col-xs-6">
        <h2>Sass + Genoma</h2>
        <p>
          Genoma works with Sass togheter. You can change/create anything what you want.
        </p>
        <h2>NodeJS + Genoma</h2>
        <p>
          Genoma and NodeJS can work togheter too. You can change/create anything what you want.
        </p>
      </column>
      <column class="col-xs-6">
        <h2>genoma.sass</h2>
        <p>
          You can change everything! You are the paradigma ower!
        </p>
        <pre>$button:" button"; # apply style in native HTML</pre>
        <pre>
# &lt;button danger /&gt;
$button-danger:"button[danger]"; # apply styles in button with danger attribute</pre>
        <pre>
# &lt;button type="danger" /&gt;
$button-danger:"button[type=danger]"; # apply styles in button with danger attribute</pre>
        <!-- <pre>
# &lt;a button danger /&gt;
$button-danger:"[button][danger]"; # apply styles in combinated attributes</pre> -->
        <pre>
# &lt;button danger /&gt; or &lt;a button danger /&gt;
$button-danger:"[button][danger],button[danger]"; # apply styles in combinated attributes in different tags</pre>
        <pre>
# &lt;a class="btn btn-danger" /&gt;
$button-danger:".btn-danger"; # apply styles with classes (too bad)</pre>
      </column>
    </row>

    <well style="margin-top:30p">
      footer
    </well>

  </container>

  </body>
</html>
