<?php

    require "header.php";

?>

<title>Elfelejtett Jelszó</title>

</head>

<body>

    <div class="container-fluid">

        <div class="row justify-content-center pt-5 text-white">

            <div class="box bg-dark text-white" >

            <form action="" method="post"  class="form-group  text-center p-2 bg-dark">
                <span class="d-block"><?php if(!empty($msg)){ echo $msg;} ?></span>

                <h3>Elfelejtett Jelszó</h3>
                <hr style="height:2px;border-width:0;color:white;background-color:white">

                <h4>Kérem adja meg a regisztrációkor használt email címét:</h4>
                    <div class="form-group col-12 mb-3 mt-3">
                        <input type="text" name="l_name" class="form-control" placeholder="Email">
                    </div>

                <hr style="height:2px;border-width:0;color:white;background-color:white">

                    <div class="form-group">
                        <h4 class="text-danger">Fejlesztés alatt!</h4>
                        <a href="index.php" class="btn btn-secondary mt-3" role="button" aria-pressed="true">Mégse</a>
                        <button type="button" name="" class=" btn btn-primary mt-3" disabled>Küldés</button>
                    </div>

            </form>

            </div>

        </div>

    </div>

</body>
</html>
