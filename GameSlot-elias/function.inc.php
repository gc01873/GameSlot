
<?php
error_reporting(E_ALL);
//require_once "dbh.inc.php";
require_once "config.php";
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



function uidExists($link,$Uname,$email){


	//May need to change this query
	//$sql = "INSERT INTO users (usersName,userEmail,userFName,userLName,userPassword) VALUES (?,?,?,?,?)"
	$sql = "SELECT * FROM userinfo WHERE username = ? OR email = ?";
	$stmt = mysqli_stmt_init($link);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: logi.php?error=stmtfailed");
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


function createUser($link,$Uname,$FName,$LName,$email,$Pass){

	//May need to change this query
//May change this when code is updated
	$sql = "INSERT INTO userinfo (username,email,fname,lname,pword) VALUES (?,?,?,?,?)";
	//$sql = "INSERT INTO usersInfo (Uname)";
	$stmt = mysqli_stmt_init($link);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt,"sssss",$Uname,$email,$FName,$LName,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: signup.php?error=none");
		//exit();
}


//Login Functions
function emptyInputlogin($Uname,$email,$Pass){
	$result;
	if(empty($Uname)||empty($email)||empty($Pass)){
		//if(preg_match("/^[a-zA-Z0-9]*$/"),$Uname)
		$result = true;
	
	}
	else {
		$result =false;
	}
	return $result;

}

function loginUser($link,$Uname,$email,$Pass){
	$UidExists=uidExists($link,$Uname,$Uname);
	if($UidExists===false){
			header("location: logi.php?error=wronglogin");
			exit();
	}
	$pwdHashed = $UidExists["pword"];
	$checkpwd = password_verify($Pass,$pwdHashed);
	if($checkpwd===false){
		header("location: logi.php?error=wronglogin");
		exit();
	}
	else if($checkpwd===true){
		/*session_cache_expire(5);*/
		session_start();
		
		$_SESSION["userid"]=$UidExists["userid"];
		$_SESSION["username"]=$UidExists["username"];
		header("location: handler.php");
			exit();

	}

		//exit();
}


?>
