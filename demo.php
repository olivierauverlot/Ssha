<?php
	require_once('Ssha.php');
	
	// Password is crypted and compared with the user password
	$ssha = new Ssha;
	$p = $ssha->crypt('password');
	if($ssha->verifyPassword('password',$p)) {
		echo "Password ok!\n";
	} else {
		echo "wrong password\n";
	}
?>