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
    <div class="form-group col-md-3">
      <label for="name">Contrato</label>
      <select class="custom-select" name="customer['id_contrato']">
        <?php foreach($contratos as $contrato):?>
          <option value="<?=$contrato['id']?>"><?=$contrato['cnpj']?> - <?=$contrato['razao_social']?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="customer['name']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">E-mail</label>
      <input type="text" class="form-control" name="customer['email']">
    </div>

    <div class="form-group col-md-2">
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
