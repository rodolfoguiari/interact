            <footer class="footer-wrapper">
                <div class="container">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Sobre o INTERACT</span>
                            </h2>
                            <?php
                            $sqlSobre = mysql_query("SELECT ds_txttopo FROM empdetalhe WHERE cd_empresa = 1");
                            $qrSobre = mysql_fetch_assoc($sqlSobre);
                            echo '<p>'.substr($qrSobre['ds_txttopo'],0,140).' . . .</p>';
                            ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo URL_BASE . 'home/sobre.php' ?>">Ler Mais</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Galeria</span>
                            </h2>
                            <ul class="flickr">
                                <?php
                                $sqlGaleria = mysql_query("SELECT ds_galeria AS galRodape FROM galeria_projeto WHERE cd_empresa = 1 ORDER BY ds_galeria DESC LIMIT 10");
                                while($qr = mysql_fetch_array($sqlGaleria)){
                                    echo '<li><a href="javascript:void(0);" title="">
                                            <img class="img-thumbnail img-rounded" src="'.URL_BASE.'/img/galeria/thumb/'.$qr['galRodape'].'" width="54" height="54" alt="" onclick="viewImgProjeto(\''.$qr['galRodape'].'\')">
                                          </a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Twitter Stream</span>
                            </h2>
                            <div class="tweets">
                                <ul>
                                    <li>
                                        <span class="content">
                                            Looking a special HTML5 CSS3 template for your works? Visit here
                                            <a href="http://goo.gl/eVrkdq">http://goo.gl/eVrkdq</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <a href="https://twitter.com/envato" class="twitter-follow-button" data-show-count="false">Follow @envato</a>
                            <script>!function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + '://platform.twitter.com/widgets.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'twitter-wjs');</script>
                        </div>
                    </div>
                    -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Contato</span>
                            </h2>
                            <ul class="contact-details">
                                <?php
                                $sql = mysql_query("SELECT empresa.ds_enderec, empresa.nr_enderec, cidade.nm_cidade, empresa.nr_telefo1, empresa.ds_interne FROM empresa
                                                    INNER JOIN cidade ON (empresa.cd_cidades = cidade.cd_cidade)");
                                $qr = mysql_fetch_assoc($sql);
                                $ds_enderec = $qr['ds_enderec'];
                                $nr_enderec = $qr['nr_enderec'];
                                $nm_cidades = $qr['nm_cidade'];
                                $nr_telefo1 = $qr['nr_telefo1'];
                                $ds_interne = $qr['ds_interne'];
                                $url_google = 'https://www.google.com.br/maps/preview?q=' . $ds_enderec . ', ' . $nr_enderec . ', ' . $nm_cidades;
                                ?>
                                <li><i class="icon-home"></i> <?php echo $ds_enderec . ', ' . $nr_enderec . ' / ' . $nm_cidades; ?></li>
                                <li><i class="icon-mobile-phone"></i> <?php echo $nr_telefo1; ?></li>
                                <li><i class="icon-envelope-alt"></i> <?php echo $ds_interne; ?></li>
                                <li><i class="icon-map-marker"></i> <a href="<?php echo $url_google; ?>" title="Visualizar diretamente no Google" target="_blank">Google Map</a></li>  
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright-wrapper">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <span class="copyright">
                            © <?php echo date('Y'); ?> <a href="javascript:void(0);">INTERACT</a> | Todos os direitos reservados
                        </span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <nav>
                            <ul class="footer-menu">
                                <li><a href="<?php echo URL_BASE; ?>" title="#">Início</a></li>
                                <li><a href="<?php echo URL_BASE.'home/sobre.php'; ?>" title="#">Sobre Nós</a></li>
                                <li><a href="<?php echo URL_BASE.'home/galeriaProject.php'; ?>" title="#">Galeria</a></li>
                                <li><a href="<?php echo URL_BASE.'home/instituicoes.php'; ?>" title="#">Instituições</a></li>
                                <li><a href="<?php echo URL_BASE.'home/contato.php'; ?>" title="#">Contato</a></li>
                                <li><a href="<?php echo URL_BASE.'home/login.php'; ?>" title="#">Área Restrita</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="dmtop">Ir para o topo</div>
        </div>
        
        <div class="modal" id="modalViewProj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tabbable">
                            <div class="row">
                                <div class="col-md-12">
                                    <img alt="" id="input_view_project">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo URL_BASE; ?>js/application.js"></script>

        <script type="text/javascript">
            
            $(document).ready(function(){
                $("#modalViewProj").on('hidden.bs.modal', function(){
                    $("#input_view_project").attr("src","");
                });
            });
            
            function AvisoDev(msg,tipo,time,posicao){
                
                if(posicao == false){
                    var pos = 'center';
                } else {
                    var pos = posicao;
                }
                
                DevExpress.ui.notify({
                    message: msg,
                    position: {
                        my: pos,
                        at: pos,
                        of: window
                    },
                    closeOnOutsideClick: true,
                    type: tipo,
                    width:'500',
                    displayTime:time
                });
                
            }
            
            function viewImgProjeto(img){
                $("#input_view_project").attr("src","<?php echo URL_BASE . 'img/galeria/'; ?>" + img);
                $("#modalViewProj").modal('show');
            }
            
        </script>
        
    </body>
</html>