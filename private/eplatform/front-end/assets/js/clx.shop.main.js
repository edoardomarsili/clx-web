
            $(function(){

				$('#trigger-search').on('click', function(e){
					e.preventDefault();

					$('.header-d, .clx-shop-sec').fadeOut().promise().done(function(){
						$('div.search-input-container, .clx-searchcontainer').fadeIn().promise().done(function(){
							$('section.clx-shop-sec').animate({
								"height": "71.99999%"
							})
							$('header.shop-toolbar input.shop-search').focus()
						})
					})
				})

				$('#close-search').on('click', function(e){
					e.preventDefault();

					$('div.search-input-container, .clx-searchcontainer').fadeOut().promise().done(function(){
						$('section.clx-shop-sec').animate({
							"height": "82.5%"
						})
						$('.header-d, .front-window').fadeIn()
					})
				})

				// span-ha
				$('span.ha').each(function(element, index){
					var collection_title = $(this).attr('data-collection-title'),
						collection_target = $(this).attr('data-collection-target');

					$(this).on('click', function(event){

						if($('span.ha').hasClass('selected') == true){
							$('span.ha').removeClass('selected')
							$(this).addClass('selected')
						} else {
							$(this).addClass('selected')
						}

						$('section.clx-shop-sec').fadeOut().promise().done(function(){
							$('section.header-menu.' + collection_target).addClass('hm-sec-open').attr('data-destination', collection_target).fadeIn('fast')
						})

						// $("#collection-title").html(collection_title)

						// alert(item_title)
					})

					$('i.close-hm').on('click', function(event){

						$('span.ha').removeClass('selected')

						$('section.header-menu').fadeOut().promise().done(function(){
							$('section.front-window').fadeIn()
						})

						// alert(item_title)
					})
				})

				// language and currency chooser
				$('span#lc_trigger').on('click', function(event){
					event.preventDefault();

					$('dialog.lc_chooser').attr('open', true)
					$('.clx-header, header, .clx-shop-sec, footer').addClass('blur')
				})

				$('span.close_lc').on('click', function(event){
					event.preventDefault();

					$('dialog.lc_chooser').attr('open', false)
					$('.clx-header, header, .clx-shop-sec, footer').removeClass('blur')
				})

                // pitti2017
                $('span.pitti2017').each(function(element, index){

					$(this).mouseover(function(event){
						event.preventDefault();

						if($('span.ha').hasClass('selected') == true){
							$('span.ha').removeClass('selected')
							$(this).addClass('selected')
						} else {
							$(this).addClass('selected')
						}

						$('section.clx-shop-sec').fadeOut().promise().done(function(){
							$('section.pitti2017-container').fadeIn('fast')
						})

						// alert(item_title)
					})

					$('i.close-hm').on('click', function(event){
						event.preventDefault();

						$('span.ha').removeClass('selected')

						$('section.pitti2017-container').fadeOut().promise().done(function(){
							$('section.front-window').fadeIn()
						})

						// alert(item_title)
					})
				})

                /* pitti2017: accordions */
                $('pitti-accordion .closed-accordion').each(function(element, index){

					$(this).on('click', function(event){
						// event.preventDefault();

                        /*
						if($('span.ha').hasClass('selected') == true){
							$('span.ha').removeClass('selected')
							$(this).addClass('selected')
						} else {
							$(this).addClass('selected')
						}

						$('section.clx-shop-sec').fadeOut().promise().done(function(){
							$('section.pitti2017-container').fadeIn('fast')
						})
                        */

						if($('pitti-accordion .acc').hasClass('opened-accordion') == true){
							$('pitti-accordion .acc').removeClass('opened-accordion').animate({
								width: "80px"
							}, 1200, function(){
								$(this).addClass('closed-accordion shrinked')
							})

							$(this).animate({
								width: "1024px"
							}, 1200, function(){
								$(this).removeClass('closed-accordion')
								$(this).addClass('opened-accordion')
								$('pitti-accordion div.acc').not(this).addClass('shrinked')
							})
						} else {
							$(this).animate({
								width: "1024px"
							}, 1200, function(){
								$(this).removeClass('closed-accordion')
								$(this).addClass('opened-accordion')
								$('pitti-accordion div.acc').not(this).addClass('shrinked')
							})
						}
					})

					$('i.close-hm').on('click', function(event){
						event.preventDefault();

						$('span.ha').removeClass('selected')

						$('section.pitti2017-container').fadeOut().promise().done(function(){
							$('section.front-window').fadeIn()
						})

						// alert(item_title)
					})
				})

				// hm-gallery.each: on click
                $('div.hm-gallery.sticky-hidden').each(function(element, index){
					var target = $(this);

					target.on('click', function(event){
						// $('.clx-shop-sec.front-window').not(this).addClass('blur')
						$('div.set-of-words').fadeOut(800, function(){
							target.removeClass('sticky-hidden')
							target.animate({
								bottom: "200px"
							}, 850)
						})
					})
				})

				// hm-gallery: li on hover
                $('li#trigger_product__shopDetail').each(function(element, index){
					$(this).mouseover(function(event){
						$('section.front-window').css({
							"background": "url('" + $(this).attr("data-background") + "')"
						})

						$('#collection-id').attr("data-target", $(event.target).attr('data-product-id'))
					})
				})

				function getHashValue(key) {
					var matches = location.hash.match(new RegExp(key+':([^&]*)'));
					return matches ? matches[1] : null;
				}

				$('#collection-id').on('click', function(){
					var attr_datatarget = $(this).attr('data-target');

					window.location = "?mode=product-view&pid=" + attr_datatarget;

					/*
					$(window).on('hashchange', function() {
						var get_hash = window.location.hash,
							product_hash = "product";

						// usage
						$.ajax({
							url: "https://cestlux.localhost.local/private/eplatform/back-end/retrieve.product.php"
						})
					});
					*/
				})

				/* add-to-cart */
				$('.addTo_cart').on('click', function(){
					var dpidc = $(this).attr('data-product-id-cart');

					addToCart(dpidc)
				})


				function addToCart(item){
					/*
					var count_cart = 0 
						products = [],
						spc = $('span.shoppingCart_count');
						// products_in_cart = spc.parseInt(spc.text(), 10);

					count_cart++;

					spc.text(count_cart);

					products.push(item)

					alert(products)
					console.log(products)
					*/

					window.location = "?mode=cart&action=add&puid=" + item + "&quantity=1";
				}

/*



				$('span.ha').mouseover(function(e){
					e.preventDefault();

					if($('span.ha').hasClass('selected') == true){
						$('span.ha').removeClass('selected')
						$(this).addClass('selected')
					} else {
						$(this).addClass('selected')
					}

					$('section.clx-shop-sec').fadeOut().promise().done(function(){
						$('section.header-menu').fadeIn('fast')
					})
				})
				$('section.header-menu').mouseout(function(e){
					e.preventDefault();

					$('span.ha').removeClass('selected')

					$('section.header-menu').fadeOut().promise().done(function(){
						$('footer').fadeIn('fast').promise().done(function(){
							$('section.front-window').fadeIn()
						})
					})
				})
				*/
				
                /*
                $('.gallery').masonry({
                    // set itemSelector so .grid-sizer is not used in layout
                    itemSelector: '.es-tile',
                    columnWidth: 460,
                    horizontalOrder: true
                })
                */
                var est = $('.es-tile'),
                    smoky = $('.smoky'),
                    dataImage = est.attr('data-image');

				est.on('click', function(){
					$('.grid-wrap').fadeOut().promise().done(function(){
						$('header').slideUp(120).promise().done(function(){
							$('footer').fadeOut(60).promise().done(function(){
								$('.front-window').animate({
									height: "100%"
								}, 120)
							})
						})
					})
				})

				$('span.nav-close').on('click', function(e){
					e.preventDefault();

					$('.front-window').animate({ height: "84%" }).promise().done(function(){
						$('header').slideDown('fast').promise().done(function(){
							$('footer').fadeIn('fast').promise().done(function(){
								$('.grid-wrap').fadeIn()
							})
						})
					})
				})
                
                /*
                est.each(function() {
                    $(this).css({
                        'background': 'url(' + dataImage + ')'
                    })
                });
                */
				/*
                est.html("<div class='image-holder'><img class='smoke' src='httpss://il2.picdn.net/shutterstock/videos/400213/thumb/1.jpg'><img class='tile-img' src='" + dataImage + "'></div><div class='es-tile-toolbar'><div left><span>test</span></div><div right>€5</div></div>")
                // smoky.html("<img class='smoke' src='https://cestlux.localhost.local/private/eplatform/front-end/assets/css/img/smoke.png'>")
				*/

                /*
				$('span#open-collection').on('click', function(e){
					e.preventDefault();

					$('section.clx-shop-sec').fadeOut().promise().done(function(){
						$('section.collection-container').fadeIn()
					})

					if($('span#open-collection').hasClass('selected') == true){
						$('span#open-collection').removeClass('selected')
						$(this).addClass('selected')
					} else {
						$(this).addClass('selected')
					}
				})

				$('span#open-changingroom').on('click', function(e){
					e.preventDefault();

					$('section.clx-shop-sec').fadeOut().promise().done(function(){
						$('section.collection-container').fadeIn()
					})

					$("loading").fadeIn()

					$('footer').fadeOut().promise().done(function(){
						$('section.clx-changingroom').fadeIn('fast').animate({
							height: "94%",
							top: "55%"
						}, 1200, function(){
							$(this).load('https://cestlux.localhost.local/changing-room/index.html', function(response, status){
								if (status == "success"){
									$("loading").fadeOut()
								}
							})
						})
					})
				})
                */

				/* VIP tpx */

				$('#init_vipLux').on('click', function(e){
					e.preventDefault();

					$('section.clx-shop-sec').fadeOut().promise().done(function(){
						$('section.vip-login').fadeIn()
					})
					$(this).addClass('selected')
				})

				$('i.close-vip-login').on('click', function(e){
					e.preventDefault();
					
					$('section.vip-login').fadeOut().promise().done(function(){
						$('section.front-window').fadeIn()
					})
					$('#init_vipLux').removeClass('selected')
				})

				/* VIP tpx:form */
				$('form#vip_tpxLogin').on('submit', function(e){
					e.preventDefault();

					$.ajax({
						url: "https://www.cestlux.it/private/eplatform/front-end/toplux",

					})
				})



				$('#expand-footer-newsletter').on('click', function(e){
					e.preventDefault();

					$(this).addClass('selected')
					$('section.clx-shop-sec, header').addClass('blur')
					$('footer').animate({
						height: "42%"
					}, 900, function(){
						$('section.footer-exapnded-newsletter').fadeIn()
						$('span.close-footer').fadeIn()
					})
				})

				$('#expand-footer-map').on('click', function(e){
					e.preventDefault();

					$(this).addClass('selected')
					$('section.clx-shop-sec, header').addClass('blur')
					$('footer').animate({
						height: "100%"
					}, 900, function(){
						$('section.footer-exapnded-map').fadeIn()
						$('span.close-footer').fadeIn()
					})
				})

				$('#expand-footer-tc').on('click', function(e){
					e.preventDefault();

					$(this).addClass('selected')
					$('section.clx-shop-sec, header').addClass('blur')
					$('footer').animate({
						height: "100%"
					}, 900, function(){
						$('section.footer-exapnded-tc').fadeIn()
						$('span.close-footer').fadeIn()
					})
				})

				$('#expand-footer-returns').on('click', function(e){
					e.preventDefault();

					$(this).addClass('selected')
					$('section.clx-shop-sec, header').addClass('blur')
					$('footer').animate({
						height: "100%"
					}, 900, function(){
						$('section.footer-exapnded-returns').fadeIn()
						$('span.close-footer').fadeIn()
					})
				})

				$('span.close-footer').on('click', function(e){
					e.preventDefault();

					$(this).fadeOut()
					
					$('span').removeClass('selected')
					$('section.ftt').fadeOut().promise().done(function(){
						$('footer').animate({
							height: "36px"
						}, 900, function(){
							$('section.clx-shop-sec, header').removeClass('blur')
						})
					})
				})

				// single-product-detail
				$('.single-product-detail').each(function(element, index){
					var item_title = $(this).attr('data-item-title');

					$(this).mouseover(function(event){
						event.preventDefault();

						$(this).append('<div class="append-title"><span>' + item_title + '</span></div>')

						// alert(item_title)
					})

					$(this).mouseout(function(event){
						event.preventDefault();

						$(".append-title").animate({
							width: 0
						}).remove()

						// alert(item_title)
					})
				})

				/*
				$('#spd-trigger').hover(function(e){
					var item_title = $(this).attr('data-item-title');

					alert(item_title)
				})
				*/

            })