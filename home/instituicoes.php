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
                    $query = "SELECT DISTINCT(doacoes.cd_entidad) AS cd_entidad, COALESCE(usuario.ds_imagens,'') AS ds_imagens FROM doacoes
                              INNER JOIN usuario ON usuario.cd_usuario = doacoes.cd_entidad";
                    $resultado = mysql_query($query);
                    $cont = 1;

                    while($linha = mysql_fetch_array($resultado)){
                        
                        if(empty($linha['ds_imagens'])){
                            $pasta = "sem_imagem.jpg";
                        } else {
                            
                            $img = $linha['ds_imagens'];
                            
                            $a = explode('.',$img);
                            $pasta = $a[0];
                            $pasta = $pasta . '/' . $img;
                            
                        }
                        
                        if ($cont == 0) {
                            echo '<div class="row">';
                        }
                        
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 ">
                                <div class="portfolio-columns" >
                                    <a href="detalhes.php?id=' . $linha['cd_entidad'] . '">
                                        <img class="logos" src="' . URL_BASE . 'img/usuario/' . $pasta . '"  alt="">
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

        </div>
    </div>
</section>

<?php
include_once('../footer.php');
?>