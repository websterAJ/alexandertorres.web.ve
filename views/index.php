   <div class="main main-raised">
    <div class="container">
    <div class="section ">
      <div class="ml-auto mr-auto text-center">
        <h2 class="title">Bienvenidos a mi pagina web</h2>
      </div>
      <div class="section text-center">
          <img class="img-raised img-fluid" src="<?php echo $this->BaseUrl('assets/img/banner.png');?>"/>
      </div>
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Servicios</h2>
            <h5 class="description">Estos son los servicios disponible que poseemos actualmente drindado de una forma rapida y efectiva a todos nuestros distiquida clientela.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                <img src="<?php echo $this->BaseUrl('assets/img/web.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">Diseño de paginas</h4>
                <p>A la medida logrando que su empresa se posiciones en los grandes buscadores web</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                <img src="<?php echo $this->BaseUrl('assets/img/sistemas.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">Creacion de sistemas web</h4>
                <p>Para mejora el rendimiento de las operaciones de su empresa automatizando procesos para asi hacerlos mas rapido</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                <img src="<?php echo $this->BaseUrl('assets/img/clases.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">Clases online</h4>
                <p>Brindamos servicios de capacitacion via online a empresas y personal en el campo de la computacion.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Tecnologias manejadas</h2>
            <h5 class="description">Estas son algunas de las tecnologias y  herramientas de programacion mas utilizados por nosotros a la hora de prestar un servicio.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                <img src="<?php echo $this->BaseUrl('assets/img/front-end.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">HTML, CSS, JAVASCRIPT</h4>
                <p>Tres tecnologias que son usadas en la parte frontal de las paginas web para asi realizar de una forma rapida, fluida y sencilla con un toque de elegancia.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                <img src="<?php echo $this->BaseUrl('assets/img/back-end.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">PHP, MYSQL, POSTGRESQL</h4>
                <p>Utilizando algunos de los dos adminitradores de base datos y con el apoyo de  php como intermediario podemos almacenar los datos una forma seguro y rapida.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                <img src="<?php echo $this->BaseUrl('assets/img/librerias.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="info-title">ANGULAR, VUE, BOOTSTRAP</h4>
                <p>Herramientas y marcos de trabajo que nos ayudan a acelerar el proceso de porgramacion de las paginas web realizandolo de una formas mas ligeras y adaptables.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="ml-auto mr-auto text-center">
        <h3 class="title">Quieres saber mas sobre mi haz click en el siguiente link</h3>
        <a href="<?php echo $this->BaseUrl('index.php/inicio/about');?>" class="btn bg-orange btn-raised">
          Mas sobre mi
        </a>
      </div>
      <div class="section section-contacts" id="contactanos">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿ Trabajamos juntos ?</h2>
            <h4 class="text-center description">Estas interesado en trabajar con nosotros comunicate a traves del siguiente formulario de una forma sencilla y rapida.</h4>
            <form class="contact-form" action="contact" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre completo</label>
                    <input type="email" class="form-control" id="nombre" name="nombre">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                  </div>
                </div>
              </div>
              <div class="form-group">
                
                <label for="mensaje" class="bmd-label-floating">Mensaje</label>
                <textarea type="email" class="form-control" rows="4" id="mensaje" name="mensaje"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <div class="g-recaptcha text-center" data-sitekey="6LeBTe4UAAAAAO2ZxlGTgKrAtODXYI5CObHmw3EZ"></div>
                  <button class="btn bg-orange btn-raised" id="btnSend">
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
