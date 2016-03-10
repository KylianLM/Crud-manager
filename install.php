<?php

require_once "vendor/autoload.php";

use App\Config;

$loader =  new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    "cache" => false // Dev-mode
));

//Router with parameter p
//If parameter p doesn't exist
if(!isset($_GET['p']))
{
    //Initialize first view install
    $template = $twig->render('install/page1.twig');
}

//If parameter p egual 2 and request method is get
if($_GET['p'] == '2' && $_SERVER['REQUEST_METHOD'] == "GET")
{
    //Initialize page 2 of install
    $template = $twig->render('install/page2.twig');
}

//If parameter p egual 2 and request method is post
if($_GET['p'] == '2' && $_SERVER['REQUEST_METHOD'] == "POST")
{

}

echo $template;
