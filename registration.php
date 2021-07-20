<?php

    require "header.php";

    $user = new User();

    $msg="";

    if(isset($_POST['reg'])){
        $msg = $user->registration($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['bank'],$_POST['cash'],$_POST['pwd'],$_POST['pwd_check']);
    }

?>

<title>Regisztráció</title>

</head>

<body>
<div class="container-fluid">
    <div id="reg" class="row justify-content-center pt-5 text-white">
        <form action="" method="post" id="registration" class="form-group  text-center p-2 bg-dark">
            <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>

              <h3>Regisztráció</h3>
              <hr style="height:2px;border-width:0;color:white;background-color:white">

              <h4>Adatok:</h4>
                <div class="form-group col-12 mb-3 mt-3">
                    <input type="text" name="l_name" class="form-control" placeholder="Vezetéknév"  oninput="testEmpty();">
                </div>

                <div class="form-group col-12 mb-3 mt-3">
                    <input type="text" name="f_name" class="form-control" placeholder="Keresztnév"  oninput="testEmpty();">
                </div>

                <div class="form-group col-12 mb-3 mt-3">
                    <input type="email" name="email"  class="form-control" placeholder="Email"  oninput="testEmpty();">
                </div>
                <hr style="height:2px;border-width:0;color:white;background-color:white">

                <h4>Kérjük adja meg kezdő egyenlegét!</h4>

                <div class="form-group has-feedback col-12 mb-3 mt-3">
                    <input type="number" name="bank" class="form-control" placeholder="Bank (Kérjük számot adjon meg!)"  oninput="testEmpty();">
                </div>

                <div class="form-group has-feedback col-12 mb-3 mt-3">
                    <input type="number" name="cash" class="form-control" placeholder="Készpénz (Kérjük számot adjon meg!)"  oninput="testEmpty();">
                </div>

                <hr style="height:2px;border-width:0;color:white;background-color:white">

                <h4>Jelszó</h4>
                <div class="form-group has-feedback col-12 mb-3 mt-3">
                    <input class="form-control" name="pwd"  type="password" id="NewPassword" placeholder="Jelszó"  oninput="testEmpty();">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback col-12 mb-3 mt-3">
                    <input class="form-control" name="pwd_check"  type="password" id="NewPassword" placeholder="Jelszó újra"  oninput="testEmpty();">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group col-12 mb-3 mt-3 text-left">
                <p>A jelszó kritériumai:</p>
                    <ul id="ul-list">
                        <li id="Length" class="remove">Legalább 6 karakter hosszú</li>
                        <li id="UpperCase" class="remove">Legalább 1 nagybetűt tartalmaz</li>
                        <li id="LowerCase" class="remove">Legalább 1 kisbetűt tartalmaz</li>
                        <li id="Numbers" class="remove">Legalább 1 számot tartalmaz (0-9)</li>
                        <li id="Symbols" class="remove">Legalább 1 speciális karakter (! @ $ ...stb)</li>
                    </ul>

                </div>

                <div class="form-check">
                    <label class="form-check-label">
                    <p><a href="information.php" target="_blank" class="text-white" >Adatvédelmi nyilatkozat</a></p>
                        <input type="checkbox" id="gdpr" class="form-check-input" value="">Elfogadom
                    </label>
                </div>

                <div class="form-group">
                    <a href="index.php" class="btn btn-secondary mt-3" role="button" aria-pressed="true">Mégse</a>
                    <button type="submit" id="register" name="reg" class=" btn btn-primary mt-3" disabled onsubmit="alert('SUBMITTED')">Regisztráció</button>
                </div>

        </form>
    </div>
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

            function testEmpty(){
            var frm = document.getElementById('registration');
                $('#gdpr').click(function() {
                    if (frm['l_name'].value && frm['f_name'].value && frm['email'].value && frm['bank'].value && frm['cash'].value && frm['pwd'].value && frm['pwd_check'].value && $(this).is(':checked') )
                    frm['reg'].disabled = false;
            else{frm['reg'].disabled = true;}
                })
            }

    </script>