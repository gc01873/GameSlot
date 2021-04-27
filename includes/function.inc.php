

<?php
error_reporting(E_ALL);
require_once "dbh.inc.php";
function emptyInputSignup($Uname,$FName,$LName,$email,$Pass,$PassRepeat){
	$result;
	if(empty($Uname)||empty($email)||empty($FName)||empty($LName)||empty($Pass)||empty($PassRepeat)){
		//if(preg_match("/^[a-zA-Z0-9]*$/"),$Uname)
		$result = true;
	
	}
	else {
		$result =false;
	}
	return $result;

}

function inValidUid($Uname){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/",$Uname)){
		$result = true;
	}
	else {
		$result =false;
	}
	return $result;
}



function inValidEmail($email){
       
      $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
  }
  else{
  	$result=false;
  }
  return $result;
    }

function pwdMatch($Pass,$PassRepeat){
	$result;
	if($Pass!==$PassRepeat){
		$result=true;
	}
	else{
		$result=false;
	}
	return $result;
}



function uidExists($conn,$Uname,$email){


	//May need to change this query
	//$sql = "INSERT INTO users (usersName,userEmail,userFName,userLName,userPassword) VALUES (?,?,?,?,?)"
	$sql = "SELECT * FROM userInfo WHERE username = ? OR email = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../Login/signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt,"ss",$Uname,$email);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_result($stmt);
	if($row=mysqli_fetch_assoc($resultData)){
		return $row;

	}
	else
	{
		$result = false;
		return result;
	}
	mysqli_stmt_close($stmt);
}


function createUser($conn,$Uname,$FName,$LName,$email,$Pass){

	//May need to change this query
//May change this when code is updated
	$sql = "INSERT INTO users (usersName,userEmail,userFName,userLName,userPassword) VALUES (?,?,?,?,?)";
	//$sql = "INSERT INTO usersInfo (Uname)";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../Login/signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt,"sssss",$Uname,$email,$FName,$LName,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../Login/signup.php?error=none");
		//exit();
}
?>
