<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Paste a link to the video</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2>Paste a link to the video</h2>
        <div>
            <form method="post" action="">
                <label>
                    <b>Link to video</b>
                    <br />
                    <input type="text" name="video" value="" size="45" class="form-item" autofocus required>
                    <input type="hidden" name="datetim" value="<?=date('Y-m-d H:i:s')?>">
                    <input type="hidden" name="timezone" id="tzone"><br />
                </label><br />
                <label>
                    <input type="submit" name="save" value="Сохранить" class="btn">
                </label>
            </form>
        </div>

        <footer>
            <p>Copyright&copy; tavintavan</p>
        </footer>
    </div>
    <script>
    function myTimezone()
    {
        //здесь код вычисления таймзоны
        var g = new Date();
        var utc = "UTC " + (g.getTimezoneOffset())/(-60).toString();
        return utc;
    }
        document.getElementById("tzone").value = myTimezone();
    </script>
</body>
</html>
