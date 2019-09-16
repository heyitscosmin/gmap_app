<?php
    session_start();
    if(isset($_SESSION['login']))
    {
        unset($_SESSION['name']);
        unset($_SESSION['login']);
        unset($_SESSION['level']);
        unset($_SESSION['add_message']);
        Header('Location: login.php');
    }
    else Header('Location: login.php');
?>