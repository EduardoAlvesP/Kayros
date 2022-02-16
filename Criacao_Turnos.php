<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Form.css">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <title>Turnos</title>
</head>
<body>
    <?php 
     require("php/inc/coneccao.php");
     require("php/controller/loginverify.php");
    ?>
        <ul>
    <div class="img"><img src="https://github.com/EduardoAlvesP.png"></div>
    <span>Nome</span>
  <li><a  href="Equipe.php">Equipe</a></li>
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
  <li><a href="Criacao_Turnos.php" class="active">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  <li><a href="php/controller/logout.php">Fazer logout</a></li>
  </div>';}
    ?>
</ul>   
        <main>
            <form action="php/controller/InsertTurnos.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
            <label for="desc">Descrição</label>
                   <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            <label for="hora_ini">Horario Inicio</label>
            <input type="time" id ="hora_ini" name="hora_ini">
            <label for="hora_fim">Horario Fim</label>
            <input type="time" id ="hora_fim" name="hora_fim">
            <label for="dataTurno">Data</label>
            <input type="date" id ="dataTurno" name="dataTurno">
            <label for="idEquipe">Equipe<label>
            <input value="<?php echo $_SESSION['idequipe']?>" name="idEquipe" style="display:none">
            <strong><?php echo $_SESSION['nomeequipe']?></strong>
            <input type="submit" value="Criar turno">
            </form>
        </main>
</body>
</html>