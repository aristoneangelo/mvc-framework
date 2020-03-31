<?php 
	//classe para fazer conexao e executar consultas
	class Base{

		private $host=DB_HOST;
		private $user= DB_USER;
		private $password = DB_PASS;
		private $basedados = DB_NAME;

		private $dbh;
		private $stmt;
		private $error;

		public function __construct(){
			$dth = 'mysql:host='.$this->host.';dbname='.$this->basedados;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

			);

			try {

				$this->dth = new PDO($dth, $this->user,$this->password,$options);
				$this->dth->exec('set names utf8');
				
			} catch (PDOException $e) {

				$this->error = $e->getMessage();
				echo $this->error;
				
			}

		}


		//preparar a Consulta
		public function query($sql){
			$this->stmt = $this->dth->prepare($sql);
		}

		// Fazer um Bind de Valores 
		public function bind($param,$value,$type = null){
			if (is_null($type)) {
					switch ($true) {
						case is_int($value):
							$type = PDO::PARAM_INT;
							break;
						case is_bool($value):
							$type = PDO::PARAM_BOOL;
							break;
						case is_null($value):
							$type = PDO::PARAM_NULL;
							break;
						default:
							$type = PDO::PARAM_STR;
							break;
					}
			}
			$this->stmt->bindValue($param,$value,$type);
		}

		// Fazer o Execute
		public function execute(){
			return $this->stmt->execute();
		}

		//buscar registos
		public function registos(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}
		//buscar registo
		public function registo(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		//buscar qtd registos
		public function rowCount(){
			return $this->stmt->rowCount();
		}
	}