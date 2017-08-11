!(function(){
    'use-strict';

    window.clx_dashboard = window.clx_dashboard || {};

    clx_dashboard = {
        init: function(status_user){
            if(status_user == "scrumb_loggedIn"){
                clx_dashboard.headerMenu();
            }
        },
        headerMenu: function(){
            $('span[data-is-expandable="true"]').each(function(element, index){
                var targets = $(this).attr("data-targets"),
                    strLines = targets.split("_"),
                    li_items = "";

                $(this).on('mouseover', function(e){
                    $("<div class='expanded_list_menu'><ul id='expanded_list_menu_ul'></ul></div>").appendTo("header");
                    $('.expanded_list_menu').css({"top": $(this).position().top + 55, "left": $(this).position().left + 585.8, "width": $(this).outerWidth()})
                    
                        for (var i in strLines) {
                            var obj = JSON.parse(strLines[i]);

                            li_items += "<li><a href='" + obj.destination + "'>" + obj.label + "</a></li>";
                        }
                    $('ul#expanded_list_menu_ul').append(li_items)
                })
                $(this).on('mouseleave', function(){
                    li_items = "";
                    $('.expanded_list_menu').fadeOut().remove()
                })
            })
        },
        hm_trigger_sided: function(which_active){
            var append_active_li = which_active,
                aali_dataset = $('aside.admin-sided-menu li')

            aali_dataset.each(function(element, index){
                var ds = $(this).attr('data-id'),
                    dt = $(this).attr('data-target');
                
                /* apply active_li */
                if(ds == append_active_li){
                    $(this).addClass('active_li')
                }

                /* change window.location based on data-target */
                $(this).on('click', function(){
                    if($(this).hasClass('active_li') == true){
                        $('aside.admin-sided-menu').removeClass('active-menu')
                        $('div.dashboard-main').removeClass('blur')
                        
                            return false;
                    } else {
                        window.location = dt;
                    }
                })
            })

            $('span#header-menu-trigger').on('click', function(e){
                e.preventDefault();
                // $('<aside class="admin-sided-menu"><div class="inner-menu"><h2>scegli un\'opzione</h2><hr /><div class="ul-holder"><span class="ul-sec-title">magazzino</span><ul><li>dummy 1</li><li>dummy 2</li></ul><div class="clearfix"></div><span class="ul-sec-title">prodotti</span><ul><li>catalogo prodotti</li><li>nuovo prodotto</li></ul><div class="clearfix"></div><span class="ul-sec-title">clienti</span><ul><li>dummy 1</li><li>dummy 2</li></ul></div></div></aside>').insertAfter(".app-divider");

                $('div.dashboard-main').toggleClass('blur');

                $('aside.admin-sided-menu').toggleClass('active-menu')

                if($('aside.admin-sided-menu').hasClass('active-menu') == true){
                    // esc
                    $(document).keyup(function(e) {
                        if (e.keyCode === 27){
                            $('aside.admin-sided-menu').removeClass('active-menu')
                            $('div.dashboard-main').removeClass('blur')
                        }
                    });

                    // click outside menu hide
                    /*
                    $('body').not('span#header-menu-trigger, aside.admin-sided-menu').on('click', function(e){
                        e.preventDefault();

                        $('aside.admin-sided-menu').removeClass('active-menu')
                        $('div.dashboard-main').removeClass('blur')
                    })
                    */
                }
            })
        },
        top_headerStats: function(){
            
        }
    }

    clx_dashboard.init("scrumb_loggedIn")
})(clx_dashboard = {})