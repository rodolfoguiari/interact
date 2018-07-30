<?php

include_once('../header.php');
include_once('topo.php');
?>
<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-md-6">
                <div class="single-title">
                    <h3>Nome Instituição</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="instituicoes.php">Instituições</a></li>
                        <li class="active">Nome Instituição</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>
    <div class="container general">
        <div id="content" class="single-portfolio">

            <div class="col-md-8 ">
                <h2 class="general-title">
                    <span>Nosso Pedido</span>
                </h2>
                <table class=" table table-striped table-bordered table-hover">
                    <tr>
                        <th style="text-align:center;">Produto</th>
                        <th style="text-align:center;">Quantidade</th>
                    </tr>
                    <tr>
                        <td>
                            Arroz 
                        </td>
                        <td  style="text-align:right;">
                            10 KG 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Arroz 
                        </td>
                        <td style="text-align:right;">
                            10 KG 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Arroz 
                        </td>
                        <td style="text-align:right;">
                            10 KG 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Arroz 
                        </td>
                        <td style="text-align:right;">
                            10 KG 
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4">
                <div class="img-responsive">
                    <img class="logos" src="<?php echo URL_BASE . 'img/logos/logo1.jpg'; ?>" alt="">
                </div>
                
                <div class="clearfix"></div>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle">
                                <em class="icon-plus icon-fixed-width"></em>Doe Agora
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <ul class="portfolio-details">
                                    <li><strong>Responsável :</strong> Joao Pedro</li>
                                    <li><strong>Telefone :</strong> (14) 3263-1265</li>
                                    <li><strong>E-mail :</strong>apae@homail.com.br</li>
                                    <li><strong>Endereço :</strong> R. Armando Paccola, 536 - Grajaú</li>
                                    <li><br></li>
                                    <li><center><strong> Agradecemos a Atenção</strong></center></li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div><!-- end accordion -->
            </div><!-- end col-4 -->

        </div><!-- content -->
    </div><!-- end general -->

</section>

<?php

include_once('../footer.php');
?>