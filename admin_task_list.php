<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_app";
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

    <title>Admin: Senarai Kerja</title>

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
          <?php
            $appTable = "<table id='sample_1' class='table table-bordered table-hover'>
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>No. IC</th>
                          <th>Emel</th>
                          <th>Jabatan</th>
                          <th>Jawatan</th>
                          <th>Tindakan</th>
                        </tr>
                        </thead>";
            $appQuery = "SELECT APP_ID, APP_POSID, APP_NAME, APP_IC, APP_EMAIL 
                          FROM application 
                          WHERE APP_STATLDR = 'APPROVED' 
                          AND APP_STATAD = 'PENDING'";
            $appRes = mysql_query($appQuery);
            if(mysql_num_rows($appRes) > 0)
            {
              $i = 1;
              while($appRow = mysql_fetch_array($appRes))
              {
                $appID = $appRow['APP_ID'];
                $appPosID = $appRow['APP_POSID'];
                $appPosName = getPosName($appPosID);
                // $appDeptID = getDeptID($appPosID);
                $appDeptName = getDeptNamebyPosID($appPosID);
                $appName = $appRow['APP_NAME'];
                $appIC = $appRow['APP_IC'];
                $appEmail = $appRow['APP_EMAIL'];
                $appStatDL = $appRow['APP_STATLDR'];
                $appStatAD = $appRow['APP_STATAD'];
                
                $appTable .= "<tr class='success'>
                                <td> $i </td>
                                <td> $appName </td>
                                <td> $appIC </td>
                                <td> $appEmail </td>
                                <td> $appDeptName </td>
                                <td> $appPosName </td>
                                <td> <a href='admin_view_app.php?appID=$appID' class='btn btn-mini btn-success'> APPROVE </a> </td>
                              </tr>";
                $i++;
              }

            }
            else
            {
              $appTable .= "<tr class='error'><td colspan='9'> Tiada Permohonan Ditemui </td></tr>";
            }

            $appTable .= "</table>";
            echo $appTable;
          ?>

          <br/><br/>

          

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
