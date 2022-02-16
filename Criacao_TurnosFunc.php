<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Form.css">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <title>Document</title>
</head>
<body>
<?php 
    require_once("php/inc/coneccao.php");
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
  <li><a href="Criacao_Turnos.php">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php" class="active">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  <li><a href="php/controller/logout.php">Fazer logout</a></li>
  </div>';}
    ?>
</ul>   
        <main>
            <form action="Criacao_TurnosFunc.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
            <label for="idUsuario">Funcionario</label>
            <select name="idUsuario">
                <?php
                $sql = "SELECT * FROM funcionário WHERE equipe_idEquipe = '".$_SESSION['idequipe']."'";
                $query = mysqli_query($conn,$sql);
                $arrayfuncs = [];
                while($row = mysqli_fetch_assoc($query)){
                    array_push($arrayfuncs,$row['Usuario_id']);
                }
            
                foreach($arrayfuncs as $func){
                    $sql = "SELECT * FROM usuario WHERE id = '".$func."'";
                    $query = mysqli_query($conn,$sql);
                    $dadosfunc = mysqli_fetch_assoc($query);
                    echo '<option value="'.$dadosfunc['id'].'">'.$dadosfunc['id'].' | '.$dadosfunc['Nome'].'</option>';
                }
            
                ?>
            </select>
            <label for="idTurno">Turno</label>
            <select name="idTurno">
                <?php
                 $sql = "SELECT * FROM turnos WHERE equipe_idEquipe = '".$_SESSION['idequipe']."'";
                 $query = mysqli_query($conn,$sql);
                 while($row = mysqli_fetch_assoc($query)){
                     echo '<option value="'.$row['idTurnos'].'">'.$row['idTurnos'].' | '.$row['HorarioInicio'].' - '.$row['HorarioFim'].' | '.date('d-m-Y'  ,strtotime($row['DataDia'])).'</option>';
                 }
                ?>
            </select>
            <input type="submit" value="Enviar">
                </form>
                <?php 
                $idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : FALSE ;
                $idTurno = isset($_POST["idTurno"]) ? $_POST["idTurno"] : FALSE;
            
                if($idTurno || $idUsuario){
            $sql = "INSERT INTO funcionário_has_turnos (funcionário_Usuario_id, Turnos_idTurnos) VALUES (
                '" . $idUsuario . "',
                '" . $idTurno . "') " ;
            if(mysqli_query($conn, $sql)){
                echo"<div><span>Usuario foi relacionado ao turno desejado</span></div>";
            }
            else{
                echo"<div><span>Ocorreu um erro na inserção de dados, tente novamente.</span></div>";
                echo mysqli_error($conn);
            }
                }
                else{
            echo"<div><span>Preencha todos os campos.</span></div>";
                }
                
                ?>
                <a href='index.php'>Voltar para a home</a>
        </main>
</body>
</html>