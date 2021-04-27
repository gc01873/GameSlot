
<?php
require_once "../includes/dbh.inc.php";

?>

<html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSlot</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head></html>
<?php

//SELECT * FROM `game` WHERE 1   for all games
if(isset($_POST["submit"])){
//echo "HelloWRLD!!";
$Search= mysqli_real_escape_string($conn,$_POST["search"]);

$sql = "SELECT * FROM game WHERE title LIKE '%$Search%' OR Developer LIKE '%$Search%' OR Genre LIKE '%$Search%' OR price LIKE '%$Search%'";
//echo "HelloWRLD!!";
$result = mysqli_query($conn,$sql);
$QueryResults = mysqli_num_rows($result);

if($QueryResults>0){
	while($row = mysqli_fetch_assoc($result)){

		//echo ".$row['title'].";
		echo "<div class='search-box'>
		<h3>".$row['title']."</h3>
		 <p>".$row['Developer']."</p>
		 <p>".$row['Genre']."</p>
		 <p>".$row['price']."</p>
		 <p>".$row['Description']."</p>

		 </div>";
	}

}
else {
	echo "There are no results matching your search!";
}

}


?>

