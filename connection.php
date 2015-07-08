<?php
	$mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "123456";
	$mysql_database = "eemelreq";
	$prefix = "";
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>

<?php
	function notiDL($appName, $appPosID)
	{
		$sysEmail = "emel.reqSys@gmail.com";
		$sysPswd = "eemelreq";

		$deptName = getDeptNamebyPosID($appPosID);
		$posName = getPosName($appPosID);
		
		$dlQuery = "SELECT dl.DL_NAME, dl.DL_EMAIL
					FROM deptldr dl, department d, position p
					WHERE d.DEPT_ID = dl.DL_DEPTID
					AND d.DEPT_ID = p.POS_DEPTID
					AND p.POS_ID = $appPosID";
		$dlRes = mysql_query($dlQuery) or die(mysql_error());
		if(mysql_num_rows($dlRes) > 0)
		{
			while($dlRow = mysql_fetch_array($dlRes))
			{
				$mail = NULL;
				$dlName = $dlRow['DL_NAME'];
				$dlEmail = $dlRow['DL_EMAIL'];

				include "SMTP/class.phpmailer.php";
				$bodyString = "<b> Permohonan Emel Kerajaan Pahang </b> <br/><br/>
							   En./Cik./Pn. ".$dlName.", <br/>
							   Pemberitahuan tentang permohonan baru daripada: <br/>
							   Nama: $appName <br/>
							   Jabatan: $deptName <br/>
							   Jawatan: $posName <br/>
							   Sila log masuk ke http://192.168.1.154/eemelReq untuk tindakan lanjut. <br/><br/>
							   Terima Kasih.
							  ";

				$mail = new PHPMailer();
				$mail->IsSMTP(); 
				$mail->SMTPDebug = 1; 
				$mail->SMTPAuth = true; 
				$mail->SMTPSecure = 'ssl'; 
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; 
				$mail->IsHTML(true);
				$mail->Username = $sysEmail;
				$mail->Password = $sysPswd;
				$mail->SetFrom("$sysEmail");
				$mail->Subject = "Permohonan Baru";
				$mail->Body = $bodyString;
				$mail->AddAddress($dlEmail);
				if(!$mail->Send()){
					echo "Mailer Error: " . $mail->ErrorInfo;
				}
				else
				{
					// echo "Email has been sent to $appEmail";
				}
			}
		}
		
	}

	function notiApplicant($appID, $appPMail, $appPPswd)
	{
		$sysEmail = "emel.reqSys@gmail.com";
		$sysPswd = "eemelreq";
		$appDataQuery = "SELECT APP_NAME, APP_EMAIL FROM application WHERE APP_ID = $appID";
		$appDataRes = mysql_query($appDataQuery) or die(mysql_error());
		if(mysql_num_rows($appDataRes) > 0)
		{
			$appDataRow = mysql_fetch_array($appDataRes);
			$appName = $appDataRow['APP_NAME'];
			$appEmail = $appDataRow['APP_EMAIL'];

			include "SMTP/class.phpmailer.php";
			$bodyString = "<b> Permohonan Emel Kerajaan Pahang </b> <br/><br/>
						   En./Cik./Pn. ".$appName.", <br/>
						   Permohonan emel anda telah diluluskan. <br/>
						   Emel: $appPMail <br/>
						   Kata Laluan: $appPPswd <br/>
						   Sila tukar kata laluan anda dengan segera. <br/><br/>
						   Terima Kasih.
						  ";
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); 
			$mail->SMTPDebug = 1; 
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; 
			$mail->IsHTML(true);
			$mail->Username = $sysEmail;
			$mail->Password = $sysPswd;
			$mail->SetFrom("$sysEmail");
			$mail->Subject = "Notifikasi Permohonan Emel Kerajaan Pahang";
			$mail->Body = $bodyString;
			$mail->AddAddress($appEmail);
			if(!$mail->Send()){
				echo "Mailer Error:" . $mail->ErrorInfo;
			}
			else
			{
				echo "Email has been sent to $appEmail";
			}
		}
		
	}
	
	function getDeptNamebyPosID($posID)
	{
		$Query = "SELECT d.DEPT_NAME
					FROM department d, position p
					WHERE p.POS_DEPTID = d.DEPT_ID
					AND p.POS_ID = $posID";
		$Res = mysql_query($Query) or die(mysql_error());
		$NameRow = mysql_fetch_array($Res);
		return $NameRow['DEPT_NAME'];
	}

	function getPosName($posID)
	{
		$Query = "SELECT POS_NAME FROM position WHERE POS_ID = $posID";
		$Res = mysql_query($Query) or die(mysql_error());
		$NameRow = mysql_fetch_array($Res);
		return $NameRow['POS_NAME'];
	}

	function getDeptName($deptID)
	{
		$deptNameQuery = "SELECT DEPT_NAME FROM department WHERE DEPT_ID = $deptID";
		$deptNameRes = mysql_query($deptNameQuery) or die(mysql_error());
		$deptNameRow = mysql_fetch_array($deptNameRes);
		return $deptNameRow['DEPT_NAME'];
	}

	function getDLName($DLID)
	{
		$DLNameQuery = "SELECT DL_NAME FROM deptldr WHERE DL_ID = $DLID";
		$DLNameRes = mysql_query($DLNameQuery) or die(mysql_error());
		$DLNameRow = mysql_fetch_array($DLNameRes);
		return $DLNameRow['DL_NAME'];
	}

	function getDLEmail($DLID)
	{
		$DLEmailQuery = "SELECT DL_EMAIL FROM deptldr WHERE DL_ID = $DLID";
		$DLEmailRes = mysql_query($DLEmailQuery) or die(mysql_error());
		$DLEmailRow = mysql_fetch_array($DLEmailRes);
		return $DLEmailRow['DL_EMAIL'];
	}

	function isAllowedAD($userRole)
	{
		if(strcmp($userRole, "AD") !== 0)
		{
			header('Location: index.php');
		}
	}

	function isAllowedDL($userRole)
	{
		if(strcmp($userRole, "DL") !== 0)
		{
			header('Location: index.php');
		}
	}

?>