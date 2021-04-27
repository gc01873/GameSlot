<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "config.php";

if (isset($_GET['logout'])) {
    $_SESSION['user'] = array();
    
    header("location: cart.php");

}
?>
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
                <a class="navbar-brand" href="handler.php">GameSlot</a>
            </div>
            <ul class="nav navbar-nav">
                <!-- Active class, button clicked already -->
                <li class="active"><a href="#">Home</a></li>
            </ul>

            <form class="navbar-form navbar-left" action="handler.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search here" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- <ul class="nav navbar-nav navbar-center">
                <li><a href="#">Cart Details</a></li>

            </ul> -->

            <!-- <ul class="nav navbar-nav navbar-right">
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="logi.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul> -->

            <?php 
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
        
        // $gameId = "";
        // $price = "";
        // if (!(isset($_SESSION['cart']))) {
        //     $_SESSION['cart'];
        // }
        // if(isset($_GET['gameId'])){
        //     $gameId = $_GET["gameId"];
        //     $price = $_GET["price"];
        //     if ($price > 0) {
        //         if (isset($_SESSION['cart'][$gameId])) {
        //             $_SESSION['cart'][$gameId] += $price;
        //         }
        //         else {
        //             $_SESSION['cart'][$gameId] = $price;
        //         }
        //     }
        // }
            
        $key = $_GET['remove'];
        $add = $_GET['add'];
        $sub = $_GET['sub'];
        $price =$_GET['price'];
        $pr =$_GET['pr'];
        $postall = $_GET['postall'];
        
        if (isset($_GET['remove'])) {
            unset($_SESSION['cart'][$key]);
            header("location: cart.php");
        }
        if (isset($_GET['add'])) {
            $_SESSION['cart'][$add] += $price;
            header("location: cart.php");
        }
        if (isset($_GET['sub'])) {
            $_SESSION['cart'][$sub] -= $price;
            header("location: cart.php");
        }
        if(isset($_GET['postall'])){
            echo $postall;
        }
        $val = 3;
        $val1 = 4;
        $val2 = 4;
        $val3 = 4;
        $uuuid = '';
        $gameiid ='';
        $quanttt = '';
        foreach ($_SESSION['user'] as $key => $value) {
            $uuuid = $key;
        }
        if(isset($_GET['postall'])){
            foreach ($_SESSION['cart'] as $key => $value) {
                $gameiid = $key;
                $quanttt = $value;
                $sql = "INSERT INTO orders (gameId, userId, quantity) VALUES (?,?,?)";
                $stmt = mysqli_prepare($link, $sql);
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "iii",$va,$va1,$va2);
                    $va = $key;
                    $va1 = $uuuid;
                    $va2 = $value/$pr;
                    if(mysqli_stmt_execute($stmt)){
                        // Records created successfully. Redirect to landing page
                        unset($_SESSION['cart']);
                        header("location: congrats.php");

                    }
                }
            }
        }
        $total = "";
        $quant = "";
        echo "<h2>Cart Details</h2>";
        if(!empty($_SESSION['cart'])){
        require_once "config.php";        
            echo "<table class = 'table'>";
                echo "<tr>";
                    echo "<th>Product Image<th>";
                    echo "<th>Product Name</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Price</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
                $price ='';
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total +=$value;
                    $sql = "SELECT * FROM game WHERE gameId = '$key'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($result);
                    $quant = $value/$row['price'];
                    $price = $row['price'];
                    echo "<tr name='removed'  value='{$row['gameId']}'>";
                        echo "<input type = 'hidden' value='$key'>";
                        echo "<th><img src='{$row['img']}' style='width:60px'><th>";
                        echo "<th>{$row['title']}</th>";
                        echo "<th><a href='{$_SESSION['PHP_SELF']}?sub=$key&price={$row['price']}'class='btn btn-danger'>-</a> $quant <a href='{$_SESSION['PHP_SELF']}?add=$key&price={$row['price']}' class='btn btn-success'>+</a></th>";
                        //$row['price']
                        echo "<th name='price'>$ {$_SESSION['cart'][$key]}</th>";
                        echo "<th><a href='{$_SESSION['PHP_SELF']}?remove=$key' class = 'btn btn-success'>Remove</a></th>";
                    echo "</tr>";
            }
            
                echo "<tr class='bg-success'>";
                    echo "<th ><h3>TOTAL</h3></th>";
                    echo "<th><th>";
                    echo "<th></th>";
                    echo "<th><h3>$$total</h3></th>";
                    echo "<th><a href='{$_SESSION['PHP_SELF']}?postall=1&pr=$price' class = 'btn btn-danger'>CHECKOUT</a></th>";
                echo "</tr>";
            }
            else {
                echo "<div class='card text-center'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>Your Cart is Empty!</h5>";
                        echo "<a href='handler.php' class='btn btn-success'>SHOW NOW</a>";
                    echo "</div>";
                    
                echo "</div>";
            }
            echo "</table>";
            echo "<form method='POST' action='{$_SERVER['PHP_SELF']}?'>";
            
        echo "</form>";
            
        ?>
    </div>
</body>

</html>