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

  $pndgByADQuery = "SELECT COUNT(APP_ID) as pndgAD FROM application WHERE APP_STATLDR = 'APPROVED' AND APP_STATAD = 'PENDING'";
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

  $cDeptQ = "SELECT COUNT(DEPT_ID) as cDept FROM department";
  $cDeptRes = mysql_query($cDeptQ) or die(mysql_error());
  if($cDeptRes)
  {
    $cDeptRow = mysql_fetch_array($cDeptRes);
    $cDept = $cDeptRow['cDept'];
  }
  else
  {
    $cDept = 0;
  }

  $cPosQ = "SELECT COUNT(POS_ID) as cPos FROM position";
  $cPosRes = mysql_query($cPosQ) or die(mysql_error());
  if($cPosRes)
  {
    $cPosRow = mysql_fetch_array($cPosRes);
    $cPos = $cPosRow['cPos'];
  }
  else
  {
    $cPos = 0;
  }

  $cADQ = "SELECT COUNT(AD_ID) as cAD FROM admin";
  $cADRes = mysql_query($cADQ) or die(mysql_error());
  if($cADRes)
  {
    $cADRow = mysql_fetch_array($cADRes);
    $cAD = $cADRow['cAD'];
  }
  else
  {
    $cAD = 0;
  }

?>