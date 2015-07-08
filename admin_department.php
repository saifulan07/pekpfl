<?php
  require_once('connection.php');
  require_once('session.php');
  isAllowedAD($global_userRole);
  $pageVar = "ad_dept";
?>
<?php
  if(isset($_POST['newDept']))
  {
    $deptName = $_POST['deptName'];

    $addDeptQuery = "INSERT INTO department
                    (DEPT_ID, DEPT_NAME)
                    VALUES (NULL, '$deptName')";

    $addDeptRes = mysql_query($addDeptQuery) or die(mysql_error());

    if($addDeptRes)
    {
      $msg = "<p class='text-success'> Berjaya menambah Jabatan: $deptName</p>";
    }
    else
    {
      $msg = "<p class='text-success'> Gagal untuk menambah Jabatan: $deptName</p>";
    }
  }
?>

<?php
  if(isset($_GET['delDept']))
  {
    $deptID = $_GET['delDept'];

    $delPosQuery = "DELETE FROM position WHERE POS_DEPTID = $deptID";
    $delPosRes = mysql_query($delPosQuery) or die(mysql_error());
    if($delPosRes)
    {
      $delDeptQuery = "DELETE FROM department WHERE DEPT_ID = $deptID";
      $delDeptRes = mysql_query($delDeptQuery);
      if($delDeptRes)
      {
        $msg = "<p class='text-success'> Jabatan Berjaya Dipadam </p>";
      }
      else
      {
        $msg = "<p class='text-error'> Jabatan Tidak Berjaya Dipadam </p>";
      }
    }
    else
    {
      $msg = "<p class='text-error'> Jawatan di dalam Jabatan tidak berjaya dipadam </p>";
    }
  }

?>

<?php
  if(isset($_POST['updtDept']))
  {
    $deptID = $_POST['deptID'];
    $deptName = $_POST['deptName'];

    $updateDeptQuery = "UPDATE department SET DEPT_NAME = '$deptName' WHERE DEPT_ID = $deptID";
    $updateDeptRes = mysql_query($updateDeptQuery) or die(mysql_error());
    if($updateDeptRes)
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

    <title>Admin: Jabatan</title>

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
            $deptTable = "<table class='table table-striped border-top' id='sample_1'>
                        <thead>
                        <tr class='info'>
                          <th> <center>No</center> </th>
                          <th>Nama Jabatan</th>
                          <th>Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>";

            $deptQuery = "SELECT DEPT_ID, DEPT_NAME FROM department";

            $deptRes = mysql_query($deptQuery);

            if(mysql_num_rows($deptRes) > 0)
            {
              $i = 1;
              while($deptRow = mysql_fetch_array($deptRes))
              {
                $deptID = $deptRow['DEPT_ID'];
                $deptName = $deptRow['DEPT_NAME'];

                $deptTable .= "<tr>
                                  <td> <center>$i</center> </td>
                                  <td> $deptName </td>
                                  <td> 
                                    <a href='admin_department.php?delDept=$deptID' class='confirmClick'> <span class='label label-danger'> <i class='icon-trash'></i></span></a> 
                                    <a href='admin_department.php?updateDept=$deptID'> <span class='label label-info'> <i class='icon-edit'></i></span></a> 
                                  </td>
                                </tr>";
                $i++;
              }
            }
            else
            {
              $deptTable .= "<tr><td colspan='3'> Tiada Jabatan Ditemui </td></tr>";
            }

            $deptTable .= "</tbody></table>";
            echo $deptTable;
          ?>

          <br/><br/>

          <a href="#myModal" data-toggle="modal" class="btn btn-xs btn-success">Tambah Jabatan</a>

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Jabatan Baru</h4>
                      </div>
                      <div class="modal-body">

                          <form role="form" method="POST">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Jabatan:</label>
                                  <input type="text" class="form-control" name="deptName" required>
                              </div>
                              <button type="submit" class="btn btn-default" name="newDept">Hantar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

          <?php
            if(isset($_GET['updateDept']))
            {
              $deptID = $_GET['updateDept'];
              $deptName = getDeptName($deptID);

              $updateForm = "<br/><br/><form method='POST'>
                              <input type='hidden' name='deptID' value='$deptID'>
                              <input type='text' name='deptName' value='$deptName' placeholder='Nama Jabatan' required><br/>
                              <input type='submit' name='updtDept' class='btn btn-info' value='Kemaskini'>
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
