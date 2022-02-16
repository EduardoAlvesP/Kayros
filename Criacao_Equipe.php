<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Form.css">
    <title>Criação Equipe</title>
</head>
<body onload="LoadDefault()">
    <main>
        <form action="php/controller/InsertEquipe.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
                <label for="nome">Nome</label>
                <input type="text" id ="nome" name="nome">
        
                <label for="desc">Descrição</label>
                <textarea id ="desc" name="desc"></textarea>

                <input type="checkbox"  id="btnFds" onclick="isCheckedFds()" value="fdsChecked" name="btnfds">Desabilitar finais de semana</input>
                <input type="checkbox" id="semana" onclick="isCheckedSemana()" value="semChecked" name="btnsem">Separar por dias da semana</input>

                <div id='padrao'>
                    <label for="HorarioIni">Horario Inicio</label>
                    <input type="time" id ="HorarioIni" name="HorarioIni">
                    <label for="HorarioFim">Horario Fim</label>
                    <input type="time" id ="HorarioFim" name="HorarioFim">
                </div>

                <div id='customi'>
                    <div id ="fds">
                        <label for="HorarioIni_Sab">Horario Inicio - Sabado</label>
                        <input type="time" id ="HorarioIni_Sab" name="HorarioIni_Sab">
                        <label for="HorarioFim_Sab">Horario Fim - Sabado</label>
                        <input type="time" id ="HorarioFim_Sab" name="HorarioFim_Sab">
                        <label for="HorarioIni_Dom">Horario Inicio - Domingo</label>
                        <input type="time" id ="HorarioIni_Dom" name="HorarioIni_Dom">
                        <label for="HorarioFim_Dom">Horario Fim - Domingo</label>
                        <input type="time" id ="HorarioFim_Dom" name="HorarioFim_Dom">
                    </div>
                    <label for="HorarioIni_Seg">Horario Inicio - Segunda</label>
                    <input type="time" id ="HorarioIni_Seg" name="HorarioIni_Seg">
                    <label for="HorarioFim_Seg">Horario Fim - Segunda</label>
                    <input type="time" id ="HorarioFim_Seg" name="HorarioFim_Seg">
                    <label for="HorarioIni_Ter">Horario Inicio - Terça</label>
                    <input type="time" id ="HorarioIni_Ter" name="HorarioIni_Ter">
                    <label for="HorarioFim_Ter">Horario Fim - Terça</label>
                    <input type="time" id ="HorarioFim_Ter" name="HorarioFim_Ter">
                    <label for="HorarioIni_Quar">Horario Inicio - Quarta</label>
                    <input type="time" id ="HorarioIni_Quar" name="HorarioIni_Quar">
                    <label for="HorarioFim_Quar">Horario Fim - Quarta</label>
                    <input type="time" id ="HorarioFim_Quar" name="HorarioFim_Quar">
                    <label for="HorarioIni_Quin">Horario Inicio - Quinta</label>
                    <input type="time" id ="HorarioIni_Quin" name="HorarioIni_Quin">
                    <label for="HorarioFim_Quin">Horario Fim - Quinta</label>
                    <input type="time" id ="HorarioFim_Quin" name="HorarioFim_Quin">
                    <label for="HorarioIni_Sex">Horario Inicio - Sexta</label>
                    <input type="time" id ="HorarioIni_Sex" name="HorarioIni_Sex">
                    <label for="HorarioFim_Sex">Horario Fim - Sexta</label>
                    <input type="time" id ="HorarioFim_Sex" name="HorarioFim_Sex">
                </div>
                          <input type="submit" value="Criar equipe">
                </form>
    </main>
    <script>
        var diasSemana = false;
        function isCheckedFds(){
            if(document.getElementById('btnFds').checked){
                document.getElementById('fds').style.display = 'none';
            }
            else{
                document.getElementById('fds').style.display = 'block';
            }
        }

        function LoadDefault(){
          if(diasSemana == false){
              document.getElementById('customi').style.display = 'none';
          }
        }
        function isCheckedSemana(){
            if(document.getElementById('semana').checked){
                document.getElementById('customi').style.display = 'block';
                document.getElementById('padrao').style.display = 'none';
            }
            else if(!document.getElementById('semana').checked){
                document.getElementById('customi').style.display = 'none';
                document.getElementById('padrao').style.display = 'block';
            }
        }
    </script>        
</body>
</html>