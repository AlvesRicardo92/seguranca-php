<?php
include 'db_connect.php';
include 'functions.php';
sec_session_start();
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Erro ao conectar no MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Preencha os campos!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Preencha os campos');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('E-mail inválido!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Usuário inválido!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('A senha deve ter de 5 a 20 caracteres!');
}
// We need to check if the account with that username exists.
if ($stmt = $mysqli->prepare('SELECT id, password FROM members WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Usuário existente!';
	} else {
		// Username doesnt exists, insert new account
		if ($stmt = $mysqli->prepare('INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			// A senha em hash do formulário
			$password = hash('sha512', $_POST['password']); 
			// Cria um salt randômico
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
			// Cria uma senha pós hash (Cuidado para não re-escrever)
			$password = hash('sha512', $password.$random_salt);
			$stmt->bind_param('ssss', $_POST['username'], $_POST['email'], $password, $random_salt);
			$stmt->execute();
			echo 'Registrado com sucesso. Já pode realizar o login!';
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Algo deu errado!';
		}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Algo deu errado!';
}
$mysqli->close();
?>