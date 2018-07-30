<?php
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

class conexao{
    public $host = "localhost";
    public $user = array('interact');
    public $pass = array('interact@500');
    public $database = array('interact');
    
    function __construct(){
        $connect = mysql_connect($this->host,$this->user[0],$this->pass[0]) or die (mysql_error());
        $select  = mysql_select_db($this->database[0],$connect) or die (mysql_error());
        
        //Tratando acentos vindo do banco de dados.
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    }
}
$conexao = new conexao();
?>