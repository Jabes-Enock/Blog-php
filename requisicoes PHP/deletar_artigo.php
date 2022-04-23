<?php
require('../conexao/conexao.php');

session_start();

if ($_SESSION['email'] == '') {
    header("Location: ../login.html");
    exit;
} else {
    if ($_GET['id'] == '') {
        header("Location: ../home.php");
        exit;
    };
    $id = $_GET['id'];
    $delete_consulta = "DELETE FROM conteudo WHERE id='$id'";
    $delete_query = mysqli_query($conexao, $delete_consulta) or die(mysqli_error($conexao));

    if ($delete_query == true) {
        header("Location:../home.php?resultado=deletado");
        exit;
    } else {
        header("Location:../home.php?resultado=falhou");
        exit;
    }
}