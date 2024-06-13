<?php $servername = "srv677.hstgr.io";
$username = "u117204720_deepwoods";
$password = "Wj9|10g0oN";
$dbname = "u117204720_deepwoods";
$conn = new mysqli($servername, $username, $password, $dbname);
$total = 0;
$google = 0;
$amazon = 0;
$bing = 0;
$passive = 0;
$active = 0;
$active_month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$total_month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$passive_month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT count(`user_count`) as total, (select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%google%') as google,(select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%amazon%') as amazon, (select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%msn%') as bing FROM `track_log` WHERE 1";
$result = $conn->query($sql);
if ($result)
{
    while ($row = $result->fetch_assoc())
    {
        $total = $row["total"];
        $google = $row["google"];
        $amazon = $row["amazon"];
        $bing = $row["bing"];
        $passive = $google + $amazon + $bing;
        $active = $total - $passive;
    }
}
for ($i = 1;$i <= 12;$i++)
{
    $sql = "SELECT count(`user_count`) as total, (select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%google%' and month(`date_time`) = " . $i . ")+(select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%amazon%' and month(`date_time`) = " . $i . ")  + (select count(`user_count`) FROM `track_log` WHERE LOWER(`hostname`) LIKE '%msn%' and month(`date_time`) = " . $i . ") as passive FROM `track_log` where month(`date_time`)=" . $i;
    echo $sql;
    $result = $conn->query($sql);
    if ($result)
    {
        while ($row = $result->fetch_assoc())
        {
            $total_month[$i - 1] = $row["total"];
            $passive_month[$i - 1] = $row["passive"];
            $active_month[$i - 1] = $total_month[$i - 1] - $passive_month[$i - 1];
        }
    }
} ?><html class="no-js"lang="en"><head><link href="https://www.ebenezer-isaac.com/img/logo.png"rel="shortcut icon"><meta content="Ebenezer Isaac"name="author"><meta content="Web Traffic Analytics"name="description"><meta content="ebenezer isaac, ebenezer, isaac ,indian ceh, iot developer, java developer, msu baroda, cerberus, mycrochips, ebenezer tirunelveli"name="keywords"><meta content="Web Traffic Analytics"property="og:title"><meta content="Click To Know More"property="og:site_name"><meta content="https://analytics.ebenezer-isaac.com/index.html"property="og:url"><meta content="ebenenezer.com"property="og:description"><meta content="https://www.ebenezer-isaac.com/img/logo.png"property="og:image"><meta content="1000"property="og:image:width"><meta content="1000"property="og:image:height"><meta content="website"property="og:type"><meta charset="utf-8"><meta content="IE=edge"http-equiv="X-UA-Compatible"><title>Analytics</title><meta content="width=device-width,initial-scale=1shrink-to-fit=yes"name="viewport"><link href="css/bootstrap.min.css"rel="stylesheet"><link href="css/font-awesome.min.css"rel="stylesheet"><link href="css/themify-icons.css"rel="stylesheet"><link href="css/flag-icon.min.css"rel="stylesheet"><link href="css/cs-skin-elastic.css"rel="stylesheet"><link href="css/jqvmap.min.css"rel="stylesheet"><link href="css/style.css"rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"rel="stylesheet"type="text/css"></head><body style="overflow-x:hidden"><div class="right-panel"id="right-panel"><div class="animated fadeIn"><div class="content mt-3"><div id="flash"><div class="row"><div class="col-12"><div class="alert alert-dismissible alert-success fade show"align="center"role="alert"><span class="badge badge-pill badge-success"><font size="3">Most Recent Traffic </font></span><span id="mostrecent"><?php $sql = "SELECT * FROM `track_log` ORDER BY `user_count` DESC LIMIT 0,1";
$result = $conn->query($sql);
if ($result)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<br><div class='row'><div class='col-xl-6 col-12'><b>HOSTNAME</b> : " . $row["hostname"] . "<br><b>IP</b> : " . $row["ip"] . "<br><b>ISP</b> : " . $row["isp"] . "</div><div class='col-xl-3 col-12'> <b>CITY</b> : " . $row["city"] . "<br> <b>REGION</b> : " . $row["region"] . "<br><b>COUNTRY</b> : " . $row["country"] . " - " . $row["zip"] . "</div><div class='col-xl-3 col-12'> <b>OS</b> : " . $row["os"] . "<br> <b>DATETIME</b> : " . $row["date_time"] . "<br><b>PAGE</b> : " . $row["page"] . "</div></div>";
    }
} ?></span><button aria-label="Close"class="close"data-dismiss="alert"type="button"><span aria-hidden="true">×</span></button></div></div></div></div><div class="row"><div class="col-12"><div class="card"><div class="card-header"><h4>World Traffic Frequency</h4></div><div class="Vector-map-js"><div class="vmap"id="vmap"></div></div></div></div></div><div class="row"><div class="col-4"><div class="card"><div class="card-body"><div class="stat-widget-one"><div class="dib stat-icon"><i class="border-primary text-primary ti-stats-up"></i></div><div class="dib stat-content"><div class="stat-text">All Time Traffic</div><div class="stat-digit"><?php echo $total; ?></div></div></div></div></div></div><div class="col-4"><div class="card"><div class="card-body"><div class="stat-widget-one"><div class="dib stat-icon"><i class="border-danger text-danger ti-thumb-down"></i></div><div class="dib stat-content"><div class="stat-text">Passive Traffic</div><div class="stat-digit"><?php echo $passive; ?></div></div></div></div></div></div><div class="col-4"><div class="card"><div class="card-body"><div class="stat-widget-one"><div class="dib stat-icon"><i class="border-success text-success ti-thumb-up"></i></div><div class="dib stat-content"><div class="stat-text">Active Traffic</div><div class="stat-digit"><?php echo $active; ?></div></div></div></div></div></div></div><div class="row"><div class="col-xl-6 col-sm-12"><div class="card"><div class="card-body"><h4 class="mb-3">Monthly Traffic for Current Year</h4><canvas id="sales-chart"></canvas></div></div></div><div class="col-xl-6 col-sm-12"><div class="card"><div class="card-body"><h4 class="mb-3">Monthly Total Traffic for Current Year</h4><canvas id="team-chart"></canvas></div></div></div></div><div class="row"><div class="col-12 col-sm-12"><div class="card"><div class="card-body"><h5>Passive Traffic Frequency</h5><ul><li><div class="text-muted">Google</div><strong><span id="google"><?php echo $google . " Requests (" . round(($google / $passive) * 100, 2); ?>%)</span></strong><div class="mt-2 progress progress-xs"style="height:10px"><div class="progress-bar progress-bar-animated progress-bar-striped bg-danger"style="width:<?php echo round(($google / $passive) * 100, 2); ?>%"aria-valuemax="100"aria-valuemin="0"aria-valuenow="0"id="googlebar"role="progressbar"></div></div></li><li class="hidden-sm-down"><div class="text-muted">Amazon</div><strong><span id="amazon"><?php echo $amazon . " Requests (" . round(($amazon / $passive) * 100, 2); ?>%)</span></strong><div class="mt-2 progress progress-xs"style="height:10px"><div class="progress-bar progress-bar-animated progress-bar-striped bg-warning"style="width:<?php echo round(($amazon / $passive) * 100, 2); ?>%"aria-valuemax="100"aria-valuemin="0"aria-valuenow="0"id="amazonbar"role="progressbar"></div></div></li><li><div class="text-muted">Bing</div><strong><span id="bing"><?php echo $bing . " Requests (" . round(($bing / $passive) * 100, 2); ?>%)</span></strong><div class="mt-2 progress progress-xs"style="height:10px"><div class="progress-bar progress-bar-animated progress-bar-striped bg-success"style="width:<?php echo round(($bing / $passive) * 100, 2); ?>%"aria-valuemax="100"aria-valuemin="0"aria-valuenow="0"id="bingbar"role="progressbar"></div></div></li></ul></div></div></div></div><div class="row"><div class="col-xl-6 col-sm-12"><div class="card"><div class="card-body"><h4 class="mb-3">Countries with Top 10 Page Requests</h4><canvas id="singelBarChart"></canvas></div></div></div><div class="col-xl-6 col-sm-12"><div class="card"><div class="card-body"><h4 class="mb-3">Page Request Traffic Analyser</h4><canvas id="pieChart"></canvas></div></div></div></div><div class="row"><div class="card col-12"><div class="card-header"><strong class="card-title">Data Table</strong></div><div class="card-body table-responsive"><style>tr{vertical-align:middle;text-align:center}th{vertical-align:middle;text-align:center}td{vertical-align:middle;text-align:center}</style><table cellspacing="0"class="table table-bordered table-hover"id="bootstrap-data-table"style="overflow-x:scroll"width="100%"><thead><tr><th>Date Time</th><th>Page</th><th>Hostname and IP</th><th>ISP</th><th>Address</th><th>Device Info</th></tr></thead><tbody>

    <?php $sql = "SELECT `date_time`, `page`, `hostname`, `ip`, `isp`, `city`, `region`, `country`, `zip`, `browser`, `os` FROM track_log;";
