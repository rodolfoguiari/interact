<?php
include_once('../header.php');
include_once('topo.php');
?>
<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-title">
                    <h3>Galeria do Projeto</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL_BASE; ?>">Início</a></li>
                        <li class="active">Galeria</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>

    <div class="container general">
        <div id="content" class="single col-lg-12 col-md-12 col-sm-12" style="padding-top: 0px;">

            <div class="message text-center" style="padding-top: 0px;">
                <h2 style="margin: 0px;">Compartilhe conosco alguns de nossos momentos!</h2>
                <p style="margin: 0px;">Ajude alguma das instiuições cadastradas.</p>
            </div>

            <?php
            $sql = mysql_query("SELECT ds_galeria FROM galeria_projeto WHERE cd_empresa = 1 ORDER BY dt_inclusa DESC, hr_inclusa DESC");
            while($qr = mysql_fetch_array($sql)){
                
                echo '<div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="gallery-box">                    
                            <a href="../img/galeria/'.$qr['ds_galeria'].'" class="zoombox effect-icona" data-biggallery="gallery4" data-biggallerythumbnail="../img/galeria/thumb/'.$qr['ds_galeria'].'">
                                <img class="img-thumbnail" src="../img/galeria/thumb/'.$qr['ds_galeria'].'" alt="">
                            </a>
                            <!--<div class="gallery-box-titles">
                                <h3>From Island</h3>
                            </div>-->
                        </div>
                      </div>';
                
            }
            ?>
            
        </div>
    </div>
</section>

<?php
include_once('../footer.php');
?>