<?php

require_once "vendor/autoload.php";

use App\Config;

function mempty($array){
    foreach($array as $var) {
        if(empty($var)) {
            return false;
        }
    }
    return true;
}

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
    if(mempty($_POST)){
        //Write config file of Database connection
        $config = new Config($_POST['host'],
            $_POST['dbname'],
            $_POST['username'],
            $_POST['password']);
        $template = $twig->render('install/page3.twig');
    } else {
        $template = $twig->render('install/page2.twig');
    }
}

echo $template;
