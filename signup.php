<<<<<<< HEAD
<?php
//add our database connection script
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

//process the form
if(isset($_POST['signupBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'username', 'password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

	//collect form data and store in variables
	
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
	
	if(checkDuplicateEntries("users", "email", $email, $db)){
		$result = flashMessage("Email is already taken, please try another one.");
	}
	else if(checkDuplicateEntries("users", "username", $username, $db)){
		$result = flashMessage("Username is already taken, please try another one.");
	}
    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try{
            //create SQL insert statement
            $sqlInsert = "INSERT INTO users (username, email, password, join_date)
              VALUES (:username, :email, :password, now())";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

            //check if one new row was created
            if($statement->rowCount() == 1){
				$result = flashMessage("Registration Successful", "Pass");
            }
        }catch (PDOException $ex){
            $result = flashMessage("An error occurred: " .$ex->getMessage());
			}
    }
    else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was 1 error in the form<br>");
        }else{
            $result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
        }
    }

}

?>

<?php
$page_title = "User Authentication - Register Page";
include_once 'partials/headers.php';
include_once 'partials/parseSignup.php';

?>
<div class="container">
	<section class="col col-lg-7">
	    
		<h2>Register Page</h2><hr>
		
		<div>
		<?php if(isset($result)) echo $result; ?>
		<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>
		<div class="clearfix"></div>
				
		<form action="" method="post">
		    <div class="form-group">
				<label for="emailField">Email Address</label>
				<input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="usernameField">Username</label>
				<input type="text" class="form-control" name="username" id="usernameField" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="passwordField">Password</label>
				<input type="password" class="form-control" name="password" id="passwordField" placeholder="Password">
			</div>
						
			<button type="submit" name="signupBtn" class="btn btn-primary pull-right">Sign up</button>
		</form>
	</section>
	<p><a href="index.php">Back</a> </p>
</div>
	
<?php include_once 'partials/footers.php'; ?>
</body>
=======
<?php
//add our database connection script
include_once 'resource/Database.php';
include_once 'resource/utilities.php';


//process the form
if(isset($_POST['signupBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'username', 'password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

	//collect form data and store in variables
	
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
	
	if(checkDuplicateEntries("users", "email", $email, $db)){
		$result = flashMessage("Email is already taken, please try another one.");
	}
	else if(checkDuplicateEntries("users", "username", $username, $db)){
		$result = flashMessage("Username is already taken, please try another one.");
	}
    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try{
            //create SQL insert statement
            $sqlInsert = "INSERT INTO users (username, email, password, join_date)
              VALUES (:username, :email, :password, now())";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

            //check if one new row was created
            if($statement->rowCount() == 1){
				$result = flashMessage("Registration Successful", "Pass");
            }
        }catch (PDOException $ex){
            $result = flashMessage("An error occurred: " .$ex->getMessage());
			}
    }
    else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was 1 error in the form<br>");
        }else{
            $result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
        }
    }

}

?>

<?php
$page_title = "User Authentication - Register Page";
include_once 'partials/headers.php';
?>
<div class="container">
	<section class="col col-lg-7">
	    
		<h2>Register Page</h2><hr>
		
		<?php if(isset($result)) echo $result; ?>
		<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
				
		<form action="" method="post">
		    <div class="form-group">
				<label for="emailField">Email Address</label>
				<input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="usernameField">Username</label>
				<input type="text" class="form-control" name="username" id="usernameField" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="passwordField">Password</label>
				<input type="password" class="form-control" name="password" id="passwordField" placeholder="Password">
			</div>
						
			<button type="submit" name="signupBtn" class="btn btn-primary pull-right">Sign up</button>
		</form>
	</section>
	<p><a href="index.php">Back</a> </p>
</div>
	
<?php include_once 'partials/footers.php'; ?>
</body>
>>>>>>> origin/master
</html>