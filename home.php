<?php
require('conexao/conexao.php');

session_start();


if ($_SESSION['email'] == '') {
    header("Location: login.html");
    exit;
} else {
    $tabela_consulta = "SELECT * FROM `conteudo` order by id";
    $tabela_query = mysqli_query($conexao, $tabela_consulta) or die(mysqli_error($conexao));
    $quantos_registros = mysqli_num_rows($tabela_query);
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
    <div>


        <?php include('componentes/header.php'); ?>

        <section class="w-full px-4 lg:px-14 xlg:px-36 pb-10">

            <div class="w-full  mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

                <?php if ($quantos_registros == 0) { ?>
                <div class="text-center">
                    <center>
                        Nenhum artigo encontrado
                    </center>
                </div>
                <?php } else { ?>
                <?php while ($dados = mysqli_fetch_assoc($tabela_query)) { ?>

                <div
                    class="bg-white w-full h-full sm:w-72 md:w-full rounded-xl border py-6 px-3 text-center shadow-2xl space-y-3">
                    <div><b><?php echo $dados['titulo']; ?></b></div>
                    <div>
                        <img class="m-auto" style="height: 100px;" src="<?php echo $dados['imagem']; ?>" alt="">
                    </div>
                    <div>
                        <p class="truncate"><?php echo $dados['texto'] ?></p>
                    </div>
                    <div>
                        <p class="text-sm mb-4"><?php echo $dados['data_da_postagem'] ?></p>
                    </div>
                    <div>
                        <a href="editar_artigo.php?id=<?php echo $dados['id'] ?>"
                            class="rounded-xl py-2 px-6 text-white bg-blue-700 hover:bg-blue-500">Editar</a>
                        <a href="deletar_artigo.php?ref=<?php echo $dados['id'] ?>"
                            class="rounded-xl py-2 px-6 text-white bg-red-700 hover:bg-red-500">Excluir</a>
                    </div>
                </div>
                <?php }
                } ?>
            </div>

        </section>

    </div>
    <a href="criar_artigo.php"
        class="fixed shadow-xl bottom-10 right-2 bg-blue-500 rounded-xl py-2 px-3 text-white flex">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="white"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Criar
        novo
        artigo</a>

</body>

</html>