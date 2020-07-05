<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
  <hr />
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="customer['name']" value="<?=$customer['name'];?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">E-mail</label>
      <input type="text" class="form-control" name="customer['email']" value="<?=$customer['email'];?>" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Senha</label>
      <input type="password" class="form-control" name="pass" required>
    </div>
  </div>
  <input type="hidden" value="1" name="customer['id_contrato']">
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>