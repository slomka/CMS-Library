<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$imie_nazwisko=$_POST['imie_nazwisko'];
	$dept=$_POST['adres'];
	$mobile=$_POST['telefon'];
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//dodawanie danych do bazy
		if($db->query("insert into czytelnik (id,imie_nazwisko,adres,telefon) values ('$id', '$imie_nazwisko', '$dept', '$mobile')")){
		echo "Czytelnik został dodany";}
		else { echo "niepowodzenie"; }
}
?>

<form action="<?php $_PHP_SELF ?>" method="POST"><center><br />
	<table>
		<tr><td>Imię i nazwisko</td><td><input type="text" name="imie_nazwisko"></td></tr>
		<tr><td>Numer ID</td><td><input type="text" name="id"></td></tr>
		<tr><td>Adres</td><td><input type="text" name="adres"></td></tr>
		<tr><td>Telefon</td><td><input type="text" name="telefon"></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="Dodaj czytelnika"/></td></tr>
	</table>
</form></br />

<?php include '../footer.php'; ?>
</center>
