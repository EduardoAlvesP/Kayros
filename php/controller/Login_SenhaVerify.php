<?php 

function LoginExist($Login,$Senha)
{
    $sql = "SELECT * FROM usuario Where Senha = '" .$senha."' AND Login = '". $login ."'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)){
        return true;
    }
}

?>