<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<h1>Dashboard</h1>
<hr />

<?php if ($db) : ?>

<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="<?php echo BASEURL;?>funcionario/add.php" class="btn btn-primary">
			<div class="row">
				<div class="col-12 text-center">
					<i class="fas fa-plus fa-5x"></i>
				</div>
				<div class="col-12 text-center">
					<p>Adicionar<br> Funcionario</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="<?php echo BASEURL;?>usuario" class="btn btn-light">
			<div class="row">
				<div class="col-12 text-center">
					<i class="fas fa-user fa-5x"></i>
				</div>
				<div class="col-12 text-center">
					<p><br>Usuários</p>
				</div>
			</div>
		</a>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
