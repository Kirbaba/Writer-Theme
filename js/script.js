
/*-------------GOOGLE MAPS-----------------*/

/*function initialize() {

    var myLatlng = new google.maps.LatLng(59.934602, 30.334607);
    var mapOptions = {
        center: new google.maps.LatLng(59.934602, 30.334607),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"Ditlogistic"
    });
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE&callback=initialize";
    document.body.appendChild(script);
}

window.onload = loadScript;
*/


$(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function() {
        $('body,html').animate({scrollTop: 0}, 1000);
    });

    $('.smoothScroll').click(function(event) {
        event.preventDefault();
        var href=$(this).attr('href');
        var target=$(href);
        var top=target.offset().top;
        $('html,body').animate({
            scrollTop: top
        }, 1000);
    });
});

$(window).scroll(function() {
    if ($(".header").offset().top > 50) {
        $(".header").addClass("header--onScroll"); 
        $(".header--onScroll").removeClass(".header");       
    } else {
        $(".header--onScroll").addClass("header"); 
        $(".header").removeClass("header--onScroll");        
    }
});

$(document).ready(function(){
    $('.search_btn').on('click', function(){
        var s = $('.search_input').val();
        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=get_search&s=" +s, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                /*console.log(data);*/
                $('.searchResultBox').html(data);
            }
        });
    });
});


