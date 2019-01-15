<?php

use core\MVC\Resource as Resource;

class ImagenesResource extends Resource {

    public function getImagenesAction() {
        $imagen = $this->controller->getParam('imagen');
        $this->sql = 'SELECT * FROM imagenes WHERE nombre = :nombre';
        $params = array(
            'nombre' => $imagen,
        );
        $this->execSQL($params);
        $this->setData();
    }
}