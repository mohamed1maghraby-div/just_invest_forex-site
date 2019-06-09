<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Just investe</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- swiper carousel -->
      <link href="swiper.min.css" rel="stylesheet">
      <!-- custom style -->
      <link href="style.css" rel="stylesheet">
      <!-- animate style -->
      <link rel="stylesheet" href="animate.min.css">
      <!-- analatics -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
          
                       function drawChart() {
        var number_of_all_users = Number(document.getElementById("number_of_all_users").value);
        var realy_all_users_mony = Number(document.getElementById("realy_all_users_mony").value);
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['users', number_of_all_users]
        ]);
                           
        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['total deposite', realy_all_users_mony]
        ]);

        var options = {
          width: 200, height: 140,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 9
        };

       var chart = new google.visualization.Gauge(document.getElementById('chart_div_3'));
       chart.draw(data, options);
       var chart = new google.visualization.Gauge(document.getElementById('chart_div_4'));
       chart.draw(data2, options);
      }</script>
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
 
  </head>
<?php
include "inc/function.php"; ?>
  <body>
      <?php  $user_coo = $_COOKIE['user']; ?>
      <div class="container-fluid">
          <div class="row" >
              <div class="dashboard_header">
                  <div class="header col-lg-12">
                  <ul>
                      <li><a class="logo" href="https://www.investorsstate.com/"><img src="image/logo.svg" width="80" height="80"/>JUST INVEST</a></li>
                      <li><a href="about_us.php" style="font-size: 19px;">About us</a></li>
                      <li><a href="faq.php" style="font-size: 19px;">FAQ</a></li>
                      <li><a href="contact.php" style="font-size: 19px;">Conact us</a></li>
                      </ul>
                  </div>
              </div>
              </div>
      </div>

    <!-- contact body -->
      <div class="container-fluid">
        <div class="row">
            <div class="about_us col-lg-12">
            <div class="col-lg-push-1 col-lg-5 cirtificat">
                <img src="image/certifect.png" height="550"/> 
                </div>
                <div class="col-lg-6 cirtificat_explane">
                    <div style="font-size: 35px;">
                            <span>COMPANY JUST INVESTE</span>
                        </div>
                    <div style="margin-top: 20px; color: #999;  font-size: 15px;
    letter-spacing: .7px;
">
                            <span>Since 2017, the company just investe has been engaged in the development of investe deposits and the production and marketing of crude investe from the EG.</span>
                    </div>
                    <div style="margin-top: 20px; color: #999;  font-size: 15px;
    letter-spacing: .7px;
">
                            <span>Just Investe also works together with individuals who want to invest in our company's development.</span>
                        </div>
                    <div style="margin-top: 30px; color: #999;  font-size: 15px; letter-spacing: .7px;">
                            <span>Our company has many years of experience in international business and has a proven ability of solvency and paying interest on established investment packages. Even during unstable financial periods, our company has continued to show growth and development.</span>
                        </div>
                    <div style="margin-top: 20px; color: #999;  font-size: 15px; letter-spacing: .7px;">
                            <span>The mutually beneficial cooperation between investe and our individual partners helps to increase the working capital of the company thanks to the influx of supplemental private investment.</span>
                        </div>
                    <div style="margin-top: 20px; color: #999; font-size: 15px; letter-spacing: .7px;">
                            <span>11 April 2017 due to a large influx of investors, the head office of just investe decided to register a subsidiary company just investe, which will be fully focused on managing the financial flows of our investors.</span>
                    </div>
                   <div class="col-lg-push-4 col-lg-5"><h1>our history</h1></div><div class="clearfix"></div>
                    <div class="col-lg-6">
                    <div id="chart_div_3" style="width: 200px; height: 200px; position: relative; left: 25%; top: 40px;"></div>
                    </div>
                    <div class="col-lg-6">
                    <div id="chart_div_4" style="width: 200px; height: 200px; position: relative; left: 25%; top: 40px;"></div>
                    </div>
                 <?php   $get_all_users = "select * from customers";
                         $run_all_users = mysqli_query ($con, $get_all_users);
                         $number_of_all_users = mysqli_num_rows($run_all_users); 
                    
                     $get_all_users_mony = "select * from deposits";
                    $run_all_users_mony = mysqli_query ($con, $get_all_users_mony);
                            $realy_all_users_mony = 0 ;
           while ($row_all_users_mony = mysqli_fetch_array($run_all_users_mony)){
               $realy_all_users_mony += $row_all_users_mony['u_main_price'];
           }
                    ?>
                    <form>
                        <input type="hidden" id="number_of_all_users" value="<?php echo $number_of_all_users ?>" />
                        <input type="hidden" id="realy_all_users_mony" value="<?php echo $realy_all_users_mony; ?>" />
                        
                    </form>
                </div>
            </div>
          </div>
      </div>
       <div class="container-fluid">
          <div class="row">
              <div class="sidebar_overlay"></div>
              <div class="main_sidebar col-lg-12">
              <div class="sidebar">
                  <div class="sidebar_helper">
                  <span class="sidebar_arrow glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                <span class="sidebar_text"><?php echo $user_coo; ?>/editprofile </span>
                  </div>
              </div>
                               <?php

