<?php
include_once('../header.php');
include_once('topo.php');

if(isset($_SESSION['cpfUsuario']) && !empty($_SESSION['cpfUsuario'])){
    echo '<script type="text/javascript">window.location = \'../admin/inicioAdmin.php\';</script>';
    exit;
}
?>

<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-title">
                    <h3>Login / Registrar-se</h3>
                    <!--<h4>You can add anythings here</h4>-->
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL_BASE; ?>">Início</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>

    <div class="container general">
        <div id="content" class="single col-sm-12">
            <div class="row">
                <div class="col-lg-4">
                    <form class="login-form" data-effect="slide-bottom">
                        <h3>Login</h3>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nr_cnpjcpf_login" maxlength="14" placeholder="CPF / CNPJ" onKeyPress="return SomenteNumero(event)">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-12">
                                    <input type="password" class="form-control tudo-minusc" id="ds_senhass_login" placeholder="Senha">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary width-100-porc" onclick="loginUser()">Entrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <form class="register-form" data-effect="slide-bottom">
                        <h3>Registrar nova conta</h3>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control tudo-maiusc" id="nm_usuario" placeholder="Nome Completo">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control tudo-minusc" id="ds_emailss" placeholder="Email">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nr_cnpjcpf" maxlength="14" placeholder="CPF / CNPJ" onKeyPress="return SomenteNumero(event)">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control tudo-minusc" id="ds_senhass" placeholder="Senha">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control tudo-maiusc" id="ds_enderec" placeholder="Endereço">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control tudo-maiusc" id="nr_enderec" maxlength="10" placeholder="Nº do Endereço">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control tudo-maiusc" id="ds_bairros" maxlength="30" placeholder="Bairro">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nr_endecep" maxlength="10" placeholder="CEP" onKeyPress="return SomenteNumero(event)">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <select class="form-control" onchange="selectEstado()" id="cd_estados">
                                        <option value="0">Estado</option>
                                        <?php
                                        $sql = mysql_query("SELECT cd_estado, UPPER(nm_estado) AS nm_estado FROM estado ORDER BY nm_estado ASC");
                                        while($qr = mysql_fetch_array($sql)){
                                            echo '<option value="'.$qr['cd_estado'].'">'.$qr['nm_estado'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" id="cd_cidades"></select>
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nr_telefon" placeholder="Telefone" data-mask="(99) 9999-9999" onKeyPress="return SomenteNumero(event)">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="dt_nascime" value="1980-01-01">
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-sm-6">
                                    <select class="form-control" id="cd_generos">
                                        <option value="0">Gênero</option>
                                        <?php
                                        $sql = mysql_query("SELECT cd_sexocli, UPPER(ds_sexocli) AS ds_sexocli FROM sexo ORDER BY ds_sexocli ASC");
                                        while($qr = mysql_fetch_array($sql)){
                                            echo '<option value="'.$qr['cd_sexocli'].'">'.$qr['ds_sexocli'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary width-100-porc" onclick="novaConta()">Criar nova conta</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    
    $(document).ready(function(){
        selectEstado();
    });
    
    function novaConta(){
        
        var nm_usuario = $("#nm_usuario").val();
        var ds_emailss = $("#ds_emailss").val();
        var nr_cnpjcpf = $("#nr_cnpjcpf").val();
        var ds_senhass = $("#ds_senhass").val();
        var ds_enderec = $("#ds_enderec").val();
        var nr_enderec = $("#nr_enderec").val();
        var ds_bairros = $("#ds_bairros").val();
        var nr_endecep = $("#nr_endecep").val();
        var cd_estados = $("#cd_estados").val();
        var cd_cidades = $("#cd_cidades").val();
        var nr_telefon = $("#nr_telefon").val();
        var dt_nascime = $("#dt_nascime").val();
        var cd_generos = $("#cd_generos").val();
        
        $.post("../ajax/ajax.php?acao=novaConta",{nm_usuario:nm_usuario,ds_emailss:ds_emailss,nr_cnpjcpf:nr_cnpjcpf,ds_senhass:ds_senhass,ds_enderec:ds_enderec,nr_enderec:nr_enderec,ds_bairros:ds_bairros,
                                                  nr_endecep:nr_endecep,cd_estados:cd_estados,cd_cidades:cd_cidades,nr_telefon:nr_telefon,dt_nascime:dt_nascime,cd_generos:cd_generos},
        function(data){
            
            if(data == 'USER_EXIST'){
                AvisoDev('CPF / CNPJ JÁ CADASTRADO. TENTE NOVAMENTE !','warning',3000);
                $("#nr_cnpjcpf").focus();
            } else if(data == 'FIELD_FALSE'){
                AvisoDev('ATENÇÃO! TODOS OS CAMPOS SÃO OBRIGATÓRIOS . . .','warning',3000);
                $("#nm_usuario").focus();
            } else if(data == 'QUERY_TRUE'){
                
                $("#nm_usuario").val('');
                $("#ds_emailss").val('');
                $("#cd_estados").val('0');
                $("#nr_cnpjcpf").val('');
                $("#nr_telefon").val('');
                $("#cd_cidades").val('0');
                $("#dt_nascime").val('1980-01-01');
                $("#cd_generos").val('0');
                
                AvisoDev('OPERAÇÃO EFETUADA COM SUCESSO !','success',3000);
                
            } else {
                AvisoDev('ERRO! TENTE NOVAMENTE . . .','error',3000);
            }
            
        }
        ,"html");
        
    }
    
    function loginUser(){
        
        var nr_cnpjcpf_login = $("#nr_cnpjcpf_login").val();
        var ds_senhass_login = $("#ds_senhass_login").val();
        
        if(nr_cnpjcpf_login == false){
            AvisoDev('CPF / CNPJ É UM CAMPO OBRIGATÓRIO !','warning',3000);
            $("#nr_cnpjcpf_login").focus();
        } else if(ds_senhass_login == false){
            AvisoDev('SENHA É UM CAMPO OBRIGATÓRIO !','warning',3000);
            $("#ds_senhass_login").focus();
        } else {
            
            $.post("../ajax/ajax.php?acao=loginUser",{nr_cnpjcpf_login:nr_cnpjcpf_login,ds_senhass_login:ds_senhass_login},
            function(data){
                $("#resposta").html(data);

                if(data == 'USER_FALSE'){
                    AvisoDev('USUÁRIO NÃO CADASTRADO OU DADOS INCORRETOS. TENTE NOVAMENTE !','warning',5000);
                }

            }
            ,"html");
            
        }
        
    }
    
    function selectEstado(){
        
        var cd_estados = $("#cd_estados").val();
        
        $.post("../ajax/ajax.php?acao=selectEstado",{cd_estados:cd_estados},
        function(data){
            
            $("#cd_cidades").html(data);
            
        }
        ,"html");
        
    }
    
</script>

<?php include_once('../footer.php'); ?>