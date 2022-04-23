<?php
require('../conexao/conexao.php');

if (!isset($_POST['email']) or empty($_POST['email'])) {
	header("Location: ../login_invalido.html");
	exit;
} else {

	$email = mysqli_real_escape_string($conexao, $_POST["email"]);
	$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);
	$consulta = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
	$query = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));


	if (mysqli_num_rows($query) != 1) {
		header("Location:../login_invalido.html");
		exit;
	} else {

		$dados = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['email'] = $dados['email'];
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['id'] = $dados['id'];

		header("Location:../home.php");
		exit;
	};
}