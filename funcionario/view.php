<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Empresa <?php echo $customer['cnpj']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Responsavel:</dt>
	<dd><?php echo $customer['name']; ?></dd>

	<dt>CNPJ:</dt>
	<dd><?php echo $customer['cnpj']; ?></dd>

	<dt>E-mail:</dt>
    <dd><?php echo $customer['email']; ?></dd>
    
    <dt>Razão Social:</dt>
    <dd><?php echo $customer['razao_social']; ?></dd>
    
    <dt>Dispositivos Conectados:</dt>
    <dd><?=$sessions['usuarios_conectados']?> dispositivo(s)</dd>
</dl>

<?php foreach($aparelhos as $aparelho): ?>
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
    <h2>Aparelho <?=$aparelho['id_aparelho']?></h2>
    <hr>
    <dt>Status:</dt>
    <?php if(isset($info_aparelho[0]['uptime'])) { echo "<dd class='text-success'><i class='fas fa-wifi'></i>&nbsp;Online"; } else { echo "<dd class='text-danger'><i class='fas fa-wifi'></i>&nbsp;Offline"; } ?></dd>
    <dt>MAC do Aparelho:</dt>
    <dd><?=$aparelho['mac_aparelho']?></dd>
    <?php 
        if(isset($info_aparelho[0]['upgradable'])) {
            if($info_aparelho[0]['upgradable'] == "true") {
                ?>
                    <br>
                    <dd>Atualização Disponível:</dd>
                    <dt><a href="../aparelhos/upgrade.php?id=<?=$aparelho['id']?>"></a></dt>
                    <br>
                <?php
            }
        }
    ?>
    
    <?php 
        if(isset($info_aparelho[0]['uptime'])) {
            echo '<br><a href="../aparelhos/restart.php?id='. $aparelho['id'] .'" class="btn btn-warning font-weight-bolder"><i class="fas fa-sync-alt"></i>&nbsp;Reiniciar o aparelho</a><br>';
        }
    ?>
    <br>
<?php endforeach; ?>

<div id="actions" class="mt-2 row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>