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
        ?>
    </div>

    <div class="jumbotron jumbotron-fluid">
        
        <div class="card-body">
            <h5 class="card-title">ORDER SUCCESSFULL!</h5>
            <p class="card-text">We heighly value your time and buisness with us.</p>
            <a href="handler.php" class="btn btn-success">Explore</a>
        </div>
        </div>
</body>

</html>