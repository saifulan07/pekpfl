<?php
  require_once('connection.php');
  require_once('session.php');
?>

<?php
  if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $pswd = $_POST['password'];

    // Admin Login
    $adLoginQuery = "SELECT AD_ID, AD_NAME, AD_EMAIL, AD_PSWD
                      FROM admin
                      WHERE AD_EMAIL = '$email'
                      AND AD_PSWD = '$pswd'";
    echo "$adLoginQuery";
    $adLoginRes = mysql_query($adLoginQuery) or die(mysql_error());

    if(mysql_num_rows($adLoginRes) > 0)
    {
      $adRow = mysql_fetch_array($adLoginRes);
      $_SESSION['userID'] = $adRow['AD_ID'];
      $_SESSION['userName'] = $adRow['AD_NAME'];
      $_SESSION['role'] = "AD";
      header('Location: admin_index.php');
    }

    // Department Leader Login
    $dlLoginQuery = "SELECT DL_ID, DL_DEPTID, DL_NAME, DL_EMAIL, DL_PSWD
                      FROM deptldr
                      WHERE DL_EMAIL = '$email'
                      AND DL_PSWD = '$pswd'";
    $dlLoginRes = mysql_query($dlLoginQuery);

    if(mysql_num_rows($dlLoginRes) > 0)
    {
      $dlRow = mysql_fetch_array($dlLoginRes);
      $_SESSION['userID'] = $dlRow['DL_ID'];
      $_SESSION['userName'] = $dlRow['DL_NAME'];
      $_SESSION['role'] = "DL";
      header('Location: dl_index.php');
    }

    $loginMsg = "<p class='text-error'> Login Error </p>";

  }
?>

<?php
  if(isset($_POST['submitReq']))
  {
    $name = $_POST['name'];
    $icNo = $_POST['icNo'];
    $email = $_POST['email'];
    $posID = $_POST['position'];

    $reqQuery = "INSERT INTO application
                (APP_ID, APP_POSID, APP_NAME, APP_IC, APP_EMAIL, APP_STATLDR, APP_STATAD)
                VALUES (NULL, $posID, '$name', '$icNo', '$email', 'PENDING', 'PENDING')";

    $reqResult = mysql_query($reqQuery) or die(mysql_error());

    if($reqResult)
    {
      notiDL($name, $posID);
      $msg = "<p class='text-success'> Permohonan anda telah berjaya disimpan </p>";
    }
    else
    {
      $msg = "<p class='text-error'> Permohonan anda tidak berjaya dihantar </p>";
    }

  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Permohonan Emel Kerajaan Pahang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <script type="text/javascript">
      window.onload = function() {
        $("#position").chained("#department");
      };
    </script>

  </head>
  <body>

    <?php include('index_navbar.php'); ?>
    <div class="container-fluid">
      
      <div class="row-fluid">

        <div class="span12">
          <div class="hero-unit">
          <center> <img src="img/permohonan-email-kerjaan-negeri-pahang.png"> </center>

          <?php echo "<center> $loginMsg </center>";?>
          <!-- <center><h3>PERMOHONAN EMEL KERAJAAN PAHANG</h3></center> -->
          <br/><br/>
          <?php echo "<center> $msg </center>";?>
            <form method="POST">
              <center>
                <input type="text" name="name" placeholder="Nama Pemohon" required> <br/>
                <input type="text" name="icNo" maxlength="12" placeholder="No Kad Pengenalan" required> <br/>
                <input type="email" name="email" placeholder="Emel" required> <br/>

                <?php
                  $deptQuery = "SELECT DEPT_ID, DEPT_NAME FROM department";
                  $deptResult = mysql_query($deptQuery);

                  if(mysql_num_rows($deptResult) > 0)
                  {
                    $deptOpt = "<option value=''>-Pilih Jabatan-</option>\n";
                    while($deptRow = mysql_fetch_array($deptResult))
                    {
                      $deptID = $deptRow['DEPT_ID'];
                      $deptName = $deptRow['DEPT_NAME'];

                      $deptOpt .= "<option value='$deptID'> $deptName </option>\n";

                      $posQuery = "SELECT p.POS_ID, p.POS_DEPTID, p.POS_NAME
                                    FROM position p, department d
                                    WHERE p.POS_DEPTID = p.POS_DEPTID
                                    AND d.DEPT_ID = $deptID";
                      $posResult = mysql_query($posQuery);
                      $posOpt = "";
                      if(mysql_num_rows($posResult) > 0)
                      {
                        $posOpt .= "<option value=''>-Pilih Jawatan-</option>";
                        while($posRow = mysql_fetch_array($posResult))
                        {
                          $posID = $posRow['POS_ID'];
                          $posDeptID = $posRow['POS_DEPTID'];
                          $posName = $posRow['POS_NAME'];

                          $posOpt .= "<option class='$posDeptID' value='$posID'>$posName</option>\n";
                        }
                      }
                      else
                      {
                        $posOpt .= "<option value=''>-No Position Found-</option>";
                      }
                    }
                  }
                  else
                  {
                    echo "No Department Defined";
                  }

                  echo "<select id='department' name='department'>". $deptOpt ."</select><br/>";
                  echo "<select id='position' name='position'>". $posOpt ."</select><br/>";

                ?>

                <input type="submit" name="submitReq" value="Hantar" class="btn btn-primary">
              </center>
            </form>
          </div>

        </div>
      </div>
    </div>

    
  <?php include('JS.php'); ?>
  </body>
</html>