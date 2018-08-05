<?php

include_once('../header.php');
include_once('topo.php');
?>
<section class="colon14">

    <div class="singleheader">
        <div class="container">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-title">
                    <h3>Contato</h3>
                   </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">Início</a></li>
                        <li class="active">Contato</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>
    <div class="container general">

        <div id="content" class="col-md-12">
            <h3>
                Entre em contato 
            </h3>

            <hr>

            <div class="col-md-5">
                <form>
                    <input type="text" class="form-control tudo-maiusc" id="contato_nome" placeholder="Nome">
                    <br>
                    <input type="text" class="form-control tudo-minusc" id="contato_email" placeholder="E-mail">
                    <br>
                    <input type="text" class="form-control" id="contato_fone" placeholder="Telefone" data-mask="(99) 9999-9999" onKeyPress="return SomenteNumero(event)">
                    <br>
                    <textarea class="form-control tudo-maiusc" id="contato_msg" placeholder="Menssagem" rows="6"></textarea>
                    <br>
                    <button type="button" class="btn btn-primary" onclick="enviaContato()"><i class="icon-envelope-alt"></i> Enviar Mensagem</button>
                </form>
                <br>
            </div>

            <div class="col-md-7">
                <?php
                $sql = mysql_query("SELECT empresa.ds_enderec, empresa.nr_enderec, cidade.nm_cidade, empresa.nr_telefo1, empresa.ds_interne FROM empresa
                                    INNER JOIN cidade ON (empresa.cd_cidades = cidade.cd_cidade)");
                $qr = mysql_fetch_assoc($sql);
                $ds_enderec = $qr['ds_enderec'];
                $nr_enderec = $qr['nr_enderec'];
                $nm_cidades = $qr['nm_cidade'];
                $nr_telefo1 = $qr['nr_telefo1'];
                $ds_interne = $qr['ds_interne'];
                ?>
                <ul class="contact-details" style="padding-left:10px;">
                    <li><strong>Endereco: </strong><?php echo $ds_enderec . ', ' . $nr_enderec . ' / ' . $nm_cidades; ?></li>
                    <li><strong>Telefone: </strong><?php echo $nr_telefo1; ?></li>
                    <li><strong>E-mail: </strong><?php echo $ds_interne; ?></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<script type="text/javascript">
    
    function enviaContato(){
        
        var contato_nome = $("#contato_nome").val();
        var contato_email = $("#contato_email").val();
        var contato_fone = $("#contato_fone").val();
        var contato_msg = $("#contato_msg").val();
        
        $.post("../ajax/ajax.php?acao=enviaContato",{contato_nome:contato_nome, contato_email:contato_email, contato_fone:contato_fone, contato_msg:contato_msg},
        function(data){
            
            if(data == 'FIELD_FALSE'){
                AvisoDev('TODOS OS CAMPOS DO FORMULÁRIO SÃO OBRIGATÓRIOS. TENTE NOVAMENTE !','warning',5000);
            } else if(data == 'EMAIL ENVIADO COM SUCESSO!'){
                
                $("#contato_nome").val('');
                $("#contato_email").val('');
                $("#contato_fone").val('');
                $("#contato_msg").val('');
                
                AvisoDev('MENSAGEM ENVIADA COM SUCESSO !','success',3000);
            } else {
                AvisoDev('ERRO AO ENVIAR MENSAGEM. TENTE NOVAMENTE !','error',3000);
            }
            
        }
        ,"html");
        
    }
    
</script>

<?php
include_once('../footer.php');
?>