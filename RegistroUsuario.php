<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_global.css">
    <link rel="stylesheet" href="css/style_Form.css">
    <title>Registro Usuario</title>
</head>
<body>
    <?php 
      require("php/inc/coneccao.php");
      require("php/controller/loginverify.php");
    ?>
    <main>
        <form action="php/controller/InsertUsuario.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
        <label for="login">Login</label>
        <input type="text" id ="login" name="login">

        <label for="senha">Senha</label>
        <input type="text" id ="Senha" name="Senha">

        <label for="email">Nome</label>
        <input type="text" id ="nome" name="nome">

        <label for="data_nasc">Data de nascimento</label>
        <input type="date" id ="data_nasc" name="data_nasc">

        <label for="cpf">CPF</label>
        <input type="text" id ="cpf" name="cpf">

        <label for="email">Email</label>
        <input type="text" id ="email" name="email">

        <label for="tel">Telefone</label>
        <input type="text" id ="tel" name="tel">
        <label for="tipo_conta">Tipo da Conta</label>
        <input type="radio" value ="adm" name ="tipo_conta" id ="adm" onclick="ChecarTipo()">Administrador</input>
        <input type="radio" value="func" name ="tipo_conta" id ="func" onclick="ChecarTipo()">Funcionário</input>

        <label for="idequipe">Equipe</label>
        <select name="idequipe">
            <?php 
            $sql = "SELECT * FROM equipe";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['idEquipe'].'">'.$row['idEquipe'].' | '.$row['Nome'].'</option>';
            }
            
            
            ?>
        </select>
        <input type="submit" value="Registrar">
        </form>
    <script>
        function ChecarTipo(){
            if(document.getElementById('adm').checked){
                document.getElementById('idequipe').disabled=true;
            }
            else{
                document.getElementById('idequipe').disabled=false;
            }
        }
    </script>
    </main>
</body>
</html>