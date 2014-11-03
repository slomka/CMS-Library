<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<body>
<center>

<?php
//zwrot książki
if(isset($_GET['back'])){
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
	$db->select_db("$dbname");
	$query="select * from wypozyczenie";
	$result2=$db->query($query);
	$num_rows=$result2->num_rows;
	$stu_id=$_GET['sid'];
	$book_id=$_GET['bid'];
		for($i=0;$i<$num_rows;$i++){
			$row2=$result2->fetch_row();
			$wartosc=1;
				if($stu_id==$row2[0] && $book_id==$row2[1]){ 
					if($db->query("UPDATE wypozyczenie SET wartosc = '$wartosc' WHERE c_id = '$stu_id' AND k_id = '$book_id'")){ 
						echo "<br>Proces oddawania zakończony."; 
					}
				}
}
	$query="select * from ksiazka";
	$result5=$db->query($query);
//szukanie ilości rekordów
	$num_rows5=$result5->num_rows;
	for($i=0;$i<$num_rows5;$i++){
        $row5=$result5->fetch_row(); 
			if($row5[0]==$book_id){ 
				$obecna_ilosc=$row5[3]-1; 
					if($db->query("UPDATE ksiazka SET obecna_ilosc = '$obecna_ilosc' 
						   WHERE id = '$book_id'"))
				    { echo "<br>Proces oddawania zakończony."; 
					}
			}
	}

}
?>

<?php
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
	$db->select_db("$dbname");
	$query1="select * from wypozyczenie";
	$result1=$db->query($query1);
//szukanie ilości rekordów
	$num_rows=$result1->num_rows;
	$date=date('d'."/" .'m' ."/" .'Y');
?>
<br /><h2>Lista wypożyczonych książek</h2>
<table>
	<tr>
	<td>Numer osoby wypożyczającej</td>
	<td>Numer książki</td>
	<td>Data wypożyczenia</td>
	<td>Dzień</td>
	<td>Odebranie książki</td>
	</tr>
<?php
	$query="select * from wypozyczenie";
	$result=$db->query($query);
for($i=0;$i<$num_rows;$i++){
    //pobieranie rekordów
    $row=$result->fetch_row();
		if($row[3]==0){
			$diff=abs($date - $row[2]);
				echo "<tr>";
				echo "<td><a href=\"czytelnik.php?c_id=$row[0]\" target=\"_blank\">$row[0]</a></td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
			if($diff>=7){
				echo "<td><font color=\"red\">termin minął</font></td>" ; 
			}else{
				echo "<td>$diff</td>" ;
				 }
			echo "<td><a href=\"?back=1&sid=$row[0]&bid=$row[1]\">Zwrócona</a></td>";
			echo "</tr>";
	
	}
	
}
echo "</table></br>";	
?>

<?php include '../footer.php'; ?>
</center>