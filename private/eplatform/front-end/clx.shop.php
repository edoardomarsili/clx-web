<?php

/* 
* name: CLX eplatform-shop
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/shop
*/

include("../../secure/sql/connect.sql.php");

session_start();
include("../../secure/php/lang/clx.lang.php");
	include("../../secure/php/lang/txt.php");
defineStrings();
?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="IE=edge" />
		<title><?php echo SHOP_TITLE; ?></title>
        <link href="https://www.cestlux.it/private/eplatform/front-end/assets/css/shop.clx.css" rel="stylesheet" />
        <link href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet" />
        <script src="https://www.cestlux.it/private/eplatform/front-end/assets/js/modernizr.custom.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        <div class="container-fluid">
			<loading><?php echo LOADING; ?></loading>
			<!-- cookies consent -->
			<div class="cookies-consent"><div left><?php echo SHOP_COOKIES; ?></div><div right>chiudi</div></div>
			<!-- clx header -->
			<div class="clx-header">
				<span><i>c'est lux</i></span>
			</div>
			<!-- shop-toolbar -->
            <header class="shop-toolbar row">
				<?php if(!isset($_GET['reason'])){ ?>
					<div left class="header-d">
						<?php
$clx_shopheader_sql = <<<SQL
SELECT *
FROM clx_collections
WHERE cisvisible = 1
AND cistpx = 0
SQL;
						if(!$result = $connection->query($clx_shopheader_sql)){
							die('error');
						} else {
							while($row = $result->fetch_assoc()){
								echo "<span id='open-collection' data-collection-id='".$row['cuid']."' data-collection-target='".$row['chmtarget']."' class='".$row['cspanclass']."'>".$row['cname']."</span>";
								// echo "yay";
							}
						}
						?>

						&middot; <span id="open-changingroom"><?php echo CHANGING_ROOM_LABEL; ?></span><span id="init_vipLux" class="lux-room"><?php echo TOPLUX_LABEL; ?></span></div><div right class="header-d"><span id="trigger-search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;<?php echo SEARCH_LABEL; ?></span>&nbsp;&nbsp;<span id="lc_trigger"><i class="fa fa-eur" aria-hidden="true"></i>&nbsp;euro&nbsp;&middot;&nbsp;english</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;<?php echo LOGIN_ACCOUNT_BASIC_LABEL; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="shoppingCart_count"><a href="?mode=cart"><?php if(isset($_SESSION["cart_item"])){ echo $_SESSION["clxshop.quantity"]; } else { echo "0"; } ?>&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true" title="<?php echo SHOPPING_CART_LABEL; ?>"></i></a>&nbsp;&nbsp;</span>
					</div>
					<div class="search-input-container"><input type="text" class="shop-search" placeholder="<?php echo SEARCH_PLACEHOLDER; ?>" /><i class="fa fa-times close-search" id="close-search" aria-hidden="true"></i></div>

				<?php } else { ?>
					<?php
						if(!empty($_GET['reason'])){
							if($_GET['reason'] == "tpx-login-error"){
								echo "<div class='header_error'><span class='he_span'>".TOPLUX_BADUSERNAMEPASSWORD."</span></div>";
							}
						}
					?>
				<?php } ?>
			</header>

			<!-- promo.strip -->
			<div class="promoStrip-sub-header"><div left class="inner promo-cpt"><span>-10% on new clients</span></div><div right class="inner"><i class="fa fa-times" id="close-promo-strip" aria-hidden="true"></i></div></div>

			<!-- header-menu -->
            <section class="header-menu clx-shop-sec hmcollection_1">
				<i class="fa fa-times close-hm" aria-hidden="true"></i>
				<!-- old.hm-gallery; now is in shop home page -->

				<div class="col-md-5 fw-collection man">
					<span class="fw-ct" id="open-collection-explorer">> man <</span>
				</div>
				<div class="col-md-5 fw-collection woman">
					<span class="fw-ct" id="open-collection-explorer">> woman <</span>
				</div>

				<!--
				<aside class="box">
					<span class="hm-title" id="collection-id" data-target="">esplora l'outfit</span>
				</aside>
				-->
			</section>

			<!-- pitti2017-container -->
            <section class="pitti2017-container clx-shop-sec">
				<i class="fa fa-times close-hm" aria-hidden="true"></i>
				<div class="about-pitti row">
					<pitti-accordion>
						<div class="acc closed-accordion">
							<span class="paccordion-title"><?php echo WHAT_IS_PITTI_LABEL; ?></span>
							<div class="acc-content wisp">
								<div class="what-is-pitti">
									<p><?php echo PITTI_WSP_STORY; ?></p>
								</div>
								<img src="https://www.cestlux.it/shop/uploads/pitti-uomo-2017_new.jpg" />
							</div>
						</div>
						<div class="acc closed-accordion">
							<span class="paccordion-title"><?php echo PITTI_DATES_LABEL; ?></span>
							<div class="acc-content">
								<div class="where-and-when-pitti">
									<div class="location" data-location="pitti immagine uomo 92 &middot; firenze, italy">
										<span>13-16 <?php echo PITTI_PD_JUNE; ?> 2017 <a href="http://www.pittimmagine.com/<?php echo $_SESSION[lang]; ?>/corporate/fairs/uomo.html" target="_blank"><?php echo GOTO_PITTI_SITE_LABEL; ?> >></a></span>
									</div>
									<div class="location" data-location="pitti immagine bimbo 85 &middot; firenze, italy">
										<span>22-24 <?php echo PITTI_PD_JUNE; ?> 2017 <a href="http://www.pittimmagine.com/<?php echo $_SESSION[lang]; ?>/corporate/fairs/bimbo.html" target="_blank"><?php echo GOTO_PITTI_SITE_LABEL; ?> >></a></span>
									</div>
									<div class="location" data-location="pitti immagine filati 81 &middot; firenze, italy">
										<span>28-30 <?php echo PITTI_PD_JUNE; ?> 2017 <a href="http://www.pittimmagine.com/<?php echo $_SESSION[lang]; ?>/corporate/fairs/filati.html" target="_blank"><?php echo GOTO_PITTI_SITE_LABEL; ?> >></a></span>
									</div>
									<div class="location" data-location="super 10 (ex pitti immagine donna) &middot; milano, italy">
										<span>23-25 <?php echo PITTI_PD_SEPTEMBER; ?> 2017 <a href="http://www.pittimmagine.com/<?php echo $_SESSION[lang]; ?>/corporate/fairs/super.html" target="_blank"><?php echo GOTO_PITTI_SITE_LABEL; ?> >></a></span>
									</div>
								</div>
							</div>
						</div>
						<div class="acc closed-accordion">
							<span class="paccordion-title"><?php echo PITTI_EXPLOREPARTYDATES_LABEL; ?></span>
						</div>
						<!--
						<div class="acc closed-accordion">
							<span class="paccordion-title"><?php echo PITTI_OURCOLLECTION; ?></span>
						</div>
						-->
					</pitti-accordion>
				</div>
			</section>

			<!-- front-window -->
			<section class="front-window clx-shop-sec row" style="display:block">
				<front-window-caption>
					<span>C'est Lux + shopping = <font class="yellow_heartbeat">&#10084;</font></span>
					<p>
						Siamo un outlet con sede a Firenze. Guidati dalla passione per la moda e per il gusto, vi offiramo una vasta gamma di capi per <i><b>#unagiornataalmare</b></i> e <i><b>#unagiornatainufficio</b></i>. Il nostro outlet vi propone due scelte, collezioni da indossare tutti i giorni e collezioni di lusso.
					</p>
					<button>
						entra nello shop
					</button>
					<!--
					<div class="single-product-detail closed" style="top: 56px;right: -132px;" id="spd-trigger" data-item-title="camicia pollini &middot; €50"><span>+</span></div>
					<div class="single-product-detail closed" style="top: 163px;right: -332px;" id="spd-trigger" data-item-title="felpa diesel &middot; €70"><span>+</span></div>
					-->
				</front-window-caption>
				<!-- // break -->
				
				<!-- new set of words -->
				<div class="set-of-words">
					<p class="sow1">who</p>
					<p class="sow2">said</p>
					<p class="sow3">fashion</p>
					<p class="sow4">is</p>
					<p class="sow5">style?</p>
				</div>

				<!-- old.man/woman now on header-menu -->

				<!-- hm-gallery from header-menu -->
				<div class="hm-gallery-container row">
					<div class="hm-gallery sticky-hidden col-md-4">
						<span class="hmg-hashtag">#inufficio</span>
						<ul class="row">
							<?php
