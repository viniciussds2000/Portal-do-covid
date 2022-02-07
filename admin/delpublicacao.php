<?php
	require_once("../libs/configs/configuracoes.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Deletar publicação </title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"/>
		<?php
			include_once("../conexao.php");

			$titulo = ["titulo"];
			
			$select = "SELECT titulo FROM portaldenoticia.publicacoes";


		?>
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
			<h2>Deletar Publicação</h2>
			<div class="conteudo" style="height: 500px">

			<form action="" method="POST">
				<label>Titulo: </label>
				<input type="text" name="titulo" placeholder="Insira um titulo"/ size="30"> <br/ > <br />
				
				<input type="submit" name="publicar" value="Deletar">
			</form>
			<h3>Titulos de publicaçoes publicadas</h3>
			<?php
				$result= mysqli_query($conexao,$select);

				if (mysqli_num_rows($result) > 0) {
				  echo "<table border='2'>";
				  while($row = $result->fetch_assoc()) {
				    echo "<thead>
				    		<tr> 
				    			<th>
				    				".$row["titulo"]."
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
	if(isset($_POST["publicar"])) {
		$titulo = addslashes($_POST["titulo"]);

		if($titulo =="") {
			echo "<script> alert('Preencha todos os campos!'); </script>";
			return false;

		}

		openConnection();

		$sql = $mysqli->query("SELECT id FROM publicacoes WHERE titulo='$titulo'");
		if($sql->num_rows == false) {
			echo "<script> alert ('Esse titulo não está publicado!'); </script>";
			} else{

				if ($mysqli->query("DELETE FROM publicacoes WHERE titulo ='$titulo'")){ 
					echo  "<script> alert('Publicação deletada com Sucesso!'); </script>";
				} else {
					echo  "<script> alert ('Não foi possivel deletar a publicação!'); </script>";
				}
			}
		}

	

?>