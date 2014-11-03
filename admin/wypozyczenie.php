<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_GET['id'])){
$k_id=$_GET['id'];
}

if(isset($_GET['submit'])){
	$k_id=$_GET['k_id'];
	$c_id=$_GET['c_id'];
		echo "Numer książki: $k_id || Numer czytelnika: $c_id ";
	$date=date('d'."/" .'m' ."/" .'Y');
//wypozyczenie książki
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		$val=0;
		$query="select * from wypozyczenie";
		$result=$db->query($query);
		$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++){
			$row=$result->fetch_row();
				if($row[0]==$c_id && $row[1]==$k_id && $row[3]==0){
					echo "<br><font color=\"red\">Czytelnik posiada już tą książkę</font>"; 
						exit(); 
				}	
		}
									
			if($db->query("insert into wypozyczenie (c_id,k_id,date,wartosc) values ('$c_id', '$k_id', '$date', '$val')")){
				echo "><font color=\"green\"><br>Książka dodana do listy wypożyczonych</font>";
			}
										
		
//aktualizacja listy książek
	$query="select * from ksiazka";
	$result=$db->query($query);
//szukanie liczby rekordów
	$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++){
			$row=$result->fetch_row();
				if($k_id==$row[0]){
					echo "<br />Numer książki: $row[0] <br> Tytuł książki: $row[4]<br>Autor: $row[1]";
						$update=$row[3]+1;
						$query="select * from ksiazka";
							if($db->query("UPDATE ksiazka SET obecna_ilosc = '$update' WHERE id = '$row[0]'")){ 
								echo "<br>Lista książek została zaktualizowana"; 
							}
				}
		}	
	exit;
}
?>

<center>
<form type="get" action="<?php $_PHP_SELF ?>">
	<table>
	<tr>
	<td><input type="password" name="k_id" value="<?php echo $k_id; ?>">Numer książki</td><br />
	<td><input type="text" name="c_id">Numer czytelnika</td><br />
	<td><input type="submit" name="submit" value="Wypożycz"></td>
	</tr>
	</table>
</form>
</center>

<?php include '../footer.php'; ?>