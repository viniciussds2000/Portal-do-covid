<?php
	require_once("../libs/configs/configuracoes.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Painel de controle do administrador</title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"/>
	</head>
	<body>
		<div class="container">
			<div class="menu">
				<ul>
					<li> <a href="../index.php">Pagina inicial</a></li>
				</ul>
			</div>
			<h2>Painel do administrador</h2>
				<div class="navbar">
					<div class="lista">
						<label><a href="../index.php">Inicio</a></label><br/><br/>
						<label><a href="addpublicacao.php">Nova publicação</a></label><br/><br/>
						<label><a href="delpublicacao.php">Remover publicação</a></label><br/><br/>
						<label><a href="registro.php">Cadastrar administradores</a></label><br/><br/>
						<label><a href="removeradm.php">Remover administradores</a></label><br/><br/><br/><br/>
						<label><a href="login.php">Sair</a></label>
						
					</div>
					
				</div>
			</div>
			<div class="rodape">
				<span> Portal do covid &copy; <?=date('Y')?> - Todos os direitos reservados.</span>
			</div>
	</body>
</html>


