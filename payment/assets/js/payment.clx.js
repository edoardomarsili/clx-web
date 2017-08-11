$(function(){
    setTimeout(function(){
        $('.lp_cpt').fadeOut('slow', function(){
            $('._payment').animate({
                width: "720px",
                height: "320px"
            }, 1350, function(){
                $('div.recheck_checkout, div.subtotal_sticky').fadeIn()
            })
        })
    }, 1200)
})