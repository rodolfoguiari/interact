<?php
include_once('../header.php');
include_once('../home/topo.php');
include_once('menuAdmin.php');

$disabled = "";
if($_SESSION['aceUsuario'] < 3){
    $disabled = "disabled";
}
?>

<div class="col-lg-9 col-md-9 col-sm-9">
    <p class="lead text-muted">Pedidos</p>
    <div class="row">
        <div class="col-md-6">
            <label>Instituição</label>
            <select class="form-control" id="cd_userPedido" <?php echo $disabled; ?>>
                <option value="0">TODAS</option>
                <?php
                $sql = mysql_query("SELECT cd_usuario, UPPER(nm_usuario) AS nm_usuario FROM usuario ORDER BY nm_usuario ASC");
                while($qr = mysql_fetch_array($sql)){
                    echo '<option value="'.$qr['cd_usuario'].'">'.$qr['nm_usuario'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary margin-top-24 width-100-porc" onclick="listaPedido()">Filtrar</button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-success margin-top-24 width-100-porc" onclick="openModalPedido()">Novo</button>
        </div>
    </div>

    <table class="table table-striped margin-top-20" data-effect="fade">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Un. Medida</th>
                <th>Instituição</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tableEdtPedido"></tbody>
    </table>    
</div>

<div class="modal fade" id="modalNewPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Novo Pedido</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Descrição</label>
                        <input type="text" class="form-control tudo-maiusc" id="ds_pedidos" maxlength="100" autocomplete="off">
                    </div>
                    <div class="col-sm-3">
                        <label>Quantidade</label>
                        <input type="text" class="form-control" id="qt_quantid" maxlength="3" autocomplete="off" onKeyPress="return SomenteNumero(event)">
                    </div>
                    <div class="col-sm-3">
                        <label>Un. Medida</label>
                        <select class="form-control" id="cd_unidade">
                            <?php
                            $sql = mysql_query("SELECT cd_unidade, ds_unidade FROM unidade_medida ORDER BY ds_unidade ASC");
                            while($qr = mysql_fetch_array($sql)){
                                echo '<option value="'.$qr['cd_unidade'].'">'.$qr['ds_unidade'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Instituição</label>
                        <select class="form-control" id="cd_entidad">
                            <?php
                            if($_SESSION['aceUsuario'] < 3){
                                echo '<option value="'.$_SESSION['codUsuario'].'">'.$_SESSION['nomUsuario'].'</option>';
                            } else {
                                
                                $sql = mysql_query("SELECT cd_usuario, UPPER(nm_usuario) AS nm_usuario FROM usuario ORDER BY nm_usuario ASC");
                                while($qr = mysql_fetch_array($sql)){
                                    echo '<option value="'.$qr['cd_usuario'].'">'.$qr['nm_usuario'].'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="salvarNewPedido()">Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        listaPedido();
    });
    
    function listaPedido(){
        
        var cd_userPedido = $("#cd_userPedido").val();
        
        $.post("../ajax/ajax.php?acao=listaPedido",{cd_userPedido:cd_userPedido},
        function(data){
            $("#tableEdtPedido").html(data);
        }
        ,"html");
        
    }
    
    function salvarNewPedido(){
        
        var ds_pedidos = $("#ds_pedidos").val();
        var qt_quantid = $("#qt_quantid").val();
        var cd_unidade = $("#cd_unidade").val();
        var cd_entidad = $("#cd_entidad").val();
        
        $.post("../ajax/ajax.php?acao=salvarNewPedido",{ds_pedidos:ds_pedidos, qt_quantid:qt_quantid, cd_unidade:cd_unidade, cd_entidad:cd_entidad},
        function(data){
            
            if(data == 'FIELD_FALSE'){
                AvisoDev('TODOS OS CAMPOS SÃO OBRIGATÓRIOS. TENTE NOVAMENTE !','warning',5000);
            } else if(data == 'QUERY_TRUE'){
                
                $("#modalNewPedido").modal('hide');
                
                $("#ds_pedidos").val('');
                $("#qt_quantid").val('');
                
                listaPedido();
                AvisoDev('OPERAÇÃO EFETUADA COM SUCESSO !','success',3000);
                
            } else if(data == 'QUERY_FALSE'){
                AvisoDev('FALHA NA OPERAÇÃO. TENTE NOVAMENTE !','error',3000);
            } else {
                alert(data);
            }
            
        }
        ,"html");
        
    }
    
    function delPedido(id){
        
        if(confirm('VOCÊ DESEJA REALMENTE EFETUAR ESTA OPERAÇÃO ?')){
            
            $.post("../ajax/ajax.php?acao=delPedido",{id:id},
            function(data){

                if(data == 'QUERY_TRUE'){
                    listaPedido();
                    AvisoDev('OPERAÇÃO EFETUADA COM SUCESSO !','success',3000);
                } else if(data == 'QUERY_FALSE'){
                    AvisoDev('FALHA NA OPERAÇÃO. TENTE NOVAMENTE !','error',3000);
                } else {
                    alert(data);
                }

            }
            ,"html");
            
        }
        
    }
    
    function openModalPedido(){
        
        $("#modalNewPedido").modal('show');
        
    }
    
</script>

<?php
include_once('fimMenuAdmin.php');
include_once('../footer.php');
?>