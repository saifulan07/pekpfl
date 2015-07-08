<?php
	// API Object
	//  $api=new COM('IceWarpServer.APIObject');
	//  $tarpit = $api->GetProperty('C_Mail_Security_Tarpit_Enable');
	//  echo 'Tarpitting is '.($tarpit==0 ? 'disabled':'enabled').'<br />';
	//  $api->SetProperty('C_Mail_Security_Tarpit_Enable', ($tarpit==0 ? 1 : 0));
	//  echo 'Tarpitting has been '.($tarpit==0 ? 'enabled':'disabled');
	//  $api->Save();
	//  $api->UpdateConfiguration();

	//  // #############################################################################

	// $token = new COM("IceWarpServer.TokenObject");
	// $token->URL = "user@domain.com:password@IP:32000";

	// $api = new COM("IceWarpServer.APIObject");
	// $api->TokenHandle = $token->TokenHandle;
	// echo "Icewarp version: [" . $api->GetProperty("c_version") . "]<br>";

	// $api->Done;
?>

<?php
	// Domain Object
	 // $dom=new COM('IceWarpServer.DomainObject');
	 // $dom->New('icewarpdemo.com');
	 // $dom->Save();
	 // echo 'icewarpdemo.com was created';
?>

<?php
	// Account Object
	$account = new COM('IceWarpServer.AccountObject');
	$account->New('newuser@icewarpdemo.com');
	$account->SetProperty('U_Password', 'newpassword');
	if($account->Save()){
		echo 'Account newuser@icewarpdemo.com was created';
	}
	else{
		echo 'Error creating account newaccount@icewarpdemo.com';
	}
?>

<?php
	// Test API // tak run lgi
	// Connect kt domain dulu
	$domain = new COM('IceWarpServer.DomainObject');
	$domain = $com->NewDomain("domainicewarppahang");
	$domain->SetProperty("d_postmaster", "postmaster;webmaster;admin");
	$domain->SetProperty("d_description", "Demo Domain");
	$domain->IPAddress = "192.168.0.1;192.168.0.2";
	$domain->Save();

	// Contoh insert user
	// Set acc details
	$account = new COM('IceWarpServer.AccountObject');
	$account->SetProperty("u_name", "My Name");
	$account->SetProperty("u_password", "pass01");
	$account->Save();
	$account = $domain->NewAccount("test");
?>

<html>
<head>
	<title>IceWarp Test</title>
</head>
<body>

</body>
</html>