<?php
if(!isset($_SESSION)){
    session_start(); 
}

if(!isset($_SESSION['cpfUsuario']) || empty($_SESSION['cpfUsuario'])){
    
    echo '<script type="text/javascript">window.location = \'../\';</script>';
    exit;
    
}
?>