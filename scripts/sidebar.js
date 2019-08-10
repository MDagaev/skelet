//вызываем скрытый сайдбар
$(document).ready(function(){

    //кликаем копку для вызова сайдбара
    $(".btn_click").click(function () {

        //выбираем сайдбар
        if ($(".hidden_sidebar").hasClass("hidden_sidebar"))
        {
            $(".hidden_sidebar").removeClass('hidden_sidebar').addClass("sidebar");
        }
        else if ($(".sidebar").hasClass("sidebar"))
        {
            $(".sidebar").removeClass('sidebar').addClass("hidden_sidebar");
        }
    });
})