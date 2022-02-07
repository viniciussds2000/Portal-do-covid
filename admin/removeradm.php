<?php
	require_once("../libs/configs/configuracoes.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Login de acesso </title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"/>
		<?php
			include_once("../conexao.php");

			$email = ["email"];
			
			$select = "SELECT email FROM portaldenoticia.usuarios";

		?>
	</head>
	<body>
		<div class="container">
			<div class="topo">
				<h1>Portal do Covid</h1>
			</div>

			<div class="menu">
				<ul>
					<li> <a href="index.php">Pagina inicial</a></li>
				</ul>
			</div>
			<h2>Deletar administrador</h2>
			<div class="conteudo">

			<form action="" method="POST">
				<label>E-mail:</label>
				<input type="text" name="email" placeholder="Exemplo: email@login.com"/ size="30"> <br/ > <br />
				<label>Senha:</label> 
				<input type="password" name="senha" placeholder="******"/ size="30"> <br/ > <br />
				<input type="submit" name="login" value="Logar">
			</form>
			<h3>Emails Cadastrados:</h3>
			<?php
				$result= mysqli_query($conexao,$select);

				if (mysqli_num_rows($result) > 0) {
				  echo "<table border='2'>";
				  while($row = $result->fetch_assoc()) {
				    echo "<thead>
				    		<tr> 
				    			<th>
				    				".$row["email"]."
				    			</th> 
				    		</tr>
				    		</thead>
				    		 ";
				  }
				  echo "</table>";
				}
					mysqli_close($conexao);	
				?>
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
			$sql2 = $mysqli->query("DELETE FROM usuarios WHERE email='$email' AND senha='".md5($senha)."'");
			if($sql2 == false) {
				echo "<script> alert('Administrador deletado com Sucesso!')</script>";
			} else {
				echo "<script> alert('Administrador incorreto!') </script>";
			}
		} else {
			echo "<script> alert('Este email não esta cadastrado!'); </script>";
		}
		$mysqli->close();
	}
?>