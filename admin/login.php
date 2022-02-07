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
		<div class="container">
			<div class="topo">
				<h1>Portal do Covid</h1>
			</div>

			<div class="menu">
				<ul>
					<li> <a href="../index.php">Pagina inicial</a></li>
				</ul>
			</div>
			<h2>Login de administrador</h2>
			<div class="conteudo">

			<form action="" method="POST">
				<label>E-mail:</label>
				<input type="text" name="email" placeholder="Exemplo: email@login.com"/ size="30"> <br/ > <br />
				<label>Senha:</label> 
				<input type="password" name="senha" placeholder="******"/ size="30"> <br/ > <br />
				<input type="submit" name="login" value="Logar">
			</form>
		</div>
	</div>
	</body>
</html>


<?php
	if(isset($_POST["login"])) {
		$email = addslashes($_POST["email"]);
		$senha = addslashes($_POST["senha"]);

		if($email =="" || $senha == "" ) {
			echo "<script> alert('Preencha todos os campos!'); </script>";
			return false;

		}

		openConnection();

		$sql = $mysqli->query("SELECT id FROM usuarios WHERE email='$email'");
		if($sql->num_rows == true) {
			$sql2 = $mysqli->query("SELECT email,senha FROM usuarios WHERE email='$email' AND senha='".md5($senha)."'");
			if($sql2->num_rows == true) {
				echo "<script> alert('Login efetuado com Sucesso!'); location.href= 'index.php' </script>";
			} else {
				echo "<script> alert('Senha incorreta!') </script>";
			}
		} else {
			echo "<script> alert('Este email não esta cadastrado!'); </script>";
		}
		$mysqli->close();
	}
?>