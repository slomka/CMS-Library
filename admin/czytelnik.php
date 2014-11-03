<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
	$db->select_db("$dbname");
	$query="select * from czytelnik";
	$result=$db->query($query);
//szukanie ilości rekordów
	$num_rows=$result->num_rows;
?>

<head>
<style>
td{ text-align:center; }
#info{color:red; top:5px; position:fixed;
}
</style>
<center>
</head>

<?php
//czytelnik info
if(isset($_GET['c_id'])){

	$db=new mysqli("$dbhost","$dbuser","$dbpass");
	$db->select_db("$dbname");
	$query="select * from czytelnik";
	$result2=$db->query($query);
	$num_rows=$result2->num_rows;
	$stu_id=$_GET['c_id'];
	echo "<h2>Informacje o czytelniku</h2>";
	echo "<table></tr><td>Numer czytelnika</td><td width=\"280\">Imię i nazwisko czytelnika</td><td width=\"280\">Adres</td><td width=\"140\">Telefon</td></tr>";
for($i=0;$i<$num_rows;$i++){
	$row2=$result2->fetch_row();
		if($stu_id==$row2[0]){
			echo "<tr><td>$row2[0]</td><td width=\"280\">$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td></tr>";
		}
}
		echo "</table>";
	$query="select * from wypozyczenie";
	$result6=$db->query($query);
	$num_rows6=$result6->num_rows;

		echo "<h2>Historia książki</h2>";
		echo "<table>";
		echo "<tr><td>Numer książki</td><td>Data wypożyczenia</td><td>Zwrot</td></tr>";
for($i=0;$i<$num_rows6;$i++){ 
	$row6=$result6->fetch_row();
		if($row6[0]==$stu_id){
			echo "<tr>";
			echo "<td>$row6[1] </td><td width=\"200\">$row6[2]</td>";
				if($row6[3]==1){
					echo "<td><font color=\"green\">TAK</font></td>"; 
				}else{
					echo "<td><font color=\"red\">NIE</font></td>"; 
					 }
				echo "</tr>";
		}
} echo "</table><br>"; 
	include '../footer.php'; exit();
}

?>


<br>
<h2>Czytelnik/Karta biblioteczna</h2>
Ilość czytelników: <?php echo $num_rows; ?>
<table>
<tr>
<td>ID czytelnika</td>
<td>Imię i nazwisko</td>
<td>Adres</td>
<td>Telefon</td>
</tr>



<?php
for($i=0;$i<$num_rows;$i++){
    //pobieram rekordy
    $row=$result->fetch_row();
	echo "<tr>";
    echo "<td width=\"60\"><a href=\"?c_id=$row[0]\">$row[0]</a></td>" ; 
	echo "<td width=\"200\">$row[1]</td>" ;
	echo "<td width=\"30\">$row[2]</td>" ;
	echo "<td width=\"30\">$row[3]</td>" ;
	echo "</tr>";
}	
echo "</table>";	
?>
<br />

<?php include '../footer.php'; ?>
</center>
