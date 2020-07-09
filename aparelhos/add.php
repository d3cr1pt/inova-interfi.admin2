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
      <label for="name">ID Vivo</label>
      <select class="custom-select mr-sm-2" name="customer['id_vivo']" required>
      <option value="" disabled selected> Selecione </option>
      <option value="1"> Externo/Testes </option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Prefixo Carro</label>
      <input type="text" class="form-control" name="customer['prefix_carro']" maxlength="12" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">ID Aparelho</label>
      <input type="text" class="form-control" name="customer['id_aparelho']" maxlength="12" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">ID Aparelho</label>
      <input type="text" class="form-control" name="customer['mac_aparelho']" maxlength="24" required> 
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