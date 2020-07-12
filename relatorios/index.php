<?php
   session_start();
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Relatorios</h2>
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
		<th>Nome</th>
		<th class="text-right">Opções</th>

	</tr>
</thead>
<tbody>
   <tr>
      <td>Quantidade de acessos por roteador</td>
      <td class="text-right"><a href="acessos_roteadores.php" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver relatório</a></td>
   </tr>
   <tr>
      <td>Acessos por dia (no contrato)</td>
      <td class="text-right"><a href="acessos_contrato.php" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver relatório</a></td>
   </tr>
   <tr>
      <td>Configurar Captive Portal</td>
      <td class="text-right"><a href="configurar_captive.php" class="btn btn-danger"><i class="fas fa-cog"></i>&nbsp;Configurar</a></td>
   </tr>
   <tr>
      <td>Relatório de Usuários (conectados)</td>
      <td class="text-right"><a href="conectados_contrato.php" class="btn btn-primary"><i class="fas fa-list-ul"></i>&nbsp;Ver usuários</a></td>
   </tr>
   <tr>
      <td>Equipamentos online (no contrato)</td>
      <td class="text-right"><a href="equipamento_contrato.php" class="btn btn-primary"><i class="fas fa-list-ul"></i>&nbsp;Ver equipamentos</a></td>
   </tr>
   <tr>
      <td>Disponibilidade dos Roteadores (nos últimos dias)</td>
      <td class="text-right"><a href="disponibilidade_roteadores.php" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver relatório</a></td>
   </tr>
   <tr>
      <td>Configurar limite de Banda de navegação</td>
      <td class="text-right"><a href="config_guest.php" class="btn btn-danger"><i class="fas fa-cog"></i>&nbsp;Configurar</a></td>
   </tr>
   <tr>
      <td>Visualizar consumo de dados (por roteador)</td>
      <td class="text-right"><a href="stat_client.php" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver uso</a></td>
   </tr>
   <tr>
      <td>Configurar sites bloqueados (no contrato)</td>
      <td class="text-right"><a href="squid_blacklist.php" class="btn btn-danger"><i class="fas fa-cog"></i>&nbsp;Configurar</a></td>
   </tr>
   <tr>
      <td>Atualização dos Roteadores</td>
      <td class="text-right"><a href="firmware_upgrade.php" class="btn btn-warning"><i class="fas fa-wifi"></i>&nbsp;Verificar</a></td>
   </tr>
   <tr>
      <td>Lista de Sites Visitados (ult. 30 dias)</td>
      <td class="text-right"><a href="domain_log.php" class="btn btn-primary"><i class="fas fa-list-ul"></i>&nbsp;Ver lista</a></td>
   </tr>
   <tr>
      <td>Relatório de uso (por usuário)</td>
      <td class="text-right"><a href="guest_use.php" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Ver relatório</a></td>
   </tr>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>
