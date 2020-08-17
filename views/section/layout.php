<?php include 'header.php'; ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include 'sidebar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php include 'topbar.php'; ?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

			<?php require_once $this->View; ?>


		    </div>
        <!-- /.container-fluid -->
    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="alexandertorres.web.ve" class="grey-text text-lighten-4">Alexander torres</a> 
					Todos los derechos Reservados <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
 </div>
  <!-- End of Page Wrapper -->
<?php include 'footer.php'; ?>