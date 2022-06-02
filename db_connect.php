<?php
define("HOST", "localhost"); // O host no qual você deseja se conectar.
define("USER", "st_user"); // O nome de usuário do banco de dados.
define("PASSWORD", "612915"); // A senha do usuário do banco de dados. 
define("DATABASE", "secure_login"); // O nome do banco de dados.

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// Se você estiver se conectando via TCP/IP ao invés de um socket UNIX, lembre-se de adicionar o número da porta como um parâmetro.
?>