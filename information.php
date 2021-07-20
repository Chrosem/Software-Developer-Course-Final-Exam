<?php require "header.php";

    $info = new Info();

?>

<div id="nav_menu">
    <?php  require "nav_menu.php";  ?>
</div>

<title>Tudnivalók</title>

</head>

<body>

<div id="content" class="container-fluid h-100">

    <div class="row h-100">

        <div class="col col-md-12 id="oszlop">

            <div class="box bg-dark text-white m-2 p-4" >
                <?php $row = $info->information();  ?>
                <?php foreach ($row as $information){ ?>
                <h1 class="text-center"><?php print_r ($information["title"]);?></h1>
                <br>
                <p class="text-left"><?php print_r ($information["content"]);?></p>
                <hr>
                <?php } ?>
            </div>

        </div>

    </div>

</div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>


