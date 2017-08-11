<?php

/* 
* name: CLX Admin Dashboard (new-product)
* property: Concept FBO S.r.l.
*
* variables:
*
* url: https://$_SERVER['SERVER_NAME']/admin/dashboard/new-product
*/

// require_once("../../private/secure/sql/connect.sql.php");
// require_once("../../private/secure/php/sessions.php");
require_once("https://admin.cestlux.it/stats/fetch.php");

/*
$uname = stripslashes($_POST['uname']);
//escapes special characters in a string
$uname = mysqli_real_escape_string($connection,$username);
$upassword = stripslashes($_POST['upassword']);
$upassword = mysqli_real_escape_string($connection,$password);
*/

//check if its an ajax request, exit if not
/*
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    $output = json_encode(array(
        'login_res'=>'non_ajax_req', 
        'result' => 'Sorry Request must be Ajax POST'
    ));
    die($output);
}
*/
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Nuovo prodotto &middot; C'est Lux</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/admin.clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/dashboard.admin.clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/new-product.dashboard.admin.clx.css" rel="stylesheet">
        <link rel="stylesheet" href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" />
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body id="clx-admin-loggedIn-dashboard">
        <div class="container-fluid">
            <main>
                <header class="row">
                    <div class="col-md-6" left><span class="header-title"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;home</span><span class="header-title" data-is-expandable="true" data-targets='{"label": "top lux", "destination": "/toplux/"}'>c'est lux&nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></span></div><div class="col-md-6" right><div right><span class="header-title">benvenuto, <?php echo $row['uuname']; ?></span><span class="header-title active">prodotti > nuovo prodotto</span><span class="header-title" id="header-menu-trigger" style="background:black;color:#fff">menu</span><span class="header-title">esci</span></div></div>
                </header>
                <div class="app-divider"></div>

                <!-- test purposes: sided menu -->
                <aside class="admin-sided-menu">
                    <div class="inner-menu">
                        <h2>scegli un'opzione</h2><hr />
                        <div class="ul-holder">
                            <span class="ul-sec-title">dashboard</span>
                            <ul>
                                <li data-id="w_dashboard" data-target="https://admin.cestlux.it/dashboard/?uname=edoardo&upassword=edoardo">home</li>
                            </ul>
                            <div class="clearfix"></div>
                            <span class="ul-sec-title">magazzino</span>
                            <ul>
                                <li data-id="w_index_access" data-target="https://warehouse.cestlux.it/">accedi</li>
                            </ul>
                            <div class="clearfix"></div>
                            <span class="ul-sec-title">prodotti</span>
                            <ul>
                                <li data-id="p_pc" data-target="https://admin.cestlux.it/dashboard/products-catalog">catalogo prodotti</li>
                                <li data-id="p_np" data-target="https://admin.cestlux.it/dashboard/new-product">nuovo prodotto</li>
                            </ul>
                            <div class="clearfix"></div>
                            <span class="ul-sec-title">clienti</span>
                            <ul>
                                <li>dummy 1</li>
                                <li>dummy 2</li>
                            </ul>
                        </div>
                    </div>
                </aside>

                <div class="dashboard-main clearfix" id="dashboard-main">
                    <div class="adc app-top">
                        <div class="calendar-shrinked-picker" left>
                            <label for="calendar-stats-picker">Mese</label>
                            <select name="calendar-stats-picker">
                                <option value="" selected>Luglio 2017</option>
                                <option value="">Giugno 2017</option>
                            </select>
                        </div>
                        <div right id="quickHeader_stats">
                            <span>Prospetto mensile:</span>&nbsp;<span id="projection_" data-projection-params="{projecion_start: '', projection_end: '', projection_IDclx_label: '', projection_type: '', actual_milestone_month: '', projection_currency: 'eur', proection_converted: 'false'}"></span>&nbsp;&middot;&nbsp;<span>Attuale mensile: 250€ (<span class="up-stat">+4%</span>)</span>&nbsp;&middot;&nbsp;<span>Prospetto annuale: <?php echo $row['clx_sales_year']; ?></span>&nbsp;&middot;&nbsp;<span>Attuale annuale: 15000€ (<span class="down-stat">-2.5%</span>)</span>
                        </div>
                    </div>
                    <div class="adc app-mid" data-section="new-product-section">
                        <h1>Nuovo prodotto</h1>
                        <div class="new-prod-form-buttons"><button class="cancel">annulla</button><button class="save_draft">salva come bozza</button><button class="save_publish">salva & pubblica</button></div>
                        <!-- new-product-holder -->
                        <div class="new-product-holder row">
                            <!-- product-insert -->
                            <div class="col-md-7 clx-product-insert" left>
                                <div class="row">
                                    <div class="col-md-3 image-holder new_image" left>
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                        <input type="file" id="np-img" multiple accept="image/*" style="display:block;width:0;height:0;" />
                                    </div>
                                    <div class="images-holder">
                                        <ul></ul>
                                    </div>
                                    <div class="col-md-8 product-details-form" right>
                                        <form id="preview-seo">
                                            <p><label>nome articolo</label>&nbsp;&nbsp;<input type="text" id="title" /></p>
                                            <p><label>codice articolo (sku)</label>&nbsp;&nbsp;<input type="text" id="product_sku" /></p>
                                            <p><label>descrizione</label>&nbsp;&nbsp;<textarea id="description"></textarea></p>
                                            <p><label>link</label>&nbsp;&nbsp;<span class="link-cite-form"><cite>https://shop.cestlux.it/item/XYZ</cite>&nbsp;&middot;&nbsp;[<a href="javascript:void(0);">Accorcia link</a>]</span></p>
                                            <div class="tags-container">
                                                <label>Tag</label>
                                                <div class="tags-holder noselect">
                                                    <span>felpa<i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                                    <span>fendi<i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                                    <span>lana<i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // product-insert -->
                            <!-- seo -->
                            <div class="col-md-4 clx-product-seo" right>
                                <h4>Come appare sui motori di ricerca (Google, Bing, Yahoo, Yandex)</h4><hr />
                                <div class="seo-nonpopulated">
                                    <span>Inserire del testo per vedere il risultato</span>
                                </div>
                                <div class="seo-populated">
                                    <h3><a href="javascript:void(0);" class="title"></a></h3>
                                    <div class="s">
                                        <div class="link">
                                            <cite class="dynamic_link"></cite>
                                        </div>
                                        <span class="description"></span>
                                    </div>
                                </div>
                            </div><!-- // seo -->
                            <div class="product-total-sale">
                                <div right="">
									<strong>Totale:</strong>&nbsp;€0<br>
									<strong>IVA %22:</strong>&nbsp;€0<br>
									<strong>Sub Totale:</strong>&nbsp;€0<br>
								</div>
                            </div>
                            <div class="clx-pi-extra col-md-12">
                                <div class="clx-tab-holder" theme="clx-admin-dashboard">
                                    <div class="tabs-holder">
                                        <ul>
                                            <li class="active" data-tab-target="brand">brand</li>
                                            <li data-tab-target="categories">categoria</li>
                                            <li data-tab-target="sizes">taglie/dimensioni</li>
                                            <li data-tab-target="colours">colori</li>
                                            <li data-tab-target="composition">composizione</li>
                                            <li data-tab-target="product_care">cura prodoto</li>
                                            <li data-tab-target="matching_products">match prodotti</li>
                                            <li data-tab-target="shipping_countries">paesi di spedizione</li>
                                            <li data-tab-target="price_table">prezzo</li>
                                            <li data-tab-target="taxes">tasse</li>
                                            <li data-tab-target="product_notes">note</li>
                                            <li data-tab-target="form_summary">sommario</li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- brand -->
                                        <div id="brand" class="tabbed active">
                                            <div class="tabbed-inner">
                                                <div class="opt-selectable">
                                                    <select data-form-section="brand">
                                                        <option>seleziona un brand</option>
                                                        <option value="versace" data-notif="brand">versace</option>
                                                        <option value="moschino" data-notif="brand">moschino</option>
                                                        <option value="blugirl" data-notif="brand">blugirl</option>
                                                        <option value="philosophy" data-notif="brand">philosophy</option>
                                                        <option value="michael kors" data-notif="brand">michael kors</option>
                                                        <option value="hugo boss" data-notif="brand">hugo boss</option>
                                                        <option value="armani" data-notif="brand">armani</option>
                                                        <option value="guess" data-notif="brand">guess</option>
                                                        <option value="patrizia pepe" data-notif="brand">patrizia pepe</option>
                                                        <option value="roberto cavalli" data-notif="brand">roberto cavalli</option>
                                                        <option value="pollini" data-notif="brand">pollini</option>
                                                    </select>
                                                </div>
                                                <span class="jumpto_nexttab"><a>Prossima sezione >></a></span>
                                            </div>
                                        </div><!-- // brand -->
                                        <!-- taxes -->
                                        <div id="taxes" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="opt-selectable" data-select-clone="true">
                                                    <select data-form-section="taxes">
                                                        <option data-default="22%">iva</option>
                                                        <option>spedizione in europa</option>
                                                        <option>spedizione in usa</option>
                                                        <option>spedizione in asia</option>
                                                        <option>spedizione in africa</option>
                                                        <option>tasse doganali</option>
                                                        <option>tasse spedizioniere</option>
                                                    </select>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                        </div><!-- // taxes -->
                                        <!-- sizes -->
                                        <div id="sizes" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="opt-selectable" data-select-clone="true">
                                                    <select class="def">
                                                        <option data-txt-default-value="cm" selected="selected">centimetri</option>
                                                        <option data-txt-default-value="inch">inches (pollici)</option>
                                                    </select>
                                                    <div class="append_default_value">
                                                        <input type="text" />
                                                        <span class="appended_value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- // sizes -->
                                        <!-- shipping_countries -->
                                        <div id="shipping_countries" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="_section_clx" data-section-title="ue/europa"></div>
                                                <div class="_section_clx" data-section-title="russia"></div>
                                                <div class="_section_clx" data-section-title="americhe"></div>
                                                <div class="_section_clx" data-section-title="asia orientale"></div>
                                                <div class="_section_clx" data-section-title="uae"></div>
                                            </div>
                                        </div><!-- // shipping_countries -->
                                        <!-- colours -->
                                        <div id="colours" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="chkx-selectable">
                                                    <div class="color_" data-color="coral"><div class="color_select" name="color_select" style="background: coral;"></div><label for="color_select">corallo</label></div>
                                                    <div class="color_" data-color="lightseagreen"><div class="color_select" name="color_select" style="background: lightseagreen;"></div><label for="color_select">lightseagreen</label></div>
                                                    <div class="color_" data-color="black"><div class="color_select" name="color_select" style="background: black;"></div><label for="color_select">nero</label></div>
                                                </div>
                                            </div>
                                        </div><!-- // colours -->
                                        <!-- composition -->
                                        <div id="composition" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="opt-selectable">
                                                    <select>
                                                        <option>seleziona un materiale</option>
                                                        <option>lana</option>
                                                        <option>elastan</option>
                                                        <option>cachmere</option>
                                                        <option>poliestere</option>
                                                        <option>cottone</option>
                                                        <option>poliammide</option>
                                                        <option>viscoso</option>
                                                        <option>acetato</option>
                                                        <option>lino</option>
                                                        <option>seta</option>
                                                        <option>nylon</option>
                                                        <option>lyocell</option>
                                                        <option>pelle</option>
                                                        <option>ecopelle</option>
                                                    </select>
                                                    <input type="text" />
                                                </div>
                                            </div>
                                        </div><!-- // composition -->
                                        <!-- categotries -->
                                        <div id="categories" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="opt-selectable">
                                                    <select>
                                                        <option>seleziona una categoria</option>
                                                        <optgroup label="abbigliamento">
                                                            <option value="abbigliamento > tops" data-notif="category">tops</option>
                                                            <option value="abbigliamento > bottoms" data-notif="category">bottoms</option>
                                                            <option value="abbigliamento > camicie classiche" data-notif="category">camicie classiche</option>
                                                            <option value="abbigliamento > vestito" data-notif="category">vestito</option>
                                                            <option value="abbigliamento > completi/tute" data-notif="category">completi/tute</option>
                                                            <option value="abbigliamento > intimo uomo" data-notif="category">intimo uomo</option>
                                                            <option value="abbigliamento > intimo donna" data-notif="category">intimo donna</option>
                                                            <option value="abbigliamento > costumi da bagno" data-notif="category">costumi da bagno</option>
                                                            <option value="abbigliamento > pigiami" data-notif="category">pigiami</option>
                                                        </optgroup>
                                                        <optgroup label="accessori">
                                                            <option value="accessori > cinture" data-notif="category">cinture</option>
                                                            <option value="accessori > orologi" data-notif="category">orologi</option>
                                                            <option value="accessori > valigie" data-notif="category">valigie</option>
                                                            <option value="accessori > occhiali" data-notif="category">occhiali</option>
                                                            <option value="accessori > gioelli" data-notif="category">gioielli</option>
                                                        </optgroup>
                                                        <optgroup label="borse">
                                                            <option value="borse > a mano" data-notif="category">a mano</option>
                                                            <option value="borse > a tracolla" data-notif="category">a tracolla</option>
                                                        </optgroup>
                                                        <optgroup label="scarpe">
                                                            <option value="scarpe > sneakers" data-notif="category">sneakers</option>
                                                            <option value="scarpe > dress/eleganti/classic" data-notif="category">dress/eleganti/classic</option>
                                                            <option value="scarpe > sandali" data-notif="category">sandali</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- // categotries -->
                                        <!-- matching_products -->
                                        <div id="matching_products" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="mp-holder">
                                                    <ul>
                                                        <li data-product-id="null">
                                                            <picture>

                                                            </picture>
                                                            <div class="mp-product-footer"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- // matching_products -->
                                        <!-- product_notes -->
                                        <div id="product_notes" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <textarea class="pn-txtarea"></textarea>
                                            </div>
                                        </div><!-- // product_notes -->
                                        <!-- product_care -->
                                        <div id="product_care" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="product-care-icons">
                                                    <div class="_section_clx" data-section-title="lavaggio">
                                                        <div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing1-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">L'indumento può essere lavato solo a secco, non in acqua.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing2-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare a mano a una temperatura massima di 40º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing3-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 30º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing4-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 40º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing5-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 50º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing6-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 60º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing7-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 70º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing8-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo normale a una temperatura massima di 95º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing9-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo per tessuti sintetici, ad esempio delicati o Easy-care, a una temperatura massima di 30º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing10-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo per tessuti sintetici, ad esempio delicati o Easy-care, a una temperatura massima di 40º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing11-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo per tessuti sintetici, ad esempio delicati o Easy-care, a una temperatura massima di 50º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing12-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo per tessuti sintetici, ad esempio delicati o Easy-care, a una temperatura massima di 60º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing13-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo delicato a una temperatura massima di 30º C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/washing/persil-laundrysymbols-washing14-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare con un ciclo delicato a una temperatura massima di 40º C.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="_section_clx" data-section-title="stiratura e asciugatura">
                                                        <div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying1-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Non stirare.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying2-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stirare con il ferro non caldo, a una temperatura massima di 110 °C, preferibilmente senza vapore.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying3-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stirare col ferro moderatamente caldo fino a un massimo di 150 °C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying4-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stirare col ferro caldo fino a un massimo di 200 °C.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying5-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Utilizzare l'asciugatrice con il programma delicato a bassa temperatura.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying6-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Utilizzare l'asciugatrice con il programma normale.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying7-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere orizzontalmente all'ombra senza stirare.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying8-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere normalmente.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying9-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere normalmente, all'ombra.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying10-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere all'ombra senza stirare.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying11-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere orizzontalmente.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying12-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere orizzontalmente all'ombra.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/ironing_drying/persil-laundrysymbols-ironing-und-drying13-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Stendere orizzontalmente senza stirare.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="_section_clx" data-section-title="lavaggio a secco">
                                                        <div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning1-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Non lavare a secco.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning2-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Lavare solo a secco.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning3-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere pulito con percloroetilene, idrocarburi o i solventi R113 e R11.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning4-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere pulito con il solvente R113 e degli idrocarburi.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning5-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere sottoposto a un procedimento di lavaggio a umido.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning6-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere pulito con percloroetilene, idrocarburi o i solventi R113 e R11, nel rispetto dei limiti di temperatura e di umidità.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning7-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere pulito con il solvente R113 e degli idrocarburi, nel rispetto dei limiti di temperatura e di umidità.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/dry_washing/persil-laundrysymbols-chemical-cleaning8-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere sottoposto a un procedimento di lavaggio a umido.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="_section_clx" data-section-title="candeggio">
                                                        <div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/bleaching/persil-laundrysymbols-bleaching1-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo non può essere trattato con candeggianti e deve essere lavato solo con detersivo per tessuti delicati e colorati.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/bleaching/persil-laundrysymbols-bleaching2-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere trattato con sbiancanti a base di cloro e ossigeno, ad esempio detersivi all in one.</span>
                                                                </div>
                                                            </div>
                                                            <div class="card trigger-selection-pc">
                                                                <div class="inner-card trigger-selection-pc">
                                                                    <picture>
                                                                        <img src="https://static-css-cdn.cestlux.it/shop/icons/product-care/bleaching/persil-laundrysymbols-bleaching3-300x300px.png" />
                                                                    </picture>
                                                                    <span class="title">Il capo può essere trattato con sbiancanti a base di ossigeno, ad esempio detersivi all in one.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- // product_care -->
                                        <!-- price_table -->
                                        <div id="price_table" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="_section_clx" data-section-title="prezzo di mercato"></div>
                                                <div class="_section_clx" data-section-title="sconto c'est lux"></div>
                                                <div class="_section_clx" data-section-title="prezzo finale c'est lux"></div>
                                            </div>
                                        </div><!-- // price_table -->
                                        <!-- form_summary -->
                                        <div id="form_summary" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                <div class="_section_clx" data-section-title="brand"></div>
                                                <div class="_section_clx" data-section-title="categoria"></div>
                                                <div class="_section_clx" data-section-title="taglie/dimensioni"></div>
                                                <div class="_section_clx" data-section-title="colori"></div>
                                                <div class="_section_clx" data-section-title="composizione"></div>
                                                <div class="_section_clx" data-section-title="cura prodotto"></div>
                                                <div class="_section_clx" data-section-title="match prodotti"></div>
                                                <div class="_section_clx" data-section-title="paesi di spedizione"></div>
                                                <div class="_section_clx" data-section-title="prezzo"></div>
                                                <div class="_section_clx" data-section-title="tasse"></div>
                                                <div class="_section_clx" data-section-title="note"></div>
                                            </div>
                                        </div><!-- // form_summary -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- // new-product-holder -->
                    </div>
                </div>
            </main>
            <div class="notifications_" id="clx_notification"></div>
        </div>
        <script src="https://admin.cestlux.it/assets/js/dashboard.admin.clx.js"></script>
        <script>clx_dashboard.hm_trigger_sided("p_np")</script>
        <script src="https://admin.cestlux.it/assets/js/new-product.dashboard.admin.clx.js"></script>
        <script src="https://static-css-cdn.cestlux.it/js/clx/tabs.clx.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>