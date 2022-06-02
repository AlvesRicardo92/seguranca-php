<?php
include 'db_connect.php';
include 'functions.php';
sec_session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
		<?php
			if(login_check($mysqli) == true) {
		?>
				<a href="solicitacaoInterna.php" class="style1"><img src="./imagens/SI.jpg"><br>Sol. Interna</a>
   				<a href="#" class="style1"><img src="./imagens/Projeto.jpg"><br>Projetos</a>
   				<a href="#" class="style1"><img src="./imagens/Oficios.jpg"><br>Ofícios</a>
   				<a href="#" class="style1"><img src="./imagens/certidoes.jfif"><br>Certidões</a>
   				<a href="#" class="style1"><img src="./imagens/OS.jpg"><br>OS</a>
   				<a href="#" class="style1"><img src="./imagens/images.jfif"><br>Relatórios</a>
   				<a href="#" class="style1"><img src="./imagens/radar.jpg"><br>Radar</a>
   				<a href="logout.php" class="style1"><img src="./imagens/SAIR.jpg"><br>Sair</a>
		<?php
			} else {
   				echo 'Você não está autorizado a acessar esta página. Por favor, efetue login. <br/>';
			}
		?>
	</body>
</html>