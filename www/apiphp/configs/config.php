<?php

    define('DS', "/");
    define("ROOT", "C:/xampp/htdocs/localia/www/apiphp");

    return array(
        "site" => array(
            "name" => "Localia.com",
            "title"  => "Localia",
            "coreMVC" => ROOT . DS . "core" . DS . "MVC" . DS,
            "configs" => ROOT . DS . "configs" . DS,
            "resources" => ROOT . DS . "app" . DS . "resources" . DS,
        )
    );
