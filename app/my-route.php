<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\MyView;

// instantiates the view and prints the JSON document.
$v = new MyView();
$v->printDocument();
