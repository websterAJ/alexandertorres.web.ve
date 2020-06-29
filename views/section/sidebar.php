<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?php echo $this->BaseUrl('assets/img/logo.png');?>" width="35">
        </div>
        <div class="sidebar-brand-text mx-3"> Reportes</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
       <?php  if (isset($this->Attach['menu'])):?>
        
        <?php foreach ($this->Attach['menu'] as $key => $value): ?>
          <li class="nav-item">
  	        <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/dashboard/'.$value['url']);?>">
  		        <i class="fas fa-fw <?php echo $value['icon']?>"></i>
  		        <span><?php echo $value['modulo'] ?></span>
  	        </a>
        	</li>
        <?php endforeach ?>
      <?php endif  ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
		<li class="nav-item active">
        <a class="nav-link" href="<?php echo $this->BaseUrl('index.php/dashboard');?>">
          <i class="fab fa-fw fa-adn"></i>
          <span>Ayuda</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->