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

    $statusDes = isset($_POST["btnstatus"]) ? $_POST["btnstatus"] : FALSE;
    $idtroca = isset($_POST["idtroca"]) ? $_POST["idtroca"] : FALSE;
  
    if($statusDes || $idtroca){
        if($statusDes == 'Aceitar'){
            $sql = "UPDATE trocas
            SET statusDes = true
            WHERE idtrocas = '" . $idtroca ."' ";
            if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Troca aceita.');</script>";
                    echo "<script>window.location ='../../Trocas_Recebidas.php'</script>";
            }
            else{
                mysqli_error($conn);
            }
        }
        elseif($statusDes == 'Recusar'){
            $sql = "UPDATE trocas
            SET statusDes = false
            WHERE idtrocas = '" . $idtroca ."' ";
            if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Troca recusada.');</script>";
                    echo "<script>window.location ='../../Trocas_Recebidas.php'</script>";
            }
        }
    }
    else{
        echo 'ERROR: Variaveis não setadas. Entre em contato com o administrador.';
    }

    ?>
</body>
</html>