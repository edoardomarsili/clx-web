<?php

/* 
* name: CLX cart-payment
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/payment
*/

session_start();
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
		<title>Checkout &middot; C'est Lux</title>
        <link href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet" />
		<link href="https://payment.cestlux.it/assets/css/payment.clx.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container-fluid">
			<div class="clx-header">
				<span><i>c'est lux</i></span>
			</div>
			<div class="payment_container clearfix">
				<div class="_payment">
					<span class="lp_cpt">loading payment...</span>
					<div class="recheck_checkout">
						<span class="recheck_cpt">double check before proceeding to payment</span>
						<ul>
							<?php foreach ($_SESSION["cart_item"] as $item){ ?>
								<li><div class="cart_item_container"><img src="<?php echo $item['pic']; ?>" /><div class="ci_rightImg_container"><span class="ci_name"><?php echo $item['name']; ?></span><span class="ci_size">Size:</span><span class="ci_colour">Colour:</span><span class="ci_price">Price: €<?php echo $item["price"]; ?></span><div class="ci_quantity_box"><div>QTY: <input type="number" name="quantity_" id="c_q" value="<?php echo $item["quantity"]; ?>" /></div></div><span class="ci_remove" id="remove_cart_item" data-producttitle="<?php echo $item["name"]; ?>" data-productpuid="<?php echo $item["pname"]; ?>">remove</span></div></div></li>
							<?php } ?>
						</ul>
						<button class="confirm_checkoutCHK">confirm & pay</button>
					</div>
					<div class="subtotal_sticky">total before tax:&nbsp;<?php echo $_SESSION["item_total_novat"]."&nbsp;€"; ?>&nbsp;&middot;&nbsp;total after tax %22:&nbsp;<?php echo $_SESSION["item_total_subtotal"]."&nbsp;€"; ?></div>
				</div>
			</div>
        </div>
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://payment.cestlux.it//assets/js/payment.clx.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>