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
                <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Sigueme en Instagram" rel="nofollow">
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
        <a href="https://www.alexandertorres.web.ve/" target="_blank">Alexander torres</a> .
      </div>
    </div>
  </footer>
<!--   Core JS Files   -->
  
  <script src="<?php echo $this->BaseUrl('assets/js/core/popper.min.js');?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/core/bootstrap-material-design.min.js');?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/moment.js');?>"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="<?php echo $this->BaseUrl('assets/js/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo $this->BaseUrl('assets/js/material-kit.min.js')?>" type="text/javascript"></script>

  <script>
   $("#btnSend").click(function(){
            let nombre = $('#nombre').val();
            let correo = $('#correo').val();
            let mensaje = $('#mensaje').val();
            if(nombre == "" || correo == "" || mensaje == ""){
                setTimeout(function() {
                    $("#mensaje").html('<div class="alert alert-warning">Nigunos de los campos puede estar vacios</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                },2000);
            }else{
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'contact', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if(this.responseText == 1){
                      setTimeout(function() {
                        $("#mensaje").html('<div class="alert alert-success">Gracias por comunicarte con nosotros :) !!</div>');
                      },1000);
                      setTimeout(function() {
                          $("#mensaje").fadeOut(1500);
                      },2000);
                    }else{
                        setTimeout(function() {
                            $("#mensaje").html('<div class="alert alert-success">'+this.responseText+'</div>');
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