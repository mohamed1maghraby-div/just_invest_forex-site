<?php ob_start(); include"files/header.php"; 
include "inc/function.php"; ?>
  <body>
      <?php  $user_coo = $_COOKIE['user']; 
      
      if(empty($user_coo)){
    header('Location: https://www.investorsstate.com');
}

?>
      <div class="container-fluid">
          <div class="row" >
              <div class="dashboard_header">
                  <div class="header col-lg-12">
             <div class="col-lg-9"> 
                 <div class="header_madiaquary">
                  <a class="logo" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a>
                  <span class="button_madiaquary_display glyphicon glyphicon-th-list" aria-hidden="true"></span>
                  </div>
                  <ul class="earth_quake">
                      <img src="image/arrowup.png" class="img_arrowe" style="display: none;"/>
                      <li style="position: relative;top: 0px;"><a class="logo quake_logo" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a></li>
                      <li><a href="about_us.php" style="font-size: 19px;">About us</a></li>
                      <li><a href="faq.php" style="font-size: 19px;">FAQ</a></li>
                      <li><a href="contact.php" style="font-size: 19px;">Conact us</a></li>
                      <li><div class="myacount_mediaquery">
                          <form action="" method="post">
                          <input type="submit" name="myaccount" value="My account" style="width: 114%;"/>
                              </form></div></li>
                      <li><div class="logout_mediaquery"><form action="" method="post">
                          <input type="submit" name="logout" value="Logout" style="width: 100%;"/>
                              </form></div></li>
                      </ul>
                      </div>
                      <?php
                      if(isset($_POST['logout'])){
                          setcookie("user","",time()+60*60*24);
                          setcookie("login","",time()+60*60*24);
                          header('Location: https://www.investorsstate.com');
                      }
                      if(isset($_POST['myaccount'])){
                          header('Location: https://www.investorsstate.com');
                      }?>
                      <div class="logout col-lg-3" style="margin-top: 12px;">
                          <div class="col-lg-6">
                          <form action="" method="post">
                          <input type="submit" name="myaccount" value="My account" style="width: 114%;"/>
                              </form>
                              </div>
                          <div class="col-lg-6">
                          <form action="" method="post">
                          <input type="submit" name="logout" value="Logout" style="width: 100%;"/>
                              </form>
                              </div>
                      </div>
                  </div>
              </div>
              </div>
      </div>
      <?php 
      // active invest withdraw
      $get_active_invest = "select * from deposits where u_username = '$user_coo'";
      $run_active_invest = mysqli_query ($con, $get_active_invest);
      if(mysqli_num_rows($run_active_invest) > 0){
          $active_invest = 0 ;
          $withdraw = 0 ;
          $bunes = 0 ;
          $main_price = 0;
           while ($row_active_invest = mysqli_fetch_array($run_active_invest)){
               $active_invest += $row_active_invest['active_invest'];
               $withdraw += $row_active_invest['weekly_earings'];
               $bunes += $row_active_invest['bunes'];
               $main_price += $row_active_invest['u_main_price'];
           }
      }
      // REFERRAL
      $get_refrerral = "select * from deposits where referral = '$user_coo'";
      $run_refrerral = mysqli_query ($con, $get_refrerral);
      if(mysqli_num_rows($run_refrerral) > 0){
          $refrerral = 0 ;
          while ($row_refrerral = mysqli_fetch_array($run_refrerral)){
              $refrerral += $row_refrerral['referral_earning'];
          }
      }
      ?>
      
   <div class="container-fluid">
      <div class="row">
            <div class="dashboard col-lg-12">
                <div class="dashboard_border col-lg-push-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="dashbord_inner col-lg-push-1 col-lg-10">
                    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">INFORMATION</h1></div>
                        <div class="clearfix"></div>
                    <div class="ac_wi_ref animated zoomIn ">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <span class="dashboard_span">ACTIVE INVESTMENT</span>
                        <div id="donut_single" style="width: 200px; height: 200px; position: relative; left: 13%;"></div>
                        <div class="ac_wi_ref_text">
                            <span>$<?php echo $active_invest; ?></span>
                            </div>
                            <button onclick="window.location.href='https://www.investorsstate.com/invest.php'">Invest</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <span class="dashboard_span">WITHDRAW AVALABLE</span>
                            <div id="chart_div" style="width: 200px; height: 200px; position: relative; left: 25%; top: 40px;"></div>
                            <div class="ac_wi_ref_text">
                            <span>$<?php echo $withdraw; ?></span>
                            </div>
                            <button onclick="window.location.href='https://www.investorsstate.com/withdrew.php'" style="background: url(image/dashboard_button_red.PNG) no-repeat; background-size: cover;">Withdrawal</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <span class="dashboard_span">REF.REMUNERATION</span>
                            <div id="donut_single_1" style="width: 200px; height: 200px; position: relative; left: 13%;"></div>
                            <div class="ac_wi_ref_text">
                                <span>$<?php echo $refrerral; ?></span>
                            </div>
                            <button onclick="window.location.href='https://www.investorsstate.com/referrals_history.php'">Read More</button>
                        </div>
                    </div>
                        <?php
                        //last deposit
                        $get_last_deposit = "select last_deposit from history_last_deposit where username = '$user_coo' order by id desc";
                        $run_last_deposit = mysqli_query ($con, $get_last_deposit);
                        $fetch_last_deposit = mysqli_fetch_object($run_last_deposit);
                        //last payment
                        $get_last_payment = "select last_payment_weekly from history_last_payment where username = '$user_coo' order by id desc";
                        $run_last_payment = mysqli_query ($con, $get_last_payment);
                        $fetch_last_payment = mysqli_fetch_object($run_last_payment);
                        //withdrew total
                        $get_withdrew_total = "select withdrew_total from history_withdrew where username = '$user_coo'";
                        $run_withdrew_total = mysqli_query ($con, $get_withdrew_total);
                        $fetch_withdrew_total = mysqli_fetch_object($run_withdrew_total);
                        ?>
                    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px; height:20px;">MY HISTORY</h1></div>
                        <div class="clearfix"></div>
                        <div class="ac_wi_ref col-lg-12 animated zoomIn">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <span class="dashboard_span">LAST DEPOSIT</span>
                            <div id="chart_div_1" style="width: 200px; height: 200px; position: relative; left: 25%; top: 40px;"></div>
                                <div class="ac_wi_ref_text">
                                    <span>$<?php echo $fetch_last_deposit->last_deposit; ?></span>
                                    </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <span class="dashboard_span">LAST PAYMENT</span>
                                <div id="donut_single_2" style="width: 200px; height: 200px; position: relative; left: 13%;"></div>
                                <div class="ac_wi_ref_text">
                                    <span>$<?php echo $fetch_last_payment->last_payment_weekly; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <span class="dashboard_span">WITHDREW TOTAL</span>
                            <div id="chart_div_2" style="width: 200px; height: 200px; position: relative; left: 25%; top: 40px;"></div>
                                <div class="ac_wi_ref_text">
                                    <span>$<?php echo $fetch_withdrew_total->withdrew_total; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $referrals_number = "select referral from customers where referral = '$user_coo'";
                        $run_referrals_number = mysqli_query ($con, $referrals_number);
                        if(mysqli_num_rows($run_referrals_number) > 0){
                       $number_of_referrals_number = mysqli_num_rows($run_referrals_number);}
                        ?>
                    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">AFFILIATE PROGRAM</h1></div>
                       <div class="dashboard_end col-lg-12 animated zoomIn"> 
                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <span class="dashboard_span" style="    left: 35%;">REFERRALS</span>
                                    <div class="ac_wi_ref_text" style="margin-top: 70px;">
                                        <?php if(empty($number_of_referrals_number)){
                                            echo '<span>0</span>';
                                        }else{
                                            echo "<span>" . $number_of_referrals_number . "</span>";
                                                } ?>
                                        
                                    </div>
                                 <button onclick="window.location.href='https://www.investorsstate.com/referrals_history.php'">More</button>
                                </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top: 6%;">
                                <span class="dashboard_span" >Invite active partners in their team through the referral link and receive cash rewards!</span>
                                </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <span class="dashboard_span">YOUR REFERRAL LINK</span>
                                    <div class="ac_wi_ref_text" style="margin-top: 70px; text-align: left; height: auto; margin-right: -10px;">
                                        <input id="url_field" type="url" value="https://www.investorsstate.com/index.php?ref=<?php echo $user_coo; ?>" style="width: 100%;">
                                        
                                    </div>
                                <input id="copy_btn" type="button" value="copy">
                                </div>
                        </div>
      <?php
