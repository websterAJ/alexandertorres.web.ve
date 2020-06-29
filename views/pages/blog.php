<div class="main main-raised">
  <div class="container">
    <div class="section">
      <?php if(isset($_GET['id'])): ?>
        <img src="<?php echo $this->BaseUrl('uploads/blog/'.$this->Attach[0]['imagen']);?>" >
        <h2 class="text-center"><?php echo $this->Attach[0]['Nombre'] ?></h2>
        <h5 class="text-center"><?php echo $this->Attach[0]['Descripcion'] ?></h5>
        <h6 >Fecha: <?php echo date($this->Attach[0]['Fecha']) ?></h6>
        <p><?php echo $this->Attach[0]['Contenido'] ?></p>
      <?php else: ?>
        <div class="row">
          <?php if (isset($this->Attach) && !empty($this->Attach)):?>
            <?php foreach ($this->Attach as $key => $value) :?>
              <div class="col-md-4 card">
                <div class="card-header" style="background-image: url('<?php echo $this->BaseUrl('uploads/blog/'.$value['imagen']);?>')">
                <h3 class="text-white"><?php echo $value['nombre']; ?></h3>
                </div>
                <div class="card-body">
                  <p><?php echo $value['descripcion']; ?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo $this->BaseUrl('index.php/inicio/blog/?id='.$value['id']);?>" class="btn bg-orange btn-raised">
                    leer mas
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="text-center" >
          <ul class="pagination pagination-info">
            <?php for ($i=1; $i < $this->Treg; $i++) :?>
              <?php if( $this->pagina == $i ): ?>
                <li class="page-item active">
                  <a href="<?php echo $this->BaseUrl("index.php/inicio/blog/?p=$i");?>" class="page-link"><?php echo $i; ?></a>
                </li>
              <?php else:?>
                <li class="page-item">
                  <a href="<?php echo $this->BaseUrl("index.php/inicio/blog/?p=$i");?>" class="page-link"><?php echo $i; ?></a>
                </li>
              <?php endif;?>
            <?php endfor;?>
          </ul>      
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>