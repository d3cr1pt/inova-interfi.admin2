<?php 
  require_once('functions.php'); 
  squid_blacklist_add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Bloquear Site</h2>

<form action="squid_blacklist_add.php?id_contrato=<?=$_GET['id_contrato']?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="name">Contrato</label>
      <input type="text" class="form-control" name="customer[id_contrato]" value="<?=$_GET['id_contrato'];?>" readonly>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Novo Site (FQDN)</label>
      <input type="text" class="form-control" name="customer[fqdn]" required>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>