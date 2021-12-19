<html>
<head>
    <meta charset='UTF-8'>
    <title>Gerenciamento de Escalas</title>
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>
<?php
        require("php/inc/coneccao.php");
        require("php/controller/loginverify.php");

$id_user = $_SESSION['id'];
$sql = "SELECT Equipe_idEquipe FROM funcionário WHERE Usuario_id='" . $id_user ."'";
$id_equipe = mysqli_query($conn, $sql);
$arrayid = mysqli_fetch_array($id_equipe);

$sql = "SELECT Escala_Dia_idEscala_Dia,Nome FROM equipe WHERE idEquipe='" . $arrayid['Equipe_idEquipe'] ."'";
$result = mysqli_query($conn, $sql);
$dadosequipe = mysqli_fetch_array($result);


$sql2 = "SELECT  Horario_inicio, Horario_fim, DiasFunc FROM escalasemanalequipe WHERE idEscala_Dia='" . $dadosequipe['Escala_Dia_idEscala_Dia'] ."'";
$diadados = mysqli_query($conn, $sql2);
$escaladia = mysqli_fetch_assoc($diadados);
?>

<main>
    <h1>Horarios e Dias de Funcionamento da Equipe:<?php echo $dadosequipe['Nome']?></h1>
    <div>
        <h2>Domingo</h2>
         <?php 
        if(substr($escaladia['DiasFunc'], 0, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
    <div>
    <h2>Segunda</h2>
    <?php 
        if(substr($escaladia['DiasFunc'], 1, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
    <div>
    <h2>Terça</h2>
    <?php 
        if(substr($escaladia['DiasFunc'], 2, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
    <div>
        <h2>Quarta</h2>   
    <?php 
        if(substr($escaladia['DiasFunc'], 3, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
    <div>
    <div>
    <h2>Quinta</h2>
    <?php 
        if(substr($escaladia['DiasFunc'], 4, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
    <div>
    <h2>Sexta</h2>
    <?php 
        if(substr($escaladia['DiasFunc'], 5, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
    <div>
    <h2>Sábado</h2>
    <?php 
        if(substr($escaladia['DiasFunc'], 6, 1) == '1') {
            echo '<p> Inicio:' .$escaladia["Horario_inicio"].
            '<br>
         Fim: '.$escaladia["Horario_fim"].'</p>';
        
        }
        else{
            echo 'FECHADO';
        }
         ?>
       
    </div>
        <a href="php/controller/logout.php">Fazer logout</a>
</main>
</body>
</html>