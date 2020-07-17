<?php
   require_once('functions.php');
   config_guest_contrato($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorio: Configurar Limites</h2>
		</div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>


<table class="table table-hover table-light">
<thead class="thead-light">
	<tr>
        <th>Configuração</th>
        <th>Valor Atual</th>
		<th class="text-right">Opções</th>

	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
   <tr>
      <td><?=$customer['note']?></td>
      <td><?=$customer['value']?></td>
      <td class="text-right">
         <?php if($customer['param'] != 'site_unifi' || isADM2()) {?><a href="<?=BASEURL?>relatorios/config_guest_edit.php?id=<?=$customer['id']?>" class="btn btn-danger"><i class="fas fa-pen"></i>&nbsp;Editar Valor</a> <?php } ?>
      </td>
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td>Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
