
 <?php
	 require 'database.php';
 
 if($_POST['delete']) // przycisk name="delete"
	 {
 $checkbox = $_POST['checkbox']; //pole="checkbox[]"
		 $countCheck = count($_POST['checkbox']);
 
 for($i=0;$i<$countCheck;$i++)
		 {
			 $del_id  = $checkbox[$i];
 
 $sql = "DELETE from ksiazka where id = $del_id";
 $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
 
		 }
			 if($result)
		 {	
				 header('Location: index.php');
			 }
			 else
			 {
 echo "Error: ".mysql_error();
			 }
	 }
 ?>