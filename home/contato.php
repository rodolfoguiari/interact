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
                <form id="#" action="#">
                    <input type="text" class="form-control" placeholder="Nome">
                    <br>
                    <input type="text" class="form-control" placeholder="E-mail">
                    <br>
                    <input type="text" class="form-control" placeholder="Telefone">
                    <br>
                    <textarea class="form-control" placeholder="Menssagem" rows="6"></textarea>
                    <br>
                    <button class="btn btn-primary"><i class="icon-envelope-alt"></i> Enviar Mensagem</button>
                </form>
                <br>
            </div>

            <div class="col-md-7">
                <ul class="contact-details" style="padding-left:10px;">
                    <li><strong>Endereco:</strong> Lorem ipsum dolar sit amet / USA</li>
                    <li><strong>Telefone:</strong> +0 554 777 78 78</li>
                    <li><strong>E-mail:</strong> hello@designingmedia.com</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div><!-- end content -->
    </div><!-- end container -->
</section><!-- end colon1 -->
<?php

include_once('../footer.php');
?>