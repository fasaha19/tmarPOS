<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>TMAR POS</title>

  <!-- Font Awesome Icons -->
  <link rel="icon" href="{{base_url}}assets/images/brand_logo2.png" type="image/png" sizes="20x20">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{base_url}}assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/build/adminstyle.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{base_url}}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{base_url}}assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{base_url}}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <link rel="stylesheet" href="{{base_url}}assets/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/fullcalendar-bootstrap/main.min.css">
  <link rel="stylesheet" href="{{base_url}}assets/plugins/summernote/summernote-bs4.css">
 <link rel="stylesheet" href="{{base_url}}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
 <link rel="stylesheet" href="{{base_url}}assets/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <link rel="stylesheet" href="{{base_url}}assets/plugins/toastr/toastr.min.css">
  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{base_url}}assets/plugins/jquery/jquery.min.js"></script>
<script src="{{base_url}}assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap -->
<script src="{{base_url}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{base_url}}assets/dist/js/adminlte.js"></script>
<script src="{{base_url}}assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{base_url}}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{base_url}}assets/plugins/chart.js/Chart.min.js"></script>
<script src="{{base_url}}assets/jquery-barcode/jquery-barcode.js"></script>
<script src="{{base_url}}assets/dist/js/demo.js"></script>
<script src="{{base_url}}assets/dist/js/pages/dashboard3.js"></script>
<script src="{{base_url}}assets/plugins/toastr/toastr.min.js"></script>
<script src="{{base_url}}assets/js/angular.min.js"></script>
<script src="{{base_url}}assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="{{base_url}}assets/dist/js/dataTables.buttons.min.js"></script>
<script src="{{base_url}}assets/dist/js/buttons.print.min.js"></script>
<script src="{{base_url}}assets/plugins/canvasjs.min.js"></script>
<!-- <script src="{{base_url}}assets/dist/js/pdfmake.min.js"></script> -->
<script src="{{base_url}}assets/dist/js/vfs_fonts.js"></script>
<style type="text/css">
  .dropdown{
      position: relative;
      display: inline-block;
    }
    .dropdown-content{
      display: block;
      position: absolute;
      background-color: #f9f9f9;
    width: 34rem;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 99 !important;
    }
    .dropdown-content span{
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      z-index: 99 !important;
    }
    .dropdown-content span:hover{
      background-color: #ececec;
      cursor: pointer;
    }
    .table-vals{
      border-collapse: collapse;
      width: 100%;
    }
    .table-vals td,th{
      border: 1px solid #dddddd;
      text-align: left;
    }
    .table-vals tr:nth-child(even){
      background-color: #dddddd;
    }
    .nav-pills .nav-link {
      color: #ffffff !important;
    }
    .card-header {
      background: linear-gradient(to right,#04023d,#01b3e9) !important;
    }

    button#gen {
      background: linear-gradient(to right,#19286E,#005AAA) !important;
      border-radius: 25px;
    }
    .content-wrapper {
    background: #d5eaef !important;
    }
    aside.main-sidebar.elevation-4 {
      position: fixed !important;
    }
    footer.main-footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }
    nav.main-header.navbar.navbar-expand.navbar-white.navbar-light {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
    }
    #button_to_top {
  display: inline-block;
  background: linear-gradient(to right,#19286E,#005AAA) !important;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}
/*#button_to_top::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}*/
#button_to_top:hover {
  cursor: pointer;
  background-color: #333;
}
#button_to_top:active {
  background-color: #555;
}
#button_to_top.show {
  opacity: 1;
  visibility: visible;
}
.modal-header {
    background: linear-gradient(to right,#04023d,#01b3e9) !important;
    color: white;
}Stocks
</style>
</head>
<!--
BODY TAG OPTIONS:v 
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    <ul class="navbar-nav ml-auto">
   
      
    </ul>
    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container background-color: #1E2761 !important; -->
  <aside class="main-sidebar elevation-4" style="background: linear-gradient(166deg, rgba(2,0,36,1) 4%, rgba(9,9,121,1) 48%, rgba(0,212,255,1) 100%) !important; border-radius: 5px 50px 50px 5px;">
    <!-- Brand Logo -->
    <a style="color: white;" class="brand-link">
      &nbsp;
      <img src="{{base_url}}assets/tmrLogo.png" style="height: 35px;">
      <span class="brand-text"> <b>TMAR & Sons<b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{base_url}}Sashop/" class="nav-link">
              <!-- <i class="nav-icon fas fa-cubes"></i> -->
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Daily Sales
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{base_url}}SaproductReturn/" class="nav-link">
              <!-- <i class="nav-icon fas fa-cubes"></i> -->
              <i class="nav-icon fas fa-undo-alt"></i>
              <p>
                Product Return
              </p>
            </a>
          </li>          
         <li class="nav-item">
            <a href="{{base_url}}Sauser/" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Manage Sales
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{base_url}}Saproduct/" class="nav-link">
              <i class="nav-icon fab fa-dropbox"></i>
              <p>
                Manage Stocks
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{base_url}}Sadash/" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Dashboard
              
              </p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a href="{{base_url}}SasaleRep/" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Sale Report      
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{base_url}}SaprodRep/" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Product Track Report      
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{base_url}}SaprodReports/" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Product Report      
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{base_url}}SasaleRep/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sale Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{base_url}}SaprodRep/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Track Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{base_url}}SaprodReports/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="{{base_url}}Barcode/" class="nav-link">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Barcode Print      
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{base_url}}logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout      
              </p>
            </a>
          </li>
         <!--   <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Others
              
              </p>
            </a>
          </li> -->
         
        <!--   <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
 -->
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <br>
  <br>
  <br>
  <a id="button_to_top">
    <i style="line-height: 50px;color: white;" class="nav-icon fas fa-chevron-circle-up"></i>
  </a>