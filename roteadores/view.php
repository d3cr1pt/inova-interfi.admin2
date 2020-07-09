<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Aparelho <?=$aparelho['id']?> - <?=$aparelho['original_ssid']?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
    <dt>ID do Aparelho:</dt>
    <dd><?=$aparelho['id']?></dd>
    <dt>SSID do Aparelho (fábrica):</dd>
    <dd><?=$aparelho['original_ssid']?></dd>
    <dt>Senha do Wi-Fi do Aparelho:</dd>
    <dd><?=$aparelho['original_password']?></dd>
    <dt>Login de suporte:</dt>
    <dd><?=$aparelho['support_user']?></dd>
    <dt>Senha do Suporte:</dt>
    <dd><?=$aparelho['support_password']?></dd>
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="index.php" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
