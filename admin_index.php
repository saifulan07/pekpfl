<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_in";
?>

<?php require_once('data_index.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin: Laman</title>

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
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-ok-circle"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $apprvDL; ?></h1>
                              <p>Diluluskan Oleh Ketua Jabatan</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-time"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $pndgDL; ?></h1>
                              <p>Menunggu Kelulusan Ketua Jabatan</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-ok"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $apprvAD; ?></h1>
                              <p>Diluluskan Oleh Admin</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-warning-sign"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $pndgAD; ?></h1>
                              <p>Menunggu Kelulusan Admin</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-10">
                      <!--custom chart start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Statistik Pengguna
                          </header>
                          <div class="panel-body">
                              <div id="hero-area" class="graph"></div>
                              <div id="appStatGraph"></div>
                          </div>
                      </section>
                      <script src="FL_JS/raphael-min.js"></script>
                      <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
                      <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
                      <script type="text/javascript">
                      // window.onload = function(){
                        console.log('msuk dh');
                          Morris.Bar({
                          element: 'appStatGraph',
                          resize: 'true',
                          hideHover: 'auto',
                          data: [
                            { y: 'Diluluskan Oleh K.Jabatan', a: <?php echo $apprvDL; ?> },
                            { y: 'Menunggu Kelulusan K.Jabatan', a: <?php echo $pndgDL; ?> },
                            { y: 'Diluluskan Oleh Admin', a: <?php echo $apprvAD; ?> },
                            { y: 'Menunggu Kelulusan Admin', a: <?php echo $pndgAD; ?> }
                          ],
                          xkey: 'y',
                          ykeys: ['a'],
                          labels: ['Jumlah']
                        });
                      // }
                      </script>
                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-2">
                      <!--new earning start-->
                      <ul class="nav nav-pills nav-stacked">
                          <li><a href="javascript:;"> <i class="icon-sitemap"></i> Jabatan <span class="label label-primary pull-right r-activity"><?php echo $cDept;?></span></a></li>
                          <li><a href="javascript:;"> <i class="icon-star-empty"></i> Jawatan <span class="label label-info pull-right r-activity"><?php echo $cPos;?></span></a></li>
                          <li><a href="javascript:;"> <i class="icon-user"></i> Admin <span class="label label-warning pull-right r-activity"><?php echo $cAD;?></span></a></li>
                      </ul>
                      <!--new earning end-->

                      <!--total earning start-->
                      
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      
                      <!--work progress end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <!--timeline start-->
                      
                      <!--timeline end-->
                  </div>
                  <div class="col-lg-4">
                      <!--revenue start-->
                      
                      <!--revenue end-->
                      <!--features carousel start-->
                      
                      <!--features carousel end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <!--latest product info start-->
                      
                      <!--latest product info end-->
                      <!--twitter feedback start-->
                      
                      <!--twitter feedback end-->
                  </div>
                  <div class="col-lg-4">
                      <div class="row">
                          <div class="col-xs-6">
                              <!--pie chart start-->
                              
                              <!--pie chart start-->
                          </div>
                          <div class="col-xs-6">
                              <!--follower start-->
                              
                              <!--follower end-->
                          </div>
                      </div>
                      <!--weather statement start-->
                      
                      <!--weather statement end-->
                  </div>
              </div>

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>
    
    <script src="FL_JS/morris.min.js"></script>

  </body>
</html>
