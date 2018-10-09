<?php
include_once('../header.php');
include_once('../home/topo.php');
include_once('menuAdmin.php');
?>

<div class="col-lg-9 col-md-9 col-sm-9">
    <div class="row">
        <div class="col-md-9">
            <p class="lead text-muted">Slide Início</p>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary width-100-porc" onclick="openSlide()">Adicionar Slide</button>
        </div>
    </div>

    <table class="table table-striped" data-effect="fade">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Data Inclusão</th>
                <th>Hora Inclusão</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tableSlide"></tbody>
    </table>    
</div>

<div class="modal" id="modalAddSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionando Slide</h4>
            </div>
            <div class="modal-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#aba_galeria" data-toggle="tab">Slide</a></li>
                    </ul>
                    <div class="tab-content" style="overflow-x: hidden;">
                        <div class="tab-pane active" id="aba_galeria">
                            <div class="row">
                                <div class="col-md-12 color-red"><i>Dimensão recomendada (1850 x 600)</i></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <label>Galeria de Slides (Max. <?php echo MAX_IMG_SLIDE; ?> Imagens)</label>
                                    <input type="file" class="form-control" id="ds_galeria" />
                                </div>
                            </div>
                            <div class="row" id="div_img_slide"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalViewSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="name_div_slide"></h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-small btn-danger width-100-porc" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="tabbable">
                    <div class="row">
                        <div class="col-md-12">
                            <img alt="" id="input_view_slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        listaSlide();
        
        $("#modalAddSlide").on('hidden.bs.modal', function(){
            $("#ds_galeria").val('');
            listaSlide();
        });
        
        $("#modalViewSlide").on('hidden.bs.modal', function(){
            $("#input_view_slide").attr("src","");
        });
    });
    
    function openSlide(){
        
        $('#modalAddSlide').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        
    }
    
    $("#ds_galeria").on('change', function(e){
        
        var data = new FormData();
        data.append('ds_galeria', $('#ds_galeria')[0].files[0]);
        
        $.ajax({
            url: '../ajax/ajax.php?acao=salvaGaleriaSlide',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(retorno){
                $('#modalAddSlide').modal('hide');
            }
        });
        
    });
    
    function visualizarSlide(img){
        
        $("#name_div_slide").html(img);
        $("#input_view_slide").attr("src","../img/slide/" + img);
        
        $("#modalViewSlide").modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        
    }
    
    function delImgSlide(img){
        
        if(confirm('DESEJA REALMENTE EXCLUIR ESTA IMAGEM ?')){
            
            $.post("../ajax/ajax.php?acao=delImgSlide",{img:img},
            function(data){
                
                if(data == 'QUERY_TRUE'){
                    AvisoDev('OPERAÇÃO EFETUADA COM SUCESSO !','success',3000);
                    listaSlide();
                } else if(data == 'QUERY_FALSE'){
                    AvisoDev('ERRO. TENTE NOVAMENTE !','error',3000);
                } else {
                    alert(data);
                }
                
            }
            ,"html");
            
        }
        
    }
    
    function listaSlide(){
        
        $.post("../ajax/ajax.php?acao=listaSlide",{},
        function(data){
            $("#tableSlide").html(data);
        }
        ,"html");
        
    }
    
</script>

<?php
include_once('fimMenuAdmin.php');
include_once('../footer.php');
?>