<html>
    <head>

    </head>
    <body>
        <?php
        require_once("../inc/coneccao.php");
        require("loginverify.php");
        
        $desc = isset($_POST["desc"]) ? $_POST["desc"] : FALSE;
        
        $hora_ini = isset($_POST["hora_ini"]) ? $_POST["hora_ini"] : FALSE;
        
        $hora_fim = isset($_POST["hora_fim"]) ? $_POST["hora_fim"] : FALSE;

        $dataTurno = isset($_POST["dataTurno"]) ? $_POST["dataTurno"] : FALSE;
        
        $idEquipe = isset($_POST["idEquipe"]) ? $_POST["idEquipe"] : FALSE;
        
        if( $hora_ini || $hora_fim || $idEquipe || $dataTurno ){
        
        if(strtotime($hora_fim) < strtotime($hora_ini)){

            echo  "<script>alert('Não é permitido inserir um horario final menor que o inicial');</script>";
            echo "<script>window.location ='../../Criacao_Turnos.php'</script>";

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
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Mon'){
            $dia_sem = 'Segunda';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Seg']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Seg'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Tue'){
            $dia_sem = 'Terça';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Ter']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Ter'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Wed'){
            $dia_sem = 'Quarta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Quar']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Quar'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Thu'){
            $dia_sem = 'Quinta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Quin']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Quin'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Fri'){
            $dia_sem = 'Sexta';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Sex']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Sex'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
        elseif($diaDaSemana == 'Sat'){
            $dia_sem = 'Sábado';
            if(strtotime($hora_ini) < strtotime($dadosequipe['HorarioIni_Sab']) ||
             strtotime($hora_fim) > strtotime($dadosequipe['HorarioFim_Sab'])  )
             {
                echo  "<script>alert('Não é permitido inserir um horario que extrapole os horários da equipe.');</script>";
                echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
                exit;
            }
        }
            
        $sql = "INSERT INTO turnos (idTurnos, DiaSemana, Descricao, HorarioInicio, HorarioFim, DataDia, equipe_idEquipe) VALUES (default,'" . $dia_sem . "','" . $desc . "','" . $hora_ini .  "' ,'" . $hora_fim .  "' ,'" . $dataTurno .  "', '" . $idEquipe .  "' )";
        if(mysqli_query($conn,$sql)){
            echo "<h1>Novo turno cadastrado com sucesso!</h1>";
            echo "<a href='../../Criacao_Turnos.php'>Voltar</a>";
            echo '<a href="Criacao_TurnosFunc.php">Atribuir turno</a>';
        }
        else{
            echo mysqli_error($conn);
        }
    }
    }
        else{
            echo  "<script>alert('Preencha todos os campos obrigatórios ');</script>";
            echo "<script>window.location ='../../Criacao_Turnos.php'</script>";
        }
        
        ?>
    </body>
</html>