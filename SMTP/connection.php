<?php

# Type="MYSQL"
# HTTP="true"
$hostname_OFYP_M2 = "localhost";
$database_OFYP_M2 = "onlinefyp";
$username_OFYP_M2 = "root";
$password_OFYP_M2 = "";
$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
	
?>

<?php
	function getUserID($LoginID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$ID_Query = "SELECT USR_ID FROM USERS where USR_EMAIL='$LoginID'";
		
		$ID_Result = mysql_query($ID_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$ID_Array = mysql_fetch_array($ID_Result);
  
		$ID = $ID_Array[0];
		
		return $ID;
	
	}
?>

<?php
	function getUserIDbyEmail($email)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$ID_Query = "SELECT USR_ID FROM USERS where USR_EMAIL='$email'";
		
		$ID_Result = mysql_query($ID_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$ID_Array = mysql_fetch_array($ID_Result);
  
		$ID = $ID_Array[0];
		
		return $ID;
	
	}
?>


<?php	
	function getUserRole($ID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$User_Role_Query = "SELECT USR_ROLE FROM USERS where USR_ID='$ID'";
		
		$Role_Result = mysql_query($User_Role_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$Role_Array = mysql_fetch_array($Role_Result);
  
		$Role = $Role_Array[0];
		
		return $Role;
	
	}

?>

<?php	
	function getUserFName($ID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$User_FName_Query = "SELECT USR_FNAME FROM USERS where USR_ID='$ID'";
		
		$FName_Result = mysql_query($User_FName_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$FNAME_Array = mysql_fetch_array($FName_Result);
  
		$FNAME = $FNAME_Array[0];
		
		return $FNAME;
	
	}

?>

<?php	
	function getUserUnreadPM($userID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$UserUnreadPM_Query = "SELECT COUNT(*) AS NUMOFUNREADPM 
							   FROM PRIVATE_MESSAGE 
							   WHERE PM_RECEIVERID = '$userID'
							   AND PM_STATUS = 'UNREAD'
							   ";
		$UserUnreadPM_Result = mysql_query($UserUnreadPM_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$UserUnreadPM_Array = mysql_fetch_array($UserUnreadPM_Result);
  
		$UserUnreadPM = $UserUnreadPM_Array[0];
		
		if($UserUnreadPM >= 1)
		{
			$UserUnreadPM = $UserUnreadPM;
		}
		else
		{
			$UserUnreadPM = "";
		}

		return $UserUnreadPM;
	
	}

?>

<?php	
	function getProjectName($PRJ_ID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$User_PRJName_Query = "SELECT PRJ_NAME FROM PROJECT where PRJ_ID='$PRJ_ID'";
		
		$PRJName_Result = mysql_query($User_PRJName_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$PRJName_Array = mysql_fetch_array($PRJName_Result);
  
		$PRJName = $PRJName_Array[0];
		
		return $PRJName;
	
	}

?>

<?php	
	function getProjectDesc($PRJ_ID)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "onlinefyp";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		$User_PRJDesc_Query = "SELECT PRJ_DESC FROM PROJECT where PRJ_ID='$PRJ_ID'";
		
		$PRJDesc_Result = mysql_query($User_PRJDesc_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$PRJDesc_Array = mysql_fetch_array($PRJDesc_Result);
  
		$PRJDesc = $PRJDesc_Array[0];
		
		return $PRJDesc;
	
	}

?>

<?php
	function sendNotification($UserID, $NotiCode)
	{
		$hostname_OFYP_M2 = "localhost";
		$database_OFYP_M2 = "OnlineFYP";
		$username_OFYP_M2 = "root";
		$password_OFYP_M2 = "";
		
		$OFYP_M2_CNNT = mysql_pconnect($hostname_OFYP_M2, $username_OFYP_M2, $password_OFYP_M2) or trigger_error(mysql_error(),E_USER_ERROR);
		mysql_select_db($database_OFYP_M2, $OFYP_M2_CNNT);
		
		//get user email address
		$emailQuery = "SELECT USR_EMAIL
						FROM users
						WHERE USR_ID ='$UserID'
					  ";
		$emailQuery_Result = mysql_query($emailQuery, $OFYP_M2_CNNT) or die(mysql_error());
		$emailQuery_Array = mysql_fetch_array($emailQuery_Result);
  
		$UserEmail = $emailQuery_Array[0];
		
		//get user full name
		$User_FName_Query = "SELECT USR_FNAME FROM USERS where USR_ID='$UserID'";
		
		$FName_Result = mysql_query($User_FName_Query, $OFYP_M2_CNNT) or die(mysql_error());
		$FNAME_Array = mysql_fetch_array($FName_Result);
  
		$UserFname = $FNAME_Array[0];
		
		if($NotiCode == 001)
		{
			$notiDesc = "created a project";
		}
		else if($NotiCode == 002)
		{
			$notiDesc = "been enrolled in a project, please check immediately";
		}
		else if($NotiCode == 003)
		{
			$notiDesc = "NotificationCode 003";
		}
		else if($NotiCode == 004)
		{
			$notiDesc = "NotificationCode 004";
		}
		else if($NotiCode == 005)
		{
			$notiDesc = "NotificationCode 005";
		}
		
		$bodyString = "<b> OnlineFYP: Notification Email </b> <br/>
					   Dear ".$UserFname.", <br/>
					   You have ".$notiDesc.". <br/>
					   
					   <br/>
					   Generated by: <br/>
					   OnlineFYP: Project Management System[Collaboration Feature] <br/>
		
					  ";
		
		//Email Forging process
                require_once(dirname(__FILE__)."/class.phpmailer.php");
		//include "SMTP/class.phpmailer.php";
		
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 1; 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; 
		$mail->IsHTML(true);
		$mail->Username = "ofyp.pms@gmail.com";
		$mail->Password = "onlinefyp1234";
		$mail->SetFrom("ofyp.pms@gmail.com");
		$mail->Subject = "OnlineFYP: Notification Email";
		$mail->Body = $bodyString;
		$mail->AddAddress($UserEmail);
		 if(!$mail->Send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
			echo "Email has been sent to $UserEmail";
		}
	
	
	}

?>

<?php
	function activityLog($userID, $prjID, $logCode)
	{
		$query_PEID = "SELECT PE_ID
						FROM project_enroll
						WHERE PE_USRID = $userID
						AND PE_PRJID = $prjID
						";

		$query_PEID_result = mysql_query($query_PEID);

		if($query_PEID_result)
		{
			$PEID_ROW = mysql_fetch_array($query_PEID_result);

			$PE_ID = $PEID_ROW[0];
		}

		$query_add_log = "INSERT INTO activity_log
							(AL_ID, AL_PEID, AL_ACTID, AL_DATETIME)
							VALUES (NULL, $PE_ID, $logCode, NOW())
						  ";

		$query_addlog_result = mysql_query($query_add_log);

	}
?>

<?php
	function AuthorizationCheck($UserID, $PrjID)
	{
		$autho_query = "SELECT PE_ID
						FROM project_enroll
						WHERE PE_USRID = '$UserID'
						AND PE_PRJID = '$PrjID'";

		$autho_Result = mysql_query($autho_query);

		$row = mysql_fetch_array($autho_Result);

		$result = $row[0];

		if($result != NULL)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
?>

<?php
	function getFileNameFromID($FileID)
	{
		$fileName_query = "SELECT FILE_NAME
							FROM `file`
							WHERE FILE_ID = '$FileID'";

		$fileName_result = mysql_query($fileName_query);

		$fileName_Row = mysql_fetch_array($fileName_result);

		$fileName = $fileName_Row[0];

		return $fileName;
	}

?>




