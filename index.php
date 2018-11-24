<?php
include_once('header.php');
include_once('home/topo.php');
?>

<!-- colon8, colon9, colon11 - altera a imagem de background -->
<section class="colon8">
    <div class="container">
        
        <!-- Slide Início -->
        <div class="col-sm-12 col-md-12">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <!-- SLIDE  -->
                        <?php
                        $transition = 'boxslide';
                        $sql = mysql_query("SELECT ds_galeria FROM empresa_galeria WHERE cd_empresa = 1 ORDER BY ds_galeria ASC");
                        while($qr = mysql_fetch_assoc($sql)){
                        
                            echo '<li data-transition="'.$transition.'" data-slotamount="7" data-masterspeed="1500" >
                                    <img src="img/slide/'.$qr['ds_galeria'].'" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                  </li>';
                            
                            if($transition == 'fade'){
                                $transition = 'boxslide';
                            } else {
                                $transition = 'fade';
                            }
                        
                        }
                        ?>
                        <!--<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <img src="demos/01_slider.png"   alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="100"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="800"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">HTML5 & CSS3
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="140"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">RESPONSIVE DESIGN
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="180"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">100+ VALID PAGE TEMPLATES
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="220"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1400"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">9 AWESOME SLIDER PLUGINS
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="260"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1600"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">15+ HOME EXAMPLES
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="300"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1800"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">15+ CUSTOM PAGE STYLES
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="left" data-hoffset="40"
                                 data-y="340"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">LIMITLESS COLOR COMBINATIONS
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="100"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2200"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">WOOCOMMERCE SUPPORTED
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="140"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2400"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">BUDDYPRESS SUPPORTED
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="180"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2600"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">BBPRESS SUPPORTED
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="220"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2800"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">CUSTOM BLOG TEMPLATES
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="260"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="3000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">SEO OPTIMIZED
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="300"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="3200"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">EASY TO USE FOR BEGINNERS
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="right" data-hoffset="-20"
                                 data-y="340"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="3400"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">24/7 SUPPORT VIA EMAIL
                            </div>
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="225"
                                 data-y="120"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9"><img src="demos/02_book.png" alt="">
                            </div>
                        </li>

                        <li data-transition="boxslide" data-slotamount="7" data-masterspeed="1500" >
                            <img src="demos/02_slider.png" alt="slidebg1" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <div class="tp-caption lightgrey_divider skewfromrightshort customout"
                                 data-x="85"
                                 data-y="224"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 2">
                            </div>
                            <div class="tp-caption large_bold_grey skewfromrightshort customout"
                                 data-x="78"
                                 data-y="150"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4"><span>{NEVER}</span>MIND
                            </div>
                            <div class="tp-caption small_thin_grey customin customout"
                                 data-x="80"
                                 data-y="240"
                                 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8">The {NEVER}MIND a multi purpose HTML5<br/> 
                                website template for all your needs!
                            </div>
                            <div class="tp-caption medium_bg_asbestos skewfromleft customout"
                                 data-x="80"
                                 data-y="320"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="4500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 6">100% Responsive Layout Design & Mobile Optimized!
                            </div>
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="520"
                                 data-y="170"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="2500"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9"><img src="demos/01_book.png" alt="">
                            </div>
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="480"
                                 data-y="120"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="3000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9"><img src="demos/02_book.png" alt="">
                            </div>
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="980"
                                 data-y="240"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="3500"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9"><img src="demos/03_book.png" alt="">
                            </div>
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="436"
                                 data-y="190"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="4000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9"><img src="demos/04_book.png" alt="">
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- Fim Slide Início -->

        <div class="big-message text-center" style="padding-bottom: 5px;">
            <h2 style="margin-bottom: 0px;">DE OLHO EM QUEM PRECISA</h2>
            <!--<p><i>O mundo precisa de pessoas que se preocupam com o próximo!</i></p>-->
            <p><i>"De olho em quem precisa" foi desenvolvido como um canal de comunicação entre algumas entidades, que precisam de ajuda a todo momento, e pessoas que procuram dar essa assistência à elas.
                   Entre e olhe de que forma você consegue colaborar com quem precisa!</i></p>
        </div>
        
        <div class="message text-center" style="padding-top: 5px;">
            <h2 style="margin-top: 0px; margin-bottom: 0px;">Veja abaixo algumas instituições participantes</h2>
            <p><i>Faça parte você também. <a href="<?php echo URL_BASE . 'home/login.php'; ?>">Clique aqui</a>, faça seu cadastro e anuncie. É simples e rápido!</i></p>
        </div>

        <div class="container general">
            <div class="row">
                <?php
                $query = "SELECT DISTINCT(doacoes.cd_entidad) AS cd_entidad, COALESCE(usuario.ds_imagens,'') AS ds_imagens, UPPER(usuario.nm_usuario) AS nm_usuario, COALESCE(usuario.nr_telefon,'') AS nr_telefon FROM doacoes
                          INNER JOIN usuario ON usuario.cd_usuario = doacoes.cd_entidad
                          WHERE doacoes.cd_empresa = 1 ORDER BY doacoes.id_doacoes DESC LIMIT 4";
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

                    $link = URL_BASE."home/detalhes.php?id=" . $linha['cd_entidad'];

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
            <div class="row">
                <center><a href="<?php echo URL_BASE.'home/instituicoes.php'; ?>">Visualizar mais instituições . . .</a></center>
            </div>
        </div>
        
        <!--<div class="container general">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h2 class="general-title">
                    <span>Anuncie Conosco</span>
                </h2>
                <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-left">
                    <div class="box">
                        <i class="icon-html5 active"></i>
                        <header>
                            <h3>Alta Visibilidade</h3>
                        </header>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-left">
                    <div class="box">
                        <i class="icon-laptop"></i>
                        <header>
                            <h3>100% Online</h3>
                        </header>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-left">
                    <div class="box">
                        <i class="icon-cogs"></i>
                        <header>
                            <h3>Fácil Admin</h3>
                        </header>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6" data-effect="slide-left">
                    <div class="box">
                        <i class="icon-comments-alt"></i>
                        <header>
                            <h3>24/7 Suporte</h3>
                        </header>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="clearfix"></div>
                <h2 class="general-title">
                    <span>Quatro razões INTERACT</span>
                </h2>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group" data-effect="slide-left">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <em class="icon-plus icon-fixed-width"></em>100% Anim pariatur cliche
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group" data-effect="slide-left">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                <em class="icon-plus icon-fixed-width"></em>100+ Anim pariatur cliche
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group" data-effect="slide-left">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                <em class="icon-plus icon-fixed-width"></em>Anim pariatur cliche reprehenderit
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group" data-effect="slide-left">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                <em class="icon-plus icon-fixed-width"></em>Anim pariatur cliche reprehenderit
                            </a>
                        </div>
                        <div id="collapseFour" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

    </div>

    <div class="divider"></div>    

    <div class="container">
        
        <div class="col-lg-4 col-md-4 col-sm-4" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>img/patrocinio/rotary.png" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>img/patrocinio/interact.png" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>img/patrocinio/etec.png" alt="">
            </div>
        </div>
        
        <!--
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/01_client.png" alt="">
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/02_client.png" alt="">
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/03_client.png" alt="">
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/04_client.png" alt="">
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/05_client.png" alt="">
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2" data-effect="pop">
            <div class="client">
                <img src="<?php echo URL_BASE; ?>demos/06_client.png" alt="">
            </div>
        </div>
        -->
    </div>
</section>

<?php include_once('footer.php'); ?>