<<<<<<< HEAD
<?php
//add our database connection script
include_once 'resource/Database.php';
//process the form
if(isset($_POST['signupBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();
    //Form validation
    $required_fields = array('email', 'username', 'password');
    //loop through the required fields array snd popular the form error array 
    foreach($required_fields as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field";
        }
    }
    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //collect form data and store in variables
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
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
                $result = "<p style='padding:20px; color: green;'> Registration Successful</p>";
            }
        }catch (PDOException $ex){
            $result = "<p style='padding:20px; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
            $result .= "<ul style='color: red;'>";
            //loop through error array and display all items
            foreach($form_errors as $error){
                $result .= "<li> {$error} </li>";
            }
            $result .= "</ul></p>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
            $result .= "<ul style='color: red;'>";
            //loop through error array and display all items
            foreach($form_errors as $error){
                $result .= "<li> {$error}</li>";
            }
            $result .= "</ul></p>";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>
<h2>User Authentication System </h2><hr>
<h3>Registration Form</h3>
<?php if(isset($result)) echo $result; ?>
<form method="post" action="">
    <table>
        <tr><td>Email:</td> <td><input type="text" value="" name="email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="signupBtn" value="Signup"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>
=======
<?php

//add database connection script

include_once 'resource/Database.php';

var_dump($_POST);

//process the form

if(isset($_POST['signupBtn'])){

    //inititalize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array ('email', 'username', 'password');

    //loop through the required fields array

    foreach($required_fields as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field;
        }
    }

    //check if error array is empty, if yes process form data and insert record

    if(empty($form_errors)){

         //collect from data and store in variables
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try{
                 //Create SQL insert statement
                $sqlInsert = "INSERT INTO users (username, email, password, join_date)
                   VALUES (:username, :email, :password, now())";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlInsert);

                //add the data into the database
                $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

                //check if one new row was created
                if($statement->rowCount() == 1){
                    $result = "<p style='padding: 20px; color: green;'> Registration Successful</p>";
                }
print_r($sqlInsert);


        }catch (PDOException $ex){

            $result = "<p style='padding: 20px; color: red;'>An error occurred: ".$ex->getMessage()."</p>";
        }
   }

   else{
        if (count($form_errors) == 1){
             $result = "<p style='color: red;'> There was 1 error in the form<br>";

             $result .= "<ul style='color: red;'>";

             //loop through error array and display all items
             foreach($form_errors as $error){
                 $result .="<li> {$error} </li>";
             }

             $result .= "</ul></p>";

        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
            $result  .= "<ul style='color: red;'>";

             //loop through error array and display al items
             foreach($form_errors as $error){
                 $result .= "<li> {$error}</li>";
             }

             $result .= "</ul></p>";
print_r($result);
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
<h2>Register Page </h2><hr>
<h3>Registration Form</h3>

<?php if(isset($result)) echo $result; ?>

<form method="post" action="">
        <table>
                <tr><td>Email:</td> <td><input type="text" value="" name="email"></td</tr>
                <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
                <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
                <t><td></td><td><input style="..." type="submit" value="signupBtn"></td></tr>
        </table>
</form>
<p> <a href="index.php">Back</a> </p>
</body>
</html>

>>>>>>> origin/master
