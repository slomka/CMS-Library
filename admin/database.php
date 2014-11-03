<?php

$dbname="bibliotekarz"; 
$dbhost="localhost"; 
$dbuser="root"; 
$dbpass="root"; 
$max="7"; 
$name="Bibliotekarz"; 
$user="admin"; 
$password="123";
$salt="45&^8#@1)(_+";
$panel='<a href="http://localhost/bibliotekarz/admin/login.php">PANEL ADMINA</a>';



$mysqli = new MySQLi($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());
			?>