<div class="col-sm-12 col-xl-6 col-md-6 mb-2 float-left text-center">
  <?php if (isset($_SESSION['avatar'])):?>
      <img class="img-profile rounded-circle" width="250" height="250" src="<?php echo $this->BaseUrl('uploads/avatar/'.$_SESSION['avatar']);?>">
  <?php else:?>
      <img class="img-profile rounded-circle" width="250" height="250" src="<?php echo $this->BaseUrl('assets/img/defaults.png');?>">
  <?php endif;?>
</div>
<div class="col-sm-12 col-xl-6 col-md-6 mb-2 float-right">
    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"> Informacion Usuario </h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header"> Opciones:</div>
              <a class="dropdown-item" href="<?php echo $this->BaseUrl('index.php/admin/inicio/edit_prof');?>">Editar</a>
                        
            </div>
          </div>
      </div>
      <div class="card-body border-bottom-primary">
          <div>
              <span class="text-primary">Usuario:</span>
              <?= $this->Attach['profile']["name_user"] ?>                    
          </div>
          <div>
              <span class="text-primary">Correo:</span>
              <?= $this->Attach['profile']["email_user"] ?>                    
          </div>        
          <div>
              <span class="text-primary pass">Clave:</span>
              <?=str_replace($this->Attach['profile']["forgot_pass"],"********",$this->Attach['profile']["forgot_pass"]);  ?>                
          </div>                 
      </div>
    </div>
</div>
     