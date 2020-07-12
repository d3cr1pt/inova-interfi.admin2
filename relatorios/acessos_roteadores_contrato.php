<?php
   session_start();
   require_once('functions.php');
   acessos_roteadores_contrato($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorio: Acessos (por roteador)</h2>
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
        <th>ID do Roteador</th>
        <th>Prefixo Carro</th>
        <th>Usuários Conectados&nbsp;<i class="fas fa-info-circle" title="De acordo com a última verificação"></i></th>
		<th class="text-right">Opções</th>

	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
<?php $db=open_database(); $mac_aparelho = $customer['mac_aparelho']; $query2 = $db->query("SELECT count(sessions.id) AS count FROM sessions WHERE ap = '$mac_aparelho'"); $sessions = $query2->fetch_assoc(); ?>
   <tr>
      <td><?=$customer['id_aparelho']?></td>
      <td><?=$customer['prefix_carro']?></td>
      <td><?=$sessions['count']?></td>
      <td class="text-right">
         <a href="<?=BASEURL?>aparelhos/view.php?id=<?=$customer['id']?>" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver status</a>
      </td>
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td>Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
