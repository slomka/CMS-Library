<?php
session_start();
include '../config.php';
if($_SESSION["name"]!=$salt)
{
	header("location: login.php");
}
?>
<html>
	<title>Administrator : <?php echo "$name";?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
	<script type='text/javascript' src="css/script.js"></script>
	<center><h1>Panel administratora<?php echo '<br /><br />'."$name"; ?></h1></center>

	<div class="menu">
				  <a href="index.php" class="button">Start</a>
				  <a href="a_ksiazka.php" class="button">Dodaj książkę</a>
				  <a href="out.php" class="button">Książki wypożyczone</a>
				  <a href="czytelnik.php" class="button">Czytelnicy</a>
				  <a href="a_czytelnik.php" class="button">Dodaj Czytelnika</a>
				  <a href="logout.php" class="button">Wyloguj się</a>
	</div>
<div id="box">