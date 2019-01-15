<?php

use core\MVC\Resource as Resource;

class LocalesResource extends Resource {

    public function getLocalesAction() {
        $this->error = 'error';
        $this->setData();
    }
}