<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Form.css">
    <title>Document</title>
</head>
<body>
<main>
        <form action="php/controller/InsertTipoEscala.php" method="post" id="envio" name="envio" enctype="multipart/form-data" >
        <label for="id">Identificação da Escala</label>
        <input type="text" id ="id" name="id">

        <label for="tipo">Tipo</label>
        <input type="text" id ="tipo" name="tipo">

        <label for="jornada">Jornada diaria</label>
        <input type="text" id ="jornada" name="jornada">

        <label for="qtd">Quantidade de pessoas por turno</label>
        <input type="number" id ="qtd" name="qtd">
       
        </form>
</body>
</html>