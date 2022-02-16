<?php
// Conexão com o banco de dados
require_once("../inc/coneccao.php");

// Inicia sessões
session_start();

// Recupera o login
$login = isset($_POST["login"]) ? $_POST["login"] : FALSE;

$senha = isset($_POST["senha"]) ? $_POST["senha"] : FALSE;

// Usuário não forneceu a senha ou o login
if(!$login || !$senha)
{
	echo "Você deve digitar sua senha e login!";
	exit;
}


$SQL = "SELECT id, Login, Senha, Data_de_Nascimento, CPF, Email, Telefone, Nome
FROM usuario
WHERE Login='" . $login ."'";
$result_id = mysqli_query($conn, $SQL);
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = mysqli_fetch_array($result_id);
	// Agora verifica a senha
	if(!strcmp($senha, $dados["Senha"]))
	{
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
		$sql = "SELECT equipe_idEquipe FROM funcionário
		WHERE Usuario_id ='" . $dados['id'] ."'";
		$query = mysqli_query($conn,$sql);
		$dados2 = mysqli_fetch_array($query);

		$sql = "SELECT * FROM funcionário WHERE Usuario_id = '".$dados['id']."'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            $Tipoconta = 'func';
        }
        $sql = "SELECT * FROM adminstrador WHERE Usuario_id = '".$dados['id']."'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            $Tipoconta = 'adm';
        }
		$_SESSION['conta'] = $Tipoconta;
		$_SESSION["id"]= $dados["id"];
		$_SESSION["equipe"] = $dados2["equipe_idEquipe"];
		$_SESSION["nome"] = $dados["Nome"];
        echo "<script>window.location ='redirect.php'</script>";
	}
	// Senha inválida
	else
	{
	 echo "Senha inválida!";
	exit;
	}
}
	// Login inválido
else
{
	echo "O login fornecido por você é inexistente!";
	exit;
}
?>