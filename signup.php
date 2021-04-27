<?php
  
    require "config.php";
    session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a new account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create an account</h2>
                    </div>
                    <p>Please fill this form create a new user account.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $fname_err;?></span>
                            <label>Last Name</label>
                            <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <label>Password</label>
                            <input type="text" name="pword" class="form-control" value="<?php echo $pword; ?>">
                            <label>Street</label>
                            <input type="text" name="addrStreet" class="form-control" value="<?php echo $addrStreet; ?>">
                            <label>City</label>
                            <input type="text" name="addrCity" class="form-control" value="<?php echo $addrCity; ?>">
                            <label>State</label>
                            <input type="text" name="addrState" class="form-control" value="<?php echo $addrState; ?>">
                            <label>Zip</label>
                            <input type="text" name="addrZip" class="form-control" value="<?php echo $addrZip; ?>">
                        </div>
                        <input type="submit" class="btn btn-success" value="Create">
                        <a href="handler.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<?php
// Define variables and initialize with empty values
$firstName=$lastName= $username = $pword = $addrStreet=$addrCity=$addrState= $addrZip = $email = "";
$fname_err=$lname_err=$email_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $pword = trim($_POST["pword"]);
    $username = trim($_POST["username"]);
    $addrStreet = trim($_POST["addrStreet"]);
    $addrCity = trim($_POST["addrCity"]);
    $addrState = trim($_POST["addrState"]);
    $addrZip = trim($_POST["addrZip"]);
    $email = trim($_POST["email"]);

    if(empty($firstName)){
        $fname_err = "Please enter a name.";
    } elseif(!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fname_err = "Please enter a valid name.";
    } else{
        $firstName = $firstName;
    }
    if(empty($lastName)){
        $lname_err = "Please enter a name.";
    } elseif(!filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lname_err = "Please enter a valid name.";
    } else{
        $lastName = $lastName;
    }
    if(empty($email)){
        $email_err = "Please enter email.";
    } else{
        $email = $email;
    }
    
       $addrStreet = $addrStreet;
       $addrCity = $addrCity;
       $addrState = $addrState;
       $addrZip = $addrZip;
       $username = $username;
       $pword = $pword;
    
    echo "error happened";
    // Check input errors before inserting in database
    if(empty($fname_err)&&empty($lname_err) &&empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO userinfo (firstName,lastName,username, pword, addrStreet, addrCity, addrState, addrZip, email) VALUES (?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssis", $param_fname,$param_lname,$param_username, $param_pword, $param_street, $param_city, $param_state, $param_zip,$param_email);
            
            // Set parameters
            $param_fname = $firstName;
            $param_lname = $lastName;
            $param_username = $username;
            $param_pword = $pword;
            $param_street = $addrStreet;
            $param_city = $addrCity;
            $param_state = $addrState;
            $param_zip = $addrZip;
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                // Records created successfully. Redirect to landing page
                header("location: userCreated.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>