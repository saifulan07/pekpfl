<?php
	// header('Content-Type: application/json');

	$apprvByDLQuery = "SELECT COUNT(APP_ID) as apprvDL FROM application WHERE APP_STATLDR = 'APPROVED'";
	$apprvByDLRes = mysql_query($apprvByDLQuery) or die(mysql_error());
	if(mysql_num_rows($apprvByDLRes) > 0)
	{
		$apprvRow = mysql_fetch_array($apprvByDLRes);
		$apprvDL = $apprvRow['apprvDL'];
	}
	else
	{
		$apprvDL = 0;
	}

	$pndgByDLQuery = "SELECT COUNT(APP_ID) as pndgDL FROM application WHERE APP_STATLDR = 'PENDING'";
	$pndgByDLRes = mysql_query($pndgByDLQuery) or die(mysql_error());
	if(mysql_num_rows($pndgByDLRes) > 0)
	{
		$pndgRow = mysql_fetch_array($pndgByDLRes);
		$pndgDL = $pndgRow['pndgDL'];
	}
	else
	{
		$pndgDL = 0;
	}

	$apprvByADQuery = "SELECT COUNT(APP_ID) as apprvAD FROM application WHERE APP_STATAD = 'APPROVED'";
	$apprvByADRes = mysql_query($apprvByADQuery) or die(mysql_error());
	if(mysql_num_rows($apprvByADRes) > 0)
	{
		$apprvRow = mysql_fetch_array($apprvByADRes);
		$apprvAD = $apprvRow['apprvAD'];
	}
	else
	{
		$apprvAD = 0;
	}

	$pndgByADQuery = "SELECT COUNT(APP_ID) as pndgAD FROM application WHERE APP_STATAD = 'PENDING'";
	$pndgByADRes = mysql_query($pndgByADQuery) or die(mysql_error());
	if(mysql_num_rows($pndgByADRes) > 0)
	{
		$pndgRow = mysql_fetch_array($pndgByADRes);
		$pndgAD = $pndgRow['pndgAD'];
	}
	else
	{
		$pndgAD = 0;
	}
?>