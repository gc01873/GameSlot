

<?php
error_reporting(E_ALL);
if(isset($_POST["submit"]))
{

    $Uname=$_POST["Uname"];
    $FName=$_POST["FName"];
    $LName=$_POST["LName"];
    $email=$_POST["email"];
    $Pass=$_POST["Pass"];
    $PassRepeat=$_POST["PassRepeat"];
   echo"hello from the other side";
  //require_once "dbh.inc.php";
  require_once "config.php";

  require_once "function.inc.php";
echo" hello onveta se";
  //  echo "Done";
    
    if(emptyInputSignup($Uname,$FName,$LName,$email,$Pass,$PassRepeat)!==false)
    {
        header("location: signup.php?error=emptyinput");
        exit();
    }

    else if(inValidUid($Uname)!==false)
    {
        header("location: signup.php?error=invalidUid");
        exit();   
    }

    else if(inValidEmail($email)!==false)
    {
        header("location: signup.php?error=invalidemail");
        exit();
    }
    
    else if(pwdMatch($Pass,$PassRepeat)!==false)
    {
        header("location: signup.php?error=passwordsDontMatch");
        exit();
    }
    //echo "Heyyyy Ms.Carter babyyyyy ";
    /*else if(uidExists($conn,$Uname,$email)!==false)
    {
        header("location: ../Login/signup.php?error=usernametaken");
        exit();
    }*/echo"Homie you got this shit!";
    
    
   createUser($link,$Uname,$FName,$LName,$email,$Pass,$PassRepeat);
  
  sleep(3);
  header("location: handler.php"); //return to a success page

  
//else {
  
    //exit();
   // }
}

  ?>


 
