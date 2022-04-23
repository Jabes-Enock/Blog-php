<?php
require('../conexao/conexao.php');

//INICIAR SESSÃO
session_start();

//SE A VARIAVEL DE SESSÃO E-MAIL FOR VAZIA
if ($_SESSION['email'] == '') {

    // REDIRECIONAR VISITANTE PARA LOGIN
    header("Location: ../login.html");
    exit;
}

//SE A REFERENCIA GET FOR VAZIA	
if ($_GET['ref'] == '') {

    // REDIRECIONAR VISITANTE PARA HOME
    header("Location: ../home.php");
    exit;
};

//QUAL É O ID DO ITEM
$id = $_GET['ref'];
$delete_consulta = "DELETE FROM conteudo WHERE id='$id'";
$delete_query = mysqli_query($conexao, $delete_consulta) or die(mysqli_error($conexao));

//SE DELETOU...
if ($delete_query == true) {

    //RETORNAR PARA HOME COM RESULTADO "DELETADO"
    header("Location: ../home.php?resultado=deletado");
    exit;

    //SE NÃO...	
} else {

    //RETORNAR PRA HOME COM RESULTADO "FALHOU"
    header("Location: ../home.php?resultado=falhou");
    exit;
}