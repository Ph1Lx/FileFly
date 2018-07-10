$(document) .ready(function(){
    $(".mobile").click(function(){
        $(".sidebar").slideToggle('fast');
    });


window.onresize = function(event) {
    if($(window).width() > 320) {
        $(".sidebar").show();
    }
};
});