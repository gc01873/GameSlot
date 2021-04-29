<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php";
include_once "config.php";?>
<html>

<body>
<link rel="stylesheet" href="handlerStyle.css">
<title>Handler</title>

    <div class="wrapper">
        <?php
        //session_cache_expire(2);
    //session_start();
        $gameId = "";
        $price = "";
        if (!(isset($_SESSION['cart']))) {
            $_SESSION['cart'];
        }
        if (isset($_GET['logout'])) {
            $_SESSION['user'] = array();
            header("location: logout.inc.php");
        }
        if(isset($_GET['gameId'])){
            $gameId = $_GET["gameId"];
            $price = $_GET["price"];
            if ($price > 0) {
                if (isset($_SESSION['cart'][$gameId])) {
                    $_SESSION['cart'][$gameId] += $price;
                }
                else {
                    $_SESSION['cart'][$gameId] = $price;
                }
            }
        }
        
        echo "<h2>Games</h2>";
        //require_once "config.php";
        $sql = "SELECT * FROM game";
            // Attempt select query execution
            //$count = mysqli_query("SELECT*FROM game")
            
            $result = mysqli_query($link, $sql);
            $c =mysqli_num_rows($result);
            $rand = mt_rand(4,$c)-4;
           
            $get = mysqli_query($link,"SELECT * FROM game WHERE gameId > $rand LIMIT 4");
            

            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<div class='row'>";
                    //counter so we only are shown four images
                    //$count = 1;
                        //while($row = mysqli_fetch_array($get)){
                            while($row = mysqli_fetch_array($get)){
                            //if($count<5){
                            $link_address = 'GameObj.php?gameId='.$row['gameId'];
                        echo "<div class='col-md-3'>";
                            echo "<div class='product-tops text-center'>";
                                echo  "<a href='".$link_address."'><img src=".$row['img']." alt='Product'></a>";
                              //  echo $row['img'];
                               // echo "<a href='".$link_address."'><h3>Title: ".$row['title']."</h3></a>";
                                //action ='{$_SERVER['PHP_SELF']}'
                                echo "<form class='overlay' action ='{$_SERVER['PHP_SELF']}' >";
                                    echo "<button type='button' class='btn btn-secondary' title='Quick look'><i class='far fa-eye'></i></i></button>";
                                    echo "<input type ='hidden'name='gameId' value='{$row['gameId']}'>";
                                    echo "<input type ='hidden'name='price' value='{$row['price']}'>";
                                    echo "<button type='submit' class='btn fas fa-shopping-cart' title='Add to Cart'>";
                                    //echo "<a href='update.php?gameId=".$row['gameId']."' class='fas fa-shopping-cart'></a>";
                                    echo "</button>";
                                echo "</form>";
                            echo "</div>";
                            echo "<div class='product-bottom text-center'>";
                                echo "<h4>". $row['title'] ."</h4>";
                                echo "<h5>PRICE:$". $row['price'] ."</h5>";
                                
                            echo "</div>";
                        echo "</div>";
                        //$count = $count+1;
                         //   }
                    }
                    echo "</div>";
                    mysqli_free_result($result);
                }else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }

            }
            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            
           // mysqli_close($link);
          /* $sql = "SELECT * FROM game";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<div class='row'>";
                        while($row = mysqli_fetch_array($result)){
                        echo "<div class='col-md-3'>";
                            echo "<div class='product-tops text-center'>";
                                echo "<img src='". $row['img']. "'alt='Product '>";
                                //action ='{$_SERVER['PHP_SELF']}'
                                echo "<form class='overlay' action ='{$_SERVER['PHP_SELF']}' >";
                                    echo "<button type='button' class='btn btn-secondary' title='Quick look'><i class='far fa-eye'></i></i></button>";
                                    echo "<input type ='hidden'name='gameId' value='{$row['gameId']}'>";
                                    echo "<input type ='hidden'name='price' value='{$row['price']}'>";
                                    echo "<button type='submit' class='btn fas fa-shopping-cart' title='Add to Cart'>";
                                    //echo "<a href='update.php?gameId=".$row['gameId']."' class='fas fa-shopping-cart'></a>";
                                    echo "</button>";
                                echo "</form>";
                            echo "</div>";
                            echo "<div class='product-bottom text-center'>";
                                echo "<h4>". $row['title'] ."</h4>";
                                echo "<h5>PRICE:$". $row['price'] ."</h5>";
                                
                            echo "</div>";
                        echo "</div>";
                        
                    }
                    echo "</div>";
                    mysqli_free_result($result);
                }else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }

            }
            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }*/
        ?>
        

       
        <h5>On Sale Now!</h5>

       
            
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div class="item active">
      
      <a href="#"><img src="GameImages/Sale1.jpg" alt="Los Angeles" style="width:100%;"> </a>
      <div class="carousel-caption">
        <h3>NBA 2K21</h3>
        <p>Get Your Jam On!</p>
        
      </div>
    </div>

    <div class="item">
      <img src="GameImages/Sale2.jpg" alt="Chicago" style="width:100%;">
      <div class="carousel-caption">
        <h3>CyberPunk</h3>
        <p>A World In The Future!</p>
      </div>
    </div>
  
    <div class="item">
      <img src="GameImages/Sale3.jpg" alt="New York" style="width:100%;">
      <div class="carousel-caption">
        <h3>Fifa 21</h3>
        <p>GOOOOOAAALL!</p>
      </div>
    </div>

  </div>
       
            
           <!-- <div id="myCarousel" class="carousel slide"data-ride="carousel">
             
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
          
              
              <div class="carousel-inner">
          
                <div class="item active">
                  
                  <a href="#"><img src="GameImages/Black_Ops_3.jpeg" alt="Los Angeles" style="width:100%;"> </a>
                  <div class="carousel-caption">
                    <h3>NBA 2K21</h3>
                    <p>Get Your Jam On!</p>
                    
                  </div>
                </div>
          
                <div class="item">
                  <img src="product2.jpg" alt="Chicago" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>CyberPunk</h3>
                    <p>A World In The Future!</p>
                  </div>
                </div>
              
                <div class="item">
                  <img src="product3.jpg" alt="New York" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>Fifa 21</h3>
                    <p>GOOOOOAAALL!</p>
                  </div>
                </div>
            
              </div>
          
              
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div> -->

    </div>
    </div>
    
</body>

</html>