$get_referral_number = "select referral from deposits where u_username = '$user_coo'";
      $run_referral_number = mysqli_query ($con, $get_referral_number);
      if(mysqli_num_rows($run_referral_number) > 0){
          $number_of_referrals_vip = mysqli_num_rows($run_referral_number);
      }
                        ?>
                        <!-- dashbord anlatics display-->
      <form>
<input type="hidden" id="bunes" value="<?php echo $bunes ?>" />
<input type="hidden" id="main_price" value="<?php echo $main_price ?>" />
<input type="hidden" id="withdraw" value="<?php echo $withdraw ?>" />
<input type="hidden" id="referral_vip" value="<?php echo $number_of_referrals_vip ?>" />
<input type="hidden" id="referral_normal" value="<?php echo $number_of_referrals_number ?>" />
<input type="hidden" id="last_deposit_js" value="<?php echo $fetch_last_deposit->last_deposit; ?>" />
<input type="hidden" id="last_payment_weekly_js" value="<?php echo $fetch_last_payment->last_payment_weekly; ?>" />
<input type="hidden" id="withdrew_total_js" value="<?php echo $fetch_withdrew_total->withdrew_total; ?>" />
      </form>
                    </div>
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
                <span class="sidebar_text" style="font-family: gabriola; font-size: 22px; bottom: -17px;"><?php echo $user_coo; ?>/editprofile </span>
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
                      <div class="profile_display quake_profile_display">
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
      <div class="container-fluid">
          <div class="row">
              <?php
               $get_message = "select * from user_messages where username='$user_coo' and user_delet_message = 's'";
              $run_message = mysqli_query ($con, $get_message);
              $number_of_message = mysqli_num_rows($run_message);
              $quake_number_of_messages = '<div class="medo_number_of_message">' . $number_of_message . '</div>';
              
              if(isset($_POST['q_delet_m'])){ 
                  $quake_delet_message = "UPDATE user_messages SET user_delet_message = 'f' WHERE username = '$user_coo' ";
                $run_quake_delet_message= mysqli_query($con, $quake_delet_message);
                 header('Location: https://www.investorsstate.com/dashbord.php');
              }
              ?>
                <div class="message_box_overlay">
                    <form action="" method="post">
                        <input type="submit" name="q_delet_m" />
                    </form>
                        </div>
                     <div class="generaly_user_info" >
                      <div class="message_box col-lg-3">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(image/user_img/<?php  if(empty($fetch_show_user_data->img_src)){echo 'no-image.png';}else{
                    echo $fetch_show_user_data->img_src;} ?>) no-repeat; background-size: cover;">
                          <div id="quake_message_number">
                              <?php echo $quake_number_of_messages; ?>
                          </div>
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true"></span>
                         <div class="reg"> 
                      <form  action="" method="post">
                      <input type="submit" value="" name="q_delet_m" />
                      </form>
                          </div>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                          
                              <br/>
                              
                              </div>
                          </div>
                          </div>

