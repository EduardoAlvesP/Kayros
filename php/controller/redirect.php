<?php 
require("../inc/coneccao.php");
require("loginverify.php");

if($_SESSION['conta']== 'func'){
    $sql = "SELECT * FROM Funcionário WHERE Usuario_id = '".$_SESSION['id']."'";
    $query = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_assoc($query);
    $_SESSION['idequipe'] = $dados['equipe_idEquipe'];
    $sql = "SELECT * FROM equipe WHERE idEquipe = '".$dados['equipe_idEquipe']."'";
    $query = mysqli_query($conn,$sql);
    $dadosequipe = mysqli_fetch_assoc($query);
    $_SESSION['nomeequipe'] = $dadosequipe['Nome'];
    echo "<script>window.location ='../../Equipe.php'</script>";
}
elseif($_SESSION['conta'] == 'adm'){
    echo "<script>window.location ='../../index.php'</script>";

}


?>