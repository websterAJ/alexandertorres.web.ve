<div class="profile-page sidebar-collapse">
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="<?php echo $this->BaseUrl('assets/img/face.png');?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Alexander torres</h3>
                <h6>Programador y desarrollador web</h6>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>Programa desde los 14 años de edad siempre caracterizandome por ser una persona muy autodidacta alcanzado mucho mas alla de las metas trazadas, me concidero una persona creativas, inovadora, atenta y dispuesta a ayudar a las personas a mi alrededor siempre que este en mi alcanze dando mi conocimiento a otros y asi ayudarlos en todo lo que pueda . </p>
        </div>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="fa fa-book"></i> Estudios
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="fa fa-briefcase"></i> Trabajos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#lenguajes" role="tab" data-toggle="tab">
                    <i class="fa fa-github"></i> Portafolios
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="studio">
            <div class="row">
              <div class="col-md-6 ml-auto">
                <ul>
                  <li>
                    <h4>Secundaria</h4>
                    <ul>
                      <li> 
                        <p>
                          U.E.N la Ceiba del alto <br/>
                          Ciclo diversificado - <b>Bachiller en ciencia</b>

                        </p> 
                      </li>
                    </ul>
                  </li>
                  <li>
                    <h4>Superior</h4>
                    <ul>
                      <li> 
                        <p>
                          Instituto Universitario Tecnologia Venezuela - IUTV <br/>
                          5° Semetres en informatica - <b>Aprobado</b>
                        </p> 
                      </li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              <div class="col-md-6 mr-auto">
                <h4>Cursos</h4>
                <h6>Cursos realizados en el Centro de estudio en tecnologia multimedia</h6>
                <ul>
                  <li><p><b>Php y mysql</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Wordpress</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>html, css, javascript</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>C++</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Java</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Python</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Visual Basic</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Excel</b> - basico, intermedio y avanzado</p></li>
                  <li><p><b>Manejo de programas offimaticos</b> - basico, intermedio y avanzado</p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="works">
            <div class="row">
              <div class="col-md-12 ml-auto">
                <ul>
                  <li>
                    <p>
                      <b>2013 - 2014 </b> 
                      Diseñador web Y Técnico de computadora. - <b> Sistempro C.A. </b> 
                    </p>
                  </li>
                  <li>
                    <p>
                      <b>2015 - 2017 </b> 
                      Gerente de operaciones, Facilitador Y desarrollador web - <b> 
Centro de Estudio en Tecnologia Multimedia CETM C.A </b> 
                    </p>
                  </li>
                  <li>
                    <p>
                      <b>2019</b> 
                      Analista de desarrollo - <b> Soluciones Integrales Gis C.A </b> 
                    </p>
                  </li>
                  <li>
                    <p>
                      <b>Actualmente</b> 
                        Tecnico en informatica - <b> Proteccion civil Distrito capital C.A </b> 
                    </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="lenguajes">
            <div class="container">
              <h5>Todos los sistemas, archivos y imagenes aqui mostradas son realizadas por mi personas para proyectos tanto empresariales, personales o para cursos, todos los archivos estan publicados en mi cuenta personal de GITHUB</h5>
              <ul>
                <?php 
                  if(isset($this->Attach['portafolio'])):
                    foreach($this->Attach['portafolio'] as $value):?>
                      <li>
                        <p>
                          <b><?php echo $value['titulo']?></b> - 
                          <?php echo $value['descripcion']?>
                          <a href="<?php echo $value['repositorio']?>">Repositorio</a>
                        </p>
                      </li>
                <?php 
                    endforeach;
                  endif;?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
