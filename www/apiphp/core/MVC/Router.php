<?php
namespace core\MVC;

/********** 
 Class Router: Esta clase nos servirá para leer nuestras rutas y cargar
 la que toque en cada momento
**********/
class Router {
	private $params = array();
	private $queries = array();
	private $routers = array(
		'get' => array(),
		'post' => array(),
		'put' => array(),
		'delete' => array()
	);

	public function addRoute(array $data, $method) {
		array_push($this->routers[$method], $data);
	}

	public function getParam($key) {
		if(array_key_exists($key, $this->params)) {
			return $this->params[$key];
		}

		return null;
	}

	public function getQuery($key) {
		if(array_key_exists($key, $this->params)) {
			return $this->queries[$key];
		}

		return null;		
	}

	protected function addRoutesFromFile(array $routes) {
		foreach ($routes["get"] as $currentRoute) {
			$this->addRoute($currentRoute, 'get');
		}
	}

	protected function parseUriRouter() {
		$validRoute = null;
		$uri = trim($_SERVER["REQUEST_URI"], "/");
		$method = strtolower($_SERVER["REQUEST_METHOD"]);
		//echo 'URI: ' . $uri . '<br>METHOD: ' . $method . '<br>';
		foreach($this->routers[$method] as $currentRoute) {
			$route = trim($currentRoute["route"], "/");
			$routerPattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$#D";
			// Params values that will be assigned to there respective keys
			$matchesParams = array();
			// Check if the URI matches the current route
			if(preg_match_all($routerPattern, $uri, $matchesParams)) {
				// Keys for the params
				$keys = array();
	
				// Remove the first element 
				array_shift($matchesParams);
				
				// Getting the keys names
				preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys);
				
				// Remove the first element sense is no necesary
				array_shift($keys);
	
				// Assign value to key
				for ($i = 0; $i < count($keys[0]); $i++) {
					$this->params[$keys[0][$i]] = $matchesParams[$i][0];
				}
				
				$validRoute = $currentRoute;
				break; 
			}
		}
		return $validRoute;
	}

}
