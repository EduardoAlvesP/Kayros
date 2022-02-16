
    <?php
        $conn = mysqli_connect("localhost", "root", "Senha123", "gerenciamento_escalas");
    
        if (mysqli_connect_errno())
        {
            printf('Falha na conexão: %s\n', mysqli_connect_error());
            exit(); // die();
        }
    ?>
