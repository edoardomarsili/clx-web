
    $('div.tabs-holder ul li').each(function(element, index){
        $(this).on('click', function(){
            var data_target = $(this).attr('data-tab-target');

            if(!$(this).hasClass('active')){
                $('div.tabs-holder ul li').removeClass('active')
                $(this).addClass('active')
            }

            if($('div.tabbed#' + data_target).hasClass('disabled') && $('div.tabbed').hasClass('active')){
                $('div.tabbed').removeClass('active').addClass('disabled')
                $('div.tabbed#' + data_target).removeClass('disabled').addClass('active')
            }
        })
    })