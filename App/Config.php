<?php

namespace App;


class Config
{
    private $config;

    public function __construct($name, $port, $username, $password)
    {
        $this->config = "<?php
return [
    \"name\" => \"".$name."\",
    \"port\" => \"".$port."\",
    \"username\" => \"".$username."\",
    \"password\" => \"".$password."\"
];";
        $this->install();
    }

    private function install()
    {
        file_put_contents('config/database.php', $this->config);
    }
}