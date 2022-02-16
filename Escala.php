<html>
<head>
    <meta charset='UTF-8'>
    <title>Gerenciamento de Escalas</title>
    <link rel="stylesheet" href="css/style_sidebar.css">
    <link rel="stylesheet" href="css/style_escala.css">
</head>
<body>
<?php
        require("php/inc/coneccao.php");
        require("php/controller/loginverify.php");

$id_user = $_SESSION['id'];
$sql = "SELECT Equipe_idEquipe FROM funcionário WHERE Usuario_id='" . $id_user ."'";
$id_equipe = mysqli_query($conn, $sql);
$arrayid = mysqli_fetch_array($id_equipe);

$sql = "SELECT Nome FROM equipe WHERE idEquipe='" . $arrayid['Equipe_idEquipe'] ."'";
$result = mysqli_query($conn, $sql);
$dadosequipe = mysqli_fetch_array($result);
$curdate = date('d-m-Y');
$sql2 = "SELECT  Turnos_idTurnos FROM funcionário_has_turnos WHERE funcionário_Usuario_id ='" . $_SESSION['id'] ."'";
$turnos = mysqli_query($conn, $sql2);
$ArrayTurnos = [];
while($row = mysqli_fetch_assoc($turnos)){
    array_push($ArrayTurnos,$row['Turnos_idTurnos']);
}


?>
<ul>
    <div class="img"><img src="https://github.com/EduardoAlvesP.png"></div>
    <span>Nome</span>
  <li><a  href="Equipe.php">Equipe</a></li>
  <?php if($_SESSION['conta'] == 'func'){
  echo'<div class="func">
      <li><a href="Escala.php" class="active">Minha escala</a></li>
      <li><a href="Criacao_Troca.php">Solicitar troca</a></li>
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
    <h1><?php echo $dadosequipe['Nome']?></h1>

    <div class="conteinerPai">
     <h2>Escala - Semana atual</h2>
        <div class="conteinerSemana1">
          
            <div>
                    <h3>Domingo</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."'";
                        if(strtotime($curdate) == strtotime('this sunday') ){
                            $diasem = strtotime('this sunday');
                        }
                        else{
                        $diaSem = strtotime('last sunday');
                        }
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>Segunda</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 1 day');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
            
                <div>
                    <h3>Terça</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 2 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>Quarta</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 3 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
            
                <div>
                    <h3>Quinta</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 4 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                <h3>Sexta</h2>
                <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 5 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
            </div>
            <div>
                <h3>Sabado</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('last sunday + 6 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '<br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                    
            </div>
        </div>


        <h2>Escala - Próxima semana</h2>
        <div class="conteinerSemana1">
          
            <div>
                    <h3>Domingo</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        if(strtotime($curdate) == strtotime('this sunday') ){
                            $diasem = strtotime('this sunday');
                        }
                        else{
                        $diaSem = strtotime('next sunday');
                        }
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>Segunda</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 1 day');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
            
                <div>
                    <h3>Terça</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 2 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>Quarta</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 3 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
            
                <div>
                    <h3>Quinta</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 4 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                <h3>Sexta</h2>
                <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 5 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '</br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
            </div>
            <div>
                <h3>Sabado</h2>
                    <?php
                    foreach($ArrayTurnos as $item){
                        $sql3 = "SELECT DataDia, HorarioInicio, HorarioFim FROM turnos WHERE idTurnos = '" . $item ."' ";
                        $diaSem = strtotime('next sunday + 6 days');
                        $query = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query)){
                            $dia = strtotime($row['DataDia']);
                            if($dia == $diaSem){
                                echo'<p>Horario Inicio: ' . $row['HorarioInicio'] . '<br>'  ;
                                echo 'Horario Fim: '. $row['HorarioFim'].'</p>';
                            }
                        }
                    }
                    ?>
                    
            </div>
        </div>
    </div>
</main>
</body>
</html>