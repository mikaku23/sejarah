<!--  -->
<?php
  if(isset($_GET['title'])){
    $title=$_GET['title'];
  }else{
    $title="Inventaris Barang";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= strtoupper($title) ?></title>
    <link rel="icon" type="image/x-icon" href="dist/img/logo3.png">
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/darkmode.css">
</head>
<style>
  .main-footer{
  cursor: default;
}
  </style>
<body class="hold-transition sidebar-mini normal-mode"> <!-- Add normal-mode class -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-olive navbar-light ">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
<!-- Modal Log In / Log Out -->



<div class="modal fade" id="modalLoginLogout" tabindex="-1" role="dialog" aria-labelledby="modalLoginLogoutLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLoginLogoutLabel">Pilih Tindakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin logout?
      </div>
      <div class="modal-footer">
       
        <a href="view/logout.php" class="btn btn-danger">Log Out</a> <!-- Link untuk log out -->
      </div>
    </div>
  </div>
</div>


<aside class="main-sidebar sidebar-dark-primary elevation-4 bg">
        <a href="#" class="brand-link">
        <img src="dist/img/logo3.png"  class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Inventaris Barang</span>
      </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <div class="image">
          <img src="dist/img/gojo.WEBP" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info ml-1">
          <a href="#" class="d-block"><?=$_SESSION['nama'] ?></a>
        </div>
      </div>
      <div class="icont">
        <a href="#" class="sign-out-link" title="Log Out" data-toggle="modal" data-target="#modalLoginLogout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
               <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="index.php?page=dashboard&title=dashboard" class="nav-link <?php if($title==='dashboard' ) echo 'active'; ?>">
                <i class="fas fa-chart-bar"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item <?php echo ($title === 'revolusi' || $title === 'nasional' || $title === 'kemerdekaan') ? 'menu-open' : ''; ?>">
              <a href="index.php?page=kategori&title=kategori" class="nav-link <?php if($title === 'revolusi' || $title === 'nasional' || $title === 'kemerdekaan'){ echo 'active'; } ?>">
                <i class="fas fa-bars"></i>
                <p>
                  Kategori
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?page=revolusi&title=revolusi" class="nav-link <?php if($title === 'revolusi') echo 'active'; ?>">
                    <i class="far fa-user"></i>
                    <p>Pahlawan Revolusi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=nasional&title=nasional" class="nav-link <?php if($title === 'nasional') echo 'active'; ?>">
                    <i class="far fa-user"></i>
                    <p>Pahlawan Nasional</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=kemerdekaan&title=kemerdekaan" class="nav-link <?php if($title === 'kemerdekaan') echo 'active'; ?>">
                    <i class="far fa-user"></i>
                    <p>Pahlawan Kemerdekaan</p>
                  </a>
                </li>
              </ul>
            </li>
           


          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
     
    <div class="content-wrapper">
      
      <section class="content">
         <?php
        if (isset($_GET['page'])){
          if($_GET['page']=='dashboard'){
            include "tampilan/dashboard.php";
          }
          elseif($_GET['page']=='revolusi'){
            include "tampilan/revolusi.php";
          }
          elseif($_GET['page']=='nasional'){
            include "tampilan/nasional.php";
          }
          elseif($_GET['page']=='kemerdekaan'){
            include "tampilan/kemerdekaan.php";
          }
          elseif($_GET['page']=='register'){
            include "tampilan/register.php";
          }
        } else {
          include "tampilan/dashboard.php";
        }
        ?>
      </section>
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <strong>Kelola Barang Anda dengan Mudah</strong>
      </div>
      <strong>Sistem Inventaris Barang © 2024 .</strong> Powered by M Haliq.
    </footer>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/darkmode.js"></script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
