<?php
include_once('../header.php');
include_once('topo.php');
include_once('../class/classUsuario.php');

$id = $_GET['id'];

$usuario = new classUsuario();
$usuario->SelectUsuario($id);
?>
<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-md-6">
                <div class="single-title">
                    <h3><?php echo ucwords($usuario->nm_usuario); ?></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="instituicoes.php">Instituições</a></li>
                        <li class="active"><?php echo $usuario->nm_usuario; ?></li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="shadow"></div>
    </div>
    <div class="container general">
        <div id="content" class="single-portfolio">

            <div class="col-md-8 ">
                <h2 class="general-title">
                    <span>Nosso Pedido</span>
                </h2>
                <table class=" table table-striped table-bordered table-hover">
                    <tr>
                        <th style="text-align:center;">Produto</th>
                        <th style="text-align:center;">Quantidade</th>
                        <th style="text-align:center;">Status</th>
                    </tr>
                    <?php
                    $sql = mysql_query("SELECT id_doacoes,cd_empresa,cd_entidad,UPPER(ds_pedidos) AS ds_pedidos,qt_quantid,ds_statuss FROM doacoes WHERE cd_entidad = " . $id);
                    while($linha = mysql_fetch_array($sql)){
                        echo                        
                            '<tr>
                                <td>
                                    '.$linha['ds_pedidos'].'
                                </td>
                                <td  style="text-align:center;">
                                    '.$linha['qt_quantid'].' 
                                </td>
                                <td  style="text-align:center;">
                                    '.$linha['ds_statuss'].'
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>

            <div class="col-md-4">
                <div class="img-responsive">
                    <?php
                    if($usuario->ds_imagens == false){
                        $img = "sem_imagem.jpg";
                    } else {
                        $img = $usuario->nr_docucpf . '/' . $usuario->ds_imagens;
                    }
                    ?>
                    <img src="<?php echo URL_BASE . 'img/usuario/' . $img; ?> " alt="">
                </div>
                <hr>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle">
                                <em class="icon-plus icon-fixed-width"></em>Doe Agora
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <ul class="portfolio-details">
                                    <li><strong>Responsável: </strong><?php echo ucwords($usuario->nm_usuario); ?></li>
                                    <li><strong>Telefone: </strong><?php echo $usuario->nr_telefon; ?></li>
                                    <li><strong>E-mail: </strong><?php echo $usuario->ds_emailss; ?></li>
                                    <li><strong>Endereço: </strong><?php echo $usuario->ds_enderec . ' - ' . $usuario->nr_enderec . ' - ' . $usuario->ds_bairros; ?></li>
                                    <li><br></li>
                                    <li><center><strong> Agradecemos a Atenção</strong></center></li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once('../footer.php');
?>