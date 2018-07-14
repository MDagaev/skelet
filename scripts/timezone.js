function myTimezone()
    {
        //здесь код вычисления таймзоны
        var g = new Date();
        var utc = "UTC " + (g.getTimezoneOffset())/(-60).toString();
        return utc;
    }

document.getElementById("tzone").value = myTimezone();