$result = $conn->query($sql);
if ($result)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>" . "<td>" . $row["date_time"] . "</td>" . "<td>" . $row["page"] . "</td>" . "<td>" . $row["hostname"] . "<br>" . $row["ip"] . "</td>" . "<td>" . $row["isp"] . "</td>" . "<td>" . $row["city"] . "," . $row["region"] . "<br>" . $row["country"] . " - " . $row["zip"] . "</td>" . "<td>" . $row["browser"] . " - " . $row["os"] . "</td>" . "</tr>";
    }
} ?></tbody></table></div></div></div></div></div></div><script src="js/jquery.min.js"></script><script src="js/popper.min.js"></script><script src="js/bootstrap.min.js"></script><script src="js/main.js"></script><script src="js/jquery.vmap.min.js"></script><script src="js/jquery.vmap.sampledata.js"></script><script src="js/datatables.js"></script><script src="js/datatables-init.js"></script><script src="js/Chart.bundle.min.js"></script><script src="js/dashboard.js"></script><script>var map_data = {};var countries = [];var keys = [];

<?php $count = 0;
$sql = "SELECT country, count(`user_count`) as cunt from `track_log` where LENGTH(country) >1 GROUP by `country` ORDER BY cunt DESC";
$result = $conn->query($sql);
if ($result)
{
    while ($row = $result->fetch_assoc())
    {
        $count = $count + 1;
        if ($count < 10)
        {
            echo "keys.push('" . $row["country"] . "');";
            echo "countries.push(" . round((($row["cunt"] / $total) * 100) , 2) . ");";
        }
        echo "map_data[id_mapper['" . $row["country"] . "']] = " . $row["cunt"] . ";";
    }
}
$conn->close();
function print_data($data)
{
    $text = "[";
    for ($i = 0;$i < (count($data) - 1);$i++)
    {
        $text = $text . $data[$i] . ",";
    }
    $text = $text . $data[count($data) - 1] . "]";
    return $text;
} ?> console.log(map_data);var active_month = <?php echo print_data($active_month); ?>;var passive_month = <?php echo print_data($passive_month); ?>;var total_month = <?php echo print_data($total_month); ?>;var google = <?php echo round(($google / $total) * 100, 2); ?>;var amazon = <?php echo round(($amazon / $total) * 100, 2); ?>;var bing = <?php echo round(($bing / $total) * 100, 2); ?>;var active = <?php echo round(($active / $total) * 100, 2);
$page = "Analytics";
include "logger.php"; ?>;function set_data(){try{jQuery("#vmap").vectorMap({map:"world_en",backgroundColor:null,color:"#ffffff",hoverOpacity:.7,selectedColor:"#1de9b6",enableZoom:!0,showTooltip:!0,values:map_data,scaleColors:["#1de9b6","#03a9f5"],normalizeFunction:"polynomial"})}catch(e){}try{(e=document.getElementById("sales-chart")).height=150;new Chart(e,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],type:"line",defaultFontFamily:"Montserrat",datasets:[{label:"Active",data:active_month,backgroundColor:"transparent",borderColor:"rgba(220,53,69,0.75)",borderWidth:3,pointStyle:"circle",pointRadius:5,pointBorderColor:"transparent",pointBackgroundColor:"rgba(220,53,69,0.75)"},{label:"Passive",data:passive_month,backgroundColor:"transparent",borderColor:"rgba(40,167,69,0.75)",borderWidth:3,pointStyle:"circle",pointRadius:5,pointBorderColor:"transparent",pointBackgroundColor:"rgba(40,167,69,0.75)"}]},options:{responsive:!0,tooltips:{mode:"index",titleFontSize:12,titleFontColor:"#000",bodyFontColor:"#000",backgroundColor:"#fff",titleFontFamily:"Montserrat",bodyFontFamily:"Montserrat",cornerRadius:3,intersect:!1},legend:{display:!1,labels:{usePointStyle:!0,fontFamily:"Montserrat"}},scales:{xAxes:[{display:!0,gridLines:{display:!1,drawBorder:!1},scaleLabel:{display:!1,labelString:"Month"}}],yAxes:[{display:!0,gridLines:{display:!1,drawBorder:!1},scaleLabel:{display:!0,labelString:"Page Requests"}}]},title:{display:!1,text:"Normal Legend"}}})}catch(e){}try{(e=document.getElementById("team-chart")).height=150;new Chart(e,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],type:"line",defaultFontFamily:"Montserrat",datasets:[{data:total_month,label:"Traffic Requests ",backgroundColor:"rgba(0,103,255,.15)",borderColor:"rgba(0,103,255,0.5)",borderWidth:3.5,pointStyle:"circle",pointRadius:5,pointBorderColor:"transparent",pointBackgroundColor:"rgba(0,103,255,0.5)"}]},options:{responsive:!0,tooltips:{mode:"index",titleFontSize:12,titleFontColor:"#000",bodyFontColor:"#000",backgroundColor:"#fff",titleFontFamily:"Montserrat",bodyFontFamily:"Montserrat",cornerRadius:3,intersect:!1},legend:{display:!1,position:"top",labels:{usePointStyle:!0,fontFamily:"Montserrat"}},scales:{xAxes:[{display:!0,gridLines:{display:!1,drawBorder:!1},scaleLabel:{display:!1,labelString:"Month"}}],yAxes:[{display:!0,gridLines:{display:!1,drawBorder:!1},scaleLabel:{display:!0,labelString:"Page Requests"}}]},title:{display:!1}}})}catch(e){}try{(e=document.getElementById("singelBarChart")).height=150;new Chart(e,{type:"bar",data:{labels:keys,datasets:[{label:"Page Requests",data:countries,borderColor:"rgba(0, 123, 255, 0.9)",borderWidth:"0",backgroundColor:"rgba(0, 123, 255, 0.5)"}]},options:{scales:{yAxes:[{ticks:{beginAtZero:!0}}]}}})}catch(e){}try{var e;(e=document.getElementById("pieChart")).height=150;new Chart(e,{type:"pie",data:{datasets:[{data:[google,amazon,bing,active],backgroundColor:["#E04E5C","#FFCA2C","#48B461","#268FFF"],hoverBackgroundColor:["#E04E5C","#FFCA2C","#48B461","#268FFF"]}],labels:["Google","Amazon","Bing","Users"]},options:{responsive:!0}})}catch(e){}}jQuery(document).ready(function(e){set_data(),e("#bootstrap-data-table").DataTable()});</script></body></html>