$clx_collectionProduct_sql = <<<SQL
SELECT *
FROM clx_products
WHERE pvisible = 1
AND pinstock = 1
AND p_isclxtpx = 0
LIMIT 4
SQL;
							if(!$result = $connection->query($clx_collectionProduct_sql)){
								die('error');
							} else {
								while($row = $result->fetch_assoc()){
									echo '<li id="trigger_product__shopDetail" class="col-md-5" data-product-details="'.$row['pname'].'&middot;'.$row['pcurrency'].$row['pprice'].'" data-product-id="'.$row['puid'].'" data-background="'.$row['ppic'].'"><img class="hm-gallery-img" src="'.$row['ppic'].'" /></li>';
									// echo "yay";
								}
							}
							?>
						</ul>
						<!-- <span class="cpt-hm-gallery">passa con il mouse sopra le immagini o cliccale per vederle sull sfondo</span> -->
					</div>

					<div class="hm-gallery sticky-hidden col-md-4">
						<span class="hmg-hashtag">#unagiornataalmare</span>
						<ul class="row">
							<?php
$clx_collectionProduct_sql = <<<SQL
SELECT *
FROM clx_products
WHERE pvisible = 1
AND pinstock = 1
AND p_isclxtpx = 0
LIMIT 4
SQL;
							if(!$result = $connection->query($clx_collectionProduct_sql)){
								die('error');
							} else {
								while($row = $result->fetch_assoc()){
									echo '<li id="trigger_product__shopDetail" class="col-md-5" data-product-details="'.$row['pname'].'&middot;'.$row['pcurrency'].$row['pprice'].'" data-product-id="'.$row['puid'].'" data-background="'.$row['ppic'].'"><img class="hm-gallery-img" src="'.$row['ppic'].'" /></li>';
									// echo "yay";
								}
							}
							?>
						</ul>
						<!-- <span class="cpt-hm-gallery">passa con il mouse sopra le immagini o cliccale per vederle sull sfondo</span> -->
					</div>

					<div class="hm-gallery sticky-hidden col-md-4">
						<span class="hmg-hashtag">#diserasonounaltra</span>
						<ul class="row">
							<?php
