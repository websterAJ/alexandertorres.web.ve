<div class="main main-raised">
    <div class="container">
        <div class="section section-contacts" id="contactanos">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">¿ Trabajamos juntos ?</h2>
                    <h4 class="text-center description">Estas interesado en trabajar con nosotros comunicate a traves del siguiente formulario de una forma sencilla y rapida.</h4>
                    <span id="mensaje"></span>
                    <form class="contact-form" action="contact" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre completo</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Correo</label>
                                    <input type="email" id="correo" name="correo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje" class="bmd-label-floating">Mensaje</label>
                            <textarea type="text" class="form-control" rows="4" id="mensaje"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <div class="g-recaptcha text-center" data-sitekey="6LeBTe4UAAAAAO2ZxlGTgKrAtODXYI5CObHmw3EZ"></div>
                                <button class="btn bg-orange btn-raised"  id="btnSend">
                                Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#btnSend").click(function(){
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var mensaje = $("#mensaje").val();
        if (nombre != '' && correo != '' && mensaje != '' ){
            $.ajax({
                    url: '<?php echo _BASE_URL_; ?>index.php/inicio/contact',
                    type: 'POST',
                    data: {nombre: nombre,correo: correo, mensaje:mensaje},
                    beforeSend: function(objeto){
                      setTimeout(function() {
                        $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
                            },1000);
                              setTimeout(function() {
                                $("#mensaje").fadeOut(1500);
                              },2000);
                    },
                    success: function(response){
                        if(response == 1){
                            setTimeout(function() {
                                $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Datos enviados con exito</div>');
                            },1000);
                            setTimeout(function() {
                                $("#mensaje").fadeOut(1500);
                            },2000);
                        }else{
                            setTimeout(function() {
                            $("#mensaje").html(
                                    '<div class="alert alert-warning">'+response+'</div>');
                            },1000);
                        }
                    },
                    error:function(response){
                        setTimeout(function() {
                            $("#mensaje").html('<div class="alert alert-warning">'+response+'</div>');
                        },1000);
                        setTimeout(function() {
                            $("#mensaje").fadeOut(1500);
                        },2000);
                    }
                });
        }
    });
</script>