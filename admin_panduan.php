<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_pan";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin: Panduan</title>

    <!-- Bootstrap core CSS -->
    <link href="FL_CSS/bootstrap.min.css" rel="stylesheet">
    <link href="FL_CSS/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!-- Custom styles for this template -->
    <link href="FL_CSS/style.css" rel="stylesheet">
    <link href="FL_CSS/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
        <?php include('admin_navbar.php'); ?>
      <!--header end-->

      <!--sidebar start-->
        <?php include('admin_sidebar.php'); ?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <?php echo $msg; ?>
          
          <br/>
          <!--collapse start-->
          <div class="panel-group m-bot20" id="accordion">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              Dashboard
                          </a>
                      </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                      <div class="panel-body">
                          Di laman dashboard, statistik seperti jumlah jabatan, jumlah jawatan dipaparkan.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                              Jabatan
                          </a>
                      </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                      <div class="panel-body">
                          Di laman Senarai Jabatan, admin boleh mencari(<i>Search</i>) jabatan tertentu dengan menggunakan Nama Jabatan sebagai kata kunci di ruangan <i>Search</i>.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              Ketua Jabatan
                          </a>
                      </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                      <div class="panel-body">
                          I'm the bowss
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                              Jawatan
                          </a>
                      </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                      <div class="panel-body">
                          Jawatan nie
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                              Permohonan
                          </a>
                      </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                      <div class="panel-body">
                          mari mohon
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                              Admin
                          </a>
                      </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                      <div class="panel-body">
                          page admin ni
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                              Kemaskini Profil
                          </a>
                      </h4>
                  </div>
                  <div id="collapse7" class="panel-collapse collapse">
                      <div class="panel-body">
                          Nak tuka2 ape
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                              Log Keluar
                          </a>
                      </h4>
                  </div>
                  <div id="collapse8" class="panel-collapse collapse">
                      <div class="panel-body">
                          Pastikan logout sblom g jln2
                      </div>
                  </div>
              </div>
              
          </div>
          <!--collapse end-->

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
