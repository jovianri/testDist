<?php
class IndexController extends core\MVC\Action {

    public function GetLocalesAction() {
        $model = $this->getModel('locales', 'locales');
        $data = $model->select();
        echo \json_encode($data);
        
    }

    public function GetCategoriasAction() {
        $model = $this->getModel('categorias', 'categorias');
        $data = $model->select();
        echo \json_encode($data);
    }

    public function GetImagenesAction() {
        $model = $this->getModel('imagenes', 'imagenes');
        $data = $model->select("nombre");
        echo \json_encode($data);
    }
    // public function JugadoresAction() {
    //     $model = $this->getModel('jugadores', 'jugadores');
    //     $data = $model->select('codigo, nombre, foto', 'Nombre_equipo="Lakers"');
    // }

    // public function JugadoresEquipoAction() {
    //     $equipo = $this->getParam("idEquipo");
    //     $model = $this->getModel('jugadores', 'jugadores');
    //     $data = $model->select('codigo, nombre, foto', 'Nombre_equipo="' . $equipo .  '"');
    //     echo \json_encode($data);
    // }
}