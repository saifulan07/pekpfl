<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar= "ad_deptLdr";
?>

<?php
  if(isset($_GET['delDeptLdr']))
  {
    $deptLdrID = $_GET['delDeptLdr'];

    $delLdrQuery = "DELETE FROM deptldr WHERE DL_ID = $deptLdrID";
    $delLdrRes = mysql_query($delLdrQuery) or die(mysql_error());
    if($delLdrRes)
    {
      $msg = "<p class='text-success'> Berjaya Dipadam </p>";
    }
    else
    {
      $msg = "<p class='text-error'> Tidak Berjaya Dipadam </p>";
    }
  }
?>

<?php
  if(isset($_POST['newDeptLdr']))
  {
    $deptLdrName = $_POST['deptLdrName'];
    $deptLdrEmail = $_POST['deptLdrEmail'];
    $deptLdrPswd1 = $_POST['deptLdrPswd1'];
    $deptLdrPswd2 = $_POST['deptLdrPswd2'];
    $deptLdrDeptID = $_POST['department'];

    if($deptLdrPswd1 == $deptLdrPswd2)
    {
      $addDeptLdrQuery = "INSERT INTO deptldr
                          (DL_ID, DL_DEPTID, DL_NAME, DL_EMAIL, DL_PSWD)
                          VALUES (NULL, $deptLdrDeptID, '$deptLdrName', '$deptLdrEmail', '$deptLdrPswd1')";
      $addDeptLdrRes = mysql_query($addDeptLdrQuery) or die(mysql_error());
      if($addDeptLdrRes)
      {
        $msg = "<p class='text-success'> Berjaya Menambah: $deptLdrName </p>";
      }
      else
      {
        $msg = "<p class='text-error'> Gagal Menambah: $deptLdrName </p>";
      }
    }
    else
    {
      $msg = "<p class='text-error'> Sila Masukkan Kata Laluan Semula </p>";
    }
  }
?>

<?php
  if(isset($_POST['updtDL']))
  {
    $DLID = $_POST['DLID'];
    $DLName = $_POST['DLName'];
    $DLEmail = $_POST['DLEmail'];

    $DLUpdtQuery = "UPDATE deptldr
                    SET
                      DL_NAME='$DLName',
                      DL_EMAIL='$DLEmail'
                    WHERE DL_ID = $DLID";
    $DLUpdtRes = mysql_query($DLUpdtQuery) or die(mysql_error());
    if($DLUpdtRes)
    {
      $msg = "<p class='text-success'> Kemaskini Berjaya </p>";
    }
    else
    {
      $msg = "<p class='text-error'> Kemaskini Gagal </p>";
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

    <title>Admin: Ketua Jabatan</title>

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
            $deptLdrTable = "<table id='sample_1' class='table table-hover'>
                            <thead>
                            <tr>
                              <th> <center>No.</center> </th>
                              <th>Nama</th>
                              <th>Emel</th>
                              <th>Nama Jabatan</th>
                              <th>Tindakan</th>
                            </tr>
                            </thead>";

            $deptLdrQuery = "SELECT DL_ID, DL_DEPTID, DL_NAME, DL_EMAIL FROM deptldr";

            $deptLdrRes = mysql_query($deptLdrQuery);

            if(mysql_num_rows($deptLdrRes) > 0)
            {
              $i = 1;
              while($deptLdrRow = mysql_fetch_array($deptLdrRes))
              {
                $deptLdrID = $deptLdrRow['DL_ID'];
                $deptLdrDptID = $deptLdrRow['DL_DEPTID'];
                $deptLdrDptName = getDeptName($deptLdrDptID);
                $deptLdrName = $deptLdrRow['DL_NAME'];
                $deptLdrEmail = $deptLdrRow['DL_EMAIL'];

                $deptLdrTable .= "<tr>
                                  <td> <center>$i</center> </td>
                                  <td> $deptLdrName </td>
                                  <td> $deptLdrEmail </td>
                                  <td> $deptLdrDptName </td>
                                  <td> 
                                    <a href=admin_deptLdr.php?delDeptLdr=".$deptLdrID." class='confirmClick'> <span class='label label-danger'> <i class='icon icon-trash'></i></span></a> 
                                    <a href=admin_deptLdr.php?updateDeptLdr=".$deptLdrID."> <span class='label label-info'> <i class='icon icon-edit'></i></span></a> 
                                    </td>
                                </tr>";
                $i++;
              }
            }
            else
            {
              $deptLdrTable .= "<tr class='error'><td colspan='5'> <center>Tiada Ketua Jabatan Ditemui</center></td></tr>";
            }

            $deptLdrTable .= "</table>";
            echo $deptLdrTable;
          ?>

          <br/><br/>

          <a href="#myModal" data-toggle="modal" class="btn btn-xs btn-success">Tambah Ketua Jabatan</a>

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Jabatan Baru</h4>
                      </div>
                      <div class="modal-body">

                          <form role="form" method="POST">
                              <input type="text" class="form-control" name="deptLdrName" placeholder="Nama Ketua Jabatan" required>
                              <input type="email" class="form-control" name="deptLdrEmail" placeholder="Emel Ketua Jabatan" required>
                              <input type="password" class="form-control" name="deptLdrPswd1" placeholder="Kata Laluan" required>
                              <input type="password" class="form-control" name="deptLdrPswd2" placeholder="Kata Laluan" required>
                              <?php
                                $deptQuery = "SELECT DEPT_ID, DEPT_NAME FROM department";
                                $deptRes = mysql_query($deptQuery) or die(mysql_error());
                                if(mysql_num_rows($deptRes) > 0)
                                {
                                  $deptOpt = "<select name='department' class='form-control' required>\n <option> -- Pilih Jabatan -- </option>";
                                  while($deptRow = mysql_fetch_array($deptRes))
                                  {
                                    $deptID = $deptRow['DEPT_ID'];
                                    $deptName = $deptRow['DEPT_NAME'];

                                    $deptOpt .= "<option value='$deptID'> $deptName </option>\n";
                                  }

                                  $deptOpt .= "</select>";
                                  echo $deptOpt;
                                }
                                else
                                {
                                  echo "Tiada Jabatan Ditemui";
                                }

                              ?>
                              <br/>
                              <button type="reset" class="btn" name="clear">Set Semula</button>
                              <button type="submit" class="btn btn-primary" name="newDeptLdr"> Hantar </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

          <?php
            if(isset($_GET['updateDeptLdr']))
            {
              $DLID = $_GET['updateDeptLdr'];
              $deptName = getDeptName($DLID);
              $DLName = getDLName($DLID);
              $DLEmail = getDLEmail($DLID);

              $updateForm = "<br/><br/><form method='POST'>
                              <input type='hidden' name='DLID' value='$DLID'>
                              <input type='text' name='DLName' value='$DLName' placeholder='Nama' required> <br/>
                              <input type='email' name='DLEmail' value='$DLEmail' placeholder='Emel' required> <br/>
                              <input type='submit' name='updtDL' value='Update'>
                            </form>";
              echo $updateForm;
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