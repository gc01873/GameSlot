<!DOCTYPE html>
<html lang="en">



<html>
<head>
    <meta charset="UTF-8">
   
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
       <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="handler.php">GameSlot</a>
            </div>
            <ul class="nav navbar-nav">
                <!-- Active class, button clicked already -->
                <li class="active"><a href="handler.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-center">
                <li><a href="#">Welcome To GameSlot</a></li>

            </ul>

            <form class="navbar-form navbar-left" action="search.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search here" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" name="submit" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>

           
            <?php 
            //session_cache_expire(5);
            //session_set_cookie_params(0);
            session_start();
           //could be user or username or user id
           if(!isset($_SESSION['user'])){
               // if(empty($_SESSION['username'])){
                    echo "<ul class='nav navbar-nav navbar-right'>";
                        echo "<li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Cart </a></li>";
                        echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a href='logi.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        echo "</ul>";
                    }
                    else{
                        echo "<ul class='nav navbar-nav navbar-right'>";
                        foreach ($_SESSION['user'] as $key => $value) {
                            # code...
                            echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> hi, $value</a></li>";
                        }
                        echo "<p>Hello there ".$_SESSION["user"] . "</p>";
                        echo "<li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> Cart </a></li>";
                        //echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a name='logout' href='logout.inc.php'><span class='glyphicon glyphicon-log-in'></span>logout</a></li>";
                    echo "</ul>";

                }
            ?>
        </div>
    </nav>
</head>
</html>
