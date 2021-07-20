<?php

  require_once "include/autoloader.inc.php";
  error_reporting(0);

  $user = new User();

  if(isset($_POST['logout'])) {
      $user->logout();
      header('Location: index.php');
    }

?>

<!DOCTYPE html>
  <html lang="hu">
    <head>

      <!-- meta -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="Description" content=""/>
      <meta name="keywords" content="SSWL, Budget">
      <meta name="author" content="Gazdag Gergő">

      <!-- Boostrap 4 -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

      <!-- CSS -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Jquery-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

      <!-- Google chart -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>





