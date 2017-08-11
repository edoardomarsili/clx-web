<?php

/* 
* name: CLX Toplux Shop
* property: Concept FBO S.r.l.
*
* variables:
*   toplux_uname
*   toplux_upassword
*
* url: https://$_SERVER['SERVER_NAME']/shop/toplux/?[get]username&password
*/

require_once("../../../private/secure/sql/connect.sql.php");
// require_once("../../private/secure/php/sessions.php");

/*
$toplux_uname = stripslashes($_GET['toplux_uname']);
//escapes special characters in a string
$toplux_uname = mysqli_real_escape_string($connection,$username);
$upassword = stripslashes($_GET['upassword']);
$upassword = mysqli_real_escape_string($connection,$password);
*/

$toplux_uname = $_GET['toplux_uname'];
$toplux_upassword = $_GET['toplux_upassword'];

if(isset($toplux_uname) && isset($toplux_upassword)){
    $_SESSION['toplux_uname'] = $toplux_uname;
    
$sql = <<<SQL
    SELECT *
    FROM `clx_toplux_users`
    WHERE `clxtpx_uname` = '$toplux_uname'
    AND `clxtpx_upassword` = '$toplux_upassword'
SQL;

        $result = mysqli_query($connection,$sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){ ?>
<?php

/* 
* name: CLX toplux-eplatform-shop
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/shop/toplux
*/

session_start();
include("../../secure/php/lang/clx.lang.php");
	include("../../secure/php/lang/txt.php");
defineStrings();
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
		<title><?php echo SHOP_TPX_TITLE; ?></title>
        <link href="https://cestlux.localhost.local/private/eplatform/front-end/assets/css/shop.clx.css" rel="stylesheet" />
        <link href="https://cestlux.localhost.local/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cestlux.localhost.local/assets/css/clx.css" rel="stylesheet" />
        <script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/modernizr.custom.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body class="tpx-theme">
        <div class="container-fluid">
			<!-- cookies consent -->
			<div class="cookies-consent"><div left><?php echo SHOP_COOKIES; ?></div><div right>chiudi</div></div>
			<!-- clx header -->
			<div class="clx-header">
				<span><b>top lux... c'est lux</b></span>
			</div>
			<!-- shop-toolbar -->
            <header class="shop-toolbar row">
					<div left class="header-d">
						<?php
$clx_shopheader_sql = <<<SQL
SELECT *
FROM clx_collections
WHERE cistpx = 1
SQL;
						if(!$result = $connection->query($clx_shopheader_sql)){
							die('error');
						} else {
							while($row = $result->fetch_assoc()){
								echo "<span id='open-collection' class='".$row['cspanclass']."'>".$row['cname']."</span>";
								// echo "yay";
							}
						}
						?>

						&middot; <span id="open-changingroom"><?php echo CHANGING_ROOM_LABEL; ?></span></div><div right class="header-d"><span id="trigger-search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;<?php echo SEARCH_LABEL; ?></span>-&nbsp;&nbsp;<i class="fa fa-eur" aria-hidden="true"></i> &middot; <i class="fa fa-gbp" aria-hidden="true"></i> &middot; <i class="fa fa-usd" aria-hidden="true"></i>&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo LOGIN_ACCOUNT_BASIC_LABEL; ?></small>&nbsp;<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;-&nbsp;&nbsp;0&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true" title="<?php echo SHOPPING_CART_LABEL; ?>"></i>
					</div>
					<div class="search-input-container"><input type="text" class="shop-search" placeholder="<?php echo SEARCH_PLACEHOLDER; ?>" /><i class="fa fa-times close-search" id="close-search" aria-hidden="true"></i></div>
			</header>

			<!-- header-menu -->
            <section class="header-menu clx-shop-sec" style="background: url(https://cestlux.localhost.local/shop/uploads/collections/woman/DSC_9478.jpg)">
				<i class="fa fa-times close-hm" aria-hidden="true"></i>
				<div class="hm-gallery">
					<ul class="row">
						<?php
$clx_collectionProduct_sql = <<<SQL
SELECT *
FROM clx_products
WHERE pvisible = 1
AND pinstock = 1
AND p_isclxtpx = 1
LIMIT 4
SQL;
						if(!$result = $connection->query($clx_collectionProduct_sql)){
							die('error');
						} else {
							while($row = $result->fetch_assoc()){
								echo '<li class="col-md-5" data-product-details="'.$row['pname'].'" data-product-id="'.$row['puid'].'"><img class="hm-gallery-img" src="'.$row['ppic'].'" /></li>';
								// echo "yay";
							}
						}
						?>
					</ul>
					<span class="cpt-hm-gallery">passa con il mouse sopra le immagini o cliccale per vederle sull sfondo</span>
				</div>
				<aside class="box">
					<span class="hm-title" id="collection-title">esplora l'outfit</span>
				</aside>
			</section>

			<!-- front-window -->
			<section class="front-window clx-shop-sec" style="display:block">
				<front-window-caption>
					<span>Bentornato <?php echo $_GET['toplux_uname']; ?>.</span>
					<button>
						esplora negozio
					</button>
					<!--
					<div class="single-product-detail closed" style="top: 56px;right: -132px;" id="spd-trigger" data-item-title="camicia pollini &middot; €50"><span>+</span></div>
					<div class="single-product-detail closed" style="top: 163px;right: -332px;" id="spd-trigger" data-item-title="felpa diesel &middot; €70"><span>+</span></div>
					-->
				</front-window-caption>
				<div id="grid-gallery" class="grid-gallery">
                    <section class="grid-wrap">
                        <ul class="grid">
                            <li class="grid-sizer"></li>
                            <li class="es-tile smoky" data-image="https://cestlux.localhost.local/shop/uploads/landscape-1442498885-gettyimages-488701748.jpg"></li>
                        </ul>
                    </section>
                    <section class="slideshow">
					<ul>
						<li>
							<figure>
								<figcaption>
									<h3>Borsa donna &middot; art. #2301</h3>
									<p>Kale chips lomo biodiesel stumptown Godard Tumblr, mustache sriracha tattooed cray aute slow-carb placeat delectus. Letterpress asymmetrical fanny pack art party est pour-over skateboard anim quis, ullamco craft beer.</p>
								</figcaption>
								<img src="https://cestlux.localhost.local/shop/uploads/landscape-1442498885-gettyimages-488701748.jpg" alt="img01"/>
								<figpricing>
									quantità 1 pezzo | + incrementa &middot; - diminuisci <price>€5</price>
								</figpricing>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Chillwave Echo Park Etsy organic Cosby sweater seitan authentic pour-over. Occupy wolf selvage bespoke tattooed, cred sustainable Odd Future hashtag butcher.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>IPhone PBR polaroid before they sold out meh you probably haven't heard of them leggings tattooed tote bag, butcher paleo next level single-origin coffee photo booth.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Vice cliche locavore mumblecore vegan wayfarers asymmetrical letterpress hoodie mustache. Shabby chic lomo polaroid, scenester 8-bit Portland Pitchfork VHS tote bag.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Chambray Schlitz pug YOLO, PBR Tumblr semiotics. Flexitarian YOLO ennui Blue Bottle, forage dreamcatcher chillwave put a bird on it craft beer Etsy.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Cosby sweater hella lomo Thundercats VHS occupy High Life. Synth pop-up readymade single-origin coffee, fanny pack tousled retro. Fingerstache mlkshk ugh hashtag, church-key ethnic street art pug yr.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Ethnic readymade pug, small batch XOXO Odd Future normcore kogi food truck craft beer single-origin coffee banh mi photo booth raw denim. XOXO messenger bag pug VHS. Forage gluten-free polaroid, twee hoodie chillwave Helvetica.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Thundercats pour-over four loko skateboard Brooklyn, Etsy sriracha leggings dreamcatcher narwhal authentic 3 wolf moon synth Portland. Shabby chic photo booth Blue Bottle keffiyeh, McSweeney's roof party Carles.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Ennui Blue Bottle shabby chic, organic butcher High Life tattooed meggings jean shorts Brooklyn sartorial polaroid. Cray raw denim +1, bespoke High Life Odd Future banh mi chillwave Marfa kogi disrupt paleo direct trade 90's Godard. </p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Typewriter authentic PBR, iPhone mixtape fixie post-ironic fingerstache Pitchfork artisan. Wayfarers master cleanse occupy, Tonx lo-fi swag Truffaut irony whatever Blue Bottle readymade PBR gluten-free. Lomo Pinterest Banksy fap. Retro ennui you probably haven't heard of them iPhone, PBR fashion axe polaroid.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Schlitz deserunt pour-over consectetur. Selfies plaid asymmetrical farm-to-table, cred gastropub photo booth narwhal non roof party velit raw denim slow-carb meggings pug. Tempor post-ironic seitan cliche bicycle rights. Meh viral Williamsburg, quinoa 8-bit kale chips YOLO Marfa accusamus.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Aliqua High Life art party fixie farm-to-table. Kitsch Echo Park shabby chic, narwhal fugiat Cosby sweater asymmetrical gastropub tofu. Authentic minim Pinterest Blue Bottle beard, aliqua chia XOXO dolor freegan banh mi vegan fugiat.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Letterpress asymmetrical</h3>
									<p>Pickled hoodie Pinterest 90's proident church-key chambray. Salvia incididunt slow-carb ugh skateboard velit, flannel authentic hoodie lomo fixie photo booth farm-to-table. Minim meggings Bushwick, semiotics Vice put a bird.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Tattooed assumenda chambray cray officia. 90's mollit ethnic church-key ex eu pop-up gentrify. Tonx raw denim eu, bitters nesciunt distillery Neutra pop-up. Drinking vinegar Helvetica Truffaut tattooed.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>Gentrify High Life adipisicing, duis slow-carb kogi Tumblr raw denim freegan Echo Park. Fingerstache laboris pork belly messenger bag, you probably haven't heard of them vegan twee Intelligentsia Vice Etsy pickled put a bird on it Godard roof party. Meggings small batch dreamcatcher velit.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Marfa exercitation non, beard +1 hashtag cardigan gluten-free mixtape church-key ugh eu Portland leggings. Ennui farm-to-table fingerstache keytar Echo Park tattooed. Seitan qui artisan, aliquip cupidatat sunt Portland wayfarers duis.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Lomo church-key whatever, seitan laborum drinking vinegar lo-fi semiotics nihil meh. Skateboard irure before they sold out Banksy. Narwhal High Life lomo aliqua drinking vinegar. PBR&B placeat proident, craft beer forage DIY nostrud meh flexitarian keytar Helvetica.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Skateboard Truffaut bicycle rights seitan normcore. Culpa lo-fi ennui, Pinterest before they sold out Echo Park roof party sapiente aesthetic consequat Truffaut freegan voluptate. Kogi banh mi vero nihil, freegan gluten-free cliche. Forage Etsy laboris anim normcore, McSweeney's ex.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Viral roof party locavore flexitarian nihil fanny pack actually Odd Future anim commodo. Sunt yr aute, enim quis plaid sartorial duis leggings lo-fi gluten-free. Tote bag flexitarian pug stumptown, Cosby sweater try-hard ethnic scenester. Mumblecore +1 hoodie accusamus skateboard slow-carb, Thundercats Godard placeat craft beer meh enim trust fund.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Culpa pour-over cray nesciunt dreamcatcher. Meggings distillery cillum raw denim voluptate, single-origin coffee lo-fi ethical iPhone four loko nihil salvia. Biodiesel ea Intelligentsia quis deep v, American Apparel trust fund slow-carb synth semiotics quinoa Brooklyn pour-over nulla Godard.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Bespoke irony tousled nihil flexitarian, salvia tempor nostrud Bushwick hashtag Austin ethnic disrupt. Beard Helvetica nihil, chia craft beer Wes Anderson keytar dolore. Irure incididunt flexitarian photo booth cillum, YOLO deserunt Brooklyn artisan. Brunch assumenda irony, Blue Bottle roof party DIY ullamco quis.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Ethical Truffaut tofu food truck cred cornhole. Irure umami Austin cornhole blog ethical. Aliqua yr Truffaut, adipisicing hashtag Shoreditch eiusmod tempor literally vinyl.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Pork belly irony Shoreditch fashion axe DIY. Portland banjo irony, squid gentrify Austin fixie church-key magna. Marfa artisan Echo Park, McSweeney's banjo sunt keytar tofu. Brooklyn PBR single-origin coffee disrupt polaroid ut, gluten-free XOXO plaid magna.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">USA LE FRECCE DELLA TESTIERA</div>
				</section>

				<!--
				<div id="grid-gallery" class="grid-gallery">
				<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/2.png" alt="img02"/>
								<figcaption><h3>Vice velit chia</h3><p>Laborum tattooed iPhone, Schlitz irure nulla Tonx retro 90's chia cardigan quis asymmetrical paleo. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/3.png" alt="img03"/>
								<figcaption><h3>Brunch semiotics</h3><p>Ex disrupt cray yr, butcher pour-over magna umami kitsch before they sold out commodo.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/4.png" alt="img04"/>
								<figcaption><h3>Chillwave nihil occupy</h3><p>In post-ironic gluten-free deserunt, PBR&amp;B non pork belly cupidatat polaroid. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/5.png" alt="img05"/>
								<figcaption><h3>Kale chips lomo biodiesel</h3><p>Pariatur food truck street art consequat sustainable, et kogi beard qui paleo. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/6.png" alt="img06"/>
								<figcaption><h3>Exercitation occaecat</h3><p>Street chillwave hoodie ea gentrify.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Selfies viral four</h3><p>Raw denim duis Tonx Shoreditch labore swag artisan High Life cred, stumptown Schlitz quinoa flexitarian mollit fanny pack.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/2.png" alt="img02"/>
								<figcaption><h3>Photo booth skateboard</h3><p>Vinyl squid ex High Life. Paleo Neutra nulla master cleanse, Helvetica et enim nesciunt esse.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/3.png" alt="img03"/>
								<figcaption><h3>Ex fashion axe</h3><p>Qui nesciunt et, in chia cliche irure. Eu YOLO nihil mollit twee locavore, tempor keytar asymmetrical irure aute sriracha consequat.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/4.png" alt="img04"/>
								<figcaption><h3>Thundercats next level</h3><p>Portland nulla butcher ea XOXO, consequat Bushwick Pinterest elit twee pickled direct trade vero. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/5.png" alt="img05"/>
								<figcaption><h3>Bushwick selvage synth</h3><p>Bicycle rights flannel Shoreditch, art party laboris Bushwick sriracha authentic chambray hella umami sed distillery master cleanse.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Bottle wayfarers locavore</h3><p>Once there was a little asparagus, he was green and lonely.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/2.png" alt="img02"/>
								<figcaption><h3>Vice velit chia</h3><p>Laborum tattooed iPhone, Schlitz irure nulla Tonx retro 90's chia cardigan quis asymmetrical paleo. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/3.png" alt="img03"/>
								<figcaption><h3>Brunch semiotics</h3><p>Ex disrupt cray yr, butcher pour-over magna umami kitsch before they sold out commodo.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/4.png" alt="img04"/>
								<figcaption><h3>Chillwave nihil occupy</h3><p>In post-ironic gluten-free deserunt, PBR&amp;B non pork belly cupidatat polaroid. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/5.png" alt="img05"/>
								<figcaption><h3>Kale chips lomo biodiesel</h3><p>Pariatur food truck street art consequat sustainable, et kogi beard qui paleo. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/6.png" alt="img06"/>
								<figcaption><h3>Exercitation occaecat</h3><p>Street chillwave hoodie ea gentrify.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Selfies viral four</h3><p>Raw denim duis Tonx Shoreditch labore swag artisan High Life cred, stumptown Schlitz quinoa flexitarian mollit fanny pack.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/2.png" alt="img02"/>
								<figcaption><h3>Photo booth skateboard</h3><p>Vinyl squid ex High Life. Paleo Neutra nulla master cleanse, Helvetica et enim nesciunt esse.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/3.png" alt="img03"/>
								<figcaption><h3>Ex fashion axe</h3><p>Qui nesciunt et, in chia cliche irure. Eu YOLO nihil mollit twee locavore, tempor keytar asymmetrical irure aute sriracha consequat.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/4.png" alt="img04"/>
								<figcaption><h3>Thundercats next level</h3><p>Portland nulla butcher ea XOXO, consequat Bushwick Pinterest elit twee pickled direct trade vero. </p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/5.png" alt="img05"/>
								<figcaption><h3>Bushwick selvage synth</h3><p>Bicycle rights flannel Shoreditch, art party laboris Bushwick sriracha authentic chambray hella umami sed distillery master cleanse.</p></figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Bottle wayfarers locavore</h3><p>Once there was a little asparagus, he was green and lonely.</p></figcaption>
							</figure>
						</li>
					</ul>
				</section>
				<section class="slideshow">
					<ul>
						<li>
							<figure>
								<figcaption>
									<h3>Letterpress asymmetrical</h3>
									<p>Kale chips lomo biodiesel stumptown Godard Tumblr, mustache sriracha tattooed cray aute slow-carb placeat delectus. Letterpress asymmetrical fanny pack art party est pour-over skateboard anim quis, ullamco craft beer.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Chillwave Echo Park Etsy organic Cosby sweater seitan authentic pour-over. Occupy wolf selvage bespoke tattooed, cred sustainable Odd Future hashtag butcher.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>IPhone PBR polaroid before they sold out meh you probably haven't heard of them leggings tattooed tote bag, butcher paleo next level single-origin coffee photo booth.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Vice cliche locavore mumblecore vegan wayfarers asymmetrical letterpress hoodie mustache. Shabby chic lomo polaroid, scenester 8-bit Portland Pitchfork VHS tote bag.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Chambray Schlitz pug YOLO, PBR Tumblr semiotics. Flexitarian YOLO ennui Blue Bottle, forage dreamcatcher chillwave put a bird on it craft beer Etsy.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Cosby sweater hella lomo Thundercats VHS occupy High Life. Synth pop-up readymade single-origin coffee, fanny pack tousled retro. Fingerstache mlkshk ugh hashtag, church-key ethnic street art pug yr.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Ethnic readymade pug, small batch XOXO Odd Future normcore kogi food truck craft beer single-origin coffee banh mi photo booth raw denim. XOXO messenger bag pug VHS. Forage gluten-free polaroid, twee hoodie chillwave Helvetica.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Thundercats pour-over four loko skateboard Brooklyn, Etsy sriracha leggings dreamcatcher narwhal authentic 3 wolf moon synth Portland. Shabby chic photo booth Blue Bottle keffiyeh, McSweeney's roof party Carles.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Ennui Blue Bottle shabby chic, organic butcher High Life tattooed meggings jean shorts Brooklyn sartorial polaroid. Cray raw denim +1, bespoke High Life Odd Future banh mi chillwave Marfa kogi disrupt paleo direct trade 90's Godard. </p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Typewriter authentic PBR, iPhone mixtape fixie post-ironic fingerstache Pitchfork artisan. Wayfarers master cleanse occupy, Tonx lo-fi swag Truffaut irony whatever Blue Bottle readymade PBR gluten-free. Lomo Pinterest Banksy fap. Retro ennui you probably haven't heard of them iPhone, PBR fashion axe polaroid.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Schlitz deserunt pour-over consectetur. Selfies plaid asymmetrical farm-to-table, cred gastropub photo booth narwhal non roof party velit raw denim slow-carb meggings pug. Tempor post-ironic seitan cliche bicycle rights. Meh viral Williamsburg, quinoa 8-bit kale chips YOLO Marfa accusamus.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Aliqua High Life art party fixie farm-to-table. Kitsch Echo Park shabby chic, narwhal fugiat Cosby sweater asymmetrical gastropub tofu. Authentic minim Pinterest Blue Bottle beard, aliqua chia XOXO dolor freegan banh mi vegan fugiat.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Letterpress asymmetrical</h3>
									<p>Pickled hoodie Pinterest 90's proident church-key chambray. Salvia incididunt slow-carb ugh skateboard velit, flannel authentic hoodie lomo fixie photo booth farm-to-table. Minim meggings Bushwick, semiotics Vice put a bird.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Tattooed assumenda chambray cray officia. 90's mollit ethnic church-key ex eu pop-up gentrify. Tonx raw denim eu, bitters nesciunt distillery Neutra pop-up. Drinking vinegar Helvetica Truffaut tattooed.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>Gentrify High Life adipisicing, duis slow-carb kogi Tumblr raw denim freegan Echo Park. Fingerstache laboris pork belly messenger bag, you probably haven't heard of them vegan twee Intelligentsia Vice Etsy pickled put a bird on it Godard roof party. Meggings small batch dreamcatcher velit.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Marfa exercitation non, beard +1 hashtag cardigan gluten-free mixtape church-key ugh eu Portland leggings. Ennui farm-to-table fingerstache keytar Echo Park tattooed. Seitan qui artisan, aliquip cupidatat sunt Portland wayfarers duis.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Lomo church-key whatever, seitan laborum drinking vinegar lo-fi semiotics nihil meh. Skateboard irure before they sold out Banksy. Narwhal High Life lomo aliqua drinking vinegar. PBR&B placeat proident, craft beer forage DIY nostrud meh flexitarian keytar Helvetica.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Skateboard Truffaut bicycle rights seitan normcore. Culpa lo-fi ennui, Pinterest before they sold out Echo Park roof party sapiente aesthetic consequat Truffaut freegan voluptate. Kogi banh mi vero nihil, freegan gluten-free cliche. Forage Etsy laboris anim normcore, McSweeney's ex.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Viral roof party locavore flexitarian nihil fanny pack actually Odd Future anim commodo. Sunt yr aute, enim quis plaid sartorial duis leggings lo-fi gluten-free. Tote bag flexitarian pug stumptown, Cosby sweater try-hard ethnic scenester. Mumblecore +1 hoodie accusamus skateboard slow-carb, Thundercats Godard placeat craft beer meh enim trust fund.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Culpa pour-over cray nesciunt dreamcatcher. Meggings distillery cillum raw denim voluptate, single-origin coffee lo-fi ethical iPhone four loko nihil salvia. Biodiesel ea Intelligentsia quis deep v, American Apparel trust fund slow-carb synth semiotics quinoa Brooklyn pour-over nulla Godard.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Bespoke irony tousled nihil flexitarian, salvia tempor nostrud Bushwick hashtag Austin ethnic disrupt. Beard Helvetica nihil, chia craft beer Wes Anderson keytar dolore. Irure incididunt flexitarian photo booth cillum, YOLO deserunt Brooklyn artisan. Brunch assumenda irony, Blue Bottle roof party DIY ullamco quis.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Ethical Truffaut tofu food truck cred cornhole. Irure umami Austin cornhole blog ethical. Aliqua yr Truffaut, adipisicing hashtag Shoreditch eiusmod tempor literally vinyl.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Pork belly irony Shoreditch fashion axe DIY. Portland banjo irony, squid gentrify Austin fixie church-key magna. Marfa artisan Echo Park, McSweeney's banjo sunt keytar tofu. Brooklyn PBR single-origin coffee disrupt polaroid ut, gluten-free XOXO plaid magna.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section>
			</div>
                </div>
				-->
            </section
			<!-- vip-login -->
			<section class="vip-login clx-shop-sec" <?php if(isset($_GET['tpx'])){ echo "style='display: block !important;'"; }?>>
				<i class="fa fa-times close-vip-login" aria-hidden="true"></i>
				<div class="full-key-bg row">
					<i class="fa fa-key" aria-hidden="true"></i>
				</div>
				<span title>v.i.p.</span>
				<p><?php echo TOPLUX_CPT; ?></p>
				<div class="vip-login-form clx-shop-sec">
					<form action="./toplux">
						<input type="hidden" name="x.language" value="<?php echo $_SESSION[lang]; ?>" />
						<span><input type="text" name="toplux_uname" placeholder="<?php echo TOPLUX_UNAME_LABEL; ?>" <?php if(isset($_GET['tpx'])){ echo "style='border: 1px solid indianred;'"; }?>></span>
						<span><input type="password" name="toplux_upassword" placeholder="<?php echo TOPLUX_UPASSWORD_LABEL; ?>" <?php if(isset($_GET['tpx'])){ echo "style='border: 1px solid indianred;'"; }?>></span>
						<span><button><?php echo TOPLUX_LOGINBTN_LABEL; ?></button></span>
					</form>
				</div>
			</section>

			<!-- collections -->
			<section class="collection-container clx-shop-sec" data-load=""></section>

			<!-- changingroom -->
			<section class="clx-changingroom clx-shop-sec"></section>

			<!-- searchcontainer -->
			<section class="clx-searchcontainer clx-shop-sec"><i class="fa fa-search" aria-hidden="true"></i></section>

			<!-- small-cart -->
			<div class="clx-small-cart">cart</div>

        </div>
        <script src="https://cestlux.localhost.local/assets/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/masonry.pkgd.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/imagesloaded.pkgd.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/cbpGridGallery.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/classie.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cestlux.localhost.local/private/eplatform/front-end/assets/js/clx.shop.main.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
<?php } else {
            header("Location: clx.shop.php?reason=tpx-login-error&tpx");
        }
        
} else {
    header("Location: ../");
}