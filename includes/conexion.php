<?php
// Conexión
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog-master';
//$port = '3306';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}