// singup value
$frist_name  = @$_POST['frist_name'];
$last_name = @$_POST['last_name'];
$company = @$_POST['company'];
$line_1 = @$_POST['line_1'];
$line_2 = @$_POST['line_2'];
$city = @$_POST['city'];
$state = @$_POST['state'];
$postcode = @$_POST['postcode'];

$email = @$_POST['email'];
$password = @$_POST['password'];
$confirm_password = @$_POST['confirm_password'];
$country = @$_POST['country'];
$uploaded_dir = dirname(__FILE__)."/image/user_img/";
                  
$frist_name_value_check = mysql_escape_string($frist_name);
$last_name_value_check = mysql_escape_string($last_name);
$company_value_check = mysql_escape_string($company);
$line_1_value_check = mysql_escape_string($line_1);
$line_2_value_check = mysql_escape_string($line_2);
$city_value_check = mysql_escape_string($city);
$state_value_check = mysql_escape_string($state);
$postcode_value_check = mysql_escape_string($postcode);
$email_value_check = mysql_escape_string($email);
$password_value_check = mysql_escape_string($password);
$country_value_check = mysql_escape_string($country);
                  
if(isset($_POST['update'])){
    if($password === $confirm_password){
    if(empty($password) || empty($email) || empty($country) || empty($confirm_password) || empty($_FILES['file'])){
        echo '<script>alert("please complete the fields");</script>';
    }else{
        $edit_porfile = "UPDATE customers SET
        frist_name = '$frist_name_value_check',
        last_name = '$last_name_value_check',
        password = '$password_value_check',
        email = '$email_value_check',
        line_1 = '$line_1_value_check',
        line_2 = '$line_2_value_check',
        city = '$city_value_check',
        country = '$country_value_check',
        company = '$company_value_check',
        state = '$state_value_check',
        postcode = '$postcode_value_check' WHERE username = '$user_coo' ";
        $run_c = mysqli_query($con, $edit_porfile);
        
        // upload img
         $types = array('image/jpeg', 'image/gif', 'image/png');
        if (in_array($_FILES['file']['type'], $types)) {
            $filename=$_FILES["file"]["name"];
            $extension=end(explode(".", $filename));
            $prod = $user_coo;
            $newfilename=$prod .".".$extension;
                move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_dir.$newfilename);
                echo "photo has been uploaded";
            $edit_photo = "UPDATE customers SET 
            img_src = '$newfilename' WHERE username = '$user_coo'";
            $run_edit_photo = mysqli_query($con, $edit_photo);
        }
                    else{
            echo 'we accepted only this source .jpeg / .gif / .png ';
            }
    }
    }else{
        echo '<script>alert("password confirmation wrong");</script>';
    }
}
                  // fetch data in edit profile
                $showuserdata = "select * from customers where username='$user_coo'";
              $run_show_user_data = mysqli_query($con, $showuserdata);
              $fetch_show_user_data = mysqli_fetch_object($run_show_user_data);            
