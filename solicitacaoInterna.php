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
				<form action="pagina_destino.php" method="POST">
					<label for="numSI">Nº S.I.</label>
					<input type="text" placeholder="Número SI" name="numSI" id="numSI">
					<label for="dataSI">Data S.I.</label>
					<input type="text" placeholder="Data SI" name="dataSI" id="dataSI"><br>
					<label for="funcionario">Funcionário</label>
					<select name="funcionario" id="funcionario">
						<option value="func1">Func. A</option>
  						<option value="func2">Func. B</option>
  						<option value="func3">Func. C</optio>
  						<option value="func4">Func. D</option>
  					</select><br>
  					<label for="destino">Destino</label>
					<select name="destino" id="destino">
						<option value="depto1">Depto 01</option>
  						<option value="depto2">Depto 02</option>
  						<option value="depto3">Depto 03</optio>
  						<option value="depto4">Depto 04</option>
  					</select><br>
  					<label for="solicitante">Solicitante</label>
					<input type="text" placeholder="Solicitante" name="solicitante" id="solicitante"><br>
					<label for="assunto">Assunto</label>
					<input type="text" placeholder="Assunto" name="assunto" id="assunto"><br>
					<label for="endereço">Endereço</label>
					<input type="text" placeholder="Endereço" name="endereço" id="endereço"><br>
					<label for="numEndereco">Nº Endereço</label>
					<input type="text" placeholder="Nº Endereço" name="numEndereco" id="numEndereco"><br>
					<label for="bairro">Bairro</label>
					<input type="text" placeholder="Bairro" name="bairro" id="bairro"><br>
					<label for="projeto">Projeto</label>
					<input type="text" placeholder="Nº Projeto" name="projeto" id="projeto">
					<input type="checkbox" id="reservar" name="reservar"><label for="reservar">Reservar</label><br>
					<label for="obs">OBS</label>
					<textarea id="obs" name="obs"></textarea>
					<input type="submit" name="enviar" id="enviar" value="Salvar">
				</form>
		<?php
			} else {
   				echo 'Você não está autorizado a acessar esta página. Por favor, efetue login. <br/>';
			}
		?>
	</body>
</html>