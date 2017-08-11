<?php

/* 
* name: CLX Admin Dashboard
* property: Concept FBO S.r.l.
*
* variables:
*   username
*   password
*
* url: https://$_SERVER['SERVER_NAME']/admin/dashboard/?[post]username&password
*/

require_once("../../private/secure/sql/connect.sql.php");
// require_once("../../private/secure/php/sessions.php");

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

$uname = $_GET['uname'];
$upassword = md5($_GET['upassword']);

if(!empty($uname) && !empty($upassword)){
    $_SESSION['username'] = $username;
    
$sql = <<<SQL
    SELECT *
    FROM clx_users
    WHERE uname = '$uname'
    AND upassword = '$upassword'
SQL;

        $result = mysqli_query($connection,$sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            while($row = $result->fetch_assoc()){
                $output = json_encode(array('type'=>'login_res', 'status'=>'accept_login', 'proceed'=>true, 'user'=>$uname, 'user_type'=>$row['urole']));
                // print $output;
            
            $months = array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
            $months_short = array("Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic");
            $clx_start_year = "2017";

            ?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Dashboard &middot; C'est Lux</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/admin.clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/dashboard.admin.clx.css" rel="stylesheet">
        <link rel="stylesheet" href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" />
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body id="clx-admin-loggedIn-dashboard">
        <div class="container-fluid">
            <main>
                <header class="row">
                    <div class="col-md-6" left><span class="header-title">c'est lux</span></div><div class="col-md-6" right><div right><span class="header-title">benvenuto, <?php echo $row['uuname']; ?></span><span class="header-title" id="header-menu-trigger" style="background:black;color:#fff">menu</span><span class="header-title">esci</span></div></div>
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

                <div class="dashboard-main" id="dashboard-main">
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
                    <div class="adc app-mid">
                        <div class="stats-holder" data-title="Prospettiva giorno">
                            <div class="stats-inner clearfix">
                                <div left>
                                    <div class="pie-chart"></div>
                                </div>
                                <div right class="stats_">
                                    <table>
                                        <tr>
                                            <td>Ricavo da dispositivi desktop</td>
                                            <td>Ricavo da dispositivi mobile</td>
                                            <td>Totale</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                    <div class="stats-written">
                                        <div class="sw-i number-of-access">
                                            <p>Numero di accessi</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Tempo di permanenza medio:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Bounce rate:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Provenienza accessi (esempio Google, Facebook, Twitter e altri)</p>
                                            <ul>
                                                <li><b>Google:</b></li>
                                                <li><b>Facebook:</b></li>
                                                <li><b>Twitter:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Ricavi per paese</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="sh-footer">
                                <div right>
                                    <span>Esporta in un documento PDF</span>&nbsp;<span>Stampa</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-holder" data-title="Prospettiva settimana">
                            <div class="stats-inner clearfix">
                                <div left>
                                    <div class="pie-chart"></div>
                                </div>
                                <div right class="stats_">
                                    <table>
                                        <tr>
                                            <td>Ricavo da dispositivi desktop</td>
                                            <td>Ricavo da dispositivi mobile</td>
                                            <td>Totale</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                    <div class="stats-written">
                                        <div class="sw-i number-of-access">
                                            <p>Numero di accessi</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Tempo di permanenza medio:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Bounce rate:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Provenienza accessi (esempio Google, Facebook, Twitter e altri)</p>
                                            <ul>
                                                <li><b>Google:</b></li>
                                                <li><b>Facebook:</b></li>
                                                <li><b>Twitter:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Ricavi per paese</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="sh-footer">
                                <div right>
                                    <span>Esporta in un documento PDF</span>&nbsp;<span>Stampa</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-holder" data-title="Prospettiva mese">
                            <div class="stats-inner clearfix">
                                <div left>
                                    <div class="pie-chart"></div>
                                </div>
                                <div right class="stats_">
                                    <table>
                                        <tr>
                                            <td>Ricavo da dispositivi desktop</td>
                                            <td>Ricavo da dispositivi mobile</td>
                                            <td>Totale</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                    <div class="stats-written">
                                        <div class="sw-i number-of-access">
                                            <p>Numero di accessi</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Tempo di permanenza medio:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p><b>Bounce rate:</b></p>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Provenienza accessi (esempio Google, Facebook, Twitter e altri)</p>
                                            <ul>
                                                <li><b>Google:</b></li>
                                                <li><b>Facebook:</b></li>
                                                <li><b>Twitter:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                        <hr />
                                        <div class="sw-i number-of-access">
                                            <p>Ricavi per paese</p>
                                            <ul>
                                                <li><b>Italia:</b></li>
                                                <li><b>Francia:</b></li>
                                                <li><b>USA:</b></li>
                                                <li><b>Altri 5 visualizzabili</b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="sh-footer">
                                <div right>
                                    <span>Esporta in un documento PDF</span>&nbsp;<span>Stampa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://admin.cestlux.it/assets/js/dashboard.admin.clx.js"></script>
        <script>clx_dashboard.hm_trigger_sided("w_dashboard");</script>
    </body>
</html>
          <?php  }
        } else {
            $output = json_encode(array('login_res'=>'failed', 'proceed'=>false));
            return $output;
        }
        
} else {
    header("Location: ../");
}