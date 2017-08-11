// image-handle
$('.new_image').click(function(e){
    $('input[type=file]#np-img', this).click();
})

$('input[type=file]#np-img').click(function(e){
   e.stopImmediatePropagation();

   // $('div.images-holder').fadeIn()
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function (e) {
            $('div.image-holder').html("<img src='" + e.target.result + "' alt=\"\" id=\"prepend_preview\" />")
        }
            
        reader.readAsDataURL(input.files[0]);
    }
}
$('input[type=file]#np-img').change(function(){
    readURL(this);
});

// generic input on keyup to fadeout seo-nonpopulated and fadein seo-populated
$('body#clx-admin-loggedIn-dashboard main div.dashboard-main div.app-mid[data-section="new-product-section"] div.new-product-holder div.clx-product-insert div.product-details-form form input').on('keyup', function(){
    $('div.seo-nonpopulated').fadeOut(600, function(){
        $('div.seo-populated').fadeIn()
    })
})

// title
$('#title').on('keyup', function(){
    $('a.title').text($(this).val())
    generateTags($(this).val())
})

// description
$('#description').on('keyup', function(){
    $('span.description').text($(this).val())
    generateTags($(this).val())
})

// link 
$('cite.dynamic_link').text($('span.link-cite-form > cite').text())

/* --- tags --- */

// generate-tags
function generateTags(value){
    var split_value = value,
        find_spaces = new RegExp("\b(\s+\t+)\b");

    console.log(find_spaces.test(split_value))

    // $('<span><i class="fa fa-times-circle" aria-hidden="true"></i></span>').appendTo('div.tags-holder')
}

// tags i on click remove
$('div.tags-holder span i').each(function(element, index){
    $(this).on('click', function(e){
        $(this).closest('span').fadeOut()
    })
})

// tags on double-click
$('div.tags-holder span').each(function(element, index){
    $(this).dblclick(function(e){
        $(this).replaceWith("<span><input type=\"text\" value=" + $(this).text() + " /><i class=\"fa fa-check confirm\" aria-hidden=\"true\"></i></span>")
    })
})

// opt-selectable onChange send notification
$('div.opt-selectable > select').each(function(){
    $(this).on('change', function(e){
        e.preventDefault()
        $('option:selected').each(function(){
            notif($(this).val(), $(this).attr('data-notif'))
        })
    }) 
})

// opt-selectable[data-select-clone="true"] generate new selectable fields
$('div.opt-selectable[data-select-clone="true"] > select').each(function(){
    $(this).on('change', function(e){
        $(this).closest('div.opt-selectable').clone().appendTo()
        console.log('clonning')
    }) 
})

// color_ onClick .selected and send notification
$('div.color_').each(function(){
    $(this).on('click', function(){
        $(this).addClass('selected');

        notif($(this).attr('data-color'), "colour")
    })
})

// product_care .selected and send notification
$('div.trigger-selection-pc').each(function(){
    $(this).on('click', function(){
        $(this).addClass('selected');
        
        notif($(this).find('span.title').text(), "product_care")
    })
})

// data-txt-default-value
$('div.opt-selectable > select.def').each(function(){
    $('option:selected').each(function(){
        var default_value = $(this).attr('data-txt-default-value');
        $(this).closest('span.appended_value').html(default_value)
    })
})

// span.jumpto_nexttab click
$('span.jumpto_nexttab a').each(function(element, index){
    $(this).on('click', function(){
        if($('div.tabbed').hasClass('active') == true){
            $('div.tabbed').removeClass('active').addClass('disabled').next().removeClass('disabled').addClass('active')
        }
    })
})




// notifications
function notif(text, type){
    $('div#clx_notification').slideDown().promise().done(function(){
        if(type === "brand"){
            $('div#clx_notification').html('Selezionato brand "' + text + '"')
        } else if(type === "category"){
            $('div#clx_notification').html('Selezionata categoria "' + text + '"')
        } else if(type === "colour"){
            $('div#clx_notification').html('Colore "' + text + '" selezionato')
        } else if(type === "product_care"){
            $('div#clx_notification').html('"' + text + '" selezionato')
        }
        setTimeout(function(){
            $('div#clx_notification').empty().slideUp()
        }, 1650)
    })
}

// summary generate