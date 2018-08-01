<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('config/constants.php');
include_once('config/connect_base.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo LANG; ?>" xml:lang="<?php echo LANG; ?>">
    <head>

        <link href="<?php echo URL_BASE?>images/favicon.png" rel="shortcut icon" />
        <meta http-equiv="content-type" charset="<?php echo CHARSET; ?>">
        <title>INTERACT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <!-- Bootstrap Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> </link>
        <link href="<?php echo URL_BASE; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL_BASE; ?>style.css" rel="stylesheet">
        <link href="<?php echo URL_BASE; ?>css/estilo.css" rel="stylesheet">

        <!-- RS PLUGIN Styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>rs-plugin/css/settings.css" media="screen" />
        
        <!-- CSS Pessoais -->
        <link href="<?php echo URL_BASE; ?>css/jasny-bootstrap.min.css" rel="stylesheet" />
        <!-- Fim CSS Pessoais -->
        
        <!-- http://www.456bereastreet.com/archive/201209/tell_css_that_javascript_is_available_asap/ -->
        <script>
            document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
        </script>
        <script src="<?php echo URL_BASE; ?>js/modernizr.custom.js"></script>
        
        <!-- DevExpress -->
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.1.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.1.4/css/dx.common.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.1.4/css/dx.light.css" />
        <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/18.1.4/js/dx.all.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.5/cldr.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.5/cldr/event.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.5/cldr/supplemental.min.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize/message.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize/number.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize/currency.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize/date.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.6.0/jszip.min.js"></script>
        <!-- Fim DevExpress -->
        
        <!-- JS Pessoais -->
        <script src="<?php echo URL_BASE; ?>js/somentenumeros.js"></script>
        <script src="<?php echo URL_BASE; ?>js/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="<?php echo URL_BASE; ?>js/jasny-bootstrap.min.js" type="text/javascript"></script>
        <!-- Fim JS Pessoais -->

        <!-- Support for HTML5 -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Enable media queries on older browsers -->
        <!--[if lt IE 9]>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        
        <!-- Retirado do Rodapé -->
        <script src="<?php echo URL_BASE; ?>js/jquery.js"></script>
        <script src="<?php echo URL_BASE; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo URL_BASE; ?>js/retina-1.1.0.js"></script>
        <script src="<?php echo URL_BASE; ?>js/jquery.unveilEffects.min.js"></script>
        
        <script src="<?php echo URL_BASE; ?>js/fhmm.js"></script>
        <script src="<?php echo URL_BASE; ?>js/grid.js"></script>
        <script>
            $(function () {
                Grid.init();
            });
        </script>
        
        <script src="<?php echo URL_BASE; ?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script src="<?php echo URL_BASE; ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        

        <script type="text/javascript">
            var revapi;
            jQuery(document).ready(function () {
                revapi = jQuery('.tp-banner').revolution({
                    delay: 9000,
                    startwidth: 1170,
                    startheight: 450,
                    hideThumbs: 10,
                    lazyload: "off",
                    navigationStyle: "square"
                });
            });
        </script>
        <!-- Fim do Retirado do Rodapé -->
        
    </head>
    <body>
        <input type="hidden" id="resposta" />
        <div id="wrapper">