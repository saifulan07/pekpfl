<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
?>

<?php
  if(isset($_POST['apprvUsr']))
  {
    $appID = $_POST['appID'];
    $pemail = $_POST['pemail'];
    $pdpswd = $_POST['pdpswd'];

    $appUptQuery = "UPDATE application
                    SET
                      APP_STATAD = 'APPROVED'
                    WHERE APP_ID = $appID";

    $appUptRes = mysql_query($appUptQuery) or die(mysql_error());

    if($appUptRes)
    {
      notiApplicant($appID, $pemail, $pdpswd);
      header('Location: admin_application.php');
    }
    else
    {
      $msg = "<p class='text-error'> Ralat Semasa Meluluskan Permohonan </p>";
    }
  }
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

    <title>Admin: Permohonan</title>

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
            if(isset($_GET['appID']))
            {
              $appID = $_GET['appID'];
              $appQuery = "SELECT APP_ID, APP_POSID, APP_NAME, APP_IC, APP_EMAIL, APP_STATLDR, APP_STATAD 
                          FROM application WHERE APP_ID = $appID";
              $appRes = mysql_query($appQuery) or die(mysql_error());
              if(mysql_num_rows($appRes) > 0)
              {
                $appRow = mysql_fetch_array($appRes);
                $appPosID = $appRow['APP_POSID'];
                $appPosName = getPosName($appPosID);
                $appDeptName = getDeptNamebyPosID($appPosID);
                $appName = $appRow['APP_NAME'];
                $appIC = $appRow['APP_IC'];
                $appEmail = $appRow['APP_EMAIL'];
                $appStatDL = $appRow['APP_STATLDR'];
                $appStatAD = $appRow['APP_STATAD'];

                $apptable = "<table class='table table-hover'>
                              <tr class='info'>
                                <td> Nama: </td>
                                <td> $appName </td>
                              </tr>
                              <tr class='info'>
                                <td> No. IC</td>
                                <td> $appIC</td>
                              </tr>
                              <tr class='info'>
                                <td> Emel: </td>
                                <td> $appEmail</td>
                              </tr>
                              <tr class='info'>
                                <td> Jabatan: </td>
                                <td> $appDeptName </td>
                              </tr>
                              <tr class='info'>
                                <td> Jawatan:</td>
                                <td> $appPosName </td>
                              </tr>
                              <tr class='info'>
                                <td> Status Ketua Jabatan: </td>
                                <td> <span class='label label-success'> $appStatDL </span></td>
                              </tr>
                              <tr class='success'>
                                <td colspan='2'>
                                  <center><a href='#myModal' data-toggle='modal' class='btn btn-xs btn-success'>APPROVE</a></center>
                                </td>
                              </tr>
                            </table>";

                echo $apptable;
              }
              else
              {
                echo "Tiada Permohonan Ditemui";
              }
            }
          ?>

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Meluluskan Permohonan</h4>
                      </div>
                      <div class="modal-body">

                          <form role="form" method="POST">
                              <div class="form-group">
                                  <input type="hidden" name="appID" value="<?php echo $appID; ?>">
                                  <input type="email" class="form-control" name="pemail" placeholder="emel@pahang" required> <br/>
                                  <input type="text" class="form-control" name="pdpswd" placeholder="Kata Laluan Permulaan" required>
                              </div>
                              <button type="reset" class="btn" name="clear"> Set Semula</button>
                              <button type="submit" class="btn btn-primary" name="apprvUsr"> Hantar </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
