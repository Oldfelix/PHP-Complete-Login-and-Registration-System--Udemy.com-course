<?php include_once 'resource/session.php' ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
<h2>User Authentication System </h2><hr>

<?php if(!isset($_SESSION['username'])): ?>
<P>You are currently not signin <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signed up</a>Leave Message<a href="contact_page.php">Contact</a> </P>
<?php else: ?>
<p>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
<?php endif ?>

</body>
</html>