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
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");
    $id = $_SESSION['id'];
    $sql = "SELECT equipe_idEquipe FROM equipe_has_administrador WHERE administrador_Usuario_id = ' " .  $id . " '";
    $query = mysqli_query($conn,$sql) or die;
    $arrayequipes = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($arrayequipes,$row['equipe_idEquipe']);
    }
    foreach($arrayequipes as $equipe){
        $sql = "SELECT Nome, Descrição from equipe WHERE idEquipe = '". $equipe ."'";
        $query = mysqli_query($conn,$sql);
        $dadosequipe = mysqli_fetch_assoc($query);
        
        echo '<form action="php/controller/equipeSession.php" method="post" id="envio" name="envio" enctype="multipart/form-data" > 
            <h2>'.$dadosequipe['Nome'].'</h2>
            <p>'.$dadosequipe['Descrição'].'
            <input style="display:none" value='.$equipe.' name="equipe">
            <input style="display:none" value="'.$dadosequipe['Nome'].'" name="nome">
            <input type="submit" value="Entrar">

            
        </form>
        ';
    }
    
    ?>
</body>
</html