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

                $query = "INSERT INTO usuario (cd_empresa,cd_statuss,cd_usuario,nm_usuario,ds_enderec,nr_enderec,ds_complem,ds_bairros,nr_cepusua,cd_paisess,cd_estados,cd_cidades,nr_telefon,nr_celular,cd_operado,
                          ds_emailss,dt_nascime,cd_generos,nr_documrg,nr_docucpf,cd_acessos,ds_senhass,dt_inclusa) VALUES ('1','1','".$cd_usuario."','".$nm_usuario."','".$ds_enderec."','".$nr_enderec."','',
                          '".$ds_bairros."','".$nr_endecep."','1','".$cd_estados."','".$cd_cidades."','".$nr_telefon."','','0','".$ds_emailss."','".$dt_nascime."','".$cd_generos."','','".$nr_cnpjcpf."','1',
                          '".$ds_senhass."','".DtAtual()."')";

                $insert = mysql_query($query);
                if($insert == true){
                    mysql_query("COMMIT");
                    
                    //Enviar email avisando novo cadastro
                    $sql = mysql_query("SELECT UPPER(nm_empresa) AS nm_empresa, ds_interne FROM empresa LIMIT 1");
                    $qr = mysql_fetch_assoc($sql);
                    $nomeDestinatario = $qr['nm_empresa'];
                    $emailDestinatario = $qr['ds_interne'];

                    $assunto = 'NOVO CADASTRO - ' . NOME_SISTEMA;
                    $mensagem = 'NOME: ' . $nm_usuario . '<br/>'
                              . 'ENDERECO: ' . $ds_enderec . ', ' . $nr_enderec . ' - ' . $ds_bairros . '<br/>'
                              . 'TELEFONE: ' . $nr_telefon . '<br/>';
                    
                    $emailAviso = enviaEmail($nm_usuario, $ds_emailss, $nomeDestinatario, $emailDestinatario, CHARSET, $assunto, $mensagem, 'string');
                    
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
            
            unset($_SESSION['codUsuario']);
            unset($_SESSION['nomUsuario']);
            unset($_SESSION['cpfUsuario']);
            unset($_SESSION['aceUsuario']);

            $sql = mysql_query("SELECT cd_usuario, UPPER(nm_usuario) AS nm_usuario, nr_docucpf, cd_acessos, COALESCE(cd_statuss,0) AS cd_statuss FROM usuario
                                WHERE nr_docucpf = '".$nr_cnpjcpf_login."' AND ds_senhass = '".$ds_senhass_login."'");
            $totLine = mysql_num_rows($sql);

            if($totLine > 0){
                
                $qr = mysql_fetch_assoc($sql);
                
                if($qr['cd_statuss'] == 1){
                    echo 'USER_PENDENTE';
                    exit;
                } elseif($qr['cd_statuss'] == 2){
                    echo 'USER_INATIVO';
                    exit;
                } else {
                    
                    $_SESSION['codUsuario'] = $qr['cd_usuario'];
                    $_SESSION['nomUsuario'] = $qr['nm_usuario'];
                    $_SESSION['cpfUsuario'] = $qr['nr_docucpf'];
                    $_SESSION['aceUsuario'] = $qr['cd_acessos'];

                    echo '<script type="text/javascript">window.location = \'../admin/inicioAdmin.php\';</script>';
                    exit;
                    
                }
                
            } else {
                echo 'USER_FALSE';
                exit;
            }
            
        } else {
            echo 'USER_FALSE';
            exit;
        }
        
    } elseif($acao == 'edtUser'){
        
        $user = $_POST['cd_usuario'];
        
        include_once('../class/classUsuario.php');
        $usuario = new classUsuario();
        $usuario->SelectUsuario($user);
        
        echo json_encode($usuario);
        exit;
        
    } elseif($acao == 'edtStatus'){
        
        $user = $_POST['id'];
        
        include_once('../class/classUsuario.php');
        $usuario = new classUsuario();
        $usuario->SelectUsuario($user);
        
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("START TRANSACTION");
        
        $statuss = 0;
        if($usuario->cd_statuss == 0){
            $statuss = 1;
        } elseif($usuario->cd_statuss == 1){
            $statuss = 2;
        }
        
        $update = mysql_query("UPDATE usuario SET cd_statuss = '".$statuss."' WHERE cd_usuario = '".$user."'");
        
        if($update == true){
            mysql_query("COMMIT");
            echo 'QUERY_TRUE';
            exit;
        } else {
            mysql_query("ROLLBACK");
            echo 'QUERY_FALSE';
            exit;
        }
        
    } elseif($acao == 'salvarEdtUser'){
        
        
        $formUserAdmin = $_POST['formUserAdmin'];
        
        $insert = "UPDATE usuario SET ";
        $value = "";
        $condicao = " WHERE cd_usuario = ";
        foreach($formUserAdmin as $idx => $campos){
            if($idx == 0){
                $condicao .= $campos['value'];
            } else {
                
                if($campos['name'] == 'dt_nascime' && empty($campos['value'])){
                    $campos['value'] = '1900-01-01';
                }
                
                if($campos['name'] == 'ds_sobress' && !empty($campos['value'])){
                    $campos['value'] = removeAcentosBoby($campos['value']);
                }
                
                $value .= $campos['name'] . " = '" . $campos['value'] . "', ";
                
            }
        }
        
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("START TRANSACTION");
        
        $query = $insert . substr($value,0,-2) . $condicao;
        $sql = mysql_query($query);
        
        if($sql == true){
            mysql_query("COMMIT");
            echo 'QUERY_TRUE';
            exit;
        } else {
            mysql_query("ROLLBACK");
            echo 'QUERY_FALSE';
            exit;
        }
        
    } elseif($acao == 'listaUser'){
        
        $result = "";
        
        $query = "SELECT cd_usuario, UPPER(nm_usuario) AS nm_usuario, UPPER(ds_enderec) AS ds_enderec, UPPER(nr_enderec) AS nr_enderec, nr_telefon, COALESCE(cd_statuss,0) AS cd_statuss, cd_acessos
                  FROM usuario WHERE 1 = 1";
        
        if($_SESSION['aceUsuario'] < 3){
            $query .= " AND nr_docucpf = '".$_SESSION['cpfUsuario']."'";
        }
        
        $sql = mysql_query($query . " ORDER BY nm_usuario ASC");
        while($qr = mysql_fetch_array($sql)){
            
            $statuss = 'Ativo';
            $corStatuss = 'success';
            if($qr['cd_statuss'] == 1){
                $statuss = 'Pendente';
                $corStatuss = 'warning';
            } elseif($qr['cd_statuss'] == 2){
                $statuss = 'Inativo';
                $corStatuss = 'danger';
            }

            $result .= '<tr>
                            <td>'.$qr['cd_usuario'].'</td>
                            <td>'.$qr['nm_usuario'].'</td>
                            <td>'.$qr['ds_enderec']. ', ' . $qr['nr_enderec'] .'</td>
                            <td>'.$qr['nr_telefon'].'</td>
                            <td><button type="button" class="btn btn-sm btn-primary" onclick="edtUser('.$qr['cd_usuario'].')">Editar</button></td>';
            
            //Criar botão para alterar status somente se o usuario não for nível desenvolvedor.
            if(($qr['cd_acessos'] != 99 && $qr['cd_acessos'] != 3) && $_SESSION['aceUsuario'] >= 3){
                $result .= '<td><button type="button" class="btn btn-sm btn-'.$corStatuss.' width-100-porc" onclick="edtStatus('.$qr['cd_usuario'].')">'.$statuss.'</button></td>';
            }
            
            $result .= '</tr>';

        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'listaSlide'){
        
        $result = "";
        
        $query = "SELECT cd_empresa, UPPER(ds_galeria) AS ds_galeria, dt_inclusa, hr_inclusa
                  FROM empresa_galeria WHERE 1 = 1";
        
        $sql = mysql_query($query . " ORDER BY ds_galeria ASC");
        while($qr = mysql_fetch_array($sql)){

            $result .= '<tr>
                            <td>'.$qr['cd_empresa'].'</td>
                            <td>'.$qr['ds_galeria'].'</td>
                            <td>'.date('d-m-Y',strtotime($qr['dt_inclusa'])).'</td>
                            <td>'.$qr['hr_inclusa'].'</td>
                            <td><button type="button" class="btn btn-sm btn-primary width-100-porc" onclick="visualizarSlide(\''.$qr['ds_galeria'].'\')">Visualizar</button></td>
                            <td><button type="button" class="btn btn-sm btn-danger width-100-porc" onclick="delImgSlide(\''.$qr['ds_galeria'].'\')">Excluir</button></td>
                        </tr>';

        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'listaGaleriaProjeto'){
        
        $result = "";
        
        $query = "SELECT cd_empresa, UPPER(ds_galeria) AS ds_galeria, dt_inclusa, hr_inclusa
                  FROM galeria_projeto WHERE 1 = 1";
        
        $sql = mysql_query($query . " ORDER BY ds_galeria ASC");
        while($qr = mysql_fetch_array($sql)){

            $result .= '<tr>
                            <td>'.$qr['cd_empresa'].'</td>
                            <td>'.$qr['ds_galeria'].'</td>
                            <td>'.date('d-m-Y',strtotime($qr['dt_inclusa'])).'</td>
                            <td>'.$qr['hr_inclusa'].'</td>
                            <td><button type="button" class="btn btn-sm btn-primary width-100-porc" onclick="visualizarImgProjeto(\''.$qr['ds_galeria'].'\')">Visualizar</button></td>
                            <td><button type="button" class="btn btn-sm btn-danger width-100-porc" onclick="delImgProjeto(\''.$qr['ds_galeria'].'\')">Excluir</button></td>
                        </tr>';

        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'listaPedido'){
        
        $cd_userPedido = (isset($_POST['cd_userPedido']) && !empty($_POST['cd_userPedido'])) ? $_POST['cd_userPedido'] : 0;
        
        $result = "";
        
        $query = "SELECT doacoes.id_doacoes, UPPER(doacoes.ds_pedidos) AS ds_pedidos, doacoes.qt_quantid, unidade_medida.ds_unidade, UPPER(usuario.nm_usuario) AS nm_usuario
                  FROM doacoes
                  INNER JOIN unidade_medida ON (doacoes.cd_unidade = unidade_medida.cd_unidade)
                  INNER JOIN usuario ON (doacoes.cd_entidad = usuario.cd_usuario)
                  WHERE 1 = 1";
        
        if($_SESSION['aceUsuario'] < 3){
            $query .= " AND doacoes.cd_entidad = '".$_SESSION['codUsuario']."'";
        }
        
        if($cd_userPedido > 0){
            $query .= " AND doacoes.cd_entidad = '".$cd_userPedido."'";
        }
        
        $sql = mysql_query($query . " ORDER BY doacoes.ds_pedidos ASC");
        while($qr = mysql_fetch_array($sql)){

            $result .= '<tr>
                            <td>'.$qr['id_doacoes'].'</td>
                            <td>'.$qr['ds_pedidos'].'</td>
                            <td>'.$qr['qt_quantid'].'</td>
                            <td>'.$qr['ds_unidade'].'</td>
                            <td>'.$qr['nm_usuario'].'</td>
                            <td><button type="button" class="btn btn-sm btn-danger" onclick="delPedido('.$qr['id_doacoes'].')">Excluir</button></td>
                        </tr>';

        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'salvaLogoUser'){
        
        if(isset($_FILES['ds_imagens'])){
            if($_FILES['ds_imagens']['error'] == UPLOAD_ERR_OK){

                //Propriedades do arquivo
                $upName = $_FILES['ds_imagens']['name'];
                $upType = $_FILES['ds_imagens']['type'];
                $upSize = $_FILES['ds_imagens']['size'];
                $upTemp = $_FILES['ds_imagens']['tmp_name'];

                //Pasta para salvar o arquivo
                $upPasta  = '../img/usuario/'.$_SESSION['cpfUsuario'].'/';

                if(is_dir($upPasta)){
                    $diretorio = dir($upPasta);
                    while($arquivo = $diretorio->read()){
                        if(($arquivo != '.') && ($arquivo != '..')){
                            if($arquivo == $_SESSION['cpfUsuario']){
                                unlink($upPasta.$arquivo);
                            }
                        }
                    }
                    $diretorio->close();
                } else {
                    mkdir("../img/usuario/".$_SESSION['cpfUsuario'],0777);
                }

                //Gerar novo nome para o arquivo
                $ds_imagens = $_SESSION['cpfUsuario'].'.png';
                
                include_once('../wideimage/WideImage.php');
                $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                $image = $image->resize(550,400, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                //$image = $image->crop('center','center',353,119); //Corta a imagem do centro, forçando sua altura e largura

                $image->saveToFile($upPasta.$ds_imagens); //Salva a imagem

                $updateImg = mysql_query("UPDATE usuario SET ds_imagens = '".$ds_imagens."' WHERE nr_docucpf = '".$_SESSION['cpfUsuario']."'");
            }
        }
        
    } elseif($acao == 'salvaGaleriaSlide'){
        
        if(isset($_FILES['ds_galeria'])){
            if($_FILES['ds_galeria']['error'] == UPLOAD_ERR_OK){

                //Propriedades do arquivo
                $upName = $_FILES['ds_galeria']['name'];
                $upType = $_FILES['ds_galeria']['type'];
                $upSize = $_FILES['ds_galeria']['size'];
                $upTemp = $_FILES['ds_galeria']['tmp_name'];

                $sql = mysql_query("SELECT COUNT(ds_galeria) AS qtde_img FROM empresa_galeria");
                $qr = mysql_fetch_assoc($sql);
                $qtde_img = $qr['qtde_img'];
                
                //Gerar novo nome para o arquivo
                $ds_imagens = ($qtde_img + 1).'.png';
                
                //Pasta para salvar o arquivo
                $upPasta  = '../img/slide/';
                
                if($qtde_img <= MAX_IMG_SLIDE){

                    include_once('../wideimage/WideImage.php');
                    $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                    $image = $image->resize(1850,600, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                    //$image = $image->crop('center','center',1850,600); //Corta a imagem do centro, forçando sua altura e largura

                    $image->saveToFile($upPasta.$ds_imagens); //Salva a imagem

                    $insertImg = mysql_query("INSERT INTO empresa_galeria (cd_empresa, ds_galeria, dt_inclusa, hr_inclusa) VALUES ('1','".$ds_imagens."','".DtAtual()."','".HrAtual()."')");
                                        
                }
            }
        }
        
        exit;
        
    } elseif($acao == 'salvaGaleriaProjeto'){
        
        if(isset($_FILES['ds_galeria'])){
            if($_FILES['ds_galeria']['error'] == UPLOAD_ERR_OK){

                //Propriedades do arquivo
                $upName = $_FILES['ds_galeria']['name'];
                $upType = $_FILES['ds_galeria']['type'];
                $upSize = $_FILES['ds_galeria']['size'];
                $upTemp = $_FILES['ds_galeria']['tmp_name'];

                $sql = mysql_query("SELECT COUNT(ds_galeria) AS qtde_img FROM galeria_projeto");
                $qr = mysql_fetch_assoc($sql);
                $qtde_img = $qr['qtde_img'];
                
                //Gerar novo nome para o arquivo
                $ds_imagens = ($qtde_img + 1).'.png';
                
                //Pasta para salvar o arquivo
                $upPasta  = '../img/galeria/';
                
                if($qtde_img <= MAX_IMG_SLIDE){
                    
                    include_once('../wideimage/WideImage.php');
                    $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                    $image = $image->resize(1850,600, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                    //$image = $image->crop('center','center',353,119); //Corta a imagem do centro, forçando sua altura e largura

                    $image->saveToFile($upPasta.$ds_imagens); //Salva a imagem
                    
                    $image2 = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                    $image2 = $image2->resize(540,370,'fill');
                    $image2 = $image2->crop('center','center',540,370);
                    $image2->saveToFile($upPasta.'thumb/'.$ds_imagens);

                    $insertImg = mysql_query("INSERT INTO galeria_projeto (cd_empresa, ds_galeria, dt_inclusa, hr_inclusa) VALUES ('1','".$ds_imagens."','".DtAtual()."','".HrAtual()."')");
                    
                }
            }
        }
        
        exit;
        
    } elseif($acao == 'salvaGaleriaUser'){
        
        if(isset($_FILES['ds_galeria'])){
            if($_FILES['ds_galeria']['error'] == UPLOAD_ERR_OK){

                $user = $_GET['user'];
                
                $sql = mysql_query("SELECT nr_docucpf FROM usuario WHERE cd_usuario = '".$user."'");
                $qr = mysql_fetch_assoc($sql);
                $cpfUsuario = $qr['nr_docucpf'];
                
                //Propriedades do arquivo
                $upName = $_FILES['ds_galeria']['name'];
                $upType = $_FILES['ds_galeria']['type'];
                $upSize = $_FILES['ds_galeria']['size'];
                $upTemp = $_FILES['ds_galeria']['tmp_name'];

                //Pasta para salvar o arquivo
                $upPasta  = '../img/usuario/'.$cpfUsuario.'/';

                if(is_dir($upPasta)){
                    $diretorio = dir($upPasta);
                    while($arquivo = $diretorio->read()){
                        if(($arquivo != '.') && ($arquivo != '..')){
                            if($arquivo == $cpfUsuario){
                                unlink($upPasta.$arquivo);
                            }
                        }
                    }
                    $diretorio->close();
                } else {
                    mkdir("../img/usuario/".$cpfUsuario,0777);
                }

                //Gerar novo nome para o arquivo
                $ds_imagens = 'galeria1.png';
                
                $sql = mysql_query("SELECT COUNT(ds_galeria) AS qtde FROM usuario_galeria WHERE cd_usuario = '".$user."'");
                if(mysql_num_rows($sql) > 0){
                    $qr = mysql_fetch_assoc($sql);
                    $qtde = $qr['qtde'];
                    $ds_imagens = 'galeria'.($qtde+1).'.png';
                }
                
                if($qtde <= MAX_IMG_USER){
                    
                    include_once('../wideimage/WideImage.php');
                    $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                    $image = $image->resize(900,390, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                    //$image = $image->crop('center','center',353,119); //Corta a imagem do centro, forçando sua altura e largura

                    $image->saveToFile($upPasta.$ds_imagens); //Salva a imagem

                    $insertImg = mysql_query("INSERT INTO usuario_galeria (cd_usuario, ds_galeria, dt_inclusa, hr_inclusa) VALUES ('".$user."','".$ds_imagens."','".DtAtual()."','".HrAtual()."')");
                    
                }
            }
        }
        
    } elseif($acao == 'exibeImgUser'){
        
        $cd_usuario = $_POST['cd_usuario'];
        
        $sql = mysql_query("SELECT nr_docucpf FROM usuario WHERE cd_usuario = '".$cd_usuario."'");
        $qr = mysql_fetch_assoc($sql);
        $cpfUsuario = $qr['nr_docucpf'];

        $result = "";
        $sql = mysql_query("SELECT ds_galeria FROM usuario_galeria WHERE cd_usuario = '".$cd_usuario."'");
        if(mysql_num_rows($sql) > 0){
            
            while($qr = mysql_fetch_array($sql)){
                
                $result .= '<div class="col-sm-2 col-xs-4 margin-top-10">
                                <img src="'.URL_BASE.'img/usuario/'.$cpfUsuario.'/'.$qr['ds_galeria'].'" alt="">
                                <br/>
                                <button type="button" class="btn btn-sm btn-danger width-100-porc" onclick="delImgUser(\''.$cd_usuario.'\',\''.$qr['ds_galeria'].'\')">Excluir</button>
                            </div>';
                
            }
            
        }
        
        echo $result;
        exit;
        
    } elseif($acao == 'delImgSlide'){
        
        $img = (isset($_POST['img']) && !empty($_POST['img'])) ? $_POST['img'] : "";
        
        if(!empty($img)){
            
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");

            $delete = mysql_query("DELETE FROM empresa_galeria WHERE cd_empresa = '1' AND ds_galeria = '".$img."'");

            if($delete == true){
                mysql_query("COMMIT");
                
                unlink('../img/slide/'.$img);
                
                echo 'QUERY_TRUE';
                exit;
            } else {
                mysql_query("ROLLBACK");
                echo 'QUERY_FALSE';
                exit;
            }
            
        }
        
    } elseif($acao == 'delImgProjeto'){
        
        $img = (isset($_POST['img']) && !empty($_POST['img'])) ? $_POST['img'] : "";
        
        if(!empty($img)){
            
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");

            $delete = mysql_query("DELETE FROM galeria_projeto WHERE cd_empresa = '1' AND ds_galeria = '".$img."'");

            if($delete == true){
                mysql_query("COMMIT");
                
                unlink('../img/galeria/'.$img);
                unlink('../img/galeria/thumb/'.$img);
                
                echo 'QUERY_TRUE';
                exit;
            } else {
                mysql_query("ROLLBACK");
                echo 'QUERY_FALSE';
                exit;
            }
            
        }
        
    } elseif($acao == 'delImgUser'){
        
        $user = (isset($_POST['user']) && $_POST['user'] > 0) ? $_POST['user'] : 0;
        $img = (isset($_POST['img']) && !empty($_POST['img'])) ? $_POST['img'] : "";
        
        if($user > 0 && !empty($img)){
            
            $sql = mysql_query("SELECT nr_docucpf FROM usuario WHERE cd_usuario = '".$user."'");
            $qr = mysql_fetch_assoc($sql);
            $cpfUsuario = $qr['nr_docucpf'];
            
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");

            $delete = mysql_query("DELETE FROM usuario_galeria WHERE cd_usuario = '".$user."' AND ds_galeria = '".$img."'");

            if($delete == true){
                mysql_query("COMMIT");
                
                unlink('../img/usuario/'.$cpfUsuario.'/'.$img);
                
                echo 'QUERY_TRUE';
                exit;
            } else {
                mysql_query("ROLLBACK");
                echo 'QUERY_FALSE';
                exit;
            }
            
        }
        
    } elseif($acao == 'enviaContato'){
        
        $contato_nome = (!isset($_POST['contato_nome']) || empty($_POST['contato_nome'])) ? "" : removeAcentosBoby($_POST['contato_nome']);
        $contato_email = (!isset($_POST['contato_email']) || empty($_POST['contato_email'])) ? "" : $_POST['contato_email'];
        $contato_fone = (!isset($_POST['contato_fone']) || empty($_POST['contato_fone'])) ? "" : $_POST['contato_fone'];
        $contato_msg = (!isset($_POST['contato_msg']) || empty($_POST['contato_msg'])) ? "" : removeAcentosBoby($_POST['contato_msg']);
        
        if(empty($contato_nome) || empty($contato_email) || empty($contato_fone) || empty($contato_msg)){
            echo 'FIELD_FALSE';
            exit;
        } else {
            
            $sql = mysql_query("SELECT UPPER(nm_empresa) AS nm_empresa, ds_interne FROM empresa");
            $qr = mysql_fetch_assoc($sql);
            $nomeDestinatario = $qr['nm_empresa'];
            $emailDestinatario = $qr['ds_interne'];
            
            $assunto = 'MENSAGEM PELA ABA CONTATO';
            
            echo enviaEmail($contato_nome, $contato_email, $nomeDestinatario, $emailDestinatario, CHARSET, $assunto, $contato_msg, 'string');
            exit;
            
        }
        
    } elseif($acao == 'trataMenuActive'){
        
        $url = (isset($_POST['url']) && !empty($_POST['url'])) ? $_POST['url'] : "";

        if(empty($url)){
            echo 'inicio';
            exit;
        } else {
            
            $a = explode('/', $url);
            $b = end($a);
            $c = explode('.', $b);

            $arquivoURL = $c[0];

            echo $arquivoURL;
            exit;
            
        }
        
    } elseif($acao == 'delPedido'){
        
        $id = $_POST['id'];
        
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("START TRANSACTION");
        
        $delete = mysql_query("DELETE FROM doacoes WHERE id_doacoes = '".$id."'");
        
        if($delete == true){
            mysql_query("COMMIT");
            echo 'QUERY_TRUE';
            exit;
        } else {
            mysql_query("ROLLBACK");
            echo 'QUERY_FALSE';
            exit;
        }
        
    } elseif($acao == 'salvarNewPedido'){
        
        $ds_pedidos = (isset($_POST['ds_pedidos']) && !empty($_POST['ds_pedidos'])) ? removeAcentosBoby($_POST['ds_pedidos']) : "";
        $qt_quantid = (isset($_POST['qt_quantid']) && !empty($_POST['qt_quantid'])) ? $_POST['qt_quantid'] : "";
        $cd_unidade = $_POST['cd_unidade'];
        $cd_entidad = $_POST['cd_entidad'];
        
        if(empty($ds_pedidos) || empty($qt_quantid)){
            echo 'FIELD_FALSE';
            exit;
        } else {
            
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");
            
            $query = "INSERT INTO doacoes (cd_empresa, cd_entidad, ds_pedidos, qt_quantid, cd_unidade, ds_statuss, dt_inclusa, hr_inclusa, cd_usuario) VALUES 
                      ('1','".$cd_entidad."','".$ds_pedidos."','".$qt_quantid."','".$cd_unidade."','Aberto','".DtAtual()."','".HrAtual()."','".$_SESSION['codUsuario']."')";
            
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
        
    } elseif ($acao == 'listaCuri') {
        
        $query="SELECT ds_curios1, ds_curios2,ds_curios3,ds_curios4,nr_curios1,nr_curios2,nr_curios3,nr_curios4 FROM empdetalhe";
        $resultado1=mysql_query($query);
        $resultado=mysql_fetch_assoc($resultado1);        
        $result .= 
            '<tr>
                <td>' . $resultado['nr_curios1'] . '</td>
                <td>' . $resultado['ds_curios1'] . '</td>
                 <td style="text-align: right;"><button type="button" class="btn btn-sm btn-primary" onclick="edtCurios(\'ds_curios1\')">Editar</button></td>
            </tr>
            <tr>
                <td>' . $resultado['nr_curios2'] . '</td>
                <td>' . $resultado['ds_curios2'] . '</td>
                 <td style="text-align: right;"><button type="button" class="btn btn-sm btn-primary" onclick="edtCurios(\'ds_curios2\')">Editar</button></td>
            </tr>
            <tr>
                <td>' . $resultado['nr_curios3'] . '</td>
                <td>' . $resultado['ds_curios3'] . '</td>
                 <td style="text-align: right;"><button type="button" class="btn btn-sm btn-primary" onclick="edtCurios(\'ds_curios3\')">Editar</button></td>
            </tr>
            <tr>
                <td>' . $resultado['nr_curios4'] . '</td>
                <td>' . $resultado['ds_curios4'] . '</td>
                <td style="text-align: right;"><button type="button" class="btn btn-sm btn-primary" onclick="edtCurios(\'ds_curios4\')">Editar</button></td>
            </tr>';
        
        echo $result;
        exit;
        
    }elseif($acao=='carregaSobre'){
        $query1="SELECT ds_txttopo, ds_txtfina FROM empdetalhe";
        $query=mysql_query($query1);
        $resultado=mysql_fetch_assoc($query);
        echo json_encode($resultado);
        exit;
        
    } elseif($acao == 'salvaImg1'){
        
        if(isset($_FILES['foto1'])){
            if($_FILES['foto1']['error'] == UPLOAD_ERR_OK){

                //Propriedades do arquivo
                $upName = $_FILES['foto1']['name'];
                $upType = $_FILES['foto1']['type'];
                $upSize = $_FILES['foto1']['size'];
                $upTemp = $_FILES['foto1']['tmp_name'];

                //Pasta para salvar o arquivo
                $upPasta  = '../img/';

                //Gerar novo nome para o arquivo
                $foto1   = 'quem_topo.png';
                
                include_once('../wideimage/WideImage.php');
                $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                $image = $image->resize(1000,550, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                //$image = $image->crop('center','center',353,119); //Corta a imagem do centro, forçando sua altura e largura

                $image->saveToFile($upPasta.$foto1); //Salva a imagem

                $updateImg = mysql_query("UPDATE empdetalhe SET ds_imgtopo ='quem_topo.png'");
            }
        } elseif(isset($_FILES['foto2'])){
            if($_FILES['foto2']['error'] == UPLOAD_ERR_OK){

                //Propriedades do arquivo
                $upName = $_FILES['foto2']['name'];
                $upType = $_FILES['foto2']['type'];
                $upSize = $_FILES['foto2']['size'];
                $upTemp = $_FILES['foto2']['tmp_name'];

                //Pasta para salvar o arquivo
                $upPasta  = '../img/';

                //Gerar novo nome para o arquivo
                $foto2   = 'quem_meio.png';
                
                include_once('../wideimage/WideImage.php');
                $image = WideImage::load($upTemp); //Carrega a imagem utilizando a WideImage
                $image = $image->resize(1000,550, 'fill'); //Redimensiona a imagem para ? de largura e ? de altura, mantendo sua proporção no máximo possível
                //$image = $image->crop('center','center',353,119); //Corta a imagem do centro, forçando sua altura e largura

                $image->saveToFile($upPasta.$foto2); //Salva a imagem

                $updateImg = mysql_query("UPDATE empdetalhe SET ds_imgfina ='quem_meio.png'");
            }
        }
        
        
    }elseif ($acao=='salvarSobre') {
         $ds_txttopo = $_POST['ds_txttopo'];
         $ds_txtfina = $_POST['ds_txtfina'];
        if(empty($ds_txttopo) || empty($ds_txtfina)){
            echo 'FIELD_FALSE';
            exit;
        } else {          
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");            
            $query = "UPDATE empdetalhe set ds_txttopo='".$ds_txttopo."', ds_txtfina='".$ds_txtfina."' where cd_empresa=1";
            
            $update = mysql_query($query);
            
            if($update == true){
                mysql_query("COMMIT");
                echo 'QUERY_TRUE';
                exit;
            } else {
                mysql_query("ROLLBACK");
                echo 'QUERY_FALSE';
                exit;
            }
            
        }
        
    }elseif($acao=='edtCurios'){
        $campo=$_POST['campo'];
        if($campo=='ds_curios1'){
            $query1="SELECT ds_curios1 as ds_curios, nr_curios1 as nr_curios FROM empdetalhe";
        }elseif ($campo=='ds_curios2') {
             $query1="SELECT ds_curios2 as ds_curios, nr_curios2 as nr_curios FROM empdetalhe";   
        }elseif ($campo=='ds_curios3') {
             $query1="SELECT ds_curios3 as ds_curios, nr_curios3 as nr_curios  FROM empdetalhe"; 
        }elseif ($campo=='ds_curios4') {
             $query1="SELECT ds_curios4 as ds_curios, nr_curios4 as nr_curios  FROM empdetalhe";   
        }
        $query=mysql_query($query1);
        $resultado=mysql_fetch_assoc($query);
        echo json_encode($resultado);
        exit;
        
    }elseif ($acao=='salvarCurios') {
         $ds_texto= $_POST['ds_curios'];
         $vr_valor= $_POST['vr_curios'];
         $campo=$_POST['campo'];
        if(empty($ds_texto) || empty($vr_valor)){
            echo 'FIELD_FALSE';
            exit;
        } else {
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");
            if ($campo == 'ds_curios1') {
                $query1 = "UPDATE empdetalhe set ds_curios1='".$ds_texto."', nr_curios1=".$vr_valor;
            } elseif ($campo == 'ds_curios2') {
                $query1 = "UPDATE empdetalhe set ds_curios2='".$ds_texto."', nr_curios2=".$vr_valor;
            } elseif ($campo == 'ds_curios3') {
                $query1 = "UPDATE empdetalhe set ds_curios3='".$ds_texto."', nr_curios3=".$vr_valor;
            } elseif ($campo == 'ds_curios4') {
                $query1 = "UPDATE empdetalhe set ds_curios4='".$ds_texto."', nr_curios4=".$vr_valor;
            }

            $update = mysql_query($query1);

            if ($update == true) {
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
}
?>