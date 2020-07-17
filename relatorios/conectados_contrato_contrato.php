<?php
   require_once('functions.php');
   conectados_contrato_contrato($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorio: Usuários cadastrados</h2>
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
		<th>Nome</th>
		<th>Idade</th>
		<th>MAC do Dispositivo</th>
		<th>E-mail</th>
		<th class="text-right">Mais Informações</th>
	</tr>
</thead>
<tbody>
<?php foreach($customers as $customer) { ?>
	<tr>
		<td><?=$customer['id']; ?></td>
		<td><?=$customer['fullname']; ?></td>
		<td><?=$customer['birthdate']; ?></td>
		<td><?=$customer['device']; ?></td>
		<td><?=$customer['username']; ?></td>
		<td class="actions text-right">
			<a href="<?=BASEURL?>usuario/view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
		</td>
	</tr>
<?php } /* endforeach; */?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
