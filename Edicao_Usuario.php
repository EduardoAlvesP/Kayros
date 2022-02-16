<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_global.css">
    <link rel="stylesheet" href="css/style_Form.css">
    <title>Edição usuário</title>
</head>
<body>
    <?php 
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");
    $id = isset($_POST["iduser"]) ? $_POST["iduser"] : FALSE;
    $action = isset($_POST["btnaction"]) ? $_POST["btnaction"] : FALSE;
    if(!$id){
        echo "<script>window.location ='Edicao_SelecionarUsuario.php'</script>";
    }
    if($action == 'Excluir'){
        $sql = "SELECT * FROM funcionário WHERE Usuario_id='".$id."'";
        $query = mysqli_query($conn,$sql);
        $sql2 = "SELECT * FROM adminstrador WHERE Usuario_id='".$id."'  ";
        $query2 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($query) > 0 ){
            $sql = "DELETE FROM funcionário WHERE Usuario_id = '".$id."'";

            if(mysqli_query($conn,$sql)){
                    $sql = "DELETE FROM usuario WHERE id = '".$id."'";
                    if(mysqli_query($conn,$sql)){
                    echo  "<script>alert('Usuário excluido com sucesso');</script>";
                    echo "<script>window.location ='Edicao_SelecionarUsuario.php'</script>";
                    exit;
                    }
                    else{
                        echo  "<script>alert('Erro na exclusão do usuário');</script>";
                        echo "<script>window.location ='Edicao_SelecionarUsuario.php'</script>";
                        exit;
                    }
            }
            else{
                echo  "<script>alert('Erro na exclusão do usuário');</script>";
                echo "<script>window.location ='Edicao_SelecionarUsuario.php'</script>";
                exit;
            }
        }
        elseif(mysqli_num_rows($query2)){
            $sql = "DELETE FROM adminstrador WHERE Usuario_id = '".$id."'";
            if(mysqli_query($conn,$sql)){
                $sql = "DELETE FROM usuario WHERE id = '".$id."'";
                if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Usuário excluido com sucesso');</script>";
                echo "<script>window.location ='php/controller/logout.php'</script>";;
                exit;
                }
                else{
                    echo  "<script>alert('Erro na exclusão do usuário');</script>";
                    echo "<script>window.location ='Edicao_SelecionarUsuario.php'</script>";
                    exit;
                }

            }
       }
    }
    elseif($action == 'Editar'){
        $sql = "SELECT * from usuario WHERE id = '".$id."'";
        $query = mysqli_query($conn,$sql);
        $dados = mysqli_fetch_assoc($query);

    }
    ?>
   <main>
   <form action="php/controller/UpdateUsuario.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
       <input type="" value="<?php echo $id; ?>" style="display:none" name="id">
   <label for="login">Login</label>
        <input type="text" id ="login" name="login" value="<?php echo $dados['Login']; ?>" disabled>

        <label for="senha">Senha</label>
        <input type="text" id ="senha" name="senha" disabled value="<?php echo $dados['Senha']; ?>">
    <input type="checkbox" value="1" name="chklogin" id="chklogin" onclick=ChecarTipo()>Mudar login e senha</input>
        <label for="nome">Nome</label>
        <input type="text" id ="nome" name="nome" value="<?php echo $dados['Nome']; ?>">

        <label for="data_nasc">Data de nascimento</label>
        <input type="date" id ="data_nasc" name="data_nasc" value="<?php echo $dados['Data_de_Nascimento']; ?>">

        <label for="cpf">CPF</label>
        <input type="text" id ="cpf" name="cpf" value="<?php echo $dados['CPF']; ?>">

        <label for="email">Email</label>
        <input type="text" id ="email" name="email" value="<?php echo $dados['Email']; ?>" >

        <label for="tel">Telefone</label>
        <input type="text" id ="tel" name="tel" value="<?php echo $dados['Telefone']; ?>" > 

        <input type="submit" value="Confirmar alterações">
    </form>
   </main>
   <script>
        function ChecarTipo(){
            if(document.getElementById('chklogin').checked){
                document.getElementById('login').disabled=false;
                document.getElementById('senha').disabled=false;
            }
            else{
                document.getElementById('login').disabled=true;
                document.getElementById('senha').disabled=true;
            }
        }
    </script>
</body>
</html>