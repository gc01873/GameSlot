<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Handler</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        * {
            margin: 0 auto;
        }

        .wrapper {
            width: 80%;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">GameSlot</a>
            </div>
            <ul class="nav navbar-nav">
                <!-- Active class, button clicked already -->
                <li class="active"><a href="#">Home</a></li>
            </ul>

            <form class="navbar-form navbar-left" action="/action_page.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search here" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>

           
            <?php 
            session_start();
                if(empty($_SESSION['user'])){
                    echo "<ul class='nav navbar-nav navbar-right'>";
                        echo "<li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Cart </a></li>";
                        echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a href='logi.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        echo "</ul>";
                    }
                    else{
                        echo "<ul class='nav navbar-nav navbar-right'>";
                        foreach ($_SESSION['user'] as $key => $value) {
                            # code...
                            echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> hi, $value</a></li>";
                        }
                        echo "<li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Cart </a></li>";
                        //echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a name='logout' href='{$_SERVER['PHP_SELF']}?logout=1'><span class='glyphicon glyphicon-log-in'></span>logout</a></li>";
                    echo "</ul>";

                }
            ?>
        </div>
    </nav>

    <div class="wrapper">
        <?php
        session_start();
        $gameId = "";
        $price = "";
        if (!(isset($_SESSION['cart']))) {
            $_SESSION['cart'];
        }
        if (isset($_GET['logout'])) {
            $_SESSION['user'] = array();
            header("location: handler.php");
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
        require_once "config.php";
                        
            // Attempt select query execution
            $sql = "SELECT * FROM game";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<div class='row'>";
                        while($row = mysqli_fetch_array($result)){
                        echo "<div class='col-md-3'>";
                            echo "<div class='product-tops text-center'>";
                                echo "<img src='". $row['img']. "'alt='Product '>";
                                //action ='{$_SERVER['PHP_SELF']}'
                                echo "<form class='overlay' action ='{$_SERVER['PHP_SELF']}' >";
                                    //echo "<button type='button' class='btn btn-secondary' title='Quick look'><i class='far fa-eye'></i></i></button>";
                                    echo "<input type ='hidden'name='gameId' value='{$row['gameId']}'>";
                                    echo "<input type ='hidden'name='price' value='{$row['price']}'>";
                                    echo "<button type='button' style='margin-bottom:8px;' class='btn fas fa-eye' title='Add to Cart'>";
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
            }
            
            mysqli_close($link);
        ?>
        

        <h10>On Sale Now!</h10>

       
            
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
                  
                  <a href="#"><img src="product1.jpg" alt="Los Angeles" style="width:100%;"> </a>
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
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

    </div>
    </div>
    
</body>

</html>