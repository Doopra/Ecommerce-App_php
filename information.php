<?php
    session_start();
    echo "Welcome". $_SESSION['username'];
    echo "<br>";
    echo "And your password is ".$_SESSION['password'];
    echo "<br>";
    echo "And your email is ".$_SESSION['email_address'];

?>