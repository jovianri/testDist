<?php
namespace core\MVC;

use \core;

abstract class Action
{
    private $controller = null;
    protected $model;

    public function run($action, $controller) {
        $this->controller = $controller;
        $this->$action();
    }

    protected function getParam($key) {
        return $this->controller->getParam($key);
    } 

    protected function getModel($modelName, $table) {
		$modelName = ucfirst(strtolower($modelName)) . "Model";
        $global = core\Globals::getInstance();
        $config = $global->get("config");
        $modelFullPath = $config["site"]["models"] . $modelName . '.php';

		if(!file_exists($modelFullPath)) {
			throw new ControllerException("The model " . $modelName . " cannot be found.");
		}

		require_once($modelFullPath);

		$model = new $modelName($table);

		return $model;
    }

}
