<?php
// Inicia sessões, para assim poder destruí-las
session_start();
session_destroy();

echo "<script>window.location ='../../login.php'</script>";
exit;
?>