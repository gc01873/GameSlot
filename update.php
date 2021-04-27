<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$first_name=$last_name=$street=$city=$state= $zip_code = "";
$fname_err=$lname_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["email"]) && !empty($_POST["email"])){
    // Get hidden input value
    $email = $_POST["email"];
    
    // Validate name
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $street = trim($_POST["street"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zip_code = trim($_POST["zip_code"]);
    if(empty($first_name)){
        $fname_err = "Please enter first name.";
    } elseif(!filter_var($first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fname_err = "Please enter a valid name.";
    } else{
        $first_name = $first_name;
    }
    if(empty($last_name)){
        $lname_err = "Please enter last name.";
    } elseif(!filter_var($first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lname_err = "Please enter a valid name.";
    } else{
        $last_name = $last_name;
    }
    
    $street  = $street;
    $city = $city;
    $state = $state;
    $zip_code = $zip_code;

    $email = $email;
    // Check input errors before inserting in database
    if(empty($fname_err)&&empty($lname_err)){
        // Prepare an update statement
        $sql = "UPDATE person SET first_name=?,last_name=?,street=?,city=?,state=?,zip_code=? WHERE email=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssis", $param_fname, $param_lname, $param_street, $param_city, $param_state,$param_zip, $param_email);
            
            // Set parameters
            $param_fname = $first_name;
            $param_lname = $last_name;
            $param_street= $street;
            $param_city= $city;
            $param_state = $state;
            $param_zip = $zip_code;
            $param_email = $email;
            echo "test 1";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["email"]) && !empty(trim($_GET["email"]))){
        // Get URL parameter
        $email =  trim($_GET["email"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE email=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $street = $row["street"];
                    $city = $row["city"];
                    $state = $row["state"];
                    $zip_code = $row["zip_code"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }


}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update User</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <span class="help-block"><?php echo $fname_err;?></span>
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <span class="help-block"><?php echo $lname_err;?></span>
                            <label>Street</label>
                            <input type="text" name="street" class="form-control" value="<?php echo $street; ?>">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" class="form-control" value="<?php echo $zip_code; ?>">
                        </div>
                        <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="handler.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>