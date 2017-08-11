<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Magazzino &middot; C'est Lux</title>
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
                    <div class="col-md-6" left><span class="header-title"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;home</span><span class="header-title" data-is-expandable="true" data-targets='{"label": "top lux", "destination": "/toplux/"}'>c'est lux&nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></span></div><div class="col-md-6" right><div right><span class="header-title">benvenuto, <?php echo $row['uuname']; ?></span><span class="header-title active">magazzino</span><span class="header-title" id="header-menu-trigger" style="background:black;color:#fff">menu</span><span class="header-title">esci</span></div></div>
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
                        <div right>
                            <span>Prospetto mensile:</span>&nbsp;&middot;&nbsp;<span>Attuale mensile: 250€ (<span class="up-stat">+4%</span>)</span>&nbsp;&middot;&nbsp;<span>Prospetto annuale: <?php echo $row['clx_sales_year']; ?></span>&nbsp;&middot;&nbsp;<span>Attuale annuale: 15000€ (<span class="down-stat">-2.5%</span>)</span>
                        </div>
                    </div>
                    <div class="adc app-mid" data-section="warehouse-index">
                        <h1>Magazzino</h1>
                        <div class="warehouse-index-holder row">
                            <div class="select-warehouse-destination col-md-12" id="warehouse-selector">
                                <h2>scegli un'opzione</h2>
                                <ul>
                                    <li data-password="prompt_password" data-warehouse-open="goods"><span class="icon"><i class="fa fa-archive" aria-hidden="true"></i></span><span class="icon_title">merce</span></li>
                                    <li data-password="prompt_password" data-warehouse-open="orders"><span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="icon_title">ordini</span></li>
                                    <li data-password="prompt_password" data-warehouse-open="invoices"><span class="icon"><i class="fa fa-eur" aria-hidden="true"></i></span><span class="icon_title">fatture</span></li>
                                    <li data-password="prompt_password" style="margin:0 !important" data-warehouse-open="deliveries"><span class="icon"><i class="fa fa-truck" aria-hidden="true"></i></span><span class="icon_title">spedizioni</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="warehouse_select_optPassword_prompt">
                            <div class="up-pointer"></div>
                            <div class="wsoptpassp-inner">
                                <h2>re-inserisci la tua password</h2>
                                <form>
                                    <input type="password" autofocus="true" name="password_" id="password_" /><button>accedi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="notifications_" id="clx_notification"></div>
        </div>
        <script src="https://admin.cestlux.it/assets/js/dashboard.admin.clx.js"></script>
        <script>clx_dashboard.hm_trigger_sided("w_index_access");</script>
        <script src="https://admin.cestlux.it/assets/js/warehouse.dashboard.admin.clx.js"></script>
        <script>clx_warehouse.warehouse_destination();</script>
        <script src="https://static-css-cdn.cestlux.it/js/clx/tabs.clx.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>