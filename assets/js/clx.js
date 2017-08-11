$(function(){
    $("#init-ecz").bind('click', function(){

        $("#home_l, img.logo, aside, #lang, .clx-short-description").fadeOut(1200, function(){
            $(".button-ecommerce span").html('<b style="color: #F7DB56;font-size: 20pt;">c\'est lux</b>')
        }).promise().done(function(){
            $(".button-ecommerce").animate({
                top: "0%",
                left: "0%",
                width: "100%",
                height: "10%",
                borderRadius: 0
            }, {
                step: function(now,fx) {
                    $(this).css({'position': 'relative', 'transform': 'translateX(0%) translateY(0%)'});
                    $("loading").fadeIn()
                    $("clx-eplatform").fadeIn('slow')
                }, duration:'slow'
            }, 1600)
        })
    })
})