<?php

require_once "vendor/autoload.php";

$loader =  new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    "cache" => false // Dev-mode
));

$template = $twig->render('install/page1.twig');

echo $template;
