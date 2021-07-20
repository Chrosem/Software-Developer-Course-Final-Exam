
<?php require "header.php";

$user = new User();

if(isset($_POST['name_change'])){
    $msg = $user->user_NameUpdate($_POST['f_name'],$_POST['l_name']);
    echo"
    <script>

    $( document ).ready(function() {

        var error = ' $msg ';
        document.getElementById('error').innerHTML = error;
    });
    </script>";
}

if(isset($_POST['email_change'])){
    $msg = $user->user_EmailUpdate($_POST['email']);
    echo"
            <script>

            $( document ).ready(function() {
                var error = ' $msg ';
                document.getElementById('error1').innerHTML = error;
            });
            </script>";
}

if(isset($_POST['pwd_change'])){
    $msg = $user->user_newpwd($_POST['pwd'],$_POST['pwd_check']);
    echo"
            <script>

            $( document ).ready(function() {
                var error = ' $msg ';
                document.getElementById('error2').innerHTML = error;
            });
            </script>";
}

if(isset($_POST['delete_profile'])){

    $msg = $user->delete_profile();
    header('Location: log_out.php');
}

?>

<div id="nav_menu">
    <?php  require "nav_menu.php";  ?>
</div>

<title>Beállítások</title>

</head>

<body>

<div id="content" class="container-fluid h-100">

    <div class="row h-100">

        <!-- Első oszlop -->
        <div class="col col-md-6 id="oszlop">
            <div class="box bg-dark text-white m-2 p-3" >
            <h2>Adatok:</h2>
                <?php $row = $user->user_data();  ?>
                    <?php foreach ((array)$row as $user_data){

                        $date=date_create($user_data["reg_date"]);
                    ?>
                    <br>
                    <p><h4>Név:</h4><?php echo ($user_data["l_name"]);?>
                    <?php echo ($user_data["f_name"]);?></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#name_change">Név Módosítás</button>
                    <span id="error" class="d-block"></span>
                    <hr>
                    <br>
                    <p><h4>Email:</h4><?php echo ($user_data["email"]);?></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#email_change">Email Módosítás</button>
                    <span id="error1" class="d-block"></span>
                    <hr>
                    <br>
                    <h4>Jelszó</h4>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pwd_change">Jelszóváltzoztatás</button>
                    <span id="error2" class="d-block"></span>
                    <?php } ?>
                    <hr>
                    <br>
                    <p><h4>Regisztráció Dátuma:</h4><?php echo (date_format($date,"Y/m/d"));?></p>

             <!-- Modal -->
             <div class="modal fade" id="name_change">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Névmódosítás</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Vezetéknév:</b></label>
                                                <input type="text" name="l_name"  class="form-control ">
                                            </div>

                                            <div class="form-group col-12 mb-3 mt-3">
                                                <label for=""><b>Keresztnév:</b></label>
                                                <input type="text" name="f_name"  class="form-control">
                                            </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="name_change" class="btn btn-primary">Mentés</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <!-- Modal -->
            <div class="modal fade" id="email_change">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Email módosítás</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Email:</b></label>
                                        <input type="text" name="email"  class="form-control ">
                                    </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="email_change" class="btn btn-primary">Mentés</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            <!-- Modal -->
            <div class="modal fade" id="pwd_change">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                        <div class="modal-header bg-dark text-white">
                        <h4 class="modal-title">Új Jelszó</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Új Jelszó</b></label>
                                        <input type="password" name="pwd"  class="form-control" id="NewPassword">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>

                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Új Jelszó mégegyszer</b></label>
                                        <input type="password" name="pwd_check"  class="form-control" id="NewPassword">
                                    </div>

                                    <div class="form-group col-12 mb-3 mt-3">
                                        <p>A jelszó kritériumai:</p>
                                        <ul>
                                            <li id="Length" class="remove">Legalább 6 karakter hosszú</li>
                                            <li id="UpperCase" class="remove">Legalább 1 nagybetűt tartalmaz</li>
                                            <li id="LowerCase" class="remove">Legalább 1 kisbetűt tartalmaz</li>
                                            <li id="Numbers" class="remove">Legalább 1 számot tartalmaz (0-9)</li>
                                            <li id="Symbols" class="remove">Legalább 1 speciális karakter (! @ $ ...stb)</li>
                                        </ul>

                                    </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Bezár</button>
                            <button type="submit" name="pwd_change" class="btn btn-primary">Mentés</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->

            </div>
        </div>

        <div class="col col-md-6 id="oszlop">
            <div class="box bg-dark text-white m-2 p-3" >
            <h4 class="text-danger">Fejlesztés alatt!</h4>
            <form action="">
            <label for="">Pénznem:</label>
            <select name="" id="" disabled>
                <option value="">HUF</option>
                <option value="">USD</option>
                <option value="">EUR</option>
            </select>

            </form>
            <hr>
            <br>
            <button type="button" class="btn btn-primary" disabled>Profilkép feltöltése</button>
            <hr>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_profile">Profil Törlése</button>
            <hr>

            <!-- Modal -->
            <div class="modal fade" id="delete_profile">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">

                <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Figyelmeztetés</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body bg-dark text-white">
                                <form action="" method="post"  class="form-group bg-dark text-white text-center p-2">
                                    <div class="form-group col-12 mb-3 mt-3">
                                        <label for=""><b>Biztos törli a profilját?</b></label>
                                    </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary"data-dismiss="modal">Mégse</button>
                            <button type="submit" name="delete_profile" class="btn btn-danger"  >Törlés</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- Modal End -->
            </div>
        </div>

    </div>

</div>


<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>

    <script>
        function ValidatePassword() {

        var rules = [{
            Pattern: "[A-Z]",
            Target: "UpperCase"
            },
            {
            Pattern: "[a-z]",
            Target: "LowerCase"
            },
            {
            Pattern: "[0-9]",
            Target: "Numbers"
            },
            {
            Pattern: "[!@@#$%^&*.]",
            Target: "Symbols"
            }
        ];

        var password = $(this).val();

        $("#Length").removeClass(password.length > 6 ? "remove" : "ok");
        $("#Length").addClass(password.length > 6 ? "ok" : "remove");

        for (var i = 0; i < rules.length; i++) {

            $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "remove" : "ok");
            $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "ok" : "remove");
            }
            }

            $(document).ready(function() {
            $("#NewPassword").on('keyup', ValidatePassword)
            });

    </script>