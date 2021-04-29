<!DOCTYPE html>    
<html lang ="en">    
<?php include_once "header.php"; ?>  

<!--<head>    
    <title>Sign Up Concept</title>    
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

</head>  -->
<html>
<body>    
    <h1>Sign Up Page</h1><br>    
    <div class="signup">    
    <form id="signup" action="signup.inc.php" method="POST">
        <label><b>User Name </b>
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Enter Username">    
        <br><br> 
		
        <label><b>FName
             </b>
             </label>
             <input type="text" name="FName" id="FName" placeholder="Name">
             <br><br>
             
             <label><b>Last Name
                    </b>
                    </label>
                    <input type="text" name="LName" id="LName" placeholder="Enter Username">
                    <br><br>
                    
                    <label><b>E-mail
                         </b>
                         </label>
                         <input type="text" name="email" id="email" placeholder="email">
                         <br><br>
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="Pass" id="Pass" placeholder="Enter Password"> 		
        <br><br> 
		
		<label><b>Repeat Password     
        </b>    
        </label>    
        <input type="Password" name="PassRepeat" id="PassRepeat" placeholder="Repeat Password"> 		
        <br><br>
        <button type="submit" name="submit" id="submit">Sign Up</button>
        <br><br>       
    </form>

</div>  
</body> 
<?php 
error_reporting(E_ALL);
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
echo "<p>Fill in all Fields</p>"; 
}
else if($_GET["error"]=="invalidUid"){
echo "<p>Choose a proper username!</p>"; 
}
else if($_GET["error"]=="invalidemail"){
echo "<p>Choose a proper email!</p>"; 
}
else if($_GET["error"]=="passwordsDontMatch"){
echo "<p>Something went wrong, try again!</p>"; 
}
else if($_GET["error"]=="stmtfailed"){
echo "<p>Choose a proper username!</p>"; 
}
else if($_GET["error"]=="usernametaken"){
echo "<p>username already taken!</p>"; 
}
else if($_GET["error"]=="none"){
echo "<p>You have signed up!</p>"; 
}
}
?>  
</html>
