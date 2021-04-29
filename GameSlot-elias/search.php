<!DOCTYPE html>
<html> 
<?php
//require_once "../includes/dbh.inc.php";
require_once "config.php";
require_once "header.php";
?>



<?php
if(isset($_POST["submit"])){

$Search= mysqli_real_escape_string($link,$_POST["search"]);
$sql = "SELECT * FROM game WHERE title LIKE '%$Search%' OR Developer LIKE '%$Search%' OR Genre LIKE '%$Search%' OR price LIKE '%$Search%'";
//echo "HelloWRLD!!";
$result = mysqli_query($link,$sql);
$QueryResults = mysqli_num_rows($result);

if($QueryResults>0){
	while($row = mysqli_fetch_assoc($result)){
		$link_address = 'GameObj.php?gameId='.$row['gameId'];
		
		//echo ".$row['title'].";
		echo "<div class='search-box'>
		 <a href='".$link_address."'><h3>Title: ".$row['title']."</h3></a>
		 <p> <b>Devs:</b> ".$row['Developer']."</p>
		 <p><b>Genre:</b> ".$row['Genre']."</p>
		 <p><b>Price:</b> ".$row['price']."</p>
		 <p><b>Description:</b> ".$row['Description']."</p>
		 <img src=".$row['img']." alt='Whoops could not load page' style='width:20% 'height='20%'>
		
		

		 </div>";
	}
	//echo '<a href="'.$row['website'].'">'.$row['website'].'</a>'
//echo '<a href="'.$link_address.'">Link</a>';
//echo "<a href='".$link_address."'><h3>Title: ".$row['title']."</h3></a>";

}
else {
	echo "There are no results matching your search!";
}

}


?>

</html>