<div class="profile_body" id="profile_body" style="height: 115px; overflow-y: scroll; overflow-x: hidden; background: rgb(90, 90, 90);">
       <?php $get_all_message = "select * from user_messages where username = '$user_coo'";
  $run_all_message = mysqli_query ($con, $get_all_message);
  if(mysqli_num_rows($run_all_message) > 0){
      echo '<span style="font-size: 20px;">message from admin</span><br/>';
      while ($row_all_message = mysqli_fetch_array($run_all_message)){
          echo '<span>'. $row_all_message['text'] .'</span><span style="font-size: 10px; float: right;">'. $row_all_message['date'] .'</span><br/>';
      }
  }else{
      echo "there is no message from manager";
  }?>
        </div>
<div class="profile_body" id="profile_user" style="height: 115px; overflow-y: scroll; overflow-x: hidden; ">
     <?php $get_all_message_from_ad = "select * from adminmessages where username = '$user_coo'";
  $run_all_message_from_ad = mysqli_query ($con, $get_all_message_from_ad);
  if(mysqli_num_rows($run_all_message_from_ad) > 0){
      echo '<span style="font-size: 20px;">Your messages to admin</span><br/>';
      while ($row_all_message_from_ad = mysqli_fetch_array($run_all_message_from_ad)){
          echo '<span>'. $row_all_message_from_ad['text'] .'</span><span style="font-size: 10px; float: right;">'. $row_all_message_from_ad['date'] .'</span><br/>';
      }
  }else{
      echo "you did't wrote any messages to manager";
  }?>
  </div>
                          <div class="profile_footer" style="height: 115px;">
                              
        <?php 
          $quake_message_contant = @$_POST['message_content'];
          date_default_timezone_set("America/New_York");
           $date = date("Y-m-d");
                  if(isset($_POST['send'])){
                  $insert_user_message = "insert into adminmessages(username,text,date,admin_delet) values('$user_coo','$quake_message_contant','$date','s')";
                  $run_user_message = mysqli_query ($con, $insert_user_message);  
            } ?>
                          <form action="" method="post">
                          <textarea name="message_content" value="" placeholder="say something" cols="35" rows="2"></textarea>
                            <input type="submit" value="send" name="send" />
                          </form>
                          </div>
                      </div>
                    </div>
                </div>
          </div>
      </div>

      <div class="clearfix"></div>
      <div class="container-fluid">
          <div class="row">
              <div class="dashboard_footer col-lg-12">
                  <div class="footer_menu_link col-lg-push-4 col-lg-4">
                      <ul class="col-lg-push-1 col-lg-9 col-xs-push-2 col-xs-12 col-sm-12 col-md-12">
                          <li><a href="#">About US</a></li>
                          <li><a href="#">FAQ</a></li>
                          <li><a href="#">Contact US</a></li>
                          </ul>
                      </div>
                  <div class="ssl_logo col-lg-push-4 col-lg-4 col-xs-push-4 col-xs-4">
                        <script language="JavaScript" type="text/javascript">
    TrustLogo("https://www.investorsstate.com/image/18308747_1140658082747439_287284508_n.png", "CL1", "none");
        </script>
                  </div>
                  <div class="clearfix"></div>
                  <div class=" footer_social_icon col-lg-push-2 col-lg-2 col-xs-8">
                    We are in social networks:
                      <ul>
                          <li><a target="_blank" href="https://www.facebook.com/Investors-state-1922442828026485/"><img src="image/facebook-512.png" width="30" height="30"/></a></li>
                          <li><a target="_blank" href="https://twitter.com/AdminInvestors"><img src="image/twitter-xxl.png" width="30" height="30"/></a></li>
                          <li><a target="_blank" href="https://www.instagram.com/investorsstate/"><img src="image/instagram-xxl.png" width="30" height="30"/></a></li>
                          </ul>
                  </div>
                  <div class="footer_logo col-lg-push-2 col-lg-4 col-xs-4">
                  <ul>
                          <li><a class="img-responsive" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a></li>
                      </ul>
                  </div>
                  <div class="copy_rights col-lg-push-2 col-lg-4 col-xs-push-2 col-xs-12">
                  <span>Company Registration Number : 10720834</span>
                  </div>
                  <div class="clearfix"></div>
                  
              </div>
          </div>
      </div>
<div id="doughnutChart" class="chart" style="z-index: 2;"></div>
<?php 
      include"files/footer.php"; ob_end_flush(); ?>