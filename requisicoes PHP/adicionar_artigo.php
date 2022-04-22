<?php
require('../conexao/conexao.php');

session_start();

if ($_SESSION['email'] == '') {
    header("Location: ../login.html");
    exit;
} else {

    if (!empty($_FILES['imagem']['name'])) {

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novo_nome_imagem = date("Y.m.d-H.i.s") . $extensao;
        $pasta_imagem = "../img/artigos/";
        $pasta_certa = "img/artigos/";
        $imagem_salvar_banco = $pasta_certa . $novo_nome_imagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta_imagem . $novo_nome_imagem);
    } else {
        $imagem_salvar_banco = "";
    }

    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $conteudo = mysqli_real_escape_string($conexao, $_POST['conteudo']);
    $hoje = date('d/m/Y');

    $inserir = "INSERT INTO `conteudo` (titulo,imagem,texto,data_da_postagem) value ('$titulo','$imagem_salvar_banco','$conteudo','$hoje')";

    $query = mysqli_query($conexao, $inserir) or die(mysqli_error($conexao));

    if ($query == true) {
        header("Location: ../home.php?resultado=ok");
        exit;
    } else {
        header("Location: ../home.php?resultado=falhou");
        exit;
    }
}