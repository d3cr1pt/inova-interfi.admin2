<?php
	require_once('functions.php');
	require('../inc/modal.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Funcionários</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fas fa-plus"></i> Novo Funcionario</a>
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
		<th>Nome</th>
		<th>CPF/CNPJ</th>
		<th>Razão Social</th>
		<th>E-mail</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['name']; ?></td>
		<td><?php echo $customer['cnpj']; ?></td>
		<td><?php echo $customer['razao_social']; ?></td>
		<td><?php echo $customer['email']; ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
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
