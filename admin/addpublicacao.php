<?php
	require_once("../libs/configs/configuracoes.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Nova publicação </title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"/>
	</head>
	<body>
		<div class="container">
			<div class="topo">
				<h1>Portal do Covid</h1>
			</div>

			<div class="menu">
				<ul>
					<li> <a href="index.php">Painel de administrador</a></li>
				</ul>
			</div>
			<h2>Nova Publicação</h2>
			<div class="conteudo" style="height: 500px">

			<form action="" method="POST">
				<label>Titulo: </label>
				<input type="text" name="titulo" placeholder="Insira um titulo"/ size="30"> <br/ > <br />
				<label>Subtitulo: </label>
				<input type="text" name="subtitulo" placeholder="Insira um subtitulo"/ size="30"> <br/ > <br />
				<label>Publicação: </label> <br/>
				<textarea name="publicacao" rows="10" cols="50" placeholder="Digite algo para a publicação"></textarea> 400px;" <br/ > <br />
				<input type="submit" name="publicar" value="Publicar">
			</form>
		</div>
	</div>
	</body>
</html>


<?php
	if(isset($_POST["publicar"])) {
		$titulo = addslashes($_POST["titulo"]);
		$subtitulo = addslashes($_POST["subtitulo"]);
		$publicacao = addslashes($_POST["publicacao"]);



		if($titulo =="" || $subtitulo == "" || $publicacao =="") {
			echo "<script> alert('Preencha todos os campos!'); </script>";
			return false;

		}

		openConnection();

		$sql = $mysqli->query("SELECT id FROM publicacoes WHERE titulo='$titulo'");
		if($sql->num_rows == true) {
			echo "<script> alert ('Esse titulo já está publicado!'); </script>";
			} else{
				if ($mysqli->query("INSERT INTO publicacoes (titulo, subtitulo, texto) VALUES ('$titulo','$subtitulo','$publicacao')")){ 
					echo  "<script> alert('Publicado com Sucesso!'); </script>";
				} else {
					echo  "<script> alert ('Não foi possivel se registrar!'); </script>";
				}
			}
		}

	

?>