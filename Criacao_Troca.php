<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <link rel="stylesheet" href="css/style_CriacaoTroca.css">
    <title>Solicitação de troca</title>
</head>
<body>
    <?php 
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");
    $id_user = $_SESSION['id'];
    $sql = "SELECT Turnos_idTurnos FROM funcionário_has_turnos WHERE funcionário_Usuario_id ='" . $id_user."'";
    $arrayTurnos = [];
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        array_push($arrayTurnos,$row['Turnos_idTurnos']);
    }
    unset($row);
    $sql = "SELECT funcionário_Usuario_id FROM funcionário_has_turnos WHERE  NOT funcionário_Usuario_id = '" . $id_user."'";
    $arrayIdDestinatario = [];
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        array_push($arrayIdDestinatario,$row['funcionário_Usuario_id']);
    }
    $arrayIdDestinatario = array_unique($arrayIdDestinatario);
    ?>
    <ul>
    <div class="img"><img src="https://github.com/EduardoAlvesP.png"></div>
    <span>Nome</span>
  <li><a  href="Equipe.php">Equipe</a></li>
  <?php if($_SESSION['conta'] == 'func'){
  echo'<div class="func">
      <li><a href="Escala.php">Minha escala</a></li>
      <li><a href="Criacao_Troca.php" class="active">Solicitar troca</a></li>
      <li><a href="Trocas_Recebidas.php">Trocas Recebidas</a></li>
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
        <h1>Preencha os campos para criar uma troca</h1>
    <div>
        <form action="php/controller/InsertTroca.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
            <label for="turnoRemetente">Selecione o turno para a troca:</label>
            <select name="turnoRemetente" id="turno rementente">
            <?php
            foreach($arrayTurnos as $turno){
            $sql = "SELECT HorarioInicio,HorarioFim,DataDia FROM turnos WHERE idTurnos = ' ". $turno. " '
            ";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                echo '<option   value="'.$turno.'">'.$row["HorarioInicio"].' - '. $row["HorarioFim"] .' | '. date('d-m-Y',strtotime($row['DataDia'])).'</option>';
            }
            }
            echo "</select>";
            unset($row);
            ?>
        
            <label for="turnoDestinatario">Selecione o turno desejado:</label>
            <select name="turnoDestinatario" id="turnoDestinatario">
            <?php
        
            foreach($arrayIdDestinatario as $idDestinatario){
                $sql = "SELECT Nome FROM usuario WHERE id =  ' ". $idDestinatario. " ' ";
                $query= mysqli_query($conn,$sql);
                $nome = mysqli_fetch_assoc($query);
                $sql = "SELECT Turnos_idTurnos FROM funcionário_has_turnos WHERE funcionário_Usuario_id ='" . $idDestinatario."'";
                $query = mysqli_query($conn,$sql);
                $arrayTurnosDestinatario = [];
                while($row = mysqli_fetch_assoc($query)){
                    array_push($arrayTurnosDestinatario,$row['Turnos_idTurnos']);
        
                }
                unset($row);
        
                foreach($arrayTurnosDestinatario as $turnoDes){
                        $sql = "SELECT HorarioInicio,HorarioFim,DataDia,equipe_idEquipe FROM turnos WHERE idTurnos = ' ". $turnoDes. " ' ";
                        $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        if( $row['equipe_idEquipe'] == $_SESSION['equipe']){
                            echo $_SESSION['equipe'];
                            echo $row['Equipe_idEquipe'];
                        echo '<option   value='.$turnoDes.'|'.$idDestinatario.'>'.$row["HorarioInicio"].' - '. $row["HorarioFim"] .' | '. date('d-m-Y',strtotime($row['DataDia'])).' | '.$nome['Nome'].'</option>';
                        }
                    }
                }
            }
            echo "</select>";
            ?>
            <label for="desc">Descrição:</label>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
           <button type="submit" id="input">Solicitar troca</button>
            </form>
    </div>
    </main>
</body>
</html>