<?php
session_start();
$_SESSION['nao_autenticado'] = true;
session_destroy();
header('location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'); 

?>