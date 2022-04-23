<?php

require('../conexao/conexao.php');

session_start();

session_destroy();

header('location:../login.html');