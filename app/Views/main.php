<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <!-- Character Set -->
  <meta charset="UTF-8">
  <!-- Page Title -->
  <title><?= $pageTitle ?> | INNSight</title>
  <!-- Internet Explorer version chooser -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <!-- Status Color for Mobile Browsers -->
  <meta name="apple-mobile-web-app-status-bar" content="#252362" />
  <meta name="theme-color" content="#252362" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.min.css">
  <!-- Custom CSS for Site -->
  <link rel="stylesheet" href="/assets/css/styles.css">
  <!-- Custom CSS for Page -->
  <?= @$renderStyles ?>
</head>

<body class="h-100 d-flex flex-column bg-body-tertiary">
  <?= $this->include('layouts/header') ?>
  <?= $this->renderSection('page-content') ?>
  <?= $this->include('layouts/footer') ?>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.min.js"></script>
  <!-- JS Helpers -->
  <script src="/assets/js/helpers.js"></script>
  <!-- Common JS for Site -->
  <script src="/assets/js/common.js"></script>
  <!-- Custom JS for Page -->
  <?= @$renderScripts ?>
</body>

</html>