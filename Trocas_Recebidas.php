<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <link rel="stylesheet" href="css/style_TrocasRecebidas.css">
    <title>Document</title>
</head>
<body>
    <?php  require("php/inc/coneccao.php");
        require("php/controller/loginverify.php");?>
<ul>
    <div class="img"><img src="https://github.com/EduardoAlvesP.png"></div>
    <span>Nome</span>
  <li><a  href="Equipe.php">Equipe</a></li>
  <?php if($_SESSION['conta'] == 'func'){
  echo'<div class="func">
      <li><a href="Escala.php">Minha escala</a></li>
      <li><a href="Criacao_Troca.php">Solicitar troca</a></li>
      <li><a href="Trocas_Recebidas.php" class="active">Trocas Recebidas</a></li>
  </div>';}
    elseif($_SESSION['conta'] == 'adm'){
  echo'<div class="adm">
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
    <div>
        <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * from funcionário_has_turnos_has_trocasdes where idUsuario = '" . $id ."'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            $arrayTurnos = [];
        
        while($row = mysqli_fetch_assoc($query)){
            array_push($arrayTurnos,[$row['trocas_idtrocas'],$row['idTurnos']]);
        }
        foreach($arrayTurnos as $item){
            //item[0] = idtroca
            //item[1] = idturno
            $sql = "SELECT Descrição,statusDes FROM trocas WHERE idtrocas = '" . $item   [0] ."' ";
            $query = mysqli_query($conn,$sql);
            $troca = mysqli_fetch_assoc($query);
            if($troca['statusDes'] == NULL){
            $sql = "SELECT HorarioInicio,HorarioFim,DataDia,DiaSemana FROM turnos WHERE idTurnos =  '" . $item[1] ."' ";
            $query = mysqli_query($conn,$sql);
            $TurnoDestinatario = mysqli_fetch_assoc($query);
            $sql = "SELECT idTurnos FROM funcionário_has_turnos_has_trocas WHERE trocas_idtrocas = '" . $item   [0] ."' ";
            $query = mysqli_query($conn,$sql);
            $TurnoRemetente = mysqli_fetch_assoc($query);
            $sql = "SELECT HorarioInicio,HorarioFim,DataDia,DiaSemana FROM turnos WHERE idTurnos =  '" . $TurnoRemetente['idTurnos'] ."' ";
            $query = mysqli_query($conn,$sql);
            $TurnoOferecido = mysqli_fetch_assoc($query);
            if($item[1] && $TurnoRemetente && $TurnoOferecido && $TurnoDestinatario){
            if($TurnoDestinatario['HorarioInicio'] && $TurnoDestinatario['HorarioFim']  && $TurnoDestinatario['DiaSemana'] &&$TurnoDestinatario['DataDia'] && $TurnoOferecido['HorarioInicio'] &&  $TurnoOferecido['HorarioFim'] && $TurnoOferecido['DiaSemana'] && $TurnoOferecido['DataDia'] ){
            echo'<form action="php/controller/statusDes.php" method="post" id="envio" name="envio" enctype="multipart/form-data" ><div>'.
            '<h2>Turno Solicitado:</h2>'.
            '<p><span>'.$TurnoDestinatario['HorarioInicio'].'</span> <strong> -  </strong>'.
            '<span>'.$TurnoDestinatario['HorarioFim'].'</span></p>'.
            '<p><span>'.$TurnoDestinatario['DiaSemana'].' '.$TurnoDestinatario['DataDia'].'</span></p>'.
            '<strong id="seta">⇩</strong><h2>Turno Oferecido:</h2>'.
            '<p><span>'.$TurnoOferecido['HorarioInicio'].'</span><strong> - </strong>'.
            '<span>'.$TurnoOferecido['HorarioFim'].'</span></p>'.
            '<p><span>'.$TurnoOferecido['DiaSemana'].' '.date('d-m-Y',strtotime($TurnoOferecido['DataDia'])).'</span></p>'.
            '<label for="desc" style="display:block;">Descrição:</label><textarea readonly id="desc">'.$troca['Descrição'].'</textarea>'.
            '       <div><input type="submit" class="input"name="btnstatus" id ="reject"value="Recusar">
                    <input type="submit" class="input" name="btnstatus" value="Aceitar" class=""></div>
                    <input value='.$item[0].' style="display:none" name="idtroca">
            </form>'
            ;
            echo'</div>';
            }
            }
        }
        }
        echo '</div>';
        }
        
        else{
        echo'<div class="semTroca"><h1>Não há nenhuma troca recebida!</h1></div>';
        }
        ?>
        
    </main>
</body>
</html>