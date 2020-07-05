<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Funcionário</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Numero do Contrato</label>
      <input type="text" class="form-control" name="customer['n_contrato']">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Razão Social </label>
      <input type="text" class="form-control" name="customer['razao_social']">
    </div>

    <div class="form-group col-md-4">
      <label for="name">Cnpj</label>
      <input type="text" class="form-control" name="customer['cnpj']">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Nome </label>
      <input type="text" class="form-control" name="customer['nome_socio']">
    </div>

    <div class="form-group col-md-4">
      <label for="name">Nome de usuario</label>
      <input type="text" class="form-control" name="customer['usuario_socio']">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">E-mail</label>
      <input type="text" class="form-control" name="customer['email_socio']">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">Senha</label>
      <input type="password" class="form-control" name="pass">
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