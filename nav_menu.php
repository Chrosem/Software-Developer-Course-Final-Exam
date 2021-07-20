<?php

require "header.php";

$user = new User();

$msg = "";

if(!$user->loginCheck()) {

  $link = <<<_
  <a class="nav-link hoverable text-white" href="index.php">Pénzem</a>
  _;

  $nav_item = <<<_
      <a class="nav-link hoverable text-white" id="button_fake" href="#" data-toggle="modal" data-target="#login">Bejelentkezés</a>
  _;

}

else{

  $link = <<<_
  <a class="nav-link hoverable text-white" href="my_budget.php">Pénzem</a>
  _;

  $nav_item = <<<_
  <p class="pl-5 text-white"><img src="img/user.png" alt="" " class="pr-3 responsive" width="auto" height="auto">$user->f_name</p>
  <a href="profile.php"><img src="img/settings.png" class="pl-5 pr-5 responsive" width="auto"></a>
  <a href="log_out.php"><img src="img/exit.png" class="pr-5 responsive" width="auto"></a>
_;

}

if(isset($_POST['login'])) {

    try {
        $user->login($_POST['email'], $_POST['pwd']);
        header('Location: my_budget.php');
    }
    catch (Exception $e) {
        $msg = $e->getMessage();
        echo"
            <script>
            $( document ).ready(function() {
                $('#login').modal('show')
            });
            </script>";
    }
}

?>

      <title>SSWL</title>

</head>

<body>

<nav id="nav_bar" class="navbar navbar-expand-xl navbar-dark bg-dark">
<img src="img/logo.jpg" class="img-fluid" style="max-width:30%; height:30%;" alt="" >
    <span class="text-white pt-2 pl-2">Smart Spending,<br> Well Living</span>
  <button class="navbar-toggler" type="button" data-trigger="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse justify-content-center bg-dark " id="main_nav">
    <div class="offcanvas-header mt-3">
      <button class="btn btn-outline-danger btn-close float-right"> &times Close </button>
      <h5 class="py-2 text-white">Menü</h5>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item"><?=$link?></li>
      <li class="nav-item"><a class="nav-link hoverable text-white" href="articles.php">Cikkek</a></li>
      <li class="nav-item"><a class="nav-link hoverable text-white" href="information.php">Tudnivalók</a></li>
      <li class="nav-item"><a class="nav-link hoverable text-white" href="contact.php">Kapcsolat</a></li>
      <li class="nav-item"><?=$nav_item?></li>
    </ul>
  </div>
</nav>

<!-- The Modal -->
<div class="modal" data-backdrop="static" data-keyboard="false" id="login">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title">Kérjük, jelentkezzen be.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" class="form-group text-center p-5 bg-dark text-white">

          <?=$msg?>
          <p>Email</p>
          <input type="text" name="email" placeholder="Email..."class="form-control mb-4 mt-4">
          <p>Jelszó</p>
          <input type="password" name="pwd" placeholder="Jelszó..." class="form-control mb-4 mt-4">

          <button type="submit" name="login" id="loginbtn" class="btn btn-success pt-2 pb-2 mt-2 mb-4">Bejelentkezés</button>

          <div class="loginreg_hr pt-2 pb-3">
          <p><a href="forgot_pwd.php" target="_blank" class="text-white">Elfelejtett Jelszó</a></p>
          </div>

          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="registration.php" class="text-white"><p>Nincs még fiókja? Regisztráljon!</p></a>
      </div>

    </div>
  </div>
</div>

  <script>

    $("[data-trigger]").on("click", function(){
        var trigger_id =  $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    });

    $(".btn-close").click(function(e){
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });

  </script>