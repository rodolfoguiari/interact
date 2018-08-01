<?php
include_once('../header.php');
include_once('topo.php');
?>
<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-title">
                    <h3>Instituições</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">Início</a></li>
                        <li class="active">Instituições</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>

    <!-- START CONTENT AND SIDEBAR -->
    <div class="container general">
        <div id="content" class="single col-lg-12 col-md-12 col-sm-12">

            <div class="message text-center">
                <h2>Ajude alguma das <span>Instiuições</span> cadastradas</h2>
                <p>Confira quais são e como ajudá-las. Clique em cima da instituição desejada.</p>
            </div>


            <div class="clearfix"></div>

            <section class="portfolio">
                <div class="row">
                    <?php
                    $query = 'SELECT DISTINCT(cd_entidad) as cd_entidad, ds_logoemp FROM doacoes inner join usuario on usuario.cd_usuario=doacoes.cd_entidad';
                    $resultado = mysql_query($query);
                    $cont = 1;

                    while ($linha = mysql_fetch_array($resultado, MYSQLI_ASSOC)) {
                        if ($cont == 0) {
                            echo '<div class="row">';
                        }
                        echo'
                        <div class="col-lg-3 col-md-3 col-sm-6 ">
                        <div class="portfolio-columns"  >
                            <a href="detalhes.php?id=' . $linha['cd_entidad'] . '">
                                <img class="logos" src="' . URL_BASE . 'img/logos/' . $linha['ds_logoemp'] . '"  alt="">
                                <div>
                                    <h3><br><br></h3>
                                    <p><i class="icon-zoom-in"></i> Mais Informações</p>
                                </div>
                            </a>
                        </div>
                    </div>';
                        $cont++;
                        if ($cont == 3) {
                            echo '</div>';
                            $cont = 0;
                        }
                    }
                    ?>
                </div>
            </section>

            <div class="clearfix"></div>

        </div><!-- end content -->
    </div><!-- end container -->
</section>

<?php
include_once('../footer.php');
?>