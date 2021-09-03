<?php
session_start();

$class = "home";
$func = "index";


$class = isset($_GET['url'])? $_GET['url'] : $class;
$func = isset($_GET['url1'])? $_GET['url1'] : $func;


include "control/".$class.".php";
$name = ucwords(trim($class));

$obj = new $name();


$obj->$func();


?>


