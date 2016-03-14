<?php

require_once "vendor/autoload.php";

use App\Config;
use App\Model;

/**
 * Multiple Empty function
 * @param $array
 * @return bool
 */
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
    /**
     * TODO !mempty to mempty (DEBUG)
     */
    if(mempty($_POST)){
        //Write config file of Database connecompction
        $config = new Config($_POST['host'],
            $_POST['dbname'],
            $_POST['username'],
            $_POST['password']);
        $template = $twig->render('install/page3.twig');
    } else {$this->config = require '../config/database.php';
        //If Post is empty, return config form
        $template = $twig->render('install/page2.twig');
    }
}

if($_GET['p'] == '3' && $_SERVER['REQUEST_METHOD'] == "POST")
{

}
echo $template;
