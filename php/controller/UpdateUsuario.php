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

    $id = isset($_POST["id"]) ? $_POST["id"] : FALSE;
    $Login = isset($_POST["login"]) ? $_POST["login"] : FALSE;
    $Senha = isset($_POST["senha"]) ? $_POST["senha"] : FALSE;
    $Nome = isset($_POST["nome"]) ? $_POST["nome"] : FALSE;
    $data_nasc = isset($_POST["data_nasc"]) ? $_POST["data_nasc"] : FALSE;
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : FALSE;
    $email = isset($_POST["email"]) ? $_POST["email"] : FALSE;
    $tel = isset($_POST["tel"]) ? $_POST["tel"] : FALSE;
    $check = isset($_POST["chklogin"]) ? $_POST["chklogin"] : FALSE;

    if($check == 1){
        $sql = "SELECT * FROM usuario Where Senha = '" .$Senha."' AND Login = '". $Login ."'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            echo  "<script>alert('Senha e login ja existente, altere os campos.');</script>";
            echo "<script>window.location ='../../Edicao_Usuario.php'</script>";
        }
        else{
            $sql  = "UPDATE usuario 
        SET  Login = '".$Login."' , 
        Senha = '".$Senha."', 
        Data_de_Nascimento = '" . $data_nasc."', 
        CPF = '" . $cpf."', 
        Email = '" . $email."', 
        Telefone = '" . $tel."',
        Nome = '" . $Nome."'
        WHERE id = '". $id . "'";

        if(mysqli_query($conn,$sql)){
            echo  "<script>alert('Alterações efetuadas.');</script>";
            echo "<script>window.location ='../../Edicao_Usuario.php'</script>";
        }
        else{
            echo  "<script>alert('Ocorreu um erro na alteração de dados,tente novamente.');</script>";
            echo "<script>window.location ='../../Edicao_Usuario.php'</script>";
        }
        }
        
    }
    else{
        $sql  = "UPDATE usuario 
        SET Data_de_Nascimento = '" . $data_nasc."', 
        CPF = '" . $cpf."', 
        Email = '" . $email."', 
        Telefone = '" . $tel."',
        Nome = '" . $Nome."'
        WHERE id = '". $id . "'";
        if(mysqli_query($conn,$sql)){
            echo  "<script>alert('Alterações efetuadas.');</script>";
            echo "<script>window.location ='../../Edicao_Usuario.php'</script>";
        }
        else{
            echo  "<script>alert('Ocorreu um erro na alteração de dados,tente novamente.');</script>";
            echo "<script>window.location ='../../Edicao_Usuario.php'</script>";
        }
    }
    
    
    
    
?>
</body>
</html>