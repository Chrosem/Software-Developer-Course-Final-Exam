<?php

    require "class/user.class.php";
    $user = new User();
    $user->logout();
    header('Location: index.php');

?>

