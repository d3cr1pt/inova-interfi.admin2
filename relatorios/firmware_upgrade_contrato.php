<?php
   require_once('functions.php');
   require_once('../inc/ubnt.php');
   $id_contrato = $_GET['id'];
   $db = open_database();
   $SQL = "SELECT * FROM settings WHERE param = 'site_unifi' AND id_contrato = '$id_contrato'";
   $query = $db->query($SQL);
   $param = $query->fetch_assoc();
   $unifi_site = $param['value'];
   $unifi_connection = new UniFi_API\Client(UNIFI_LOGIN, UNIFI_PASSWORD, UNIFI_SERVER, $unifi_site, UNIFI_VERSION, false);
   $login = $unifi_connection->login();
   global $customers;
   $SQL2 = "SELECT * FROM aparelhos WHERE id_contrato = '$id_contrato'";
   $query2 = $db->query($SQL2);
   $customers=[]; while($customer=$query2->fetch_assoc()) { $customers[]=$customer; }
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-9">
			<h2>Relatorio: Atualização dos Roteadores</h2>
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


<table class="table table-hover table-light">
<thead class="thead-light">
	<tr>
        <th>Status</th>
        <th>Roteador</th>
<?php if(isADM()) { ?><th>MAC do Roteador</th><?php } ?>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
<?php $status_aparelho  = $unifi_connection->stat_daily_aps((date_timestamp_get($date = date_create())-(24*60*60)),date_timestamp_get(date_create()),$customer['mac_aparelho']); ?>
<?php $info_aparelho = json_decode(json_encode($status_aparelho),true); ?>
   <tr>
      <?php if(isset($info_aparelho[0]['uptime'])) { echo '<td><i class="fas fa-wifi">>/i>&nbsp;Online</td>'; } else { echo '<td><span class="iconify" data-icon="uil-wifi-slash" data-inline="false"></span>&nbsp;Offline</td>';}?></dd>
      <td>InterFI <?=$customer['id_aparelho']?> / <?=$customer['prefix_carro']?></td>
      <?php if(isADM()) { ?><td><?=$customer['mac_aparelho']?></td><?php } ?>
      <td>
         <?php if(isset($info_aparelho[0]['upgradable'])) { if($info_aparelho[0]['upgradable']) { echo '<a href="upgrade.php?id="'.$aparelho['id'].' class="btn btn-warning"><i class="fas fa-sync-alt"></i>&nbsp;Instalar Atualizações</a>';} else { echo 'Todas Atualizações Instaladas'; } } else { echo "Verificação Indisponível. Cheque status do dispositivo.";}?>
      </td>
	  
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td colspan="3">Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
