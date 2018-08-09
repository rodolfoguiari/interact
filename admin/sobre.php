<?php
include_once('../header.php');
include_once('../home/topo.php');
include_once('menuAdmin.php');
?>

<div class="col-lg-9 col-md-9 col-sm-9">
    <p class="lead text-muted">Página Sobre</p>
    <div class="row">
        <div class="col-md-6">
            <p class="lead text-muted">Textos</p>
        </div>
        <div class="col-md-4">
            <p class="lead text-muted">&nbsp;</p>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success" onclick="salvarSobre()">Salvar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">

            <div class="col-md-12">
                <label>Texto: Quem Somos?</label>
                <textarea class="form-control" rows="5" id="txtquem" name='txtquem'> </textarea>
                <p>
            </div>
            <div class="col-md-12">
                <label>Texto: Rodapé</label>
                <textarea class="form-control" rows="5" id="txtfina" name='txtfina'> </textarea>
                <p>
            </div>
            <p class="lead text-muted">Curiosidades</p>
            <div class="col-md-12">
                <table class="table table-striped" data-effect="fade">
                    <thead>
                        <tr>
                            <th>Valor</th>
                            <th>Texto</th>
                            <th style="text-align: right;">Edição</th>
                        </tr>
                    </thead>
                    <tbody id="tableEdtCuri"></tbody>
                </table>  
            </div>
            <p class="lead text-muted">Fotos</p>   
            <div class="col-md-12">
                <div class="col-md-5 form-group">
                    <label>Foto do Topo:</label>
                    <input class="form-group" type="file" required="required" name='foto1' id="foto1">
                    <p>
                </div>
                <div class="col-md-2"> </div>
                <div class="col-md-5 form-group">
                    <label>Foto do Meio:</label>
                    <input class="form-group" type="file" required="required" id="foto2" name='foto2'>
                    <p>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="modalEdtCurios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edição de Usuário</h4>
                </div>
                <div class="modal-body">
                    <form id="formCurios">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#cadastro" data-toggle="tab">Editar Curiosidade</a></li>
                            </ul>
                            <div class="tab-content" style="overflow-x: hidden;">
                                <div class="tab-pane active" id="campo">
                                    <input type="hidden" name="campo" id="campo" />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Texto</label>
                                            <input type="text" class="form-control" name="ds_curios" id="ds_curios" placeholder="Texto que irá aparecer">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Valor</label>
                                            <input type="number" class="form-control" name="vr_curios" id="vr_curios" placeholder="Valor">
                                        </div>
                                        <div class="col-sm-4">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" style="margin-top:13%" class="btn btn-success" onclick="salvaCuri()">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                     </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        listaCuri();
        carregaSobre();
    });
    function listaCuri() {
        $.post("../ajax/ajax.php?acao=listaCuri", {},
                function (data) {
                    $("#tableEdtCuri").html(data);
                }
        , "html");
    }
    function carregaSobre() {
        $.post("../ajax/ajax.php?acao=carregaSobre", {},
                function (data) {

                    var texto = JSON.parse(data);
                    $("#txtquem").val(texto.ds_txttopo);
                    $("#txtfina").val(texto.ds_txtfina);
                }
        , "html");
    }

    $("#foto1").on('change', function (e) {
        var data = new FormData();
        data.append('foto1', $('#foto1')[0].files[0]);
        $.ajax({
            url: '../ajax/ajax.php?acao=salvaImg1',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function (retorno) {
            }
        });

    });
    $("#foto2").on('change', function (e) {
        var data = new FormData();
        data.append('foto2', $('#foto2')[0].files[0]);
        $.ajax({
            url: '../ajax/ajax.php?acao=salvaImg1',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function (retorno) {
            }
        });

    });

    function salvarSobre() {

        var ds_txttopo = $("#txtquem").val();
        var ds_txtfina = $("#txtfina").val();
        $.post("../ajax/ajax.php?acao=salvarSobre", {ds_txttopo: ds_txttopo, ds_txtfina: ds_txtfina},
                function (data) {
                    if (data == 'FIELD_FALSE') {
                        AvisoDev('TODOS OS CAMPOS SÃO OBRIGATÓRIOS. TENTE NOVAMENTE !', 'warning', 5000);
                    } else if (data == 'QUERY_TRUE') {
                        AvisoDev('ATUALIZAÇÃO REALIZADA COM SUCESSO !', 'success', 3000);
                        listaCuri();
                        carregaSobre();

                    } else if (data == 'QUERY_FALSE') {
                        AvisoDev('FALHA NA OPERAÇÃO. TENTE NOVAMENTE !', 'error', 3000);
                    } else {
                        alert(data);
                    }

                }
        , "html");

    }
    function edtCurios(campo){
        $.post("../ajax/ajax.php?acao=edtCurios",{campo:campo},
        function(data){
            var curi = JSON.parse(data); 
            $("#ds_curios").val(curi.ds_curios);
            $("#vr_curios").val(curi.nr_curios);
            $("#campo").val(campo);
            
            $('#modalEdtCurios').modal('show');
            
        }
        ,"html");
        
    }
    function salvaCuri(){   
        var campo = $("#campo").val();
        var ds_curios = $("#ds_curios").val();
        var vr_curios = $("#vr_curios").val();

        $.post("../ajax/ajax.php?acao=salvarCurios",{campo:campo,ds_curios:ds_curios,vr_curios:vr_curios},
        function(data){
            alert(data);
            if(data == 'QUERY_TRUE'){
                
                $("#modalEdtCurios").modal('hide');
                listaCuri();
                AvisoDev('ATUALIZAÇÃO REALIZADA COM SUCESSO !','success',3000);
                
            } else 
            if (data == 'QUERY_FALSE') {
                        AvisoDev('TODOS OS CAMPOS SÃO OBRIGATÓRIOS !', 'error', 3000);
                } else {
                AvisoDev('ERRO! TENTE NOVAMENTE OU INFORME O ADMINISTRADOR DO SITE.','error',5000);
            }
            
        }
        ,"html");
       
    }
</script>

<?php
include_once('fimMenuAdmin.php');
include_once('../footer.php');
?>