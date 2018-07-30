            <footer class="footer-wrapper">
                <div class="container">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Sobre INTERACT</span>
                            </h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p> 
                            <a class="btn btn-primary btn-sm" href="javascript:void(0);">Ler Mais</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h2 class="general-title">
                                <span>Galeria</span>
                            </h2>
                            <ul class="flickr">
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/01_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/02_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/03_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/04_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/05_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/06_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/07_flickr.jpg" width="54" height="54" alt="" /></a></li>
                                <li><a href="javascript:void(0);" title=""><img class="img-thumbnail img-rounded" src="<?php echo URL_BASE; ?>demos/08_flickr.jpg" width="54" height="54" alt="" /></a></li>
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
                            <!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac.</p>-->
                            <ul class="contact-details">
                                <li><i class="icon-home"></i> Avenida Padre Salústio Rodrigues Machado, 1000 / Lençóis Paulista</li>
                                <li><i class="icon-mobile-phone"></i> (14) 3263 - 0000</li>
                                <li><i class="icon-envelope-alt"></i> contato@interact.com.br</li>
                                <li><i class="icon-map-marker"></i> <a href="javascript:void(0);" title="Visualizar diretamente no Google">Google Map</a></li>  
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
                                <li><a href="javascript:void(0);" title="#">Início</a></li>
                                <li><a href="javascript:void(0);" title="#">Contato</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="dmtop">Ir para o topo</div>
        </div>
        
        <script src="<?php echo URL_BASE; ?>js/application.js"></script>

        <script type="text/javascript">
            
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
            
        </script>
        
    </body>
</html>