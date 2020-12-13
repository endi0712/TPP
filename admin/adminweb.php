<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']) ) {
  include "../lib/config.php";
  echo "<center>Untuk mengakses modul, Anda harus Login <br>";
  echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}else{ ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>E-UKM Kalurahan Gedangrejo.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/gkk.png">
    <!-- Pignose Calender -->
    <link href="assets/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    <!--*******************
        Preloader end
        ********************-->


    <!--**********************************
        Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

        <!--**********************************
            Nav header start
            ***********************************-->
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="index.html">
                        <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                        <span class="logo-compact"><img src="assets/images/logo-compact.png" alt=""></span>
                        <span class="brand-title">
                            <img src="images/logo-text.png" alt="">
                        </span>
                    </a>
                </div>
            </div>
        <!--**********************************
            Nav header end
            ***********************************-->

        <!--**********************************
            Header start
            ***********************************-->
            <div class="header">    
                <div class="header-content clearfix">

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                            <div class="drop-down animated flipInX d-md-none">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="assets/images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="badge badge-pill gradient-2">3</span>
                        </a>
                        <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                            <div class="dropdown-content-heading d-flex justify-content-between">
                                <span class="">2 New Notifications</span>  
                                <a href="javascript:void()" class="d-inline-block">
                                    <span class="badge badge-pill gradient-2">5</span>
                                </a>
                            </div>
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Events near you</h6>
                                                <span class="notification-text">Within next 5 days</span> 
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Event Started</h6>
                                                <span class="notification-text">One hour ago</span> 
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Event Ended Successfully</h6>
                                                <span class="notification-text">One hour ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Events to Join</h6>
                                                <span class="notification-text">After two days</span> 
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </li>
                    <li class="icons dropdown d-none d-md-flex">
                        <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                            <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li><a href="javascript:void()">English</a></li>
                                    <li><a href="javascript:void()">Dutch</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="assets/images/user/1.png" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="profil.php"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                        </a>
                                    </li>

                                    <hr class="my-2">
                                    <li>
                                        <a href="lock.php"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                    </li>
                                    <li><a href="index.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
            <?php
            if ($_GET['module'] == 'home') {
              include "module/home/home.php";
            }elseif ($_GET['module'] == 'kategori'){
              include "module/kategori/list_kategori.php";
            }elseif ($_GET['module'] == 'tambah_kategori'){
              include "module/kategori/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_kategori'){
              include "module/kategori/form_edit.php";
            } //.Kategori
            elseif ($_GET['module'] == 'produk'){
              include "module/produk/list_produk.php";
            }elseif ($_GET['module'] == 'tambah_produk'){
              include "module/produk/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_produk'){
              include "module/produk/form_edit.php";
            } //.Produk
            elseif ($_GET['module'] == 'biaya'){
              include "module/biaya/list_biaya.php";
            }elseif ($_GET['module'] == 'tambah_biaya'){
              include "module/biaya/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_biaya'){
              include "module/biaya/form_edit.php";
            } //.Biaya kirim
            elseif ($_GET['module'] == 'kota'){
              include "module/kota/list_kota.php";
            }elseif ($_GET['module'] == 'tambah_kota'){
              include "module/kota/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_kota'){
              include "module/kota/form_edit.php";
            } //.Kota
            elseif ($_GET['module'] == 'provinsi'){
              include "module/provinsi/list_provinsi.php";
            }elseif ($_GET['module'] == 'tambah_provinsi'){
              include "module/provinsi/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_provinsi'){
              include "module/provinsi/form_edit.php";
            } //.Provinsi
            elseif ($_GET['module'] == 'kurir'){
              include "module/kurir/list_kurir.php";
            }elseif ($_GET['module'] == 'tambah_kurir'){
              include "module/kurir/form_tambah.php";
            }elseif ($_GET['module'] == 'edit_kurir'){
              include "module/kurir/form_edit.php";
            } //.Kurir
             elseif ($_GET['module'] == 'pesanan'){
              include "module/pesanan/list_pesanan.php";
            }elseif ($_GET['module'] == 'edit_pesanan'){
              include "module/pesanan/form_edit.php";
            }elseif ($_GET['module'] == 'list_detail_pesanan'){
              include "module/pesanan/list_detail_pesanan.php";
            }elseif ($_GET['module'] == 'cetak_pesanan'){
              include "module/pesanan/cetak_pesanan.php";  
            } //.Pemesanan
            elseif ($_GET['module'] == 'member'){
              include "module/member/list_member.php";
            }//.Member
            elseif ($_GET['module'] == 'pemilik'){
              include "module/pemilik/list_pemilik.php";
            } //.Pemilik UKM
            elseif ($_GET['module'] == 'review'){
              include "module/review/list_review.php";
            } //.Review
            else{
              include "module/home/home.php";
            }
            ?>
        <!--**********************************
            Sidebar start
            ***********************************-->
            <div class="nk-sidebar">           
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label">Dashboard</li>
                        <?php if($_SESSION['level']=='P'){?>
                        <li>
                            <a href="adminweb.php?module=home">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                         <a href="adminweb.php?module=produk">
                            <i class="fa fa-th"></i><span>Produk</span>
                        </a>
                        </li>
                        <li>
                            <a href="adminweb.php?module=pemesanan">
                                <i class="fa fa-shopping-cart"></i><span>Pemesanan</span>
                            </a>
                        </li>
                        <li>
                            <a href="adminweb.php?module=member">
                                <i class="fa fa-users"></i><span>Member</span>
                            </a>
                        </li>
                        <li>
                            <a href="adminweb.php?module=review">
                                <i class="mdi mdi-email-outline"></i><span>Review</span>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li>
                         <a href="adminweb.php?module=kategori">
                            <i class="fa fa-bars"></i><span>Kategori</span>
                        </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-car"></i> <span class="nav-text">Biaya Kirim</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="adminweb.php?module=kota"><i class="fa fa-map-marker"></i>Kota</a></li>
                                <li><a href="adminweb.php?module=provinsi"><i class="fa fa-map"></i>Provinsi</a></li> 
                                <li><a href="adminweb.php?module=kurir"><i class="fa fa-truck"></i>Kurir</a></li> 
                                <li><a href="adminweb.php?module=biaya"><i class="fa fa-money"></i>Biaya Kirim</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="adminweb.php?module=member">
                                <i class="fa fa-users"></i><span>Member</span>
                            </a>
                        </li>
                        <li>
                            <a href="adminweb.php?module=pemilik">
                                <i class="fa fa-users"></i><span>Pemilik UKM</span>
                            </a>
                        </li>
                        <?php } ?>    
                    </ul>
                </div>
            </div>
        <!--**********************************
            Sidebar end
            ***********************************-->

        <!--**********************************
            Footer start
            ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Endi Kurniawan</a> 2020</p>
                </div>
            </div>
        <!--**********************************
            Footer end
            ***********************************-->
        </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
        <script src="assets/plugins/common/common.min.js"></script>
        <script src="assets/js/custom.min.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/gleek.js"></script>
        <script src="assets/js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="assets/plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="assets/plugins/d3v3/index.js"></script>
        <script src="assets/plugins/topojson/topojson.min.js"></script>
        <script src="assets/plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="assets/plugins/raphael/raphael.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="assets/plugins/moment/moment.min.js"></script>
        <script src="assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="assets/plugins/chartist/js/chartist.min.js"></script>
        <script src="assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



        <script src="assets/js/dashboard/dashboard-1.js"></script>

    </body>

    </html>
    <?php } ?>