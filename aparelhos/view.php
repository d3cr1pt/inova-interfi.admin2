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
        /* Controller Server */
        $unifiServer =  "https://ubnt.interfi.net:8443";  
        /* Controller admin user */
        $unifiUser = "d3cr1pt";
        /* Controller admin pass */
        $unifiPass = "xyloksmith1@";
        /* Controller version */
        $unifiVersion = "5.13.29";
        /* Controller site */
        $unifiSite = "default";
        $unifi_connection = new UniFi_API\Client($unifiUser, $unifiPass, $unifiServer, $unifiSite, $unifiVersion, false);
        $login            = $unifi_connection->login();    
        $aparelho['mac_aparelho'];
        $status_aparelho  = $unifi_connection->list_devices($aparelho['mac_aparelho']);
        $info_aparelho = json_decode(json_encode($status_aparelho),true);
    ?>
    <dt>Status:</dt>
    <?php if(isset($info_aparelho[0]['uptime'])) { echo '<dd class="text-success"><i class="fas fa-wifi">>/i>&nbsp;Online'; } else { echo '<dd class="text-danger"><i class="fas fa-wifi"></i>&nbsp;Offline';}?></dd>
    <dt>Atualização Disponivel:</dt>
    <dd><?php if(isset($info_aparelho[0]['upgradable'])) { if($info_aparelho[0]['upgradable']) { echo '<a href="upgrade.php?id="'.$aparelho['id'].' class="btn btn-warning"><i class="fas fa-sync-alt"></i>&nbsp;Instalar Atualizações</a>';} else { echo 'Todas Atualizações Instaladas'; } } else { echo "Verificação Indisponível. Cheque status do dispositivo.";}?></dd>
	<dt>CNPJ:</dt>
	<dd><?=$customer['cnpj']; ?></dd>
    <dt>Razão Social:</dt>
    <dd><?=$customer['razao_social']; ?></dd>
    <dt>ID do Aparelho</dt>    
    <dd><?=$aparelho['id_aparelho']?></dd>
    <dt>Prefixo do Carro</dd>    
    <dd><?=$aparelho['prefix_carro']?></dd>
    <dt>MAC do Aparelho</dd>    
    <dd><?=$aparelho['mac_aparelho']?></dd>
    <dt>Dispositivos Conectados:</dt>
    <dd><?=$sessions['usuarios_conectados']?> dispositivo(s)</dd>
</dl>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="index.php" class="btn btn-primary">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>