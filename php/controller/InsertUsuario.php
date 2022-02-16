<?php 
require_once("../inc/coneccao.php");

$login = isset($_POST["login"]) ? $_POST["login"] : FALSE;
$senha = isset($_POST["Senha"]) ? $_POST["Senha"] : FALSE;
$data_nasc = isset($_POST["data_nasc"]) ? $_POST["data_nasc"] : FALSE;
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : FALSE;
$email = isset($_POST["email"]) ? $_POST["email"] : FALSE;
$nome = isset($_POST["nome"]) ? $_POST["nome"] : FALSE;
$tel = isset($_POST["tel"]) ? $_POST["tel"] : FALSE;
$tipo_conta = isset($_POST["tipo_conta"]) ? $_POST["tipo_conta"] : FALSE;

if($login || $senha || $data_nasc || $cpf || $email || $tel || $tipo_conta || $nome)
{
    if($tipo_conta == "func"){
        $idequipe = isset($_POST["idequipe"]) ? $_POST["idequipe"] : FALSE;
        if(!$idequipe){
            echo "Você deve inserir a equipe do usuario";
            exit;
        }
    }
    $sql = "INSERT INTO usuario (id, Login, Senha, Data_de_Nascimento,CPF,Email,Telefone, Nome) VALUES (default,'" . $login . "','" . $senha . "','" . $data_nasc .  "' ,'" . $cpf .  "' ,'" . $email .  "','" . $tel .  "','" . $nome .  "')";
    if (mysqli_query($conn, $sql)){
       $sql = "SELECT    * FROM     usuario ORDER BY  id DESC
       LIMIT     1";
       $result = mysqli_query($conn,$sql);
       $linha = mysqli_fetch_array($result);

        if($tipo_conta == "func"){

            $sql = "INSERT INTO funcionário (Usuario_id, Equipe_idEquipe) VALUES ('" . $linha["id"]. "','" . $idequipe . "')";

            if(mysqli_query($conn,$sql)){

                echo  "<script>alert('Usuário cadastrado com sucesso!');</script>";
                echo "<script>window.location ='../../RegistroUsuario.php'</script>";
            }

        }
        elseif($tipo_conta =="adm"){

        $sql = "INSERT INTO adminstrador (Usuario_id) VALUES ('" . $linha["id"]. "')";
        
            if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Usuário cadastrado com sucesso!');</script>";
                echo "<script>window.location ='../../RegistroUsuario.php'</script>";
            }

        }
    }
    else{
        
        echo  "<script>alert('Houve um erro na inserção dos dados, tente novamente!');</script>";
        echo "<script>window.location ='../../RegistroUsuario.php'</script>";
        
    }
}
else{
    echo "Você deve inserir todos os campos";
	exit;
}



?>