<?php
if(!isset($_SESSION)){
    session_start(); 
}

include_once('../config/connect_base.php');
include_once('../config/constants.php');
include_once('../function/functions.php');

$acao = (isset($_GET['acao']) && !empty($_GET['acao'])) ? $_GET['acao'] : "";

if(!empty($acao)){
    
    if($acao == 'selectEstado'){
        
        $cd_estados = $_POST['cd_estados'];
        
        $result = '';
        if($cd_estados > 0){
            
            $result = '<option value="0">Selecione a cidade</option>';
            $sql = mysql_query("SELECT cd_cidade, UPPER(nm_cidade) AS nm_cidade FROM cidade WHERE cd_estado = '".$cd_estados."' ORDER BY nm_cidade ASC");
            while($qr = mysql_fetch_array($sql)){
                $result .= '<option value="'.$qr['cd_cidade'].'">'.$qr['nm_cidade'].'</option>';
            }
            
        } else {
            $result = '<option value="0">Selecione o estado</option>';
        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'novaConta'){
        
        $nm_usuario = (isset($_POST['nm_usuario']) && !empty($_POST['nm_usuario']) && $_POST['nm_usuario'] == true) ? removeAcentosBoby($_POST['nm_usuario']) : "";
        $ds_emailss = (isset($_POST['ds_emailss']) && !empty($_POST['ds_emailss']) && $_POST['ds_emailss'] == true) ? strtolower($_POST['ds_emailss']) : "";
        $nr_cnpjcpf = (isset($_POST['nr_cnpjcpf']) && !empty($_POST['nr_cnpjcpf']) && $_POST['nr_cnpjcpf'] == true) ? $_POST['nr_cnpjcpf'] : "";
        $ds_senhass = (isset($_POST['ds_senhass']) && !empty($_POST['ds_senhass']) && $_POST['ds_senhass'] == true) ? strtolower($_POST['ds_senhass']) : "";
        $ds_enderec = (isset($_POST['ds_enderec']) && !empty($_POST['ds_enderec']) && $_POST['ds_enderec'] == true) ? removeAcentosBoby($_POST['ds_enderec']) : "";
        $nr_enderec = (isset($_POST['nr_enderec']) && !empty($_POST['nr_enderec']) && $_POST['nr_enderec'] == true) ? removeAcentosBoby($_POST['nr_enderec']) : "";
        $ds_bairros = (isset($_POST['ds_bairros']) && !empty($_POST['ds_bairros']) && $_POST['ds_bairros'] == true) ? removeAcentosBoby($_POST['ds_bairros']) : "";
        $nr_endecep = (isset($_POST['nr_endecep']) && !empty($_POST['nr_endecep']) && $_POST['nr_endecep'] == true) ? $_POST['nr_endecep'] : "";
        $cd_estados = (isset($_POST['cd_estados']) && !empty($_POST['cd_estados']) && $_POST['cd_estados'] == true) ? $_POST['cd_estados'] : "";
        $cd_cidades = (isset($_POST['cd_cidades']) && !empty($_POST['cd_cidades']) && $_POST['cd_cidades'] == true) ? $_POST['cd_cidades'] : "";
        $nr_telefon = (isset($_POST['nr_telefon']) && !empty($_POST['nr_telefon']) && $_POST['nr_telefon'] == true) ? $_POST['nr_telefon'] : "";
        $dt_nascime = (isset($_POST['dt_nascime']) && !empty($_POST['dt_nascime']) && $_POST['dt_nascime'] == true) ? $_POST['dt_nascime'] : "";
        $cd_generos = (isset($_POST['cd_generos']) && !empty($_POST['cd_generos']) && $_POST['cd_generos'] == true) ? $_POST['cd_generos'] : "";
        
        if(empty($nm_usuario) || empty($ds_emailss) || empty($nr_cnpjcpf) || empty($ds_senhass) || empty($ds_enderec) || empty($nr_enderec) || empty($ds_bairros) || empty($nr_endecep) || empty($cd_estados) || 
           empty($cd_cidades) || empty($nr_telefon) || empty($dt_nascime) || empty($cd_generos)){
            echo 'FIELD_FALSE';
            exit;
        } else {
            
            $sql = mysql_query("SELECT cd_usuario FROM usuario WHERE nr_docucpf = '".$nr_cnpjcpf."'");
            $totLine = mysql_num_rows($sql);
            if($totLine > 0){
                echo 'USER_EXIST';
                exit;
            } else {
                
                include_once('../class/classPegaId.php');
                $id_proximo = new classPegaId();
                $cd_usuario = $id_proximo->PegaUltimoId('cd_usuario','usuario');

                mysql_query("SET AUTOCOMMIT=0");
                mysql_query("START TRANSACTION");

                $query = "INSERT INTO usuario (cd_empresa,cd_usuario,nm_usuario,ds_enderec,nr_enderec,ds_complem,ds_bairros,nr_cepusua,cd_paisess,cd_estados,cd_cidades,nr_telefon,nr_celular,cd_operado,ds_emailss,dt_nascime,
                          cd_generos,nr_documrg,nr_docucpf,cd_acessos,ds_senhass,dt_inclusa) VALUES ('1','".$cd_usuario."','".$nm_usuario."','".$ds_enderec."','".$nr_enderec."','','".$ds_bairros."','".$nr_endecep."','1',
                          '".$cd_estados."','".$cd_cidades."','".$nr_telefon."','','0','".$ds_emailss."','".$dt_nascime."','".$cd_generos."','','".$nr_cnpjcpf."','1','".$ds_senhass."','".DtAtual()."')";

                $insert = mysql_query($query);
                if($insert == true){
                    mysql_query("COMMIT");
                    echo 'QUERY_TRUE';
                    exit;
                } else {
                    mysql_query("ROLLBACK");
                    echo 'QUERY_FALSE';
                    exit;
                }
                
            }
            
        }
        
    } elseif($acao == 'loginUser'){
        
        $nr_cnpjcpf_login = (isset($_POST['nr_cnpjcpf_login']) && !empty($_POST['nr_cnpjcpf_login'])) ? $_POST['nr_cnpjcpf_login'] : "";
        $ds_senhass_login = (isset($_POST['ds_senhass_login']) && !empty($_POST['ds_senhass_login'])) ? strtolower($_POST['ds_senhass_login']) : "";
        
        if(!empty($nr_cnpjcpf_login) && !empty($ds_senhass_login)){
            
            unset($_SESSION['nomUsuario']);
            unset($_SESSION['cpfUsuario']);
            unset($_SESSION['aceUsuario']);

            $sql = mysql_query("SELECT UPPER(nm_usuario) AS nm_usuario, nr_docucpf, cd_acessos FROM usuario
                                WHERE nr_docucpf = '".$nr_cnpjcpf_login."' AND ds_senhass = '".$ds_senhass_login."'");
            $totLine = mysql_num_rows($sql);

            if($totLine > 0){
                
                $qr = mysql_fetch_assoc($sql);
                
                $_SESSION['nomUsuario'] = $qr['nm_usuario'];
                $_SESSION['cpfUsuario'] = $qr['nr_docucpf'];
                $_SESSION['aceUsuario'] = $qr['cd_acessos'];
                
                echo '<script type="text/javascript">window.location = \'../admin/inicioAdmin.php\';</script>';
                exit;
                
            } else {
                echo 'USER_FALSE';
                exit;
            }
            
        } else {
            echo 'USER_FALSE';
            exit;
        }
        
    }
    
}
?>