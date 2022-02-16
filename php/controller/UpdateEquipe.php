<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("../inc/coneccao.php");
    require("loginverify.php");
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : FALSE;
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : FALSE;
    $equipe = isset($_SESSION['idequipe']) ? $_SESSION['idequipe'] : FALSE;
    if($equipe){
    if($nome){
        $HorarioIni_Dom = isset($_POST["HorarioIni_Dom"]) ? $_POST["HorarioIni_Dom"] : FALSE;
        $HorarioFim_Dom = isset($_POST["HorarioFim_Dom"]) ? $_POST["HorarioFim_Dom"] : FALSE;

        $HorarioIni_Seg = isset($_POST["HorarioIni_Seg"]) ? $_POST["HorarioIni_Seg"] : FALSE;
        $HorarioFim_Seg = isset($_POST["HorarioFim_Seg"]) ? $_POST["HorarioFim_Seg"] : FALSE;

        $HorarioIni_Ter = isset($_POST["HorarioIni_Ter"]) ? $_POST["HorarioIni_Ter"] : FALSE;
        $HorarioFim_Ter = isset($_POST["HorarioFim_Ter"]) ? $_POST["HorarioFim_Ter"] : FALSE;

        $HorarioIni_Quar = isset($_POST["HorarioIni_Quar"]) ? $_POST["HorarioIni_Quar"] : FALSE;
        $HorarioFim_Quar = isset($_POST["HorarioFim_Quar"]) ? $_POST["HorarioFim_Quar"] : FALSE;

        $HorarioIni_Quin = isset($_POST["HorarioIni_Quin"]) ? $_POST["HorarioIni_Quin"] : FALSE;
        $HorarioFim_Quin = isset($_POST["HorarioFim_Quin"]) ? $_POST["HorarioFim_Quin"] : FALSE;

        $HorarioIni_Sex = isset($_POST["HorarioIni_Sex"]) ? $_POST["HorarioIni_Sex"] : FALSE;
        $HorarioFim_Sex = isset($_POST["HorarioFim_Sex"]) ? $_POST["HorarioFim_Sex"] : FALSE;

        $HorarioIni_Sab = isset($_POST["HorarioIni_Sab"]) ? $_POST["HorarioIni_Sab"] : FALSE;
        $HorarioFim_Sab = isset($_POST["HorarioIni_Sab"]) ? $_POST["HorarioIni_Sab"] : FALSE;

        if(
            strtotime($HorarioFim_Sab) < strtotime($HorarioIni_Sab) ||
            strtotime($HorarioFim_Dom) < strtotime($HorarioIni_Dom) || 
            strtotime($HorarioFim_Seg) < strtotime($HorarioIni_Seg) ||
            strtotime($HorarioFim_Ter) < strtotime($HorarioIni_Ter) ||
            strtotime($HorarioFim_Quar) < strtotime($HorarioIni_Quar) ||
            strtotime($HorarioFim_Quin) < strtotime($HorarioIni_Quin) ||
            strtotime($HorarioFim_Sex) < strtotime($HorarioIni_Sex)
        )
        {
            echo  "<script>alert('Não é permitido inserir um horario final menor que o inicial');</script>";
            echo "<script>window.location ='../../Edicao_Equipe.php'</script>";
        }
        else
        {
            $sql  = "UPDATE equipe 
            SET  Nome = '".$nome."' , 
            Descrição = '".$desc."', 
            HorarioIni_Dom = '" . $HorarioIni_Dom."', 
            HorarioFim_Dom = '" . $HorarioFim_Dom."', 
            HorarioIni_Seg = '" . $HorarioIni_Seg."', 
            HorarioFim_Seg = '" . $HorarioFim_Seg."',
            HorarioIni_Ter = '" . $HorarioIni_Ter."', 
            HorarioFim_Ter = '" . $HorarioFim_Ter."',
            HorarioIni_Quar = '" . $HorarioIni_Quar."', 
            HorarioFim_Quar = '" . $HorarioFim_Quar."',
            HorarioIni_Quin = '" . $HorarioIni_Quin."', 
            HorarioFim_Quin = '" . $HorarioFim_Quin."',
            HorarioIni_Sex = '" . $HorarioIni_Sex."',  
            HorarioFim_Sex = '" . $HorarioFim_Sex."',
            HorarioIni_Sab = '" . $HorarioIni_Sab."', 
            HorarioFim_Sab = '" . $HorarioFim_Sab."'
            WHERE idEquipe = '". $equipe . "'";

            if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Alterações efetuadas.');</script>";
                echo "<script>window.location ='../../Edicao_Equipe.php'</script>";
            }
    }
    }
    else{
        echo  "<script>alert('ERRO: Insira um nome para a equipe.');</script>";
            echo "<script>window.location ='../../Edicao_Equipe.php'</script>";
    }
}
else{
    echo "<script>window.location ='../../Equipes.php'</script>";
}
    ?>
</body>
</html>