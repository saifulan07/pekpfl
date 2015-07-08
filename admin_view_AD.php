<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_ad";
?>

<?php
  if(isset($_GET['delAD']))
  {
    $adID = $_GET['delAD'];
    $adDelQuery = "DELETE FROM admin WHERE AD_ID = $adID";
    $adDelRes = mysql_query($adDelQuery) or die(mysql_error());
    if($adDelRes)
    {
      $msg = "<p class='text-success'> Admin telah berjaya dipadam </p>";
    }
    else
    {
      $msg = "<p class='text-error'> Admin tidak berjaya dipadam </p>";
    }
  }
?>

<?php
  if(isset($_POST['newAdmin']))
  {
    $name = $_POST['adName'];
    $email = $_POST['adEmail'];
    $pswd1 = $_POST['pswd1'];
    $pswd2 = $_POST['pswd2'];

    if($pswd1 == $pswd2)
    {
      $addADQuery = "INSERT INTO admin
                    (AD_ID, AD_NAME, AD_EMAIL, AD_PSWD)
                    VALUES (NULL, '$name', '$email', '$pswd1')";
      $addADRes = mysql_query($addADQuery) or die(mysql_error());
      if($addADRes)
      {
        $msg = "<p class='text-success'> Admin: $name telah berjaya ditambah </p>";
      }
      else
      {
        $msg = "<p class='text-error'> Admin: $name tidak berjaya ditambah </p>";
      }
    }
    else
    {
      $msg = "<p class='text-error'> Sila Masukkan Kata Laluan Anda Semula </p>";
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

    <title>Admin: Senarai Admin</title>

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
            $adTable = "<table id='sample_1' class='table table-hover table-bordered'>
                        <thead>
                          <tr>
                            <th> <center>No</center> </th>
                            <th>Nama</th>
                            <th>Emel</th>
                            <th>Tindakan</th>
                          </tr>
                          </thead>";
            $adQuery = "SELECT AD_ID, AD_NAME, AD_EMAIL FROM admin";
            $adRes = mysql_query($adQuery) or die(mysql_error());
            if(mysql_num_rows($adRes) > 0)
            {
              $i = 1;
              while($adRow = mysql_fetch_array($adRes))
              {
                $adID = $adRow['AD_ID'];
                $adName = $adRow['AD_NAME'];
                $adEmail = $adRow['AD_EMAIL'];

                $adTable .= "<tr>
                                <td> <center>$i</center> </td>
                                <td> $adName </td>
                                <td> $adEmail </td>
                                <td> <a href='admin_view_AD.php?delAD=$adID' class='confirmClick'> <span class='label label-danger'><i class='icon icon-trash'></i></span></a>
                                </td>
                             </tr>";
                $i++;
              }
            }
            else
            {
              $adTable .= "<tr><td colspan='4'> <center> Tiada Admin Ditemui </center></td></tr>";
            }

            $adTable .= "</table>";
            echo $adTable;
          ?>

          <br/><br/>

          <a href="#myModal" data-toggle="modal" class="btn btn-xs btn-success">Tambah Admin</a>

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Admin Baru</h4>
                      </div>
                      <div class="modal-body">

                          <form role="form" method="POST">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="adName" placeholder="Nama Admin" required>
                                  <input type="email" class="form-control" name="adEmail" placeholder="Emel Admin" required>
                                  <input type="password" class="form-control" name="pswd1" placeholder="Kata Laluan" required>
                                  <input type="password" class="form-control" name="pswd2" placeholder="Kata Laluan" required>
                              </div>
                              <button type="reset" class="btn" name="clear">Set Semula</button>
                              <button type="submit" class="btn btn-primary" name="newAdmin"> Hantar </button>
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
