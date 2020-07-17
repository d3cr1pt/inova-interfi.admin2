<?php
   require_once('functions.php');
   require_once('../inc/modal.php');
   global $customers;
   $db = open_database();
   $SQL2 = "SELECT domain FROM requests GROUP BY domain LIMIT 1200";
   $query2 = $db->query($SQL2);
   $customers=[]; while($customer=$query2->fetch_assoc()) { $customers[]=$customer; }
?>

<?php include(HEADER_TEMPLATE); ?>
<script>
   function bloquear(id,id_contrato) {
      data = {
         url: "squid_blacklist_add_hidden.php",
         fqdn: id,
         id_contrato: id_contrato
      }
      if(confirm("Deseja bloquear este site "+id+"? "))
      $.post(data.url,data,function() {
         alert("Site "+id+" bloqueado!");
         window.location.reload();
      });
   }
</script>
<header>
	<div class="row">
		<div class="col-sm-9">
			<h2>Relatorio: Sites Acessados</h2>
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
        <th>Site</th>
        <th>Bloquear</th>
	</tr>
</thead>
<tbody>
<?php if(count($customers) > 0){ ?>
<?php foreach($customers as $customer): ?>
   <tr>
      <td><?=$customer['domain']?></td>
      <td>
      <?php
         $db2 = open_database();
         $SQL2 = "SELECT * FROM black_list WHERE fqdn = '".$customer['domain']."' AND id_contrato ='".$_SESSION['id_contrato']."'";
         $query = $db2->query($SQL2);
         if($query->num_rows == 0 ) {
      ?>
         <a href="#" onclick="bloquear('<?=$customer['domain']?>',<?=$_SESSION['id_contrato']?>)" class="btn btn-danger">Bloquear</a>
         <?php } else { echo "Bloqueado neste contrato!"; }?>
      </td>
	  
   </tr>
<?php endforeach;?>
<?php } else { ?>
<tr><td colspan="3">Não foi encontrado registros.</td></tr>
<?php } ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
