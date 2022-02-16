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
    
    $status = isset($_POST["btnstatus"]) ? $_POST["btnstatus"] : FALSE;

    if($status){
        if($status == 'Confirmar'){

                $jus = isset($_POST["jus"]) ? $_POST["jus"] : FALSE;
                $idturnoRem = isset($_POST["idturnoRem"]) ? $_POST["idturnoRem"] : FALSE;
                $idRem = isset($_POST["idRem"]) ? $_POST["idRem"] : FALSE;
                $idturnoDes = isset($_POST["idturnoDes"]) ? $_POST["idturnoDes"] : FALSE;
                $idDes = isset($_POST["idDes"]) ? $_POST["idDes"] : FALSE;
                $idTroca = isset($_POST["idTroca"]) ? $_POST["idTroca"] : FALSE;

                if($idturnoRem || $idRem || $idturnoDes || $idDes || $idTroca){

                    $sql  = "UPDATE funcionário_has_turnos SET  funcionário_Usuario_id = '" . $idRem ."' WHERE Turnos_idTurnos = '". $idturnoDes . "'AND funcionário_Usuario_id = '". $idDes . "'";

                if(mysqli_query($conn,$sql)){
                    $sql = "SET FOREIGN_KEY_CHECKS=0;";
                    mysqli_query($conn,$sql);
                    $sql  = "UPDATE funcionário_has_turnos SET  funcionário_Usuario_id = '" . $idDes ."' WHERE Turnos_idTurnos = '". $idturnoRem . "' AND funcionário_Usuario_id = '". $idRem . "' ";

                    if(mysqli_query($conn,$sql)){
                        $sql = "SET FOREIGN_KEY_CHECKS=0;";
                        mysqli_query($conn,$sql);
                        $sql  = "UPDATE trocas SET  statusAnalise = true , data_Analise = CURDATE(), justificativa = '" . $jus."' WHERE idtrocas = '". $idTroca . "'";

                        if(mysqli_query($conn,$sql)){
                            $sql = "SET FOREIGN_KEY_CHECKS=1;";
                            mysqli_query($conn,$sql);
                            echo  "<script>alert('Troca efetuada.');</script>";
                            echo "<script>window.location ='../../Analise_Trocas.php'</script>";
                        }
                        else{
                            $sql = "SET FOREIGN_KEY_CHECKS=1;";
                            mysqli_query($conn,$sql);
                            echo  "<script>alert('ERRO NA TROCA.');</script>";
                            echo "<script>window.location ='../../Analise_Trocas.php'</script>";
                        }
                    }
                    else{
                        echo 'erro no destinatario';
                        echo mysqli_error($conn);
                    }
                }
                else{
                    echo 'erro no remetente';
                    mysqli_error($conn);
                }
            }
            }
        else{
            echo  "<script>alert('Troca Recusadas.');</script>";
            echo "<script>window.location ='../../Analise_Trocas.php'</script>";
        }
    }
    else{

    }
    

    
    
    ?>
</body>
</html>