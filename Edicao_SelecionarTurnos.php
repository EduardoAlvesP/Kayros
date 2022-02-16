<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <title>Selecionar turno</title>
</head>
<body>
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
  <li><a href="Criacao_Turnos.php">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php" class="active">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  <li><a href="php/controller/logout.php">Fazer logout</a></li>
  </div>';}
    ?>
</ul>   
<main>
    <form action="Edicao_Turno.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
    <select name="idturno" id="idturno">
    <?php
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");
    
    $idequipe = $_SESSION['idequipe'];
    $sql = "SELECT * FROM turnos WHERE equipe_idEquipe ='".$idequipe."' ";
    $query= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['idTurnos'].'">'.$row['HorarioInicio'].' - '.$row['HorarioFim']. ' | '.date("d-m-Y",strtotime($row['DataDia'])).'</option>';
    }
    ?>
    </select>
    <input type="submit" name="btnAction" value="Excluir">
    <input type="submit"  name="btnAction" value="Editar">
    </form>
</main>
</body>
</html>