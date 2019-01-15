<?php

use core\MVC\Resource as Resource;

class LocalesResource extends Resource {

    public function getLocalesAction() {
        $local = $this->controller->getParam('local');
        $this->sql = 'SELECT * FROM locales WHERE nombre = :nombre';
        $params = array(
            'nombre' => $local,
        );
        $this->execSQL($params);
        $this->setData();
    }
}