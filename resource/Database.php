<?php
$username = 'root';
$dsn = 'mysql:host=localhost; dbname=register';
$password = 'root';

try{
	//create an instance of the PDO clas with the required parameters
	$db = new PDO($dsn, $username, $password);

	//set pdo error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//	display success message
//	echo "Connected to the register database";

}catch (PDOException $ex) {
	//display error message
	echo "Connection failed ".$ex->getMessage();
}
?>
