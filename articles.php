
<?php require "header.php";

    $articles = new Articles();

?>

<div id="nav_menu">
    <?php  require "nav_menu.php";  ?>
</div>

<title>Cikkek</title>

</head>

<body>

    <div id="content" class="container-fluid h-100 text-white">
        <div class="row" id="articles">
            <div class="col-12 ml-2 mr-3 mb-2 mt-3">
                <div class="row justify-content-center">
                        <form class="center" action="" method="post">
                        <input type="text" id="" name="Keresés" placeholder="Keresés" disabled>
                        </form>
                </div>
                <h4 class="text-danger text-center">Fejlesztés alatt! Hamarosan!</h4>
            </div>
            <?php $row = $articles->articles();
            foreach ($row as $articles){ echo"
            <div class='col-3 p-1'>
                <div class='box bg-dark text-center text-white m-2 pt-4 pl-5 pr-5 pb-5' >
                    <a href='full_article.php?id=".$articles["id"]."'><h3 class='hoverable'>".$articles["title"]."</h3></a>
                    <p class='text-center'> ".$articles['author']." ".$articles["date"]."</p>
                    <p class='text-justify'>".substr($articles["content"],0,250)."...</p>
                </div>
            </div>
            ";} ?>
        </div>
    </div>

    <div id="footer">
        <?php require "footer.php"; ?>
    </div>

</body>
</html>


