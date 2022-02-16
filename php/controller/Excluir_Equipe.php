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
    $id = $_SESSION['idequipe'];
    $sql = "DELETE FROM equipe_has_administrador WHERE equipe_idEquipe = '".$id."'";
    if(mysqli_query($conn,$sql)){
        $sql = "DELETE FROM equipe WHERE idEquipe = '".$id."'";
        if(mysqli_query($conn,$sql)){
        echo  "<script>alert('Equipe excluida.');</script>";
        echo "<script>window.location ='../../index.php'</script>";
        }
        else{
            echo  "<script>alert('Não foi possivel excluir a equipe, exclua todos os turnos');</script>";
            echo "<script>window.location ='../../index.php'</script>";
        }
    }
    else
    {
        echo  "<script>alert('Não foi possivel excluir a equipe');</script>";
        echo "<script>window.location ='../../index.php'</script>";
    }
    
    
    ?>
</body>
</html>