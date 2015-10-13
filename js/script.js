
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
    var authUser = $('#auth-user').attr('data-value');
    if ($(".header").offset().top > 50) {
        $(".header").addClass("header--onScroll"); 
        $(".header--onScroll").removeClass(".header");
        $(".header--onScroll").removeClass(".header--page");
        if(authUser == '1'){
            $(".header--onScroll").css({'top':'30px'});
        }
    } else {
        $(".header--onScroll").addClass("header"); 
        $(".header").removeClass("header--onScroll");
    }
});

$(document).ready(function(){
    $('#nickname').attr('type','date');

    var id;

    $('.search_btn').on('click', function(){
        var s = $('.search_input').val();
        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=get_search&s=" +s, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                console.log(data);
                $('.searchResultBox').html(data);
            }
        });
    });

    $(document).keypress(function(e) {
        if(e.which == 13) {
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
        }

    });

    $(document).on('click', '.buy-but', function(){
        id = $(this).attr('data-item');
        console.log(id);
        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=add_to_cart&id=" +id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                console.log(data);
            }
        });
        return false;
    });

    $(document).on('click', '.send-order', function(){
        var name = $('input[name="order-name"]').val();
        var mail = $('input[name="order-mail"]').val();
        var phone = $('input[name="order-phone"]').val();
        var address = $('input[name="order-address"]').val();

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=order&name="+name+"&mail="+mail+"&phone="+phone+"&address="+address, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                //console.log(data);
                $('#ok-modal').modal('show');
            }
        });
    });

    $(document).on('click', '.delete-from-cart', function(){
        var block = $(this).parent().parent().parent();
        var delId = block.attr('data-id');

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=del_from_cart&id=" +delId, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                // console.log(data);
                block.remove();
                location.reload();
            }
        });

    });

    $.ajax({
        url: ajaxurl, //url, к которому обращаемся
        type: "POST",
        data: "action=get_count", //данные, которые передаем. Обязательно для action указываем имя нашего хука
        success: function(data){
            console.log(data);
            if(data != ''){
                $('.button-buy').append(' ('+data+') ');
            }

        }
    });

    $(document).on('click', '.buy-free-but', function(){
        id = $(this).attr('data-item');
        return false;
    });

    $(document).on('click', '.send-free-order', function(){
        var name = $('input[name="order-name"]').val();
        var mail = $('input[name="order-mail"]').val();

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=freeorder&name="+name+"&mail="+mail+"&id="+id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                //console.log(data);
                $('#ok-modal').modal('show');
            }
        });
    });
});


