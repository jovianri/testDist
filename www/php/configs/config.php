<?php

    define('DS', '/');
    define("ROOT", "C:/xampp/htdocs/localia/www/php");    
    define("ROOT2", "http://backend.test");

    return array(
        "site" => array(
            "name" => "Localia.com",
            "title"  => "Localia",
            "coreMVC" => ROOT . DS . "core" . DS . "MVC" . DS,
            "style"  => ROOT . DS . "htdocs" . DS . "css" . DS,
            "configs" => ROOT . DS . "configs" . DS,
            "controllers" => ROOT . DS . "app" . DS . "controllers" . DS, 
            "models" => ROOT . DS . "app" . DS . "models" . DS,
            "views" => ROOT . DS . "app" . DS . "views" . DS,
            "errorPage" => ROOT . DS . "app" . DS . "views" . DS . "errorPage.php"
        )
    );