$clx_collectionProduct_sql = <<<SQL
SELECT *
FROM clx_products
WHERE pvisible = 1
AND pinstock = 1
AND p_isclxtpx = 0
LIMIT 4
SQL;
							if(!$result = $connection->query($clx_collectionProduct_sql)){
								die('error');
							} else {
								while($row = $result->fetch_assoc()){
									echo '<li id="trigger_product__shopDetail" class="col-md-5" data-product-details="'.$row['pname'].'&middot;'.$row['pcurrency'].$row['pprice'].'" data-product-id="'.$row['puid'].'" data-background="'.$row['ppic'].'"><img class="hm-gallery-img" src="'.$row['ppic'].'" /></li>';
									// echo "yay";
								}
							}
							?>
						</ul>
						<!-- <span class="cpt-hm-gallery">passa con il mouse sopra le immagini o cliccale per vederle sull sfondo</span> -->
					</div>
				</div>
            </section>
			<!-- vip-login -->
			<section class="vip-login clx-shop-sec" bg-fff="true" <?php if(isset($_GET['tpx'])){ echo "style='display: block !important;'"; }?>>
				<i class="fa fa-times close-vip-login" aria-hidden="true"></i>
				<div class="full-key-bg row">
					<i class="fa fa-key" aria-hidden="true"></i>
				</div>
				<span title>v.i.p.</span>
				<p><?php echo TOPLUX_CPT; ?></p>
				<div class="vip-login-form clx-shop-sec">
					<form action="./toplux.clx.shop.php">
						<input type="hidden" name="x.language" value="<?php echo $_SESSION[lang]; ?>" />
						<span><input type="text" name="toplux_uname" placeholder="<?php echo TOPLUX_UNAME_LABEL; ?>" <?php if(isset($_GET['tpx'])){ echo "style='border: 1px solid indianred;'"; }?>></span>
						<span><input type="password" name="toplux_upassword" placeholder="<?php echo TOPLUX_UPASSWORD_LABEL; ?>" <?php if(isset($_GET['tpx'])){ echo "style='border: 1px solid indianred;'"; }?>></span>
						<span><button><?php echo TOPLUX_LOGINBTN_LABEL; ?></button></span>
					</form>
				</div>
			</section>

			<!-- collections -->
			<section class="collection-container clx-shop-sec" bg-fff="true" data-load=""></section>

			<!-- changingroom -->
			<section class="clx-changingroom clx-shop-sec" bg-fff="true"></section>

			<!-- searchcontainer -->
			<section class="clx-searchcontainer clx-shop-sec" bg-fff="true"><i class="fa fa-search" aria-hidden="true"></i></section>

			<!-- small-cart -->
			<div class="clx-small-cart">cart</div>

			<?php if(isset($_GET['mode'])){ 
					if($_GET['mode'] == "cart"){ 
						class DBController {
							private $host = "localhost";
							private $user = "root";
							private $password = "fbo";
							private $database = "clx_db";
							private $conn;
							
							function __construct() {
								$this->conn = $this->connectDB();
							}
							
							function connectDB() {
								$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
								return $conn;
							}
							
							function runQuery($query) {
								$result = mysqli_query($this->conn,$query);
								while($row=mysqli_fetch_assoc($result)) {
									$resultset[] = $row;
								}		
								if(!empty($resultset))
									return $resultset;
							}
							
							function numRows($query) {
								$result  = mysqli_query($this->conn,$query);
								$rowcount = mysqli_num_rows($result);
								return $rowcount;	
							}
						}
						$db_handle = new DBController();
						if(!empty($_GET["action"])) {
						switch($_GET["action"]) {
							case "add":
								if(!empty($_GET["quantity"])) {
									$productByCode = $db_handle->runQuery("SELECT * FROM clx_products WHERE puid='" . $_GET["puid"] . "'");
									$itemArray = array($productByCode[0]["puid"]=>array('name'=>$productByCode[0]["pname"], 'code'=>$productByCode[0]["puid"], 'quantity'=>$_GET["quantity"], 'price'=>$productByCode[0]["pprice"], 'pic'=>$productByCode[0]["ppic"]));
									
									if(!empty($_SESSION["cart_item"])) {
										if(in_array($productByCode[0]["puid"],array_keys($_SESSION["cart_item"]))) {
											foreach($_SESSION["cart_item"] as $k => $v) {
													if($productByCode[0]["puid"] == $k) {
														if(empty($_SESSION["cart_item"][$k]["quantity"])) {
															$_SESSION["cart_item"][$k]["quantity"] = 0;
														}
														$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
													}
											}
										} else {
											$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
										}
									} else {
										$_SESSION["cart_item"] = $itemArray;
									}
								}
							break;
							case "remove":
								if(!empty($_SESSION["cart_item"])) {
									foreach($_SESSION["cart_item"] as $k => $v) {
											if($_GET["puid"] == $k)
												unset($_SESSION["cart_item"][$k]);				
											if(empty($_SESSION["cart_item"]))
												unset($_SESSION["cart_item"]);
									}
								}
							break;
							case "empty":
								unset($_SESSION["cart_item"]);
							break;	
						}
						}
					?>
						
				<!-- cart -->
					<section class="clx-cart clx-shop-sec" bg-fff="true" style="display: block !important">
						<i class="fa fa-shopping-cart bg-cart" aria-hidden="true"></i>
						<div class="cart-full-container">
							<?php if(empty($_SESSION["cart_item"])) { ?>
								<span class="cart_label"><?php echo CLXS_CART_LABEL; ?></span>
								<span class="cart_empty_label"><?php echo CLXS_CART_ISEMPTY_LABEL; ?></span>
							<?php } else {
								$item_total = 0;
								echo "<span class=\"cart_label\">".CLXS_CART_LABEL."</span> &middot; <a href=\"?mode=cart&action=empty\">Empty cart</a>";
								echo "<div class='list_cartItems'><ul>";
								foreach ($_SESSION["cart_item"] as $item){ ?>
									<li><div class="cart_item_container"><img src="<?php echo $item['pic']; ?>" /><div class="ci_rightImg_container"><span class="ci_name"><?php echo $item['name']; ?></span><span class="ci_size">Size:</span><span class="ci_colour">Colour:</span><span class="ci_price">Price: €<?php echo $item["price"]; ?></span><div class="ci_quantity_box"><div>QTY: <input type="number" name="quantity_" id="c_q" value="<?php echo $item["quantity"]; ?>" /></div></div><span class="ci_remove" id="remove_cart_item" data-producttitle="<?php echo $item["name"]; ?>" data-productpuid="<?php echo $item["pname"]; ?>">remove</span></div></div></li>
								<?php
									$item_total_novat += ($item["price"]*$item["quantity"]);
									$vat += (22/100);
									$item_total_vat += ($item_total_novat*$vat);
									$item_total_subtotal += ($item_total_novat + $item_total_vat);

									$_SESSION["clxshop.quantity"] = $item["quantity"];
									$_SESSION["item_total_novat"] = $item_total_novat;
									$_SESSION["item_total_subtotal"] = $item_total_subtotal;
								} 
								echo "</ul></div>";
								?>
								<div class="checkout_toolbar">
									<div class="checkout_top">
										<div class="checkout_promo">
											<input type="text" name="checkout_promo" id="chk-promo-code-subtotal" placeholder="promo code" /><button>apply</button>
										</div>
									</div>
									<div class="checkout_bottom">
										<div right>
											<strong>Total:</strong>&nbsp;<?php echo "€".$item_total_novat; ?><br />
											<strong>VAT %22:</strong>&nbsp;<?php echo "€".$item_total_vat; ?><br />
											<strong>Sub Total:</strong>&nbsp;<?php echo "€".$item_total_subtotal; ?><br />
										</div>
										<button id="goto_payment"><span><?php echo CLXS_CART_CHECKOUTBTN_LABEL; ?></span><i>paypal</i></button>
										<div class="checkout_shipment_notify"><span><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;we deliver worlwide through <b>dhl</b></span></div>
									</div>
								</div>
							<?php } ?>
						</div>
					</section>
				<!-- // cart -->
			<?php
				}
			} ?>

			<!-- //-->

			<?php if(isset($_GET['mode'])){ 
				if($_GET['mode'] == "product-view"){ ?>
				<!-- product-view -->
					<section class="product-view clx-shop-sec" bg-fff="true" style="display: block !important">
						<div class="pvc row clearfix" itemscope itemtype="http://schema.org/Product">
							<?php
$clx_singleProductview_sql = <<<SQL
SELECT *
FROM clx_products
WHERE puid = '$_GET[pid]'
SQL;
							if(!$result = $connection->query($clx_singleProductview_sql)){
								die('error');
							} else {
								while($row = $result->fetch_assoc()){ ?>
									<div class="pvc_ left_descr_panel col-md-5">
										<div class="product-detail pull-left">
											<!-- breadcrumb -->
											<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
												<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
												<a class="breadcrumb-home " itemprop="item" href="http://eu.puma.com">
												<span itemprop="name">Home</span>
												<meta itemprop="position" content="1"/>
												</a>
												</li>

												<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
												<a class=" " itemprop="item" href="http://it-eu.puma.com/Uomo/70k7k/">
												<span itemprop="name">Uomo</span>
												<meta itemprop="position" content="2"/>
												</a>
												</li>

												<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
												<a class=" " itemprop="item" href="http://it-eu.puma.com/Uomo/Abbigliamento/70y83/">
												<span itemprop="name">Abbigliamento</span>
												<meta itemprop="position" content="3"/>
												</a>
												</li>

												<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
												<a class=" " itemprop="item" href="https://cestlux.localhost.local/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=<?php echo $row['puid']; ?>">
												<span itemprop="name"><?php echo $row['pname']; ?></span>
												<meta itemprop="position" content="4"/>
												</a>
												</li>

											</ol>
											<!-- // breadcrumb -->
											<h1 class="ptitle" itemprop="name"><?php echo $row['pname']; ?><span class="ptt_underline"></span></h1>
											<div class="product-content">
												<p class="pvat">UOMO / Article code:&nbsp;<?php echo $row['psku']; ?></p>
												<span class="p_stockprice"><?php echo $row['pprice'].$row['pcurrency_symbol']; ?></span>&nbsp;&middot;&nbsp;<span class="p_rrpprice"><?php echo $row['pprice'].$row['pcurrency_symbol']; ?></span>
												<div class="pdescription-box">
													<div class="tabs-holder">
														<ul>
															<li>product details</li>
															<li>shipment & returns</li>
															<li>materials & washing</li>
															<li>fit</li>
														</ul>
													</div>
													<!-- <?php echo $row['plongdescription']; ?> -->
												</div>
											</div>
											<div class="product-extras">
												<div class="pe_sec pe_matches">
													<span class="psec_tt">match with</span>
													<div class="ps_c clearfix">

													</div>
												</div>
												<div class="pe_sec pe_socials">
													<span class="psec_tt">share</span>
													<div class="ps_c clearfix">
														<i class="fa fa-facebook-square" aria-hidden="true">&nbsp;Facebook</i>&nbsp;&middot;&nbsp;<i class="fa fa-twitter-square" aria-hidden="true">&nbsp;Twitter</i>&nbsp;&middot;&nbsp;<i class="fa fa-pinterest-square" aria-hidden="true">&nbsp;Pinterest</i>&nbsp;&middot;&nbsp;<i class="fa fa-google-plus-square" aria-hidden="true">&nbsp;G+</i>
													</div>
												</div>
											</div>
										</div>
										<div class="p_buyToolbar"><div class="border-black"><span class="quantityChooser"><?php echo CLXS_BUYTOOLBAR_QUANTITY; ?>: <input type="text" name="item_quantity" value="1" /></span><div class="sizeChooser_container">Size:&nbsp;<span>XS</span><span>S</span><span>M</span><span>L</span><span>XL</span><span>XXL</span></div><span class="p_favBtn"><i class="fa fa-heart-o" aria-hidden="true"></i></span><!-- <span class="pprice_holder">Sub total:&nbsp;<?php echo $row['pcurrency_symbol'].$row['pprice']; ?></span> --></div><button class="addTo_cart" data-product-id-cart="<?php echo $row['puid']; ?>"><?php echo CLXS_BUYTOOLBAR_BUYBTN_LABEL; ?></button></div>
										<p class="p_toc"><b>Product TOC:</b> Lorem ipsum sed dolor. Lorem ipsum sed dolor. Lorem ipsum sed dolor. Lorem ipsum sed dolor. Lorem ipsum sed dolor. Lorem ipsum sed dolor. Lorem ipsum sed dolor.</p>
									</div>
									<aside class="pvc_ col-md-5"><img class="ppic" src="<?php echo $row['ppic']; ?>" alt="img01"/></aside>
								<?php }
							} ?>
						</div>
					</section>
				<!-- // product-view -->
			<?php
				}
			} ?>


			<!-- footer -->
            <footer>
				<div left><span id="expand-footer-map"><b>c'est lux &middot; via dei serragli 74r, 50124 fiernze, italy</b></span></div><div right><span id="expand-footer-newsletter"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>&nbsp;<?php echo SHOPF_NEWSLETTER_LABEL; ?></span> &middot; <span id="expand-footer-tc"><?php echo SHOPF_TC_LABEL; ?></span> &middot; <span id="expand-footer-returns"><?php echo SHOPF_RETURNS_LABEL; ?></span> &middot; <i class="fa fa-cc-amex" aria-hidden="true"></i>&nbsp;<i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp;<i class="fa fa-cc-mastercard" aria-hidden="true"></i>&nbsp;<i class="fa fa-cc-paypal" aria-hidden="true"></i>&nbsp;<i class="fa fa-google-wallet" aria-hidden="true"></i></div>
				<span class="close-footer"><?php echo SHOPF_CLOSE_LABEL; ?></span>
				<section class="footer-exapnded-map ftt">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d360.16491480514594!2d11.24458641237529!3d43.76622997911755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a5153a7406f71%3A0xc6602de0169ef843!2sVia+dei+Serragli%2C+74R%2C+50124+Firenze!5e0!3m2!1sen!2sit!4v1497107085703" frameborder="0" style="border:0" allowfullscreen></iframe>
				</section>
				<section class="footer-exapnded-newsletter ftt">
					<form>
						<label for="newsletter"><?php echo SHOPF_NEWSLETTER_LABEL; ?></label><br />&nbsp;&nbsp;<input type="text" placeholder="<?php echo SHOPF_NEWSLETTER_PLACEHOLDER; ?>" name="newsletter"><button><?php echo SHOPF_NEWSLETTER_BTN; ?></button>
					</form>
					<span class="cpt-newsletter"><?php echo SHOPF_NEWSLETTER_CPT; ?></span>
				</section>
				<section class="footer-expanded-tc ftt">
					termini e condizioni
				</section>
				<section class="footer-expanded-returns ftt">
					rese
				</section>
			</footer>

			<!-- language_curreny_modal -->
			<dialog class="lc_chooser">
				<span class="close_lc">x</span>
				<span class="lc_title">language & currency</span>
				<div class="row">
					<div class="lcc col-md-5">
						<span class="lc_sec_title">language</span>
						<ul>
							<li class="current">english</li>
							<li>italiano</li>
							<li>français</li>
							<li>deutsche</li>
							<li>chinese</li>
						</ul>
					</div>
					<div class="lcc col-md-5">
						<span class="lc_sec_title">currency</span>
						<ul>
							<li class="current">€ euro</li>
							<li>£ english pound sterlin</li>
							<li>$ us dollar</li>
						</ul>
					</div>
				</div>
			</dialog>
        </div>
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://www.cestlux.it/private/eplatform/front-end/assets/js/clx.shop.main.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://www.cestlux.it/private/eplatform/front-end/assets/js/clx.collection.shop.main.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://www.cestlux.it/private/eplatform/front-end/assets/js/clx.cart.shop.main.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>