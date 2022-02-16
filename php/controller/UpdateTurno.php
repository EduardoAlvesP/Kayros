<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("../inc/coneccao.php");
    require("loginverify.php");
    $idturno = isset($_POST["idturno"]) ? $_POST["idturno"] : FALSE;
    $dataTurno = isset($_POST["dataTurno"]) ? $_POST["dataTurno"] : FALSE;
    $hora_fim = isset($_POST["hora_fim"]) ? $_POST["hora_fim"] : FALSE;
    $hora_ini = isset($_POST["hora_ini"]) ? $_POST["hora_ini"] : FALSE;
    $desc = isset($_POST["desc"]) ? $_POST["desc"] : FALSE;

    if($idturno || $dataTurno || $hora_fim || $hora_ini ){
        if(strtotime($hora_fim) < strtotime($hora_ini)){

            echo  "<script>alert('Não é permitido inserir um horario final menor que o inicial');</script>";
            echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";

        }
        else{
        $diaDaSemana = date('D',strtotime($dataTurno));
        $sql = "SELECT * FROM equipe WHERE idEquipe = '".$idEquipe."'";
        $query = mysqli_query($conn,$sql);
        $dadosequipe = mysqli_fetch_assoc($query);
        if($diaDaSemana == 'Sun'){
            $dia_sem = 'Domingo';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Dom']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Dom'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Mon'){
            $dia_sem = 'Segunda';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Seg']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Seg'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Tue'){
            $dia_sem = 'Terça';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Ter']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Ter'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Wed'){
            $dia_sem = 'Quarta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Quar']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Quar'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Thu'){
            $dia_sem = 'Quinta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Quin']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Quin'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Fri'){
            $dia_sem = 'Sexta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Sex']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Sex'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Sat'){
            $dia_sem = 'Sábado';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Sab']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Sab'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
                exit;
            }
        }

            $sql  = "UPDATE turnos 
            SET  Descricao = '".$desc."' , 
            HorarioInicio = '".$hora_ini ."', 
            HorarioFim = '" . $hora_fim."', 
            DataDia = '" . $dataTurno."' ,
            DiaSemana = ' ".$dia_sem."'
            WHERE idTurnos = '". $idturno . "'";
            if(mysqli_query($conn,$sql)){
                echo  "<script>alert('Alterações efetuadas.');</script>";
                echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
            }
         }
    }
    else{
        echo "<script>window.location ='../../Edicao_SelecionarTurnos.php'</script>";
    }
    
    
    
    ?>
</body>
</html>