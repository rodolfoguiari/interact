<?php
include_once('../header.php');
include_once('../home/topo.php');
include_once('menuAdmin.php');
?>

<div class="col-lg-9 col-md-9 col-sm-9">
    <p class="lead text-muted">Usuários</p>

    <table class="table table-striped" data-effect="fade">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tableEdtUser"></tbody>
    </table>    
</div>

<div class="modal fade" id="modalEdtUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edição de Usuário</h4>
            </div>
            <div class="modal-body">
                <form id="formUserAdmin">
                    
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#cadastro" data-toggle="tab">Cadastro</a></li>
                            <li><a href="#imagem" data-toggle="tab">Imagem</a></li>
                        </ul>
                        <div class="tab-content" style="overflow-x: hidden;">
                            <div class="tab-pane active" id="cadastro">
                                <input type="hidden" name="cd_usuario" id="cd_usuario" />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Nome Completo</label>
                                        <input type="text" class="form-control tudo-maiusc" name="nm_usuario" id="nm_usuario" placeholder="Nome Completo">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control tudo-minusc" name="ds_emailss" id="ds_emailss" placeholder="Email">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>CPF / CNPJ</label>
                                        <input type="text" class="form-control" name="nr_docucpf" id="nr_docucpf" maxlength="14" placeholder="CPF / CNPJ" onKeyPress="return SomenteNumero(event)">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Senha</label>
                                        <input type="password" class="form-control tudo-minusc" name="ds_senhass" id="ds_senhass" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="row margin-top-20">
                                    <div class="col-sm-4">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control tudo-maiusc" name="ds_enderec" id="ds_enderec" placeholder="Endereço">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Nº</label>
                                        <input type="text" class="form-control tudo-maiusc" name="nr_enderec" id="nr_enderec" maxlength="10" placeholder="Nº do Endereço">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control tudo-maiusc" name="ds_bairros" id="ds_bairros" maxlength="30" placeholder="Bairro">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="nr_cepusua" id="nr_cepusua" maxlength="10" data-mask="99999-999" placeholder="CEP" onKeyPress="return SomenteNumero(event)">
                                    </div>
                                </div>
                                <div class="row margin-top-20">
                                    <div class="col-sm-3">
                                        <label>Estado</label>
                                        <select class="form-control" onchange="selectEstado()" name="cd_estados" id="cd_estados">
                                            <option value="0">Estado</option>
                                            <?php
                                            $sql = mysql_query("SELECT cd_estado, UPPER(nm_estado) AS nm_estado FROM estado ORDER BY nm_estado ASC");
                                            while($qr = mysql_fetch_array($sql)){
                                                echo '<option value="'.$qr['cd_estado'].'">'.$qr['nm_estado'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Cidade</label>
                                        <select class="form-control" name="cd_cidades" id="cd_cidades">
                                            <?php
                                            $sql = mysql_query("SELECT cd_cidade, UPPER(nm_cidade) AS nm_cidade FROM cidade ORDER BY nm_cidade ASC");
                                            while($qr = mysql_fetch_array($sql)){
                                                echo '<option value="'.$qr['cd_cidade'].'">'.$qr['nm_cidade'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" name="nr_telefon" id="nr_telefon" placeholder="Telefone" data-mask="(99) 9999-9999" onKeyPress="return SomenteNumero(event)">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Nascimento</label>
                                        <input type="date" class="form-control" name="dt_nascime" id="dt_nascime" value="1980-01-01">
                                    </div>
                                </div>
                                <div class="row margin-top-20">
                                    <div class="col-sm-3">
                                        <label>Gênero</label>
                                        <select class="form-control" name="cd_generos" id="cd_generos">
                                            <option value="0">Gênero</option>
                                            <?php
                                            $sql = mysql_query("SELECT cd_sexocli, UPPER(ds_sexocli) AS ds_sexocli FROM sexo ORDER BY ds_sexocli ASC");
                                            while($qr = mysql_fetch_array($sql)){
                                                echo '<option value="'.$qr['cd_sexocli'].'">'.$qr['ds_sexocli'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="imagem">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <label>Logo (Imagem)</label>
                                        <input type="file" class="form-control" name="ds_imagens" id="ds_imagens" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="salvarEdtUser()">Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        listaUser();
    });
    
    $("#ds_imagens").on('change', function(e){
        
        var data = new FormData();
        data.append('ds_imagens', $('#ds_imagens')[0].files[0]);
        
        $.ajax({
            url: '../ajax/ajax.php?acao=salvaLogoUser',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(retorno){
                
            }
        });
        
    });
    
    function listaUser(){
        
        $.post("../ajax/ajax.php?acao=listaUser",{},
        function(data){
            $("#tableEdtUser").html(data);
        }
        ,"html");
        
    }
    
    function salvarEdtUser(){
        
        var formUserAdmin = $("#formUserAdmin").serializeArray();

        $.post("../ajax/ajax.php?acao=salvarEdtUser",{formUserAdmin:formUserAdmin},
        function(data){
            
            if(data == 'QUERY_TRUE'){
                
                $("#modalEdtUser").modal('hide');
                listaUser();
                AvisoDev('ATUALIZAÇÃO REALIZADA COM SUCESSO !','success',3000);
                
            } else {
                AvisoDev('ERRO! TENTE NOVAMENTE OU INFORME O ADMINISTRADOR DO SITE.','error',5000);
            }
            
        }
        ,"html");
       
    }
    
    function edtUser(id){
        
        $.post("../ajax/ajax.php?acao=edtUser",{cd_usuario:id},
        function(data){
            
            var usuario = JSON.parse(data);
            
            $("#cd_usuario").val(usuario.cd_usuario);
            $("#nm_usuario").val(usuario.nm_usuario);
            $("#ds_emailss").val(usuario.ds_emailss);
            $("#nr_docucpf").val(usuario.nr_docucpf);
            $("#ds_senhass").val(usuario.ds_senhass);
            $("#ds_enderec").val(usuario.ds_enderec);
            $("#nr_enderec").val(usuario.nr_enderec);
            $("#ds_bairros").val(usuario.ds_bairros);
            $("#nr_cepusua").val(usuario.nr_cepusua);
            $("#cd_estados").val(usuario.cd_estados);
            $("#cd_cidades").val(usuario.cd_cidades);
            $("#nr_telefon").val(usuario.nr_telefon);
            $("#dt_nascime").val(usuario.dt_nascime);
            $("#cd_generos").val(usuario.cd_generos);
            
            $('#modalEdtUser').modal('show');
            
        }
        ,"html");
        
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

<?php
include_once('fimMenuAdmin.php');
include_once('../footer.php');
?>