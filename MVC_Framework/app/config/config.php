<?php 


//configuracoes de acesso a base de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_da_base_de_dados');
define('DB_USER', 'nome_do_user');
define('DB_PASS', 'user_do_password_');



// Rota para aplicacao usamos o dirname para voltar
// algumas paginas 

define('ROTA_APP', dirname(dirname(__FILE__)));

//Rota url exemplo: http://localhost/MVC_FW/
//substituir não esquecer 
define('ROTA_URL', 'http://localhost:83/MVC_FW');

//
define('NOMESITE', 'NOME_DO_SITE');
	