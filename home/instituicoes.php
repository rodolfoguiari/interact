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
                        <li><a href="<?php echo URL_BASE; ?>">Início</a></li>
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
                    <div class="col-lg-3 col-md-3 col-sm-6 ">
                        <div class="portfolio-columns"  >
                            <a href="detalhes.php?id=1">
                                <img class="logos" src="<?php echo URL_BASE . 'img/logos/logo1.jpg'; ?>" alt="">
                                <div>
                                    <h3><br><br></h3>
                                    <p><i class="icon-zoom-in"></i> Mais Informações</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 web-design development">
                        <div class="portfolio-columns">
                            <a href="single-portfolio-1.html">
                                <img class="logos" src="<?php echo URL_BASE . 'img/logos/logo2.jpg'; ?>" alt="">
                                <div>
                                    <h5>I have an Idea</h5>
                                    <p><i class="icon-folder-open-alt"></i> Illustrator</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 web-design development">
                        <div class="portfolio-columns">
                            <a href="single-portfolio-1.html">
                                <img class="logos" src="<?php echo URL_BASE . 'img/logos/logo3.jpg'; ?>" alt="">
                                <div>
                                    <h5>Clique para ajudar</h5>
                                    <p><i class="icon-folder-open-alt"></i> Illustrator</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 web-design development">
                        <div class="portfolio-columns">
                            <a href="single-portfolio-1.html">
                                <img class="logos"  src="<?php echo URL_BASE . 'img/logos/logo4.jpg'; ?>" alt="">
                                <div>
                                    <h5>I have an Idea</h5>
                                    <p><i class="icon-folder-open-alt"></i> Illustrator</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 web-design development">
                        <div class="portfolio-columns">
                            <a href="single-portfolio-1.html">
                                <img src="<?php echo URL_BASE . 'img/logos/logo5.jpg'; ?>" alt="">
                                <div>
                                    <h5>I have an Idea</h5>
                                    <p><i class="icon-folder-open-alt"></i> Illustrator</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 web-design development">
                        <div class="portfolio-columns">
                            <a href="single-portfolio-1.html">
                                <img src="<?php echo URL_BASE . 'img/logos/logo1.jpg'; ?>" alt="">
                                <div>
                                    <h5>I have an Idea</h5>
                                    <p><i class="icon-folder-open-alt"></i> Illustrator</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="clearfix"></div>

        </div><!-- end content -->
    </div><!-- end container -->
</section>

<?php
include_once('../footer.php');
?>