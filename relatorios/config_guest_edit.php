<?php 
  require_once('functions.php'); 
  config_guest_edit($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Configuração: <?=$captive['note']?></h2>

<form action="configurar_captive_edit.php?id=<?=$captive['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="name">Configuração</label>
      <input type="text" class="form-control" name="customer['name']" value="<?=$captive['note'];?>" disabled>
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Valor Atual</label>
      <input type="text" class="form-control" name="ignored" value="<?=$captive['value'];?>" disabled>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Novo Valor</label>
      <input type="text" class="form-control" name="customer['value']" required>
    </div>
  </div>
  <input type="hidden" value="1" name="customer['id_contrato']">
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="config_guest.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>