
<!DOCTYPE html> 
<html>

<title><head>Game Data</head></title>
<?php include_once "config.php";
include_once "header.php";
?>
<body>

<table aligh="center" border="1px" style="width:600px; line-height:40px;">
<tr>
<th colspan=8><h2>Game Title</h2><th></tr>
<th>Developer<th>
<th>Genre<th>
<th>Description<th>
<th>img<th>
<tr>
<?php

if(isset($_GET["gameId"])){
   
    //Get the variables we need, gameID gAME TITLE, game price etc.... 
    $title =$_GET["title"];
    $gameId =$_GET["gameId"];
    $img =$_GET["img"];
    $Developer =$_GET["Developer"];
    $Genre =$_GET["Genre"];
    $Description =$_GET["Description"];

    //create query; //MEthod for if it is empty
//the  $gameId might throw it off
    $sql = "SELECT * FROM game WHERE gameId = $gameId; ";
     $result = mysqli_query($link, $sql);
     $QueryResults = mysqli_num_rows($result);
     if($QueryResults>0){
        while($rows = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td><?php echo $rows['title'];?> 
            <td><?php echo $rows['title'];?></td>
            <td><?php echo $rows['gameId'];?></td>
            <td><?php echo $rows['Developer'];?></td>
            <td><?php echo $rows['Description'];?></td>
            <td><?php echo $rows['price'];?></td>

            <td><img src="<?php echo $rows['img'];?>" alt="Whoops! Broken Link" style='width:100%' height='20%'></td>
            
           
            
</tr>
<?php 
        }
    }
        
} ?>
</table>

</body>
</html>