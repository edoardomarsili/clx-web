!(function(){
    'use-strict';

    window.clx_warehouse = window.clx_warehouse || {};

    clx_warehouse = {
        warehouse_destination: function(){
            $('div#warehouse-selector li').each(function(){
                var dwo = $(this).attr('data-warehouse-open'),
                    dpass = $(this).attr('data-password'),
                    li_this = $(this);

                $(this).on('click', function(e){
                    e.preventDefault();

                    console.log('destination: ' + dwo)

                    if(dpass === "prompt_password"){
                        $('div.warehouse_select_optPassword_prompt, div.warehouse_select_optPassword_prompt div.up-pointer').fadeIn('fast', function(){
                            $('div.warehouse_select_optPassword_prompt div.up-pointer').animate({'left': li_this.position().left})
                            
                        }).promise().done(function(){
                            $('div.warehouse_select_optPassword_prompt div.wsoptpassp-inner').fadeIn()
                        })

                        /* fix */
                        $('div.warehouse_select_optPassword_prompt form').attr('action', dwo + '.php')
                    } else {
                        $('div#warehouse-selector').fadeOut('slow', function(){
                            $('div#test_prepend').html(li_this.find('span.icon').html() + li_this.find('span.icon_title').text())
                        })
                    }
                })

                $('div.warehouse_select_optPassword_prompt form').submit(function(){
                    if($('div.warehouse_select_optPassword_prompt form #password_').val().length == 0){
                        $('div.warehouse_select_optPassword_prompt div.up-pointer').css({
                            'border-color': 'transparent transparent indianred transparent'
                        })
                        $('div.warehouse_select_optPassword_prompt').css({
                            'background-color': 'indianred'
                        })

                        setTimeout(function(){
                            $('div.warehouse_select_optPassword_prompt div.up-pointer').css({
                                'border-color': 'transparent transparent black transparent'
                            })
                            $('div.warehouse_select_optPassword_prompt').css({
                                'background-color': 'black'
                            })
                        }, 450)

                        return false;
                    }
                })
            })
        }
    }


})(clx_warehouse = {})