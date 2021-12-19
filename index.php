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
$sql = "SELECT Escala_Dia_idEscala_Dia FROM funcionário WHERE Usuario_id='" . $id_user ."'";
$id_tabeladia = mysqli_query($conn, $sql);
$arrayid = mysqli_fetch_array($id_tabeladia);
$sql2 = "SELECT Data, Horario_inicio, Horario_fim FROM escala_dia WHERE idEscala_Dia='" . $arrayid['Escala_Dia_idEscala_Dia'] ."'";
$diadados = mysqli_query($conn, $sql2);
$escaladia = mysqli_fetch_assoc($diadados);
?>

<main>
    <section>
        <h2>Escala do dia: <?php echo $escaladia['Data']?></h2>
        <p>Inicio: <?php echo $escaladia['Horario_inicio']?>
    <br>
           Fim: <?php echo $escaladia['Horario_fim']?>
        </p>
        <a href="php/controller/logout.php">Fazer logout</a>
    </section>
</main>
</body>
</html>