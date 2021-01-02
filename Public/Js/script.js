$(document).ready(function(){
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $(".goTop").fadeIn();
        }
        else{
            $(".goTop").fadeOut();
        }
    });
    $(".goTop").click(function(){scroll(0,0)});
    setTimeout(function(){
        $('.message').hide();
    },3000);
    $(".cin").datepicker({
        dateFormat : 'yy-mm-dd',
        // minDate : new Date(2020, 12, 17),
        minDate : 0,
    });
    $(".cout").datepicker({
        dateFormat : 'yy-mm-dd',
        // minDate : new Date(2020, 12, 17),
        minDate : + 1,
    });
})
