<?php 
	session_start();
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Usuário #<?=$customer['id']?> - <?=$customer['fullname']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome do Usuário:</dt>
	<dd><?=$customer['fullname']; ?></dd>

	<dt>Idade:</dt>
	<dd><?=$customer['birthdate']; ?></dd>

	<dt>E-mail:</dt>
    <dd><?=$customer['username']; ?></dd>
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="index.php" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>