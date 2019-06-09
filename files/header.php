<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>investors state</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- icon-->
      <link rel="icon" href="image/icon-logo.PNG" type="image/x-icon" />
      <!-- swiper carousel -->
      <link href="swiper.min.css" rel="stylesheet">
      <!-- custom style -->
      <link href="style.css" rel="stylesheet">
      <!-- animate style -->
      <link rel="stylesheet" href="animate.min.css">
      <!-- analatics -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart','gauge']});
      google.charts.setOnLoadCallback(drawChart);
          google.charts.setOnLoadCallback(drawCharte);

      function drawChart() {
  var bunes = Number(document.getElementById("bunes").value);
          if(bunes === 0){ bunes = 1}
  var main_price = Number(document.getElementById("main_price").value);
  var referral_vip = Number(document.getElementById("referral_vip").value);
  var referral_normal = Number(document.getElementById("referral_normal").value);
          if(referral_normal === 0){ referral_normal = 1}
  var last_payment_weekly_js = Number(document.getElementById("last_payment_weekly_js").value);
          if(last_payment_weekly_js === 0){ last_payment_weekly_js = 1}
          console.log(bunes , main_price , referral_vip , referral_normal , last_payment_weekly_js);
        var data = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['main price',     main_price],
            ['bunes',     bunes]
        ]);
          
          var data1 = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['referral invest',     referral_vip],
            ['referral',     referral_normal]
        ]);
          
          var data2 = google.visualization.arrayToDataTable([
          ['Effort', 'Amount given'],
          ['last payment',     last_payment_weekly_js],
            ['referral',     0]
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'white',
          },
          legend: 'none',
            colors:['#999ea5','#bb0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
          var chart = new google.visualization.PieChart(document.getElementById('donut_single_1'));
        chart.draw(data1, options);
          var chart = new google.visualization.PieChart(document.getElementById('donut_single_2'));
        chart.draw(data2, options);
      }
          
           function drawCharte() {
        var withdraw = Number(document.getElementById("withdraw").value);
        var last_deposit_js = Number(document.getElementById("last_deposit_js").value);
        var withdrew_total_js = Number(document.getElementById("withdrew_total_js").value);
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['withdraw', withdraw]
        ]);
               
        var data1 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['last deposit', last_deposit_js]
        ]);
               
        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['total', withdrew_total_js]
        ]);

        var options = {
          width: 200, height: 140,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 9
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(data, options);
       var chart = new google.visualization.Gauge(document.getElementById('chart_div_1'));
       chart.draw(data1, options);
       var chart = new google.visualization.Gauge(document.getElementById('chart_div_2'));
       chart.draw(data2, options);
      }
    </script>
<script type="text/javascript"> //<![CDATA[ 
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
          <!-- Demo styles -->
    <style>
    html, body {
        position: relative;
        height: 100%;
    }
    body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        width: 100%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    </style>
  </head>