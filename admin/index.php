<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>


<?php
$mysqli = new MySQLi($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());

$query = "SELECT id, autor, ilosc, obecna_ilosc, tytul FROM ksiazka";
 
// uruchamiam zapytaniei przechowuje rezultat w zmiennej $result
$result = $mysqli->query($query) or die(mysqli_error($mysqli));

if ($result) {
 
   // tworzę nowy formularz i dodaje wynik zapytania do tabeli
   echo "<form method='post' action='delete.php'>"; 
   echo "<table cellspacing='0' cellpadding='15'>
 
	   <th width='15%'>Numer książki</th>
	   <th width='55%'>Tytuł książki</th>
	   <th width='15%'>Autor książki</th>
	   <th width='15%'>Ilość sztuk książki</th>
	   <th width='15%'>Ilość dostępnych książek</th>
	   <th width='15%'>Wypożyczenie książki</th>
	   <th width='15%'>Zaznacz do usunięcia</th>
	";
 
 $total=0;
 $tstoke=0;
 $tout=0;
   while ($row = $result->fetch_object()) {
   
   $total=$total+$row->ilosc;
   
   $id = $row->id;
   $name = $row->tytul;
   $aurther = $row->autor;
   $quantity = $row->ilosc;
   $now = $row->obecna_ilosc;
  

   //dodaję każdy rekord do nowej tabeli z checkbox
   echo "<tr>";
   echo "<td>$id</td>";
   echo "<td>$name</td>";
   echo "<td>$aurther</td>";
   echo "<td>$quantity</td>";
   
    $stoke=$quantity-$now;
	$tstoke=$tstoke+$stoke;
	$tout=$total-$tstoke;	
	echo "<td>$stoke</td>";
	if($stoke!=0){
	echo "<td><a href=\"wypozyczenie.php?id=$id\">wypożycz książkę</a></td>";
	}
	else{
	echo "<td width=\"80\">brak na stanie</td>";
	}
   echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]'  value=$id /></td>";
   echo "</tr>"; 
   }
	echo "<tr>";
   // kiedy pętla się skończy zamykam listę
   echo "</table><br />";
   echo '<div id="button_usun">';
   echo"<input id='delete' type='submit' name='delete' value='Usuń zaznaczone książki'/>";
   echo "</div>";
   echo "</form>";
   }
   echo "</tr>"
?>
</div>
<?php include '../footer.php'; ?>
</center>