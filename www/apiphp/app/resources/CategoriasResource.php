<?php

use core\MVC\Resource as Resource;

class CategoriasResource extends Resource {

    public function getCategoriasAction() {
        $this->sql = 'SELECT * FROM categorias';
        $this->execSQL();
        $this->setData();
    }
}