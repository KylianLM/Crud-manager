<?php

namespace App;


class Model
{
    private $config;
    public function __construct()
    {
        $this->config = require '../config/database.php';
    }
}