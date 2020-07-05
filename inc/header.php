<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>InterFI Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?= BASEURL; ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?= BASEURL; ?>js/popper.min.js"></script>
    <script src="<?= BASEURL; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>font/css/all.css">
</head>
<body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="http://interfi.net"><img src="<?=BASEURL;?>img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto"><!-- lista cabeçalho -->
          <li class="nav-item active">
            <a class="nav-link" href="<?= BASEURL; ?>home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>usuario">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>funcionario">Funcionários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>aparelhos">Aparelhos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>relatorios">Relatórios</a>
          </li>
          
        </ul>
        <ul class="navbar-nav right">
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <main class="container-fluid" style="margin-top:60px;">
