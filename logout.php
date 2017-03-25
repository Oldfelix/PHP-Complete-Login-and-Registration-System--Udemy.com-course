<<<<<<< HEAD
<?php
include_once 'resource/session.php';
include_once 'resource/utilities.php';
signout();
=======
<?php 
include_once 'resource/session.php';
include_once 'resource/utilities.php';
session_destroy();
redirectTo('index');
>>>>>>> origin/master
