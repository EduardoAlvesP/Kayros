<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <link rel="stylesheet" href="css/style_equipe.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");

    
    ?>
<ul>
    <div class="img"><img src="https://github.com/EduardoAlvesP.png"></div>
    <span>Nome</span>
  <li><a  href="Equipe.php" class="active">Equipe</a></li>
  <?php if($_SESSION['conta'] == 'func'){
  echo'<div class="func">
      <li><a href="Escala.php">Minha escala</a></li>
      <li><a href="Criacao_Troca.php">Solicitar troca</a></li>
      <li><a href="Trocas_Recebidas.php">Trocas Recebidas</a></li>
  </div>';}
    elseif($_SESSION['conta'] == 'adm'){
  echo'<div class="adm">
  <li><a href="index.php">Home</a></li>
  <li><a href="Edicao_Equipe.php">Editar equipe</a></li>
  <li><a href="Analise_Trocas.php">Analisar trocas</a></li>
  <li><a href="Criacao_Turnos.php">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  </div>';}
    ?>
      <li><a href="php/controller/logout.php">Fazer logout</a></li>
</ul>   

<main>
   
<h1><?php echo $_SESSION['nomeequipe']; ?><h1>
    <h2>Funcionamento da equipe:</h2>
    <div class="conteinerPai">
        <div>
            <div>
            <h3>Domingo:</h3>
            <?php 
            $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
            $query = mysqli_query($conn,$sql);
            $dadosEquipe = mysqli_fetch_assoc($query);

            echo'<span>'.$dadosEquipe['HorarioIni_Dom'].'</span>
            <span>'.$dadosEquipe['HorarioFim_Dom'].'</span>'
            
            ?>
          </div>  
            <div>
                <h3>Segunda:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Seg'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Seg'].'</span>'
                
                ?>
            </div>
            <div>
                <h3>Terça:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Ter'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Ter'].'</span>'
                
                ?>
             </div>   
            <div>
                <h3>Quarta:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Quar'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Quar'].'</span>'
                
                ?>
            </div>
            <div>
                <h3>Quinta:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Quin'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Quin'].'</span>'
                
                ?>
            </div>
            <div>
                <h3>Sexta:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Sex'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Sex'].'</span>'
                
                ?>
            </div>
            <div>
                <h3>Sábado:</h3>
                <?php
                $sql = "SELECT * FROM equipe WHERE idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $dadosEquipe = mysqli_fetch_assoc($query);
                echo'<span>'.$dadosEquipe['HorarioIni_Sab'].'</span>
                <span>'.$dadosEquipe['HorarioFim_Sab'].'</span>'
                
                ?>
            </div>
            
        </div>  
    </div>
</main>

</body>
</html>