<?php 

Class Core{

	//trazer a URL inserida no navegador
	//1-Controller
	//2-Method
	//3-Params
	
	protected $controllerActual = 'paginas';
	protected $methodActual = 'index';
	protected $params = [];

	public function __construct(){
		//print_r($this->getUrl());
		$url = $this->getUrl();

			//buscar em controllers se existes
		if ($url!=null) {
			if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
				//se existir para inserir na controllerActual
				$this->controllerActual = ucwords($url[0]);

				//unset indice 
				unset($url[0]);
				
			}
		}
		

		//requere o controller
		require_once '../app/controllers/'.$this->controllerActual.'.php';
		$this->controllerActual = new $this->controllerActual;

		//buscar o metodo na controller
		if (isset($url[1])) {
			if (method_exists($this->controllerActual, $url[1])) {
				//pegamos o metdodo
				$this->methodActual = $url[1];
				unset($url[1]);

			}
		}

		//echo $this->methodActual;

		//buscar os pametros
		$this->params = $url ? array_values($url) : [];

		//chamar o call back com os parametros dos arrays
		
		call_user_func_array([$this->controllerActual, $this->methodActual],$this->params);
		

	}

	public function getUrl(){
		 //echo $_GET['url'];
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;

		}
	}


}