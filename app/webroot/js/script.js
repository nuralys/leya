$(document).ready(function(){
    var nav = document.querySelector('.nav');
    var mob =  document.createElement('DIV');
    nav.appendChild(mob);
    $(mob).addClass('mob_start');
    $('.mob_start').on('click', function () {
        if($('.nav').hasClass('mob_active')){
            $('.nav').removeClass('mob_active');
        }else{
            $('.nav').addClass('mob_active');
        }                           
    });
});    