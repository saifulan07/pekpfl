<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_pos";
?>

<?php
  if(isset($_POST['addPos']))
  {
    $posName = $_POST['posName'];
    $deptID = $_POST['deptID'];

    $addPosQuery = "INSERT INTO position
                    (POS_ID, POS_DEPTID, POS_NAME)
                    VALUES (NULL, $deptID, '$posName')";

    $addPosRes = mysql_query($addPosQuery) or die(mysql_error());

    if($addPosRes)
    {
      $msg = "<p class='text-success'> Berjaya Menambah Jawatan: $posName</p>";
    }
    else
    {
      $msg = "<p class='text-error'> Gagal Menambah Jawatan: $posName</p>";
    }
  }
?>

<?php
  if(isset($_GET['delPos']))
  {
    $posID = $_GET['delPos'];

    $delPosQuery = "DELETE FROM position WHERE POS_ID = $posID";
    $delPosRes = mysql_query($delPosQuery) or die(mysql_error());

    if($delPosRes)
    {
      $msg = "<p class='text-success'> Jawatan Berjaya Dipadam </p>";
    }
    else
    {
      $msg = "<p class='text-error'> Jawatan Gagal Dipadam </p>";
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

    <title>Admin: Jawatan</title>

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
            $bigTable = "<table class='table table-hover table-bordered'>";

            $deptQuery = "SELECT DEPT_ID, DEPT_NAME FROM department";

            $deptRes = mysql_query($deptQuery);

            if(mysql_num_rows($deptRes) > 0)
            {
              while($deptRow = mysql_fetch_array($deptRes))
              {
                $deptID = $deptRow['DEPT_ID'];
                $deptName = $deptRow['DEPT_NAME'];

                $bigTable .= "<tr class='info'> <td> <strong> $deptName </strong> </td> </tr>";

                $posQuery = "SELECT POS_ID, POS_DEPTID, POS_NAME
                              FROM position
                              WHERE POS_DEPTID = $deptID";
                $posRes = mysql_query($posQuery) or die(mysql_error());
                if(mysql_num_rows($posRes) > 0)
                {
                  $posTable = "<table class='table table-bordered'>
                                <tr>
                                    <th> <center>No.</center> </th>
                                    <th> Nama Jawatan </th>
                                    <th> Tindakan </th>
                                </tr>";
                  $posCounter = 1;
                  while($posRow = mysql_fetch_array($posRes))
                  {
                    $posID = $posRow['POS_ID'];
                    $posName = $posRow['POS_NAME'];

                    $posTable .= "<tr>
                                    <td> <center>$posCounter</center> </td>
                                    <td> $posName </td>
                                    <td> <a href=admin_pos.php?delPos=".$posID." class='confirmClick'> <span class='label label-danger'> <i class='icon icon-trash'></i></span></a> </td>
                                  </tr>";
                    $posCounter++;
                  }

                  $posTable .= "<tr> 
                                  <td colspan='3'>
                                    <form method='POST'>
                                    <input type='hidden' name='deptID' value='$deptID'>
                                    <input type='text' name='posName' placeholder='Masukkan Nama Jawatan' required>
                                    <input type='submit' name='addPos' value='Tambah Jawatan' class='btn btn-small btn-primary'>
                                    </form>
                                  </td>
                                </tr>";
                  $posTable .= "</table>";

                  $bigTable .= "<tr class='success'> <td> $posTable </td> </tr>";
                }
                else
                {
                  $bigTable .= "<tr class='error'>
                                  <td> <center> <p class='text-error'> Tiada Jawatan Ditemui </p> </center> </td> 
                                </tr>
                                <tr> 
                                  <td>
                                    <form method='POST'>
                                    <input type='hidden' name='deptID' value='$deptID'>
                                    <input type='text' name='posName' placeholder='Masukkan Nama Jawatan' required>
                                    <input type='submit' name='addPos' value='Tambah Jawatan' class='btn btn-small btn-primary'>
                                    </form>
                                  </td>
                                </tr>";
                }
              }
            }
            else
            {
              echo "Tiada Jabatan Ditemui";
            }

            echo $bigTable;
          ?>

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php include('FL_JS.php'); ?>

  </body>
</html>
