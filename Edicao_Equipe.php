<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_global.css">
    <link rel="stylesheet" href="css/style_EdicaoEquipe.css">
    <link rel="stylesheet" href="css/style_sidebar.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require("php/inc/coneccao.php");
    require("php/controller/loginverify.php");
    $idEquipe = $_SESSION['idequipe'];
    $sql = "SELECT * FROM equipe WHERE idEquipe = '".$idEquipe."'";
    $query = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_assoc($query);
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
  <li><a href="Edicao_Equipe.php" class="active">Editar equipe</a></li>
  <li><a href="Analise_Trocas.php">Analisar trocas</a></li>
  <li><a href="Criacao_Turnos.php">Criar novo Turno</a></li>
  <li><a href="Criacao_TurnosFunc.php">Atribuir turno</a></li>
  <li><a href="Edicao_SelecionarTurnos.php">Editar turnos</a></li>
  <li>   <a href="php/controller/Excluir_Equipe.php">Excluir equipe</a></li>
  <li><a href="php/controller/logout.php">Fazer logout</a></li>
  </div>';}
    ?>
</ul>   
    <main>
        <div>
            <h1>Preencha os campos:</h1>
            <form action="php/controller/UpdateEquipe.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
                        <label for="nome">Nome</label>
                        <input type="text" id ="nome" name="nome" value="<?php echo $linha['Nome'] ?>">
            
                        <label for="desc">Descrição</label>
                        <textarea id ="desc" name="desc" value="<?php echo $linha['Descrição'] ?>"><?php echo $linha['Descrição'] ?></textarea>
            
            
                            <div>
                                <label for="HorarioIni_Dom">Horario Inicio - Domingo</label>
                                <input type="time" id ="HorarioIni_Dom" name="HorarioIni_Dom" value="<?php echo $linha['HorarioIni_Dom'] ?>">
                                <label for="HorarioFim_Dom">Horario Fim - Domingo</label>
                                <input type="time" id ="HorarioFim_Dom" name="HorarioFim_Dom" value="<?php echo $linha['HorarioFim_Dom'] ?>">
                            </div>
                            <div>
                                <label for="HorarioIni_Seg">Horario Inicio - Segunda</label>
                                <input type="time" id ="HorarioIni_Seg" name="HorarioIni_Seg" value="<?php echo $linha['HorarioIni_Seg'] ?>">
                                <label for="HorarioFim_Seg">Horario Fim - Segunda</label>
                                <input type="time" id ="HorarioFim_Seg" name="HorarioFim_Seg" value="<?php echo $linha['HorarioFim_Seg'] ?>">
                            </div>
                            <div>
                                <label for="HorarioIni_Ter">Horario Inicio - Terça</label>
                                <input type="time" id ="HorarioIni_Ter" name="HorarioIni_Ter" value="<?php echo $linha['HorarioIni_Ter'] ?>">
                                <label for="HorarioFim_Ter">Horario Fim - Terça</label>
                                <input type="time" id ="HorarioFim_Ter" name="HorarioFim_Ter" value="<?php echo $linha['HorarioFim_Ter'] ?>">
                            </div>
                            <div>
                                <label for="HorarioIni_Quar">Horario Inicio - Quarta</label>
                                <input type="time" id ="HorarioIni_Quar" name="HorarioIni_Quar" value="<?php echo $linha['HorarioIni_Quar'] ?>">
                                <label for="HorarioFim_Quar">Horario Fim - Quarta</label>
                                <input type="time" id ="HorarioFim_Quar" name="HorarioFim_Quar" value="<?php echo $linha['HorarioFim_Quar'] ?>">
                            </div>
                            <div>
                                <label for="HorarioIni_Quin">Horario Inicio - Quinta</label>
                                <input type="time" id ="HorarioIni_Quin" name="HorarioIni_Quin" value="<?php echo $linha['HorarioIni_Quin'] ?>">
                                <label for="HorarioFim_Quin">Horario Fim - Quinta</label>
                                <input type="time" id ="HorarioFim_Quin" name="HorarioFim_Quin" value="<?php echo $linha['HorarioFim_Quin'] ?>">
                            </div>
                            <div>
                                <label for="HorarioIni_Sex">Horario Inicio - Sexta</label>
                                <input type="time" id ="HorarioIni_Sex" name="HorarioIni_Sex" value="<?php echo $linha['HorarioIni_Sex'] ?>">
                                <label for="HorarioFim_Sex">Horario Fim - Sexta</label>
                                <input type="time" id ="HorarioFim_Sex" name="HorarioFim_Sex" value="<?php echo $linha['HorarioFim_Sex'] ?>">
                            </div>
                            <div id="fim">
                                <label for="HorarioIni_Sab">Horario Inicio - Sabado</label>
                                <input type="time" id ="HorarioIni_Sab" name="HorarioIni_Sab" value="<?php echo $linha['HorarioIni_Sab'] ?>">
                                <label for="HorarioFim_Sab">Horario Fim - Sabado</label>
                                <input type="time" id ="HorarioFim_Sab" name="HorarioFim_Sab"value="<?php echo $linha['HorarioFim_Sab'] ?>" >
                            </div>
                                <input type="submit" id="input" value="Confirmar Alterações">
                        </form>
        </div>
    </main>
</body>
</html>