<?php

namespace App;

use App\Model;
class Config
{
    private $config;
    private $db;

    public function __construct($host,$dbname, $username, $password)
    {
        $this->config = "<?php
return [
    \"host\" => \"".$host."\",
    \"dbname\" => \"".$dbname."\",
    \"username\" => \"".$username."\",
    \"password\" => \"".$password."\"
];";
        $this->install();
    }

    private function install()
    {
        file_put_contents('config/database.php', $this->config);
    }


    /**
     * TODO Fonctionnalité pour supprimer le fichier install.php
     */
    public function deleteInstall()
    {

    }
}