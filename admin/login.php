<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PL" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl">
<head>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>PANEL ADMINISTRATORA</title>
</head>

<body>
<div id="login">
<h1>Panel Administratora</h1><br /><br />
	<form action="confirm.php" method="post">
		<h1>Strona logowania</h1><br /><br />
		<?php
			if(isset($_REQUEST["msg"])){
				$tmp=$_REQUEST["msg"];
				if($tmp==1){
					echo "<font color=\"red\">";
					echo "Niepoprawny Login i/lub hasło.<br /><br />";
					echo "</font>";
				}
			}
		?>
		
		Login: <input type="text" name="a1" id=""  /> <br /><br />
		Hasło: <input type="password" name="a2" id="" /> <br /><br />
		
		<input type="submit" value="Zaloguj się" />
	</form><br /><br />
<p><span id="bibliotekarz">&copy BIBLIOTEKARZ</span></p>
</div>	
</body>
</html>