<?php
	require_once("libs/configs/configuracoes.php");
	openConnection();
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8"/>
		<title>Pagina inicial </title>
		<link rel="stylesheet" href="css/index.css" type="text/css" media="all"/>
		<?php
			include_once("conexao.php");

			$titulo = ["titulo"];
			$subtitulo =["subtitulo"];
			$texto =["texto"];

			$select = "SELECT titulo, subtitulo, texto FROM portaldenoticia.publicacoes";


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
					<li> <a href="admin/login.php">Pagina de administrador</a></li>
				</ul>

			</div>
			
				<div class="conteudo">
					<div class="contador">
						<h3>Numero de infectados com Covid-19 no DF:</h2>
						<h2>217.793</h2>
						<h3>Numero de mortes no DF:
						<h2>3.788</h2>
					</div>

					<?php
				$result= mysqli_query($conexao,$select);

				if (mysqli_num_rows($result) > 0) {
				  echo "<table>";
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				    echo "<thead>
				    		<tr> 
				    			<th>
				    				".$row["titulo"]."
				    			</th> 
				    		</tr>
				    		<tr> 
				    			<td>
				    				".$row["subtitulo"]."
				    			</td>
				    		</tr> 
				    		<tr> 
				    			<td>
				    				<p>
				    					".$row["texto"]."
				    				</p>
				    			</td>
				    		<tr> ";
				  }
				  echo "</table>";
				}
					mysqli_close($conexao);	
				?>
				</div>
			</div>
			<div class="rodape">
				<span> Portal do covid &copy; <?=date('Y')?> - Todos os direitos reservados.</span>
			</div>
	</body>