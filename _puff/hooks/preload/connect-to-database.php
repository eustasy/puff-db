<?php

include __DIR__.'/../../settings.db.php';

////	Database Connection
$Sitewide['Database']['Connection'] = mysqli_connect(
	$Sitewide['Settings']['DB']['Hostname'],
	$Sitewide['Settings']['DB']['Username'],
	$Sitewide['Settings']['DB']['Password'],
	$Sitewide['Settings']['DB']['Default Table']
);
if ( !$Sitewide['Database']['Connection'] ) {
	if ( $Sitewide['Settings']['DB']['Fatal on Error'] ) {
		?><!DocType html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Puff: Fatal Error</title>
	</head>
	<body>
		<h1>Puff: Fatal Error</h1>
		<p>Puff has encountered a fatal error while connecting and cannot continue.</p>
		<h3>Connection Error: &quot;<?php echo mysqli_connect_error($Sitewide['Database']['Connection']); ?>&quot;</h3>
	</body>
</html><?php
		exit;
	} else {
		$Sitewide['Database']['Error'] = mysqli_connect_error($Sitewide['Database']['Connection']);
	}
} else {
	$Sitewide['Database']['Error'] = false;
}
