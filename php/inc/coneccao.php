<?php
    $conn = mysqli_connect("localhost", "root", "Senha123", "sistemagerenciamentoescalas2");

    if (mysqli_connect_errno())
    {
        printf('Falha na conexão: %s\n', mysqli_connect_error());
        exit(); // die();
    }
?>