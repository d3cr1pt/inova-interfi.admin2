<?php
   require_once('functions.php');
   config_guest();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
   <h2>[ADM] Selecionar Contrato - Relatório: Configurar Limites</h2>
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
         <a href="config_guest_contrato.php?id=<?=$customer['id']?>" class="btn btn-danger"><i class="fas fa-cog"></i>&nbsp;Configurar</a>
      </td>
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td>Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
