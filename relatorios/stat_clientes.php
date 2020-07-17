<?php
   require_once('functions.php');
   stat_clientes();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
   <h2>[ADM] Selecionar Contrato - Relatório: Uso dos usuários</h2>
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
		<th>Contrato</th>
		<th class="text-right">Opções</th>

	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
   <tr>
      <td><?=$customer['razao_social']?></td>
      <td class="text-right">
         <a href="stat_clientes_contrato.php?id=<?=$customer['id']?>" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver relatório</a>
      </td>
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td>Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
