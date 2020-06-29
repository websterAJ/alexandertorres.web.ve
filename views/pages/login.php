<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo TITLE ?></title>
        <link rel="icon" href="<?php echo $this->BaseUrl('assets/img/logo.png');?>">
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->BaseUrl('assets/css/fonts.css');?>" />
        <link rel="stylesheet" href="<?php echo $this->BaseUrl('assets/css/style.css');?>">
        <link rel="stylesheet" href="<?php echo $this->BaseUrl('assets/css/font-awesome.css');?>">
        <link href="<?php echo $this->BaseUrl('assets/css/material-kit.min.css');?>" rel="stylesheet" />
        <link href="<?php echo $this->BaseUrl('assets/styles.css');?>" rel="stylesheet" />
    </head>
    <body>
        <div class="page-header header-filter" style="background-image: url('<?php echo $this->BaseUrl('src/img/nature-3.jpg');?>')">
            <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" action="login" method="POST">
                    <div class="card-header  card-header-primary  text-center">
                        <h4 class="card-title">Inicio de sesion</h4>
                    </div>
                    <p class="description text-center" >
                        Inicia sesion para poder modificar tu contenido
                    </p>
                    <span id="mensaje"></span>
                    <div class="card-body">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input type="text" id="user" name="user" class="form-control" placeholder="Usuario...">
                        </div>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña...">
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a id="btnLogin" class="btn btn-link btn-wd btn-lg" style="color:#ff8000"> Iniciar</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
            <nav class="float-left">
                <ul>
                    <li >
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/mcharael" target="_blank" data-original-title="Sigueme en Twitter" rel="nofollow">
                        <i class="fa fa-twitter" style="font-size:25px"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/alexander20012" target="_blank" data-original-title="Sigueme en Facebook" rel="nofollow">
                        <i class="fa fa-facebook-square" style="font-size:25px"></i>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/alexdesign_97" target="_blank" data-original-title="Sigueme en Instagram" rel="nofollow">
                        <i class="fa fa-instagram" style="font-size:25px"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                document.write(new Date().getFullYear())
                </script>,  Todos los derechos reservado
                <a href="https://www.alexandertorres.web.ve/">Alexander torres</a> .
            </div>
            </div>
        </footer>
        
<!--   Core JS Files   -->
  <script src="<?php echo $this->BaseUrl('assets/js/jquery-3.4.0.min.js');?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/core/popper.min.js');?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/core/bootstrap-material-design.min.js');?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/moment.min.js');?>"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/bootstrap-datetimepicker.js')?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/material-kit.min.js')?>" type="text/javascript"></script>

    <script>
        $("#btnLogin").click(function(){
            let user = $('#user').val();
            let pass = $('#pass').val();
            if(user == "" || pass == ""){
                setTimeout(function() {
                    $("#mensaje").html('<div class="alert alert-warning">Nigunos de los campos puede estar vacios</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                },2000);
            }else{
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'login', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function (response) {
                    if(this.responseText == 1){
                        document.location = "<?php echo _BASE_URL_; ?>index.php/dashboard";
                    }else{
                        setTimeout(function() {
                            $("#mensaje").html('<div class="alert alert-warning">'+this.responseText+'</div>');
                        },1000);
                        setTimeout(function() {
                            $("#mensaje").fadeOut(1500);
                        },2000);
                    }
                };
                xhr.send('user='+user+'&pass='+pass);
            }
        });
        
    </script>


</body>
</html>