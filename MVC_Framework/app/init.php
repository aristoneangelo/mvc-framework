<?php 

	// carregar o Config
	require_once 'config/config.php';


	//Carregar todas a Lib do app
	//require_once 'lib/Base.php';

	//require_once 'lib/Controller.php';
	
	//require_once 'lib/Core.php';

	//autoload da pasta lib
	spl_autoload_register(function($nomeClasse){
		require_once 'lib/'.$nomeClasse.'.php';
	} )

	
 ?>