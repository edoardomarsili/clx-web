<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Magazzino > Spedizioni &middot; C'est Lux</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/admin.clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/dashboard.admin.clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/warehouse.dashboard.admin.clx.css" rel="stylesheet">
        <link rel="stylesheet" href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" />
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body id="clx-admin-loggedIn-dashboard">
        <div class="container-fluid">
            <main>
                <header class="row">
                    <div class="col-md-6" left><span class="header-title"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;home</span><span class="header-title" data-is-expandable="true" data-targets='{"label": "top lux", "destination": "/toplux/"}'>c'est lux&nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></span></div><div class="col-md-6" right><div right><span class="header-title">benvenuto, <?php echo $row['uuname']; ?></span><span class="header-title active">magazzino > spedizioni</span><span class="header-title" id="header-menu-trigger" style="background:black;color:#fff">menu</span><span class="header-title">esci</span></div></div>
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
                                <li data-id="w_deliveries" data-target="https://warehouse.cestlux.it/deliveries.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;spedizioni</li>
                                <li data-id="w_invoices" data-target="https://warehouse.cestlux.it/invoices.php"><i class="fa fa-eur" aria-hidden="true"></i>&nbsp;fatture</li>
                                <li data-id="w_goods" data-target="https://warehouse.cestlux.it/goods.php"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;merce</li>
                                <li data-id="w_orders" data-target="https://warehouse.cestlux.it/orders.php"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;ordini</li>
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
                        <div right>
                            <span>Prospetto mensile:</span>&nbsp;&middot;&nbsp;<span>Attuale mensile: 250€ (<span class="up-stat">+4%</span>)</span>&nbsp;&middot;&nbsp;<span>Prospetto annuale: <?php echo $row['clx_sales_year']; ?></span>&nbsp;&middot;&nbsp;<span>Attuale annuale: 15000€ (<span class="down-stat">-2.5%</span>)</span>
                        </div>
                    </div>
                    <div class="adc app-mid" data-section="warehouse-index">
                        <h1>Spedizioni</h1>
                        <div class="warehouse-index-holder row">
                            <div class="clx-tab-holder" theme="clx-admin-dashboard">
                                    <div class="tabs-holder">
                                        <ul>
                                            <li class="active" data-tab-target="active_deliveries">spedizioni attive</li>
                                            <li data-tab-target="completed_deliveries">spedizioni completate</li>
                                            <li data-tab-target="cancelledClx_deliveries">spedizioni annullate da c'est lux</li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- active_deliveries -->
                                        <div id="active_deliveries" class="tabbed active">
                                            <div class="tabbed-inner">
                                                
                                            </div>
                                        </div><!-- // active_deliveries -->
                                        <!-- completed_deliveries -->
                                        <div id="completed_deliveries" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                
                                            </div>
                                        </div><!-- // completed_deliveries -->
                                        <!-- cancelledClx_deliveries -->
                                        <div id="cancelledClx_deliveries" class="tabbed disabled">
                                            <div class="tabbed-inner">
                                                
                                            </div>
                                        </div><!-- // cancelledClx_deliveries -->
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="notifications_" id="clx_notification"></div>
        </div>
        <script src="https://admin.cestlux.it/assets/js/dashboard.admin.clx.js"></script>
        <script>clx_dashboard.hm_trigger_sided("w_deliveries");</script>
        <script src="https://admin.cestlux.it/assets/js/warehouse.dashboard.admin.clx.js"></script>
        <script>clx_warehouse.warehouse_destination();</script>
        <script src="https://static-css-cdn.cestlux.it/js/clx/tabs.clx.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>