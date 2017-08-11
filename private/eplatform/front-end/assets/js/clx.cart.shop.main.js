$(function(){
    /* remove item from cart */
    $('#remove_cart_item').on('click', function(){
        var product_title = $(this).attr('data-producttitle'),
            product_puid = $(this).attr('data-productpuid'),
            confirm = window.confirm("Are you sure you want to remove '" + product_title + "' from the shopping bag?");

        if(confirm == true){
            alert("yay")
        } else {
            return false
        }
    })

    /* confirm & go to payment page */
    $('#goto_payment').on('click', function(event){
        event.preventDefault()
        $(this).html('...')

        window.location = 'https://cestlux.localhost.local/payment';
    })
})