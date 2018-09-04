<?php
/*
* Constants
*/

//Url's e diretorios
define("DS",DIRECTORY_SEPARATOR);
define("URL_BASE","http://localhost/interact/");

define("PATH_BASE",dirname(dirname(__FILE__)));
define("PATH_CONFIG",dirname(__FILE__));
define("PATH_IMAGES",PATH_BASE . DS . "images/");
define("PATH_IMG",PATH_BASE . DS . "img/");

//Constantes Uteis
define("LANG","pt-br");
define("CHARSET","utf-8");
date_default_timezone_set('America/Sao_Paulo');

//Dados do Sistema
define("NOME_SISTEMA","INTERACT"); //Nome do Sistema
define("LOGO_PDF",PATH_IMG . "logo-relpdf.png"); //Logo nos relatórios de PDF
define("MAX_IMG_USER",30); //Quantidade máxima de imagens galeria usuário
?>
