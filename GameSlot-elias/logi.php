<html lang="en">
<html>
<?php include_once "config.php";
include_once "header.php";?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            margin: auto;
            height: 100vh;
        }

        .wrapper {
            height: 100%;
            margin: 0 auto;
            margin-top: 12px;
        }

        .container {}

        .navs {
            margin: 5px auto;
            text-align: center;
            width: 50%;
            height: 40px;

        }

        a.vav1 {
            font-size: 1.2em;
            color: white;
            text-decoration: none;
            line-height: 200%;
        }
    </style>
</head>

<body>


    <?php
        session_start();
        $uid = "";
        $email = "";
        
        //require_once "config.php";
        if (!(isset($_SESSION['user']))) {
            $_SESSION['user'];
        }
        
        if(isset($_GET['empty'])){
            $_SESSION['cart']=array();
        }
        if(isset($_GET['email'])){
            $_SESSION['user'][$uid] = $email;
            header("location: cart.php");
        }
        else{
            $hashedPwd = password_hash($_POST['pword'], PASSWORD_DEFAULT);
            //echo $_POST['pword'];
            //echo $hashedPwd;
            $sql = "SELECT * FROM userinfo WHERE email = '{$_POST['email']}' AND pword='$hashedPwd'";
          
            $result = mysqli_query($link, $sql);
            
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $uid = $row['userid'];
                $email = $row['email'];
                $_SESSION['user'][$uid] = $email;
                header("location: handler.php");
                
            }
        }

        
        ?>

    
    <div class="container">
        <div class="page-header clearfix">
            <h2 class="pull-left">Login to Continue</h2>
            <a href="handler.php" class="btn primary pull-right">Home</a>

        </div>
    </div>
    <div class="container">
        <form method="POST" <?php echo "action ='{$_SERVER['PHP_SELF']}'"?>>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" required class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="hidden" name="uid" required class="form-control" placeholder="Password">
                <input type="password" name="pword" required class="form-control" placeholder="Password">
            </div>
            <br><br>
            <input class=" btn btn-success" type="submit" value="Login">
            </a>
            <br><br>

        </form>
    </div>
</body>

</html>