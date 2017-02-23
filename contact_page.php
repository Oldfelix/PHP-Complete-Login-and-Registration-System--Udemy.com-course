<?php
//add our database connection script
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

//process the form
if(isset($_POST['submitBtn'])){
    //initialize an array to store any error message from the form
    $form_errors2 = array();

    //Form validation
    $required_fields = array('sender_email', 'sender_name', 'message');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors2 = array_merge($form_errors2, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('sender_name' => 4);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors2 = array_merge($form_errors2, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors2 = array_merge($form_errors2, check_sender_email($_POST));

    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors2)){
        //collect form data and store in variables
        $sender_email = $_POST['sender_email'];
        $sender_name = $_POST['sender_name'];
        $message = $_POST['message'];

        try{

            //create SQL insert statement
            $sqlInsert = "INSERT INTO feedback (sender_email, sender_name, message, send_date)
              VALUES (:sender_email, :sender_name, :message, now())";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':sender_name' => $sender_name, ':sender_email' => $sender_email, ':message' => $message));

            //check if one new row was created
            if($statement->rowCount() == 1){
                $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Submission Successful</p>";
            }
        }catch (PDOException $ex){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
        }
    }
    else{
        if(count($form_errors2) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors2). " errors in the form <br>";
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Contact Page</title>
</head>
<body>
<h2>User Authentication System </h2><hr>

<h3>Contact Form</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors2)) echo show_errors($form_errors2); ?>
<form method="post" action="">
    <table>
        <tr><td>Email:</td> <td><input type="text" value="" name="sender_email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="sender_name"></td></tr>
        <tr><td>Message:</td> <td><input type="text" value="" name="message"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="submitBtn" value="Send"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>