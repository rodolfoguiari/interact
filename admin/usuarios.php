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
        <tbody>
            <?php
            $sql = mysql_query("SELECT cd_usuario, UPPER(nm_usuario) AS nm_usuario, UPPER(ds_enderec) AS ds_enderec, UPPER(nr_enderec) AS nr_enderec, nr_telefon
                                FROM usuario ORDER BY nm_usuario ASC");
            while($qr = mysql_fetch_array($sql)){
                
                echo '<tr>
                        <td>'.$qr['cd_usuario'].'</td>
                        <td>'.$qr['nm_usuario'].'</td>
                        <td>'.$qr['ds_enderec']. ', ' . $qr['nr_enderec'] .'</td>
                        <td>'.$qr['nr_telefon'].'</td>
                        <td><button type="button" class="btn btn-sm btn-primary" onclick="edtUser('.$qr['cd_usuario'].')">Editar</button></td>
                      </tr>';
                
            }
            ?>
        </tbody>
    </table>    
</div>

<div class="modal fade" id="modalEdtUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edição de Usuário</h4>
            </div>
            <div class="modal-body">
                <form name="form" id="form">
                    <input type="hidden" id="cd_usuario" />
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
                            <select class="form-control" id="cd_cidades">
                                <?php
                                $sql = mysql_query("SELECT cd_cidade, UPPER(nm_cidade) AS nm_cidade FROM cidade ORDER BY nm_cidade ASC");
                                while($qr = mysql_fetch_array($sql)){
                                    echo '<option value="'.$qr['cd_cidade'].'">'.$qr['nm_cidade'].'</option>';
                                }
                                ?>
                            </select>
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
    
    function salvarEdtUser(){
        
        alert('PREPARADO PARA SALVAR !');
        
    }
    
    function edtUser(id){
        
        $.post("../ajax/ajax.php?acao=edtUser",{cd_usuario:id},
        function(data){
            
            var usuario = JSON.parse(data);
            
            $("#cd_usuario").val(usuario.cd_usuario);
            $("#nm_usuario").val(usuario.nm_usuario);
            $("#ds_emailss").val(usuario.ds_emailss);
            $("#nr_cnpjcpf").val(usuario.nr_docucpf);
            $("#ds_senhass").val(usuario.ds_senhass);
            $("#ds_enderec").val(usuario.ds_enderec);
            $("#nr_enderec").val(usuario.nr_enderec);
            $("#ds_bairros").val(usuario.ds_bairros);
            $("#nr_endecep").val(usuario.nr_cepusua);
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