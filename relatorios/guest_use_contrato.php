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
   echo $SQL2 = "SELECT * FROM users WHERE id_contrato = '$id_contrato'";
   $query2 = $db->query($SQL2);
   $customers=[]; while($customer=$query2->fetch_assoc()) { $customers[]=$customer; }
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorio: Uso dos usuários</h2>
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
        <th>Uso de Dados:</th>
        <th>Nome</th>
        <th>E-mail</th>
<?php if(isADM()) { ?><th>MAC do Aparelho do Usuário</th><?php } ?>
		<th class="text-right">Opções</th>
	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
<?php $status_aparelho  = $unifi_connection->list_clients($customer['device']); ?>
<?php $info_aparelho = json_decode(json_encode($status_aparelho),true); ?>
   <tr>
      <td><?php if(!$info_aparelho) { echo "0MB"; } /* não consigo ver ainda, pq nao tem dados mas tem que colocar o echo do valor correto*/?></td>
      <td><?=$customer['fullname']?></td>
      <td><?=$customer['username']?></td>
      <td><?=$customer['device']?></td>
      <td class="text-right">
         <a href="<?=BASEURL?>usuario/view.php?id=<?=$customer['id']?>" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Visualizar</a>
      </td>
	  
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td colspan="3">Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
