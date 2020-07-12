<?php
   require_once('functions.php');
   // acessos_roteadores_contrato($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorio: Acessos (por dia)</h2>
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
        <th>Dia</th>
        <th>Usuários Conectados&nbsp;<i class="fas fa-info-circle" title="De acordo com a última verificação"></i></th>

	</tr>
</thead>
<tbody>
<?php for($i=0;$i<31;$i++) { ?>
<?php $today = date_create(date('Y-m-d')); $yesterday = date_sub($today, date_interval_create_from_date_string("$i days")); $id_contrato = $_SESSION['id_contrato']; $db=open_database(); $yesterday_string = $yesterday->format("Y-m-d"); $SQL = "SELECT count(sessions.id) AS count FROM sessions LEFT JOIN users ON sessions.user_id=users.id WHERE id_contrato = '$id_contrato' AND lastlog LIKE '$yesterday_string%'"; $query2 = $db->query($SQL); $sessions = $query2->fetch_assoc(); ?>
   <tr>
      <td><?=$yesterday->format("d/m/Y")?></td>
      <td><?=$sessions['count']?></td>
   </tr>
<?php } /* endfor; */?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
