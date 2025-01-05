<?php
header("Content-Type: text/html; charset=utf-8", true);

# ----------------------------------------
# Catch actual page
# ----------------------------------------
$activePage = basename($_SERVER['REQUEST_URI']);

# ----------------------------------------
# Cases
# ----------------------------------------
switch ($activePage) {
  case "contato":
    $title       = "";
    $description = "";
    break;

}


$keywords = "";

$proto = (isset($_SERVER['HTTPS']) === true) ? 'https' : 'http';
$canonical = $proto . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$titleHome = 'API COVID 19 - Casos de mortes por COVID-19 no Mundo';
$descriptionHome = 'Encontre aqui informações sobre os casos de mortes ocorridas por covid-19 no Mundo';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Sempre checar se está OK daqui para baixo -->
  <?php include_once 'modules/config.php'; ?>

  <base href="<?= CONF_TAG_BASE ?>">

  <!-- Title -->
  <title><?= !empty($title) ? $title : $titleHome  ?><?= !empty($title) ? ' | API COVID 19' : ''; ?></title>
  <!-- Charset -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Meta Tags -->
  <meta name="description" content="<?= !empty($description) ? $description : $descriptionHome ?>">
  <meta name="keywords" content="<?= $keywords ?>">
  <!-- Canonical -->
  <link rel="canonical" href="<?= $canonical ?>">
  <!-- OpenGraph -->
  <meta property="og:region" content="Brasil">
  <meta property="og:title" content="<?= !empty($title) ? $title : $titleHome ?>">
  <meta property="og:type" content="article">
  <meta property="og:description" content="<?= !empty($description) ? $description : $descriptionHome ?>">
  <meta property="og:site_name" content="<?= !empty($title) ? $title : $titleHome ?>">
  <meta property="og:keywords" content="<?= $keywords ?>">
  <meta property="og:canonical" content="<?= $canonical ?>">

  <meta name="author" content="Eduardo Flavio de Carvalho">
  <meta name="fone" content="11 1234-5678">
  <meta name="city" content="São Paulo">

  <!-- Daqui para baixo é padrão, não mexer -->

  <meta name="country" content="Brasil">
  <meta name="geo.region" content="-BR">
  <meta name="copyright" content="Copyright">
  <meta name="geo.position" content="-23.539351;-46.681925">
  <meta name="geo.placename" content="São Paulo-SP">
  <meta name="geo.region" content="SP-BR">
  <meta name="ICBM" content="-23.539351;-46.681925">
  <meta name="robots" content="index,follow">
  <meta name="rating" content="General">
  <meta name="revisit-after" content="2 days">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script async src="https://kit.fontawesome.com/75eaba243c.js" crossorigin="anonymous"></script>
  <!-- <script src="js/carouzel.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" crossorigin="anonymous"></script> -->
  <!-- Favicon -->
  <link rel="icon" href="img/logo/icon.ico" type="image/x-icon">

  <!-- CSS -->
  <?php include_once 'modules/css.geral.php'; ?>