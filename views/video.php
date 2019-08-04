<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yshorts</title>
    <link href="./css/styles.css" type="text/css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="scripts/getVideoRot.js"></script>
    <script src="scripts/addVideo.js"></script>
    <script src="scripts/insLike.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>
<body>
    <div class="panel">
        <div id="logo">
            <div><img src="./images/yshorts.jpg"></div>
        </div>
        <div id="liked" title="Liked people"></div><!--Отображаем Общее кол-во лайков-->
        <div id="donate"><a href="http://paypal.me/MatveyDagaev/5USD"><img src="./images/donate4.png"></a></div>

        <div id="men">
            <a href="#" title="My likes">
                <div>
                    <font id="mylikes" color="white" size="5">0</font><!--Отображаем Мои лайки-->
                </div>
            </a>

            <ul class="menu">
                <!--здесь вставляем li через JQuery-->
<!--               <li class="submenu"><a href="#">Video9</a></li>
-->
            </ul>

        </div>

        <div id="finger" >
            <a  id="link_img" href="#" title="I like">
                <img  src="./images/like1.jpg" class="palets"> <!--Нажимаем на палец увеличиваем +1 лайк -->
            </a>
        </div>

        <div id="tr_hamburger" class="trigger">
<!--            <a href="./admin/index.php?action=add"><img src="./images/hamburger_iconsvg.jpg" title="Insert video"></a> -->
            <a href="#openModal"><img src="./images/hamburger_iconsvg.jpg" title="Insert video"></a>
        </div>
<!--        <div id="tr_krestik" class="trigger">
            <img src="../images/krestik.jpg">
-->    </div>


    <div id="nechet" class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/zFIWWM0Iv-U?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close" id="close">X</a>

            <div class="tabs">

            <input type="radio" name="inset" value="" id="tab_1" checked>
            <label for="tab_1">Paste URL Video</label>

            <input type="radio" name="inset" value="" id="tab_2">
            <label for="tab_2">Upload Video</label>


            <div id="txt_1">
                <div>
                    <div class="container">
                        <h3><font color="">Paste a link to the video</font></h3>
                        <form>
                            <label>
                                <b><font color="">Link to video :</font></b>
                                <br />
                                <input type="text" name="video" id="video" value="" size="33" class="form-item" autofocus required>
                                <input type="hidden" name="datetim" value="<?=date('Y-m-d H:i:s')?>">
                                <input type="hidden" name="timezone" id="tzone"><br />
                            </label>
                            <br />
                            <label>
                                <input type="button" name="save" id="send" value="Send" class="btn">
                            </label>
                            <br />
                        </form>
                    </div>
                </div>
            </div>

            <div id="txt_2">
                <div class="container">
                <h3>Functional temporarily unavailable</h3>
                </div>
             </div>

            </div>
        </div>
    </div>



    <footer><p>copyright &copy; tavintavan<span id="idvideo"></span></p></footer>

    <script src="scripts/timezone.js"></script>


</body>
</html>
