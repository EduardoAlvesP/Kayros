<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selecione o usuario que deseja editar.</h1>
    <form action="Edicao_Usuario.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
    <select name="iduser">
    <?php 
        require("php/inc/coneccao.php");
        require("php/controller/loginverify.php");

        $id = $_SESSION['id'];
        $conta = $_SESSION['conta'];
        if($conta == 'adm'){
            $sql = "SELECT * from usuario where id = '".$id ."'";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value = "'.$row['id'].'">'.$row['Nome'].' #'.$row['id'].'</option>';
            }
            $sql = "SELECT * from adminstrador";
            $query = mysqli_query($conn,$sql);
            $admIds = [];
            while($row = mysqli_fetch_assoc($query)){
            array_push($admIds,$row['Usuario_id']);
            }

                $sql = "SELECT * from usuario";
                $query = mysqli_query($conn,$sql);
                $arrayUser = [];
                while($row = mysqli_fetch_assoc($query)){
                    array_push($arrayUser,[$row['id'],$row['Nome']]);
                    }
                 // array[0] = id array[1] = Nome
                
                foreach($arrayUser as $user){
                $aux = 0;
                    foreach($admIds as $adm){
                        if($user[0] == $adm){
                            $aux = 1;
                            continue;
                        }
                    }
                    if($aux == 0){
                    echo '<option value = "'.$user[0].'">'.$user[1].' #'.$user[0].'</option>';
                    }
                    else{
                        continue;
                    }
                }

                }     
        elseif($conta == 'func'){
            $sql = "SELECT * from usuario where id = '".$id ."'";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value = "'.$row['id'].'">'.$row['Nome'].' #'.$row['id'].'</option>';
            }
            

            
        }?>
    </select>
    <input type="submit" name="btnaction" value="Editar">
    <input type="submit" name="btnaction" value="Excluir">
    </form>
</body>
</html>