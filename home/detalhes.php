<?php
include_once('../header.php');
include_once('topo.php');
$id = $_GET['id'];
$query1='select * from usuario where cd_usuario='.$id.'';
$usuario = mysql_query($query1);
$usuario = mysql_fetch_array($usuario, MYSQLI_ASSOC);
?>
<section class="colon14">
    <div class="singleheader">
        <div class="container">
            <div class="col-md-6">
                <div class="single-title">
                    <h3><?php echo $usuario['nm_usuario'] ?></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-container">
                    <ul class="breadcrumb">
                        <li><a href="instituicoes.php">Instituições</a></li>
                        <li class="active"><?php echo $usuario['nm_usuario'] ?></li>
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
                    $query2 = 'SELECT id_doacoes,cd_empresa,cd_entidad,ds_pedidos,qt_quantid,ds_statuss'
                              . ' FROM doacoes where cd_entidad='.$id.'';
                    $resultado=mysql_query($query2);
                    while ($linha = mysql_fetch_array($resultado, MYSQLI_ASSOC)) {
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
                    <img class="logos" src="<?php echo URL_BASE . 'img/logos/' . $usuario['ds_logoemp']?> " alt="">
                </div>

                <div class="clearfix"></div>
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
                                    <li><strong>Responsável :</strong> Joao Pedro</li>
                                    <li><strong>Telefone :</strong><?php echo $usuario['nr_telefon'] ?></li>
                                    <li><strong>E-mail :</strong><?php echo $usuario['ds_emailss'] ?></li>
                                    <li><strong>Endereço :</strong><?php echo $usuario['ds_enderec'].' - '
                                                                    .$usuario['nr_enderec']. ' - '.$usuario['ds_bairros'] ?></li>
                                    <li><br></li>
                                    <li><center><strong> Agradecemos a Atenção</strong></center></li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div><!-- end accordion -->
            </div><!-- end col-4 -->

        </div><!-- content -->
    </div><!-- end general -->

</section>

<?php
include_once('../footer.php');
?>