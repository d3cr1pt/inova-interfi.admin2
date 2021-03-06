<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Aparelho <?=$aparelho['id_aparelho']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
    <?php
        require('../inc/ubnt.php');
        $unifi_connection = new UniFi_API\Client(UNIFI_LOGIN, UNIFI_PASSWORD, UNIFI_SERVER, 'default', UNIFI_VERSION, false);
        $login            = $unifi_connection->login();    
        $status_aparelho  = $unifi_connection->list_devices($aparelho['mac_aparelho']);
        $info_aparelho = json_decode(json_encode($status_aparelho),true);
    ?>
    <dt>Status:</dt>
    <?php if(isset($info_aparelho[0]['uptime'])) { echo '<dd class="text-success"><i class="fas fa-wifi">>/i>&nbsp;Online'; } else { echo '<dd class="text-danger"><span class="iconify" data-icon="uil-wifi-slash" data-inline="false"></span>&nbsp;Offline';}?></dd>
    <dt>Atualização Disponivel:</dt>
    <dd><?php if(isset($info_aparelho[0]['upgradable'])) { if($info_aparelho[0]['upgradable']) { echo '<a href="upgrade.php?id="'.$aparelho['id'].' class="btn btn-warning"><i class="fas fa-sync-alt"></i>&nbsp;Instalar Atualizações</a>';} else { echo 'Todas Atualizações Instaladas'; } } else { echo "Verificação Indisponível. Cheque status do dispositivo.";}?></dd>
	<dt>CNPJ:</dt>
	<dd><?=$customer['cnpj']; ?></dd>
    <dt>Razão Social:</dt>
    <dd><?=$customer['razao_social']; ?></dd>
    <dt>ID do Aparelho:</dt>
    <dd><?=$aparelho['id_aparelho']?></dd>
    <dt>Prefixo do Carro:</dd>
    <dd><?=$aparelho['prefix_carro']?></dd>
    <dt>MAC do Aparelho:</dd>
    <dd><?=$aparelho['mac_aparelho']?></dd>
    <dt>ID do Roteador Vivo:</dt>
    <dd><?=$aparelho['id_vivo']?></dd>
<?php if(isset($info_aparelho[0]['uptime'])) { ?>
        <dt>*Dispositivos Conectados:</dt>
        <dd><?=$sessions['usuarios_conectados']?> dispositivo(s)</dd>
        <p class="text-muted">* De acordo com a última verificação, quando o dispositivo esteve on-line.
<?php } ?>
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
