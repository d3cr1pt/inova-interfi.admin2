<?php
   require_once('functions.php');
   squid_blacklist_contrato($id = $_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-9">
			<h2>Relatorio: Sites Bloqueados</h2>
		</div>
		<div class="col-sm-3 text-right">
			<a href="squid_blacklist_add.php?id_contrato=<?=$_GET['id']?>" class="btn btn-danger"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>
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
		<th>ID</th>
		<th>Site Bloqueado</th>
		<th class="text-right">Opções</th>
	</tr>
</thead>
<tbody>
<?php foreach($customers as $customer) { ?>
	<tr>
		<td><?=$customer['id']; ?></td>
		<td><?=$customer['fqdn']; ?></td>
		<td class="actions text-right">
			<a href="<?=BASEURL?>relatorios/squid_blacklist_view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
		</td>
	</tr>
<?php } /* endforeach; */?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
