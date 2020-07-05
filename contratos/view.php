<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>CNPJ: <?=$customer['cnpj']; ?> // <?=$customer['razao_social']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Representante do contrato:</dt>
	<dd><?=$customer['nome_socio']; ?></dd>

	<dt>Codigo de Contrato:</dt>
	<dd><?=$customer['n_contrato']?> </dd>
	

	<dt>Empresa:</dt>
	<dd><?=$customer['razao_social']; ?></dd>

	

	<dt>Usuario:(admin)</dt>
    <dd><?=$customer['usuario_socio']; ?></dd>

	<dt>E-mail:</dt>
    <dd><?=$customer['email_socio']; ?></dd>
	
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="index.php" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>