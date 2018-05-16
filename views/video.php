<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yshorts</title>
    <link href="./css/styles.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/jquery-3.2.1.min.js"></script>
    <script src="scripts/rotation.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>
<body>
    <div class="panel">
        <div id="logo">
            <img src="./images/yshorts.jpg">
        </div>

        <div id="tr_hamburger" class="trigger">
            <a href="./admin/index.php?action=add"><img src="./images/hamburger_iconsvg.jpg"></a>
        </div>

 <!--       <div id="tr_krestik" class="trigger">
            <img src="../images/krestik.jpg"> -->
    </div>


    <div id="nechet" class="video">

        <iframe width="560" height="315" src="http://www.youtube.com/embed/<?=$video['video']?>?&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!--<div id="chet" class="video">

       <iframe width="560" height="315" src="https://www.youtube.com/embed/0hcaaKhGL00?&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    -->
    <?php echo "<pre>";
            var_dump($_POST);
            var_dump($_GET);
        echo "</pre>";

    ?>
    <footer><p>copyright &copy; tavintavan</p>
    </footer>
</body>
</html>
