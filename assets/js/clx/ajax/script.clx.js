!(function(){
    'use-strict';
    
    window.clx = window.clx || {}

    clx = {
        ajax: function(){
            // First of all find ajax-clx attributes on links
            $('*[rel="ajax-clx"]').each(function(element, index){
                var _this = $(this),
                    clx_ajax_type = _this.attr("data-ajax-type"),
                    clx_ajax_type_extra = _this.attr("data-ajax-type-extra"),
                    clx_ajax_target = _this.attr("data-ajax-target");

                _this.on('click', function(e){
                    // $("loading").fadeIn()

                    /*
                    * form
                    */
                    if(clx_ajax_type == "form"){
                        _this.closest("form").submit(function(){
                            var serialize = $.trim(_this.closest("form").serialize());

                            $("loading").fadeIn()

                            // alert(clx_ajax_target)
                            
                            $.ajax({
                                url: clx_ajax_target,
                                data: { serialize },
                                method: "POST",
                                success: function(response){
                                    $("loading").fadeOut()
                                    // alert(response.status)
                                    if(response.type === "login_res"){
                                        if(response.status === "accept_login"){
                                            alert("lol")
                                        }
                                    }
                                },
                                error: function(jqXhr, textStatus, errorThrown){
                                    $("loading").fadeOut()
                                    alert("Si è verificato un'errore. Riprovare a breve.\n\n" + errorThrown);
                                }
                            })
                            e.preventDefault()
                            return false;
                        })
                    }
                })
            })
        }
    }

    clx.ajax();
})(clx = {});

