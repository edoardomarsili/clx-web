$(function(){
    $('span#open-collection-explorer').each(function(){
        var collection_dest = $('section.header-menu.clx-shop-sec.hmcollection_1.hm-sec-open'),
            source_attr = collection_dest.attr('data-destination'), /* TODO */
            _this = $(this);

        _this.on('click', function(event){
            $('footer').fadeOut(800, function(){
                $('.fw-collection').fadeOut()
                $('section.header-menu.clx-shop-sec.hmcollection_1.hm-sec-open').animate({
                    height: "200%"
                }, 850, function(){
                    $(this).html("<div class=\"collection-gender-open\"><div class=\"collection-top-header\"><div class=\"prepend_fw_title\"></div><div class=\"top-collection-cats\"><span>Accessories</span><span>Bags</span><span>Glasses</span></div></div><div class=\"collection-gallery\"></div></div>").fadeIn()
                    _this.prependTo($('.prepend_fw_title'))
                    $("loading").fadeIn('slow', function(){
                        $(this).fadeOut(1600, function(){
                            $('div.collection-gallery').load("https://www.cestlux.it/private/eplatform/back-end/collections/index.php?c_gender=1&c_collection=2")
                        })
                    });
                })
            })
        })
    })

    /* stop collection-top-header at pos: 250 */
    var cth = $('.prepend_fw_title'),
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() < 145) {
            console.log("absolute")
            $('div.collection-top-header').css({
                position: "absolute",
                top: 0,
                width: "100%"
            });
            $('div.collection-gallery').css({
                position: "absolute",
                width: "100%",
                height: "100%",
                top: "96px"
            });
        } else {
            console.log("fixed")
            $('div.collection-top-header').css({
                position: "fixed",
                top: "-26px",
                width: "100%"
            });
            $('div.collection-gallery').css({
                position: "fixed",
                width: "100%",
                height: "100%",
                top: "70px"
            });
        }
    });

    /* trigger product.view:url */
    $('.trigger_productView > span.pudh-title').each(function(element, index){
        $(this).on('click', function(){
            $('.filters-container').fadeOut(800)
        })
    });
})