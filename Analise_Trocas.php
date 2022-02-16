<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <title>Análise das Trocas</title>
</head>
<body>
    <?php 
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");?>
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
  <li><a href="Analise_Trocas.php" class="active">Analisar trocas</a></li>
  <li><a href="Criacao_Turnos.php">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  <li><a href="php/controller/logout.php">Fazer logout</a></li>
  </div>';}
    ?>
</ul>   
    <main>
        <?php
        if(!$_SESSION['idequipe']){
            echo "<script>window.location ='Equipes.php'</script>";
        }
        $id = $_SESSION['id'];
        $equipe = $_SESSION['idequipe'];
        $sql = "SELECT idtrocas,statusAnalise from trocas WHERE statusDes = true" ;
        $query = mysqli_query($conn,$sql);
        $arraytrocas = [];
        while($row = mysqli_fetch_assoc($query)){
            array_push($arraytrocas,[$row['idtrocas'],$row['statusAnalise']]);
        }
        foreach($arraytrocas as $troca){
            if($troca[1] == null){
            $sql ="SELECT idTurnos, idUsuario from funcionário_has_turnos_has_trocas where trocas_idtrocas = ' ".$troca[0]."'";
            $query = mysqli_query($conn,$sql);
            $dadosrem = mysqli_fetch_assoc($query);
            $sql = "SELECT equipe_idEquipe,HorarioInicio,HorarioFim,DataDia FROM turnos WHERE idTurnos = ' ".$dadosrem['idTurnos']." ' ";
            $query = mysqli_query($conn,$sql);
            $dadosturno = mysqli_fetch_assoc($query);
            if($dadosturno['equipe_idEquipe'] == $equipe){
                $sql = "SELECT idUsuario,idTurnos FROM  funcionário_has_turnos_has_trocasdes WHERE trocas_idtrocas = '".$troca[0]."'";
                $query = mysqli_query($conn,$sql);
                $dadosdes = mysqli_fetch_assoc($query);
                $sql ="SELECT id,Nome FROM usuario WHERE id = '".$dadosdes['idUsuario']."'";
                $query = mysqli_query($conn,$sql);
                $dadosUserDes = mysqli_fetch_assoc($query);
        
                $sql ="SELECT id,Nome FROM usuario WHERE id = '".$dadosrem['idUsuario']."'";
                $query = mysqli_query($conn,$sql);
                $dadosUserRem = mysqli_fetch_assoc($query);
                $sql = "SELECT HorarioInicio,HorarioFim,DataDia FROM turnos WHERE idTurnos = ' ".$dadosdes['idTurnos']." ' ";
                $query = mysqli_query($conn,$sql);
                $dadosTurnodes = mysqli_fetch_assoc($query);
                echo '<form action="php/controller/InsertConfirmacaoTroca.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
        
                <div>
                <h2>' .$dadosUserRem['Nome'].'#'.$dadosUserRem['id']. ' quer trocar seu turno:</h2>
                <span>Horario Inicial: '.$dadosturno['HorarioInicio'].'</span>
                <span>Horario Final: '.$dadosturno['HorarioFim'].'</span>
                <span>'.date('d-m-Y',strtotime($dadosturno['DataDia'])).'</span>
                </div>
                <div>
                <h2>Por turno de: '.$dadosUserDes['Nome'].'#'.$dadosUserDes['id'].'</h2>
                <span>Horario Inicial: '.$dadosTurnodes['HorarioInicio'].'</span>
                <span>Horario Final: '.$dadosTurnodes['HorarioFim'].'</span>
                <span>'.date('d-m-Y',strtotime($dadosTurnodes['DataDia'])).'</span>
                </div>
                <div>
                <textarea name="jus"></textarea>
                <input type="submit" name="btnstatus" value="Recusar">
                <input type="submit" name="btnstatus" value="Confirmar"></div>
                <input value='.$dadosrem['idTurnos'] .' style="display:none" name="idturnoRem">
                <input value='.$dadosrem['idUsuario'].' style="display:none" name="idRem">
                <input value='.$dadosdes['idTurnos'].' style="display:none" name="idturnoDes">
                <input value='.$dadosdes['idUsuario'].' style="display:none" name="idDes">
                <input value='.$troca[0].' style="display:none" name="idTroca">
        
                </form>';
            }
            }
        }
        
        ?>
    </main>
</body>
</html>