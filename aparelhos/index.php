<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Aparelhos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary font-weight-bolder" href="index.php"><i class="fas fa-sync-alt"></i> Atualizar</a>
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


<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Aparelho</th>
		<th width="30%">Prefixo Carro</th>
		<th>MAC</th>
		<th class="text-right">Opções</th>

	</tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['id_aparelho']; ?></td>
		<td><?php echo $customer['prefix_carro']; ?></td>
		<td><?php echo $customer['mac_aparelho']; ?></td>
		<td class="actions text-right">
			<a href="restart.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Reiniciar Aparelho </a>
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Visualizar</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
