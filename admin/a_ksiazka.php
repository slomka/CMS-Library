<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_POST['submit'])){
	$b_name=$_POST['tytul'];
	$a_name=$_POST['autor'];
	$ilosc=$_POST['ilosc'];
	$obecna_ilosc="0";
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//dodawanie danych do bazy
		if($db->query("insert into ksiazka (autor,ilosc,obecna_ilosc,tytul) values ('$a_name', '$ilosc', '$obecna_ilosc', '$b_name')")){
			echo "DODANO NOWĄ KSIĄŻKĘ";}
		else { 
		echo "dodanie książki nie powiodło się"; 
			 }
}
?>

<form action="<?php $_PHP_SELF ?>" method="POST"><center><br />
	<table>
		<tr><td>Nazwa książki</td><td><input type="text" name="tytul"></td></tr>
		<tr><td>Autor książki</td><td><input type="text" name="autor"></td></tr>
		<tr><td>Ilość sztuk na stan</td><td><input type="text" name="ilosc"></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="Dodaj książkę"/></td></tr>
	</table><br />
</form>

<?php include '../footer.php'; ?>
</center>
