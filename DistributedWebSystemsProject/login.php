<? php 
include_once "includes/dbh.inc.php"
?>


<? php 


 // Check if the form is submitted if ( isset( $_GET['submit'] ) ) { 
 // retrieve the form data by using the element's name attributes value as key $firstname = $_GET['firstname']; $lastname = $_GET['lastname']; // display the results echo '<h3>Form GET Method</h3>'; echo 'Your name is ' . $lastname . ' ' . $firstname; exit;
}

//do something if form is null  i.e the data is not present
//do something if the password of username is incorrect
//do something if the user/password is correct