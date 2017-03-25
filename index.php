<<<<<<< HEAD
<?php
$page_title = "User Authentication - Homepage";
include_once 'partials/headers.php';
?>

<div class="container">

    <div class="flag">
        <h1>Turtle Authentication System</h1>
      </div>

    	<?php if(!isset($_SESSION['username'])): ?>
            <P class="lead">You are currently not signed in <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a> </P>
        <?php else: ?>

	        <p class="lead">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
        <?php endif ?>
				<?php echo $_SERVER['REMOTE_ADDR'] . "<br>" . $_SERVER['HTTP_USER_AGENT'];
					echo "<br>".time();
					if(isset($_SESSION['last_active'])){
							echo "<br>".$_SESSION['last_active'];
					};
				?>
    </div>

<?php include_once 'partials/footers.php'; ?>

</body>
</html>
=======
<?php
$page_title = "User Authentication - Homepage";
include_once 'partials/headers.php';
?>

<div class="container">

    <div class="flag">
        <h1>User Authentication System</h1>
      </div>

    	<?php if(!isset($_SESSION['username'])): ?>
            <P class="flag">You are currently not signin <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a> </P>
        <?php else: ?>
       
	        <p class="flag">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
        <?php endif ?>
    </div>

<?php include_once 'partials/footers.php'; ?>

</body>
</html>
>>>>>>> origin/master
