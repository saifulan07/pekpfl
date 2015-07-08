<?php
  require_once('connection.php');
  require_once('session.php');
?>

<?php
  if(isset($_POST['updtProfile']))
  {
    $usrID = $global_userID;
    if($global_userRole == "AD")
    {
      $name = $_POST['adName'];
      $email = $_POST['adEmail'];
      $pswd1 = $_POST['adPswd1'];
      $pswd2 = $_POST['adPswd2'];

      if($pswd1 == $pswd2)
      {
        $updtQuery = "UPDATE admin
                      SET
                        AD_NAME='$name',
                        AD_EMAIL='$email',
                        AD_PSWD='$pswd1'
                      WHERE AD_ID = $usrID";
        $updtRes = mysql_query($updtQuery) or die(mysql_error());

        if($updtRes)
        {
          $msg = "<p class='text-success'> Profil anda telah berjaya dikemaskini </p>";
        }
      }
      else
      {
        $msg = "<p class='text-error'> Sila Masukkan Kata Laluan Semula. </p>";
      }

    }
    else if($global_userRole == "DL")
    {
      $name = $_POST['dlName'];
      $email = $_POST['dlEmail'];
      $pswd1 = $_POST['dlPswd1'];
      $pswd2 = $_POST['dlPswd2'];

      if($pswd1 == $pswd2)
      {
        $updtQuery = "UPDATE deptldr
                      SET
                        DL_NAME='$name',
                        DL_EMAIL='$email',
                        DL_PSWD='$pswd1'
                      WHERE DL_ID = $usrID";
        $updtRes = mysql_query($updtQuery) or die(mysql_error());

        if($updtRes)
        {
          $msg = "<p class='text-success'> Profil anda telah berjaya dikemaskini </p>";
        }
      }
      else
      {
        $msg = "<p class='text-error'> Sila Masukkan Kata Laluan Semula. </p>";
      }
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

    <title>Kemaskini Profil</title>

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
        <?php
          if($global_userRole == "AD")
          {
            include('admin_navbar.php');
          }
          else if($global_userRole == "DL")
          {
            include('dl_navbar.php');
          }
        ?>
      <!--header end-->

      <!--sidebar start-->
        <?php
          if($global_userRole == "AD")
          {
            include('admin_sidebar.php');
          }
          else if($global_userRole == "DL")
          {
            include('dl_sidebar.php');
          }
        ?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <?php echo $msg; ?>
          <?php
            if($global_userRole == "AD")
            {
              $adQuery = "SELECT AD_NAME, AD_EMAIL, AD_PSWD FROM admin WHERE AD_ID = $global_userID";
              $adRes = mysql_query($adQuery);
              if(mysql_num_rows($adRes) > 0)
              {
                $adRow = mysql_fetch_array($adRes);
                $adName = $adRow['AD_NAME'];
                $adEmail = $adRow['AD_EMAIL'];
                $adPswd = $adRow['AD_PSWD'];

                $uptTable = "<br/><table class='table table-hover table-bordered'>
                              <form method='POST'>
                              <tr class='success'>
                                <td colspan='2'> <center> Kemaskini Profil Admin </center> </td>
                              </tr>
                              <tr>
                                <td>Nama: </td>
                                <td> <input type='text' class='form-control' name='adName' value='$adName'> </td>
                              </tr>
                              <tr>
                                <td>Emel: </td>
                                <td> <input type='email' class='form-control' name='adEmail' value='$adEmail'> </td>
                              </tr>
                              <tr>
                                <td>Kata Laluan:</td>
                                <td> <input type='password' class='form-control' name='adPswd1' value='$adPswd'> </td>
                              </tr>
                              <tr>
                                <td>Kata Laluan:</td>
                                <td> <input type='password' class='form-control' name='adPswd2' value='$adPswd'> </td>
                              </tr>
                              <tr>
                                <td colspan='2'> <center> <input type='submit' name='updtProfile' class='btn btn-primary' value='Kemaskini'> </center> </td>
                              </tr>
                              </form>
                            </table>";
                echo $uptTable;
              }
            }
            else if($global_userRole == "DL")
            {
              $dlQuery = "SELECT DL_NAME, DL_EMAIL, DL_PSWD FROM deptldr WHERE DL_ID = $global_userID";
              $dlRes = mysql_query($dlQuery);
              if(mysql_num_rows($dlRes) > 0)
              {
                $dlRow = mysql_fetch_array($dlRes);
                $dlName = $dlRow['DL_NAME'];
                $dlEmail = $dlRow['DL_EMAIL'];
                $dlPswd = $dlRow['DL_PSWD'];

                $uptTable = "<table class='table table-hover table-bordered'>
                              <form method='POST'>
                              <tr class='success'>
                                <td colspan='2'> <center> Kemaskini Profil Ketua Jabatan </center> </td>
                              </tr>
                              <tr>
                                <td>Nama: </td>
                                <td> <input type='text' name='dlName' class='form-control' value='$dlName'> </td>
                              </tr>
                              <tr>
                                <td>Emel: </td>
                                <td> <input type='email' name='dlEmail' class='form-control' value='$dlEmail'> </td>
                              </tr>
                              <tr>
                                <td>Kata Laluan:</td>
                                <td> <input type='password' name='dlPswd1' class='form-control' value='$dlPswd'> </td>
                              </tr>
                              <tr>
                                <td>Kata Laluan:</td>
                                <td> <input type='password' name='dlPswd2' class='form-control' value='$dlPswd'> </td>
                              </tr>
                              <tr>
                                <td colspan='2'> <center> <input type='submit' name='updtProfile' class='btn btn-primary' value='Kemaskini'> </center> </td>
                              </tr>
                              </form>
                            </table>";
                echo $uptTable;
              }
            }
          ?>

          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
