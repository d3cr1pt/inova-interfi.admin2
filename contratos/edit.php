<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Contrato</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
  <hr />
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Numero do Contrato</label>
      <input type="text" class="form-control" name="customer['n_contrato']" value="<?=$customer['n_contrato'];?>" required>
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">CNPJ</label>
      <input type="text" class="form-control" name="customer['cnpj']" value="<?=$customer['cnpj'];?>" required>
    </div>

    <div class="form-group col-md-4">
      <label for="name">Razao Social</label>
      <input type="text" class="form-control" name="customer['razao_social']" value="<?=$customer['razao_social'];?>" required>
    </div>

   
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="name">E-mail</label>
      <input type="text" class="form-control" name="customer['usuario_socio']" value="<?=$customer['usuario_socio'];?>" required>
    </div>

    <div class="form-group col-md-6">
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