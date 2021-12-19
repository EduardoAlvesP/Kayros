<html>
<head>
    <meta charset='UTF-8'>
    <title>Gerenciamento de Escalas</title>
    <link rel="stylesheet" href="css/style.css">
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


$sql2 = "SELECT  Horario_inicio, Horario_fim,DiasFunc FROM escalasemanalequipe WHERE idEscala_Dia='" . $dadosequipe['Escala_Dia_idEscala_Dia'] ."'";
$diadados = mysqli_query($conn, $sql2);
$escaladia = mysqli_fetch_assoc($diadados);
?>

<main>
    <h1>Horarios e Dias de Funcionamento da Equipe:<?php echo $dadosequipe['Nome']?></h1>
    <div>
        <h2>Domingo</h2>
        <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
    <div>
    <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
    </div>
        <a href="php/controller/logout.php">Fazer logout</a>
</main>
</body>
</html>