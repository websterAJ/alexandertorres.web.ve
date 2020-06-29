<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo TITLE ?></title>
        <meta name="author" content="Alexander torres | desarrollador de paginas web">
        <meta name="keyworks" content="diseño web, desarrollo web, paginas web, desarrollo, sistemas web, php, mysql, html5, css3, javascript, paginas empresariales, paginas personales, intranet, clases de programacion, clases online">
        <meta name="description" content=" Empresa dedicada al desarrollo de pagina web y sitemas para empresas y personas individuales elaboradas en un tiempo record y con la mejor tecnologia del mercado">
        <link rel="icon" href="<?php echo $this->BaseUrl('assets/img/logo.png');?>">
        <link href="<?php echo $this->BaseUrl('assets/css/material-kit.min.css');?>" rel="stylesheet" />
        <link href="<?php echo $this->BaseUrl('assets/styles.css');?>" rel="stylesheet" />
        <link href="<?php echo $this->BaseUrl('assets/css/font-awesome.css');?>" rel="stylesheet" />
        <script src="<?php echo $this->BaseUrl('assets/js/jquery-3.3.1.min.js');?>" type="text/javascript"></script>
    </head>
    <body>
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          <img src="<?php echo $this->BaseUrl('assets/img/logo.png');?>" style="width:100px;height:inherit">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/inicio/');?>">
              <i class="fa fa-home"></i> inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/inicio/about');?>">
              <i class="fa fa-user"></i> Sobre mi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/inicio/blog');?>">
              <i class="fa fa-book"></i> blog
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/inicio/contact');?>">
              <i class="fa fa-phone"></i> Contactanos
            </a>
          </li>
          
        </ul>
      </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $this->BaseUrl('assets/img/bg-1.png');?>')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Desarrollo e integración a tu medida</h1>
          <h4>Comentanos sobre lo tu idea y nosotros te ayudamos.</h4>
          <br>
          <a href="#contactanos" class="btn btn-header btn-raised btn-lg">
            <i class="fa fa-phone"></i> Trabajemos junto</a>
        </div>
      </div>
    </div>
  </div>