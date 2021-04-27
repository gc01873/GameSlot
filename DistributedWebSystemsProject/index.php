
<?php 
    include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
$sql = "SELECT * FROM customers;";
      /*$dbServername ="localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "gameSQL";
        $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);*/
	$result=mysqli_query($conn,$sql);
            
	$resultcheck = mysqli_num_rows($result);
      

	if($resultcheck>0){
		while($row=mysqli_fetch_assoc($result)){
            echo $row['firstName'],",",$row['lastName'],"<br>";
            

		}
        mysqli_free_result($result);

        mysqli_close($conn);
	}?>

</body>
</html>
