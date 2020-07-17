<?php 
	require_once('functions.php'); 
	squid_blacklist_view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Site #<?=$customer['id']?> - <?=$customer['fqdn']?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<b>Site:</b>
	<?=$customer['fqdn']; ?>
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="squid_blacklist_delete.php?id=<?php echo $customer['id']; ?>" class="btn btn-danger text-dark"><i class="fas fa-trash-alt"></i>&nbsp;Deletar</a>
	  <a href="index.php" class="btn btn-primary text-white">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>