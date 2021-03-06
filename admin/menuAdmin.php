<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="single-title">
                    <h3>Administração</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo URL_BASE; ?>">Início</a></li>
                        <li class="active">Administração</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>
    
    <div class="container general">
        <div id="content" class="single col-lg-12 col-md-12 col-sm-12">
            
            <div class="col-lg-3 col-md-3 col-sm-3">
                <ul class="dm-sidebar-nav">
                    <?php if($_SESSION['aceUsuario'] >= 3){ ?>
                        <li><a href="slide.php">Slide Início</a></li>
                        <li><a href="galeriaInteract.php">Galeria do Projeto</a></li>
                        <li><a href="sobre.php">Sobre Nós</a></li>
                    <?php
                    }
                    
                    if($_SESSION['aceUsuario'] < 3){
                        $labelUser = 'Meus Dados';
                    } else {
                        $labelUser = 'Usuários / Instituições';
                    }
                    
                    ?>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="usuarios.php"><?php echo $labelUser; ?></a></li>
                    <li><a href="javascript:void(0);" onclick="sairAdmin()">Sair</a></li>
                </ul>
            </div>