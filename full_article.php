
<?php require "header.php";

    $articles = new Articles();

    $msg="";

    if(isset($_GET["id"])){

        $id=$_GET["id"];

        $msg = $articles->show_article($id);

    }

?>

<div id="nav_menu">
    <?php  require "nav_menu.php";  ?>
</div>

<title>Cikk</title>

</head>

<body>

    <div id="content" class="container-fluid h-100 text-white">

        <div class="row h-100">

            <div class="col-12 m-2">

            <?php $row = $articles->show_article($id);
                foreach ($row as $articles_id){ echo"
                    <div class='box bg-dark text-white m-2 p-3'>
                        <h3 class='text-center'>".$articles_id["title"]."</h3>
                        <p class='text-center'> ".$articles_id['author']." ".$articles_id["date"]."</p>
                        <p class='text-center'>".$articles_id["content"]."</p>
                    </div>
            ";} ?>

            </div>

        </div>

    </div>

<div id="footer">
    <?php require "footer.php"; ?>
</div>

</body>
</html>


