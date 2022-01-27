<?php
    session_start();
    session_destroy();
    unset($_COOKIE['user']);
    unset($_COOKIE['id_user']);
    unset($_COOKIE['id_role']);
    setcookie('user', '', time() - 10);
    setcookie('id_user', '', time() - 10);
    setcookie('id_role', '', time() - 10);
    header('location: index.php');