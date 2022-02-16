<?php 
require_once("../inc/coneccao.php");
require("loginverify.php");
$nome = isset($_POST["nome"]) ? $_POST["nome"] : FALSE;
$desc = isset($_POST["desc"]) ? $_POST["desc"] : FALSE;
$id = $_SESSION['id'];
if(
    $nome || 
    $id
)
{
        $checkedSem = isset($_POST["btnsem"]) ? $_POST["btnsem"] : FALSE;
        $checkedFds = isset($_POST["btnfds"]) ? $_POST["btnfds"] : FALSE;
        if($checkedSem){
            $HorarioIni_Dom = isset($_POST["HorarioIni_Dom"]) ? $_POST["HorarioIni_Dom"] : FALSE;
            $HorarioFim_Dom = isset($_POST["HorarioFim_Dom"]) ? $_POST["HorarioFim_Dom"] : FALSE;

            $HorarioIni_Seg = isset($_POST["HorarioIni_Seg"]) ? $_POST["HorarioIni_Seg"] : FALSE;
            $HorarioFim_Seg = isset($_POST["HorarioFim_Seg"]) ? $_POST["HorarioFim_Seg"] : FALSE;

            $HorarioIni_Ter = isset($_POST["HorarioIni_Ter"]) ? $_POST["HorarioIni_Ter"] : FALSE;
            $HorarioFim_Ter = isset($_POST["HorarioFim_Ter"]) ? $_POST["HorarioFim_Ter"] : FALSE;

            $HorarioIni_Quar = isset($_POST["HorarioIni_Quar"]) ? $_POST["HorarioIni_Quar"] : FALSE;
            $HorarioFim_Quar = isset($_POST["HorarioFim_Quar"]) ? $_POST["HorarioFim_Quar"] : FALSE;

            $HorarioIni_Quin = isset($_POST["HorarioIni_Quin"]) ? $_POST["HorarioIni_Quin"] : FALSE;
            $HorarioFim_Quin = isset($_POST["HorarioFim_Quin"]) ? $_POST["HorarioFim_Quin"] : FALSE;

            $HorarioIni_Sex = isset($_POST["HorarioIni_Sex"]) ? $_POST["HorarioIni_Sex"] : FALSE;
            $HorarioFim_Sex = isset($_POST["HorarioFim_Sex"]) ? $_POST["HorarioFim_Sex"] : FALSE;

            $HorarioIni_Sab = isset($_POST["HorarioIni_Sab"]) ? $_POST["HorarioIni_Sab"] : FALSE;
            $HorarioFim_Sab = isset($_POST["HorarioIni_Sab"]) ? $_POST["HorarioIni_Sab"] : FALSE;
            if($checkedFds)
            {
                $HorarioIni_Dom = NULL;
                $HorarioFim_Dom = NULL;
                $HorarioIni_Sab = NULL;
                $HorarioFim_Sab = NULL;

            }
            if(
                strtotime($HorarioFim_Sab) < strtotime($HorarioIni_Sab) ||
                strtotime($HorarioFim_Dom) < strtotime($HorarioIni_Dom) || 
                strtotime($HorarioFim_Seg) < strtotime($HorarioIni_Seg) ||
                strtotime($HorarioFim_Ter) < strtotime($HorarioIni_Ter) ||
                strtotime($HorarioFim_Quar) < strtotime($HorarioIni_Quar) ||
                strtotime($HorarioFim_Quin) < strtotime($HorarioIni_Quin) ||
                strtotime($HorarioFim_Sex) < strtotime($HorarioIni_Sex)
            )
            {
                echo  "<script>alert('Não é permitido inserir um horario final menor que o inicial');</script>";
                echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
            }
            else{
            $sql = "INSERT INTO equipe (
                idEquipe, 
                Nome, 
                Descrição, 
                HorarioIni_Dom, 
                HorarioFim_Dom,
                HorarioIni_Seg,
                HorarioFim_Seg, 
                HorarioIni_Ter,
                HorarioFim_Ter,
                HorarioIni_Quar,
                HorarioFim_Quar,
                HorarioIni_Quin,
                HorarioFim_Quin, 
                HorarioIni_Sex, 
                HorarioFim_Sex,  
                HorarioIni_Sab,  
                HorarioFim_Sab
                ) VALUES (
                    default,
                    '" . $nome . "',
                    '" . $desc . "',
                    '" . $HorarioIni_Dom .  "' ,
                    '" . $HorarioFim_Dom .  "' ,
                    '" . $HorarioIni_Seg .  "' ,
                    '" . $HorarioFim_Seg .  "' ,
                    '" . $HorarioIni_Ter .  "' ,
                    '" . $HorarioFim_Ter .  "' ,
                    '" . $HorarioIni_Quar .  "' ,
                    '" . $HorarioFim_Quar .  "' ,
                    '" . $HorarioIni_Quin .  "' ,
                    '" . $HorarioFim_Quin .  "' ,
                    '" . $HorarioIni_Sex.  "' ,
                    '" . $HorarioFim_Sex .  "' ,
                    '" . $HorarioIni_Sab.  "' ,
                    '" . $HorarioFim_Sab .  "' 
                    )";
                if (mysqli_query($conn, $sql)){
                    $sql = "SELECT    * FROM     equipe ORDER BY  idEquipe DESC
                    LIMIT     1";
                    $result = mysqli_query($conn,$sql);
                    $linha = mysqli_fetch_array($result);

                    $sql =  "INSERT INTO equipe_has_administrador(equipe_idEquipe,administrador_Usuario_id) VALUES ('" . $linha["idEquipe"]. "','" . $id . "')";
                    if(mysqli_query($conn,$sql)){
                    echo  "<script>alert('Equipe criada com sucesso!');</script>";
                    echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
                    }
                    else{
                        echo  "<script>alert('Erro na inserção de dados!');</script>";
                        echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
                    }
                }
                else{
                    echo  "<script>alert('Erro na inserção de dados!');</script>";
                    echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
                }
            }
        }
        else{
            $HorarioIni = isset($_POST["HorarioIni"]) ? $_POST["HorarioIni"] : FALSE;
            $HorarioFim = isset($_POST["HorarioFim"]) ? $_POST["HorarioFim"] : FALSE;
            if($HorarioIni || $HorarioFim){
                if($checkedFds){
                    $FdsIni = NULL;
                    $FdsFim = NULL;
                }
                else{
                    $FdsIni = $HorarioIni;
                    $FdsFim = $HorarioFim;
                }
                if(
                    strtotime($HorarioFim_Sab) < strtotime($HorarioIni_Sab) ||
                    strtotime($FdsFim) < strtotime($FdsIni) 
                    ){
                        echo  "<script>alert('Não é permitido inserir um horario final menor que o inicial');</script>";
                        echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
                    }
                else{
                $sql = "INSERT INTO equipe (
                    idEquipe, 
                    Nome, 
                    Descrição, 
                    HorarioIni_Dom, 
                    HorarioFim_Dom,
                    HorarioIni_Seg,
                    HorarioFim_Seg, 
                    HorarioIni_Ter,
                    HorarioFim_Ter,
                    HorarioIni_Quar,
                    HorarioFim_Quar,
                    HorarioIni_Quin,
                    HorarioFim_Quin, 
                    HorarioIni_Sex, 
                    HorarioFim_Sex,  
                    HorarioIni_Sab,  
                    HorarioFim_Sab
                    ) VALUES (
                        default,
                        '" . $nome . "',
                        '" . $desc . "',
                        '" . $FdsIni .  "' ,
                        '" . $FdsFim .  "' ,
                        '" . $HorarioIni .  "' ,
                        '" . $HorarioFim .  "' ,
                        '" . $HorarioIni .  "' ,
                        '" . $HorarioFim .  "' ,
                        '" . $HorarioIni .  "' ,
                        '" . $HorarioFim .  "' ,
                        '" . $HorarioIni .  "' ,
                        '" . $HorarioFim .  "' ,
                        '" . $HorarioIni .  "' ,
                        '" . $HorarioFim .  "' ,
                        '" . $FdsIni .  "' ,
                        '" . $FdsFim .  "' 
                        )";
                    if (mysqli_query($conn, $sql)){
                        $sql = "SELECT    * FROM     equipe ORDER BY  idEquipe DESC
                        LIMIT     1";
                    $result = mysqli_query($conn,$sql);
                    $linha = mysqli_fetch_array($result);
    
                    $sql =  "INSERT INTO equipe_has_administrador(equipe_idEquipe,administrador_Usuario_id) VALUES ('" . $linha["idEquipe"]. "','" . $id . "')";
                    if(mysqli_query($conn,$sql)){
                    echo  "<script>alert('Equipe criada com sucesso!');</script>";
                    echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
                    }
                    }
                    else{
                    echo mysqli_error($conn);
                    }
                }
            }
            else{
                echo  "<script>alert('Insira os horários!');</script>";
                echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
            }
        }

    
}
else
{
    echo  "<script>alert('Preencha todos os campos obrigatórios');</script>";
    echo "<script>window.location ='../../Criacao_Equipe.php'</script>";
}
?>