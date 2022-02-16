<?php 
    require("../inc/coneccao.php");
    require("loginverify.php");
    $equipe = isset($_POST["equipe"]) ? $_POST["equipe"] : FALSE;
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : FALSE;
    $_SESSION['idequipe'] = $equipe;
    $_SESSION['nomeequipe'] = $nome;

    echo "<script>window.location ='../../Equipe.php'</script>";

?>