?>
              <div class="sidebar_body edit_profile col-lg-12">
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="col-lg-4">
                      <input id="frist_name" type="text" name="frist_name" value="<?php echo $fetch_show_user_data->frist_name; ?>" placeholder="first name"/>
                      <input id="last_name" type="text" name="last_name" value="<?php echo $fetch_show_user_data->last_name; ?>" placeholder="last name"/>
                      <div class="custom-file">
                         <span>upload image:</span> 
                        <input type="file" name="file" />
                      </div>
                      <input id="quake_company" type="text" name="company" value="<?php echo $fetch_show_user_data->company; ?>" placeholder="your company"/>
                      <input id="quake_email" type="text" name="email" value="<?php echo $fetch_show_user_data->email; ?>" placeholder="email"/>
                      <input type="text" name="password" value="<?php echo $fetch_show_user_data->password; ?>" placeholder="change password"/>
                      <input type="text" name="confirm_password" value="<?php echo $fetch_show_user_data->password; ?>" placeholder="confirm change password"/>
                  </div>
                  <div class="col-lg-4">
                      <input type="text" id="quake_line_1" name="line_1" value="<?php echo $fetch_show_user_data->line_1; ?>" placeholder="address line 1"/>
                      <input type="text" id="quake_line_2" name="line_2" value="<?php echo $fetch_show_user_data->line_2; ?>" placeholder="address line 2"/>
                      <input type="text" id="quake_city" name="city" value="<?php echo $fetch_show_user_data->city; ?>" placeholder="city"/>
                      <input type="text" name="state" value="<?php echo $fetch_show_user_data->state; ?>" placeholder="state"/>
                      <input type="text" name="postcode" value="<?php echo $fetch_show_user_data->postcode; ?>" placeholder="post code"/>
                      <input type="text" id="quake_country" name="country" value="<?php echo $fetch_show_user_data->country; ?>" placeholder="country"/>
                      <input type="submit" name="update" value="Update" />
                    </div>
                  <div class="col-lg-4">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(image/user_img/<?php  if(empty($fetch_show_user_data->img_src)){echo 'no-image.png';}else{
                    echo $fetch_show_user_data->img_src;} ?>) no-repeat; background-size: cover;">
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                              <span id="frist_name_word"><?php echo $fetch_show_user_data->frist_name . "</span><span id='last_name_word'> " . $fetch_show_user_data->last_name; ?></span><br/>
                              <span id="quake_company_word"><?php echo $fetch_show_user_data->company; ?></span>
                              </div>
                              <div class="col-lg-3" style="font-size: 10px; position: relative; top: 138px; right: 5px;">
                                <span>ACTIVE<hr/>$<?php if(empty($active_invest)){ echo '0';}else{echo $active_invest;} ?></span>
                                  <span>WITHDRAW<hr/>$<?php if(empty($withdraw)){ echo '0'; }else{echo $withdraw;} ?></span>
                                  <span>REF<hr/>$<?php if(empty($refrerral)){ echo '0'; }else{echo $refrerral;} ?></span>
                              </div>
                          </div>
                          </div>
                        <div class="profile_body">
                          <span id="quake_email_word"><?php echo $fetch_show_user_data->email; ?></span><br/>
                            <span id="quake_line_1_word"><?php echo $fetch_show_user_data->line_1; ?>,</span><br/>
                             <span id="quake_line_2_word"><?php echo $fetch_show_user_data->line_2; ?>,</span><br/>
                            <span id="quake_city_word"><?php echo $fetch_show_user_data->city; ?>,</span><br/>
                            <span id="quake_country_word"><?php echo $fetch_show_user_data->country; ?>.</span>
                          </div>
                          <div class="profile_footer">
                          <span>
Thank you for your trust in us. We trying hardly to be in good relationship with you to now more information you can visit </span><a href="about_us.php">about us</a>
                          </div>
                      </div>
                    </div>
                  </form>
                  </div>
              </div>
          </div>
      </div>
       <div class="clearfix"></div>
      <div class="container-fluid">
          <div class="row">
              <div class="dashboard_footer col-lg-12">
                  <div class="footer_menu_link col-lg-push-4 col-lg-4">
                      <ul>
                          <li><a href="#">About US</a></li>
                          <li><a href="#">FAQ</a></li>
                          <li><a href="#">Contact US</a></li>
                          </ul>
                      </div><div class="clearfix"></div>
                  <div class=" footer_social_icon col-lg-push-2 col-lg-2">
                    We are in social networks:
                      <ul>
                          <li><a target="_blank" href="https://www.facebook.com/Just-investe-127028561178554/?ref=aymt_homepage_panel"><img src="image/facebook-512.png" width="30" height="30"/></a></li>
                          <li><a target="_blank" href="https://twitter.com/JInveste"><img src="image/twitter-xxl.png" width="30" height="30"/></a></li>
                          <li><a target="_blank" href="https://www.instagram.com/justinveste/"><img src="image/instagram-xxl.png" width="30" height="30"/></a></li>
                          </ul>
                  </div>
                  <div class="footer_logo col-lg-push-2 col-lg-4">
                  <ul>
                          <li><a href="#"><img src="image/logo.svg" width="80" height="80"/></a></li>
                            <li><a href="#">JUST INVEST</a></li>
                      </ul>
                  </div>
                  <div class="copy_rights col-lg-push-2 col-lg-4">
                  <span>Company Refistration Number : 10720834</span>
                  </div>
              </div>
          </div>
      </div>
<div id="doughnutChart" class="chart" style="z-index: 2;"></div>
<?php include"files/footer.php"; ob_end_flush(); ?>