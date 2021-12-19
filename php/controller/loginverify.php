<?php
// Inicia sessões
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["id"]))
{
// Usuário não logado! Redireciona para a página de login
echo  "<script>alert('Você não esta logado, faça o login para entrar nesta pagina');</script>";
echo "<script>window.location ='login.php'</script>";
exit;
}
?>