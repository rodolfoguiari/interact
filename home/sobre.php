<?php
include_once('../header.php');
include_once('topo.php');
?>
<?php
$query='SELECT * FROM empdetalhe LIMIT 1';
$resultado = mysql_query($query);
$fetch = mysql_fetch_array($resultado);
?>
<section class="colon14">

    <div class="singleheader">
        <div class="container">
            <div class="col-md-6">
                <div class="single-title">
                    <h3>Sobre Nós</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL_BASE; ?>">Início</a></li>
                        <li class="active">Quem Somos</li>
                        <li class="active">Sobre</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>

    <div class="container general ">

        <div id="content" class="single col-md-12">
            <div class="image-container img-responsive" data-effect="slide-bottom">
                <img src="<?php echo URL_BASE.'img/'.$fetch['ds_imgtopo'];?>" alt="">
            </div>
            <div class="text-left" data-effect="slide-bottom" >
                <h2 style="color:#1d4781;"> <strong> Quem somos? </strong> </h2>  
            </div>
            <div class="col-md-12" data-effect="slide-bottom">
                <?php echo nl2br($fetch['ds_txttopo']);?>
                <hr>
            </div>


            <div class="text-center"  data-effect="slide-bottom">
                <h2 style="color:#1d4781;"> <strong>Nosso fundamentos</strong> </h2>
            </div>

            <div class="col-md-6 img-responsive" data-effect="slide-bottom">
                <img src="<?php echo URL_BASE.'img/'.$fetch['ds_imgfina'];?>" alt="">
                
            </div>

            <div  class="col-md-6 text-left" data-effect="slide-bottom">
                <p><i class="fa fa-child" style="font-size:44px;"></i>
                    <span style="font-size: 15pt;">&nbsp;Formação de Companheirismo</span></p>
                <br>
                <p> 
                    <i class="fa fa-line-chart" style="font-size:29px;"></i>
                    <span style="font-size: 15pt;">&nbsp;Prestação de serviços a comunidade</span>  
                </p>
                <br>
                <p>    
                    <i class="fa fa-handshake-o" style="font-size:29px;"></i>
                    <span style="font-size: 15pt;">&nbsp;Formação Profissional</span>  
                </p>
                <br>
                <p>    
                    <i class=" fa fa-globe" style="font-size:29px;"></i>
                    <span style="font-size: 15pt;">&nbsp;Desenvolvimento da qualidade de liderança</span>  
                </p>

            </div>
            <div class="col-md-12" data-effect="slide-bottom">
                &nbsp;
                <hr>
                    <?php echo nl2br($fetch['ds_txtfina']);?>
                <hr>
            </div>
        </div><!-- end content -->

        <div class="text-center" data-effect="slide-bottom" style="margin-top:-7%;">
            <h2 style="color:#1d4781;"> <strong>Curiosidades</strong> </h2>
        </div>
        <!-- COMEÇA CURIOSIDADES -->
        <div class="single-stat">

            <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-bottom">
                <div class="stat">
                    <span class="stat-count"><?php echo nl2br($fetch['nr_curios1'])?></span>
                    <p class="stat-detail">  <?php echo nl2br($fetch['ds_curios1']);?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-bottom">
                <div class="stat">
                    <span class="stat-count"><?php echo nl2br($fetch['nr_curios2'])?></span>
                    <p class="stat-detail"><?php echo nl2br($fetch['ds_curios2']);?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-bottom">
                <div class="stat">
                    <span class="stat-count"><?php echo nl2br($fetch['nr_curios3'])?></span>
                    <p class="stat-detail"><?php echo nl2br($fetch['ds_curios3']);?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-bottom">
                <div class="stat">
                    <span class="stat-count"><?php echo nl2br($fetch['nr_curios4'])?></span>
                    <p class="stat-detail"><?php echo nl2br($fetch['ds_curios4']);?></p>
                </div>
            </div>
        </div>




    </div>
</section>
<?php

include_once('../footer.php');
?>