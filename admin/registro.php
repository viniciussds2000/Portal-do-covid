<?php
	require_once("../libs/configs/configuracoes.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Login de acesso </title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"/>
	</head>
	<body>
		<div class="conteiner">
			<div class="topo">
				<h1>Portal do Covid</h1>
			</div>

			<div class="menu">
				<ul>
					<li> <a href="index.php">Painel de administrador</a></li>
				</ul>
			</div>
			
			<h2 style="text-align: center;size:40px;">Cadastrar Administrador</h2>

			<div class="conteudo">
				<form action="" method="POST">
					<label >E-mail:</label>
					<input type="text" name="email" placeholder="Exemplo: email@login.com" width="40" /> <br/ > <br />
					<label>Senha:</label>
					<input type="password" name="senha" placeholder="******"/> <br/ > <br />
					<label>Confirmar senha:</label>
					<input type="password" name="c_senha" placeholder="******"/> <br/ > <br />

					<input type="submit" name="registro" value="Registrar">
				</form>
			</div>
	</div>
	</body>
</html>


<?php
	if(isset($_POST["registro"])) {
		$email  = addslashes($_POST["email"]);
		$senha1 = addslashes($_POST["senha"]);
		$senha2 = addslashes($_POST["c_senha"]);

		if($email == "" || $senha1 == "" || $senha2 == "" ){
			echo "<script> alert('Preencha todos os campos'); </script>";
			return false;
		}
		if ($senha1 != $senha2) {
			echo "<script> alert('As senhas não conferem!'); </script>";
			return false;
		}

		openConnection();

		$sql = $mysqli->query("SELECT email FROM usuarios WHERE email='$email'");
		if ($sql->num_rows == true) {
			echo "<script> alert ('Este e-mail já está registrado!'); </script>";
			} else{
				if ($mysqli->query("INSERT INTO usuarios (email, senha, admin) VALUES ('$email','".md5($senha1)."','0')")) {
					echo  "<script> alert ('Registrado com Sucesso!'); </script>";
				} else {
					echo  "<script> alert ('Não foi possivel se registrar!'); </script>";
				}
			}
		}
	
?>