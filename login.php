<?php
include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['loginBtn'])){
	//array to hold errors
$form_errors = array();
//validate the form
$required_fields = array('username', 'password');
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
if(empty($form_errors)){
	//check if user exsists in the database	
}else{
	if(count($form_errors) == 1)){
		$result = "<p style='color: red;'>There was one error in the form </p>";
	}else{
		$result = "<p style='color: red;'>There were " .count($form_errors). " errors in the form</p>";
	}
  }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
<h2>User Authentication System </h2><hr>
<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<h3> Login Form</h3>
<form method="post" action="">
	<table>
		<tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
		<tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
		<tr><td></td><td><input style="float: right;" type="submit" name="loginBtn" value="Sign in"></td></tr>
	</table>
<p> <a href="index.php">Back</a> </p>
</body>
</html>

