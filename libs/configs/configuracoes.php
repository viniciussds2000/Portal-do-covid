<?php
	function configuracoes() {
		//define("URL","http://localhost/projetointegrado");
		error_reporting(true);
	}

	function openConnection() {
		global $mysqli;

		$host = "localhost";
		$user = "root";
		$pass = "";
		$data = "portaldenoticia";
	

		$mysqli =  new mysqli($host, $user, $pass, $data);
		if ($mysqli->connect_error) {
			printf("Erro de conexão: %s", $mysqli->connect_error);
		}
	}
?>