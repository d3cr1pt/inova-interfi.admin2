<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Cliente</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo2">Nome da Rede Wifi (original)</label>
      <input type="text" class="form-control" name="customer['original_ssid']" maxlength="32" required value="Vivo-Internet-">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Senha do Wifi (original)</label>
      <input type="text" class="form-control" name="customer['original_password']" maxlength="12" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Login de Suporte</label>
      <input type="text" class="form-control" name="customer['support_user']" maxlength="24" required value="admin">
    </div>

    <div class="form-group col-md-3">
      <label for="campo4">Senha de Suporte</label>
      <input type="text" class="form-control" name="customer['support_password']" maxlength="24" required value="vivo">
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
