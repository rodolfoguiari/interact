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
        <div id="content" class="single col-lg-12 col-md-12 col-sm-12" style="padding-top: 0px;">

            <div class="message text-center" style="padding-top: 0px;">
                <h2 style="margin: 0px;">Ajude alguma das instiuições cadastradas</h2>
                <p style="margin: 0px;">Confira quais são e como ajudá-las. Clique em cima da instituição desejada.</p>
            </div>

            <?php
            $query = "SELECT DISTINCT(doacoes.cd_entidad) AS cd_entidad, COALESCE(usuario.ds_imagens,'') AS ds_imagens, UPPER(usuario.nm_usuario) AS nm_usuario, COALESCE(usuario.nr_telefon,'') AS nr_telefon FROM doacoes
                      INNER JOIN usuario ON usuario.cd_usuario = doacoes.cd_entidad
                      WHERE doacoes.cd_empresa = 1 ORDER BY doacoes.id_doacoes DESC";
            $resultado = mysql_query($query);
            while($linha = mysql_fetch_array($resultado)){
                
                if (empty($linha['ds_imagens'])) {
                    $pasta = "sem_imagem.jpg";
                } else {

                    $img = $linha['ds_imagens'];

                    $a = explode('.', $img);
                    $pasta = $a[0];
                    $pasta = $pasta . '/' . $img;
                }
                
                $telefone = (isset($linha['nr_telefon']) && !empty($linha['nr_telefon'])) ? $linha['nr_telefon'] : 'Telefone não informado';
                
                $link = "detalhes.php?id=" . $linha['cd_entidad'];
                
                echo '<div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-bottom">
                        <div class="shop-box">
                            <div class="dm-product">
                                <div class="dm-products-wrapper">
                                    <div class="dm-product active show">
                                        <a href="'.$link.'" title="">
                                            <img src="' . URL_BASE . 'img/usuario/' . $pasta . '" alt="" />
                                        </a>
                                        <h4><a href="'.$link.'" title="">'.$linha['nm_usuario'].'</a></h4>
                                        <div class="dm-pricing">
                                            <a href="'.$link.'" title=""><span class="amount">'.$telefone.'</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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