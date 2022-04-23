<?php
require('../conexao/conexao.php');

session_start();

if ($_SESSION['email'] == '') {
    header("Location: ../login.html");
    exit;
} else {

    if (!empty($_FILES['novaImagem']['name'])) {

        $extensao = strtolower(substr($_FILES['novaImagem']['name'], -4));
        $novo_nome_imagem = date("Y.m.d-H.i.s") . $extensao;
        $pasta_imagem = "../img/artigos/";
        $pasta_certa = "img/artigos/";
        $imagem_salvar_banco = $pasta_certa . $novo_nome_imagem;
        move_uploaded_file($_FILES['novaImagem']['tmp_name'], $pasta_imagem . $novo_nome_imagem);
    } else {
        $imagem_atual = mysqli_real_escape_string($conexao, $_POST['imagemAtual']);
        $imagem_salvar_banco = $imagem_atual;
    }

    $id_postagem = mysqli_real_escape_string($conexao, $_POST['id_postagem']);
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $texto = mysqli_real_escape_string($conexao, $_POST['conteudo']);

    $atualizar = "UPDATE conteudo SET titulo='$titulo', imagem='$imagem_salvar_banco', texto='$texto' where id='$id_postagem'";
    $atualizar_query = mysqli_query($conexao, $atualizar) or die(mysqli_error($conexao));

    if ($atualizar_query == true) {
        header("Location: ../home.php?resultado=atualizado");
        exit;
    } else {
        header("Location: ../home.php?resultado=falhou");
        exit;
    }
}