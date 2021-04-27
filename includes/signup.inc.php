

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
   
  require_once "dbh.inc.php";

  require_once "function.inc.php";

  //  echo "Done";
    
    if(emptyInputSignup($Uname,$FName,$LName,$email,$Pass,$PassRepeat)!==false)
    {
        header("location: ../Login/signup.php?error=emptyinput");
        exit();
    }

    else if(inValidUid($Uname)!==false)
    {
        header("location: ../Login/signup.php?error=invalidUid");
        exit();   
    }

    else if(inValidEmail($email)!==false)
    {
        header("location: ../Login/signup.php?error=invalidemail");
        exit();
    }
    
    else if(pwdMatch($Pass,$PassRepeat)!==false)
    {
        header("location: ../Login/signup.php?error=passwordsDontMatch");
        exit();
    }
    //echo "Heyyyy Ms.Carter babyyyyy ";
    /*else if(uidExists($conn,$Uname,$email)!==false)
    {
        header("location: ../Login/signup.php?error=usernametaken");
        exit();
    }*/
    
    
   createUser($conn,$Uname,$FName,$LName,$email,$Pass,$PassRepeat);
   //echo " here we are baby!!!";
   sleep(3);
  header("location: ../GameSlot-main/project.html"); //return to a success page

    
//else {
  
    //exit();
   // }
}

  ?>


 
