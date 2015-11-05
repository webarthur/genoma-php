<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class.dna.php';

$dna = new DNA();
$dna->genoma('genoma-bootstrap.json');
$dna->decode('bootstrap/scss/*', 'bootstrap/dna/');
// $dna->decode('bootstrap/scss/*', 'bootstrap/dna/');

die;
