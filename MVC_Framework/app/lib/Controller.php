<?php 

//controller principal carrega os models e as views


class Controller{
	//carregar model
	//
	public function model($model){

		require_once '../app/models/'.$model.'.php';
		//nstanciar modelo
		return new $model();
 	}

 	//carregar view e dados
 	public function view($view, $dados = []){
 		if (file_exists('../app/views/'.$view.'.php')) {
 			require_once '../app/views/'.$view.'.php';
 		}else{
 			die('esta View não existe');
 		}
 	}


}