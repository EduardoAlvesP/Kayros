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
$id = $_SESSION['id'];
$turnoRemetente = isset($_POST["turnoRemetente"]) ? $_POST["turnoRemetente"] : FALSE;
$destinatario = isset($_POST["turnoDestinatario"]) ? $_POST["turnoDestinatario"] : FALSE;
$desc = isset($_POST["desc"]) ? $_POST["desc"] : FALSE;

if($id || $turnoRemetente || $destinatario){
    $destinatarioArray = explode("|",$destinatario);
    $destinatarioTurno = $destinatarioArray[0];
    $destinatarioId = $destinatarioArray[1];
     $sql = "INSERT INTO trocas (idTrocas, Descrição, statusDes, statusAnalise, data_solicitacao, data_Analise, justificativa) VALUES (default,'" . $desc . "', NULL, NULL,CURDATE(),NULL,NULL)";
    if(mysqli_query($conn,$sql)){

        $sql = "SELECT    * FROM  trocas ORDER BY  idtrocas DESC LIMIT 1";
       $result = mysqli_query($conn,$sql);
       $linha = mysqli_fetch_array($result);
       $sql = "INSERT INTO funcionário_has_turnos_has_trocas(idUsuario, idTurnos, trocas_idtrocas) VALUES (' ". $id ."', ' ". $turnoRemetente ."', ' ". $linha['idtrocas'] ."')";
       if(mysqli_query($conn,$sql)){
       $sql2 = "INSERT INTO funcionário_has_turnos_has_trocasdes(idUsuario, idTurnos, trocas_idtrocas) VALUES (' ". $destinatarioId ."', ' ". $destinatarioTurno ."', ' ". $linha['idtrocas'] ."')";
       if(mysqli_query($conn,$sql2)){
           echo 'Troca solicitada com sucesso';
       }
       }
      
       else{
           echo 'Algo deu errado na inserção de dados';
       }



    }
    else{
        echo'algo deu errado na inserção de dados';
    }

}
else{
    echo 'Insira todos os turnos';
}



?>
</body>
</html>
