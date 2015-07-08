<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedDL($global_userRole);
  $DLID = $global_userID;
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

    <title>Laman</title>

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
        <?php include('dl_navbar.php'); ?>
      <!--header end-->

      <!--sidebar start-->
        <?php include('dl_sidebar.php'); ?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <?php echo $msg; ?>
          <?php
            $appTable = "<table id='sample_1' class='table table-bordered'>
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>No. IC</th>
                          <th>Emel</th>
                          <th>Jabatan</th>
                          <th>Jawatan</th>
                          <th>Status Ketua Jabatan</th>
                          <th>Tindakan</th>
                        </tr>
                        </thead>";
            $appQuery = "SELECT a.APP_ID, a.APP_POSID, a.APP_NAME, a.APP_IC, a.APP_EMAIL, a.APP_STATLDR, a.APP_STATAD
                          FROM department d, deptldr dl, position p, application a
                          WHERE p.POS_ID = a.APP_POSID
                          AND d.DEPT_ID = p.POS_DEPTID
                          AND d.DEPT_ID = dl.DL_DEPTID
                          AND dl.DL_ID = $DLID";
                          
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

                $trClass = "";
                $btApprv = "";
                if($appStatDL == "PENDING")
                {
                  $trClass = "warning";
                  $btApprv = "<a href='dl_view_app.php?appID=$appID' class='btn btn-mini btn-success'> APPROVE </a>";
                }
                else if($appStatDL == "APPROVED")
                {
                  $trClass = "success";
                }

                $appTable .= "<tr class='$trClass'>
                                <td> $i </td>
                                <td> $appName </td>
                                <td> $appIC </td>
                                <td> $appEmail </td>
                                <td> $appDeptName </td>
                                <td> $appPosName </td>
                                <td> $appStatDL</td>
                                <td> $btApprv </td>
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

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
