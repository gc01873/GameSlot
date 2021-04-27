<!DOCTYPE html>    
<html>    
<head>    
    <title>Sign Up Concept</title>    
    <link rel="stylesheet" type="text/css" href="go.css">    

</head>    
<body>    
    <h1>Sign Up Page</h1><br>    
    <div class="signup">    
    <form id="signup" action="../includes/signup.inc.php" method="POST">
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