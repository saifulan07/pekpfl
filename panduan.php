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
          <p class="text-center">Panduan Permohonan Emel</p>

          <div class="accordion" id="accordion2">

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                 Nama Pemohon
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse">
                <div class="accordion-inner">
                  <p><small> Nama pemohon hendaklah sama seperti di dalam kad pengenalan.</small></p>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                  No. Kad Pengenalan
                </a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                  <p><small> Sila pastikan No. Kad Pengenalan yang dimasukkan sama seperti di dalam kad pengenalan tanpa "-".</small></p>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                  Emel
                </a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                  <p><small> Sila pastikan emel yang dimasukkan adalah sah. Emel pemohon yang sah diperlukan untuk menghantar status permohonan emel Kerajaan Pahang kepada pemohon.</small></p>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                  Jabatan Dan jawatan
                </a>
              </div>
              <div id="collapseFour" class="accordion-body collapse">
                <div class="accordion-inner">
                  <p><small> Sila pilih Jabatan dan Jawatan yang tepat. Pemohon hendaklah memilih Jabatan terlebih dahulu sebelum dibenarkan untuk memilih Jawatan.</small></p>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                  Menghantar Permohonan
                </a>
              </div>
              <div id="collapseFive" class="accordion-body collapse">
                <div class="accordion-inner">
                  <p><small> Setelah memastikan semua maklumat yang dimaksudkan tepat, pemohon boleh menghantar permohonan dengan menekan butang "Hantar". Setelah permohonan berjaya dihantar, mesej status akan dipaparkan.</small></p>
                </div>
              </div>
            </div>
          </div>
            
          </div>

        </div>
      </div>
    </div>

    
  <?php include('JS.php'); ?>
  </body>
</html>