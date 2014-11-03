<?php include '../config.php'; ?>
<?php
	$a1=$_POST['a1'];
	$a2=$_POST['a2'];
	
	if(($a1==$user)&&($a2==$password)) {
		session_start();

		header("location: index.php");
	}
	else {
		header("location: login.php?msg=1");
	}
	
?>