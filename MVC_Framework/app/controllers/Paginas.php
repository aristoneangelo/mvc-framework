<?php 

class Paginas extends Controller{
	public function __construct(){
		//echo "Carregado Paginas";
	} 

	public function index(){


		$dados = [
			'titulo' => 'APLICAÇÕES WEB'
		];

		$this->view('paginas/inicio',$dados);

	}

	
}