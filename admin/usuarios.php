<?php
include_once('../header.php');
include_once('../home/topo.php');
include_once('menuAdmin.php');
?>

<div class="col-lg-9 col-md-9 col-sm-9">
    <p class="lead text-muted">Usuários</p>

    <table class="table table-striped" data-effect="fade">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Rodolfo</td>
                <td>Marechal Dutra</td>
                <td>(14) 99671-6461</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Matheus</td>
                <td>Rua qualquer</td>
                <td>(14) 3263-3699</td>
            </tr>
        </tbody>
    </table>
    
</div>

<?php
include_once('fimMenuAdmin.php');
include_once('../footer.php');
?>