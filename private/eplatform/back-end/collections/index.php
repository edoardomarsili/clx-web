<?php

/* 
* name: Collections (clx.shop.back-end)
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/public
*/

// include("https://www.cestlux.it/private/secure/sql/connect.sql.php");

session_start();
include("https://www.cestlux.it/private/secure/php/lang/clx.lang.php");
	include("../../../secure/php/lang/txt.php");
defineStrings();

/* classDB() */
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

$gender = $_GET["c_gender"];
$collection = $_GET["c_collection"];

// check to have variables set and that they aren't empty

if(!isset($gender) && !isset($collection)){
    die("define variables");
    if(!empty($gender) && !empty($collection)){
        die("variables can't be empty");
    }
} else { ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://www.cestlux.it/private/eplatform/front-end/assets/css/collection.shop.clx.css" rel="stylesheet" />
        <link href="https://www.cestlux.it/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        
    </head>
    <body>
        <div class="col-gal-init-container row">
            <div class="filters-container col-md-2 pull-left">
                <div class="bounds-search">
                    <span class="bs-title">search</span>
                    <input type="text" name="bs-input" autocomplete="off" autofocus="off" spellcheck="false">
                </div>
                <div class="bounds-ul">
                    <span class="bs-title">filter</span>
                    <ul data-ul-title="delivery">
                        <li><input type="checkbox">&nbsp;Worldwide (0)</li>
                        <li><input type="checkbox">&nbsp;European Union (0)</li>
                        <li><input type="checkbox">&nbsp;USA (0)</li>
                        <li><input type="checkbox">&nbsp;Russia (0)</li>
                    </ul>
                    <ul data-ul-title="brand">
                        <?php
                            $collection_filterBrand = $db_handle->runQuery("SELECT * FROM clx_brands WHERE bisoutlet = 1");
                            $collection_filterBrand_totCount = $db_handle->runQuery("SELECT * FROM a clx_brands, b clx_products WHERE a.bisoutlet = 1 AND a.buid = b.pbrand");

                                                                                                                                        /*
                                                                                                                                        select a.* from Tableb b join Tablea a on a.field1=b.field1
                                                                                                                                        */

                            foreach ($collection_filterBrand as $row){
                        ?>
                            <li><input type="checkbox">&nbsp;<?php echo $row["bname"]; ?> (<?php echo $db_handle->numRows("SELECT clx_brands.buid FROM clx_products JOIN clx_brands ON clx_brands.buid = clx_products.pbrand"); ?>)</li>
                        <?php } ?>
                    </ul>
                    <ul data-ul-title="category">
                        <?php
                            $collection_filterCategory = $db_handle->runQuery("SELECT * FROM clx_categories WHERE ccisoutlet = 1");
                            foreach ($collection_filterCategory as $row){
                        ?>
                            <li><input type="checkbox">&nbsp;<?php echo $row["ccname"]; ?> ()</li>
                        <?php } ?>
                    </ul>
                    <ul data-ul-title="new arrivals">
                        <li><a>Deals (0)</a></li>
                        <li><a>Last 30 Days (0)</a></li>
                        <li><a>Last 90 Days (0)</a></li>
                    </ul>
                    <ul data-ul-title="price range">
                        <li><a>< 50€ (0)</a></li>
                        <li><a>50 - 100€ (0)</a></li>
                        <li><a>> 100€ (0)</a></li>
                        <li class="price_range_selector">
                            <input type="text" size="4" name="min-price-range" placeholder="min €" />&nbsp;<input type="text" size="4" name="max-price-range" placeholder="max €" />&nbsp;<button>confirm</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gallery-container col-md-11 pull-right row">
                <div class="gc-toolbar col-md-12"><span class="pull-right gallery-view"><b>view:</b> <a class="selected">grid</a> &middot; <a>list</a></span></div>
                <div class="gallery-ul npmarg col-md-12">
                    <ul class="products-ul npmarg row">
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€" class="trigger_productView">
                            
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li data-product-title="test" data-product-stock-price="250€" data-product-rrp-price="320€">
                            <a href="https://www.cestlux.it/private/eplatform/front-end/clx.shop.php?mode=product-view&pid=aa13">
                                <div class="prod-ul-li-item-wrapper">
                                    <div class="prod-ul-img-small"><img src="https://www.cestlux.it/shop/uploads/collections/woman/DSC_9355.jpg" /></div>
                                    <div class="prod-ul-details-holder">
                                        <span class="pudh-title">Test</span>
                                        <div class="p-rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <div class="p-description">
                                            <p>This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum. This is a beautiful product for beautiful people. Lorem ipsum.</p>
                                        </div>
                                        <div class="p-sizes-available">
                                            <b>Sizes:</b>&nbsp;<span>XS&nbsp;&middot;&nbsp;S&nbsp;&middot;&nbsp;M&nbsp;&middot;&nbsp;L&nbsp;&middot;&nbsp;XL&nbsp;&middot;&nbsp;XXL</span>
                                        </div>
                                        <div class="p-price-holder">
                                            <span class="pstock ppstyled">250€</span>&nbsp;&middot;&nbsp;<span class="prrp ppstyled">320€</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>