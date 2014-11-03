<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<?php
	$db=new mysqli("$dbhost","$dbuser","$dbpass");
	$db->select_db("$dbname");
	$query="select * from ksiazka";
	$result=$db->query($query);
	
	//szukanie ilości wierszy
	$num_rows=$result->num_rows;
?>

<div id="box"><center><br />
	<div id="menu">
		<h2>Pełna lista książek w bibliotece</h2>
<table>
	<tr>
	<td>Numer książki</td>
	<td>Tytuł książki</td>
	<td>Autor książki</td>
	<td>Ilość sztuk</td>
	<td>Ilość dostępnych sztuk</td>
	</tr>

<?php
$total=0;
$tdostepne=0;
$calosc=0;
for($i=0;$i<$num_rows;$i++){
//pobieranie wiersza
    $row=$result->fetch_row();
	$total=$total+$row[2];
	echo "<tr>";
    echo "<td width=\"100\">$row[0]</td>" ; 
	echo "<td width=\"420\">$row[4]</td>" ;
	echo "<td width=\"280\">$row[1]</td>" ;
	echo "<td width=\"100\">$row[2]</td>" ;
	$dostepne=$row[2]-$row[3];
	$tdostepne=$tdostepne+$dostepne;
	$calosc=$total-$tdostepne;
	echo "<td width=\"30\">$dostepne</td>" ;
	echo "</tr>";
}	
	echo "</table>";	
?>
</center><br /><br />
	</div>
</div>
	<div id="menu_menu">
            <h3>Informacje o bibliotece</h3>
            <div>
                <p>Biblioteka posiada <?php echo $num_rows; ?> różnych tytułów wydawniczych</p>
				<p>Całkowita liczba książek to : <?php echo $total; ?></p>
				<p>Ilość dostępnych książek: <?php echo $tdostepne; ?></p>
				<p>Ilosc książek wypożyczonych: <?php echo $calosc; ?></p>
            </div>
			
	</div>
<div id="box"><center><br />
<table>

<form action="" method="post">Wyszukaj interesującą Cię książkę: <input type="text" name="tytul" placeholder="Szukana fraza" /> 
	<input type="submit" value="Szukaj" />  
</form>
  
<?php
if (!empty($_REQUEST['tytul'])) {
	$tytul = mysql_real_escape_string($_REQUEST['tytul']);     
	$query = "SELECT * FROM ksiazka WHERE tytul LIKE '%".$tytul."%'"; 
	$result=$db->query($query);
//szukanie ilości rekordów
	$num_rows=$result->num_rows;

$total=0;
$tdostepne=0;
$calosc=0;

for($i=0;$i<$num_rows;$i++){
 //pobieranie rekordw
    $row=$result->fetch_row();
	$total=$total+$row[2];
	echo "<tr>";
    echo "<td width=\"100\">$row[0]</td>" ; 
	echo "<td width=\"420\">$row[4]</td>" ;
	echo "<td width=\"280\">$row[1]</td>" ;
	echo "<td width=\"100\">$row[2]</td>" ;
	$dostepne=$row[2]-$row[3];
	$tdostepne=$tdostepne+$dostepne;
	$calosc=$total-$tdostepne;
	echo "<td width=\"30\">$dostepne</td>" ;
	echo "</tr>";
}  
	echo "</table>";
} //elseif (empty($_REQUEST['tytul'])){ 
//} elseif ($i = 0){
//	echo "wpisz porawne dane";}
?>
<?php include 'footer.php'; ?>