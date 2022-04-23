<?php
require('conexao/conexao.php');

session_start();

if ($_SESSION['email'] == '') {
    header("Location: login.html");
    exit;
} else {
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind/tailwind.css">
</head>

<body>
    <?php include('componentes/header.php'); ?>

    <div class="max-w-screen m-auto pb-20">
        <div>
            <section class="mt-20 mb-10">
                <h1 class="text-2xl text-gray-600 text-center">Novo artigo</h1>
            </section>
        </div>

        <div class="rounded-xl w-full m-auto">


            <div class="bg-white w-full md:w-1/2 m-auto">
                <section class="mb-2">
                    <h3 class="ml-2 text-gray-600 font-bold">Digite as informações abaixo</h3>
                </section>
                <form action="requisicoes PHP/adicionar_artigo.php" method="POST" enctype="multipart/form-data">
                    <div class="py-2 px-3 ">
                        <div class="flex flex-col">
                            <label for="titulo" class="text-gray-500 pb-1 font-bold">Titulo</label>
                            <input
                                class="py-1 px-3 border border-gray-200 focus:outline-none focus:ring-1  focus:border-b-blue-300"
                                type="text" name="titulo" id="titulo" placeholder="Digite o titulo">
                        </div>
                        <div class="flex flex-col mt-6">
                            <label for="conteudo" class="text-gray-500 pb-1 font-bold">Coloque aqui o conteudo</label>
                            <textarea type="text"
                                class="py-1 px-3 border border-gray-200 focus:outline-none focus:ring-1  focus:border-b-blue-300"
                                rows="5" name="conteudo" id="conteudo" placeholder="Escreva aqui"></textarea>
                        </div>
                        <div class="flex flex-col mt-6">
                            <label for="selecionarImagem" class="text-gray-500 pb-1 font-bold">Selecionar imagem</label>
                            <input type="file" name="imagem" id="selecionarImagem">

                        </div>
                        <div class="w-full mt-6">
                            <button type="submit" class="bg-blue-500 rounded-xl py-2 px-4 text-white flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Postar
                                artigo</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </div>

    </section>

    </div>



    </div>




</body>

</html>