<?php
if(!isset($_SESSION)){
    session_start(); 
}

include_once('../config/connect_base.php');
include_once('../config/constants.php');
include_once('../function/functions.php');

$acao = (isset($_GET['acao']) && !empty($_GET['acao'])) ? $_GET['acao'] : "";

if(!empty($acao)){
    
    
    
}
?>