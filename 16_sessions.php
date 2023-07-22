<?php

    //session
    session_start();

    $_SESSION['username'] = "saviour";
    $_SESSION['password'] = "admin";
    $_SESSION['email_address'] = "saviour@gmail.com";

    echo "session is saved";


?>