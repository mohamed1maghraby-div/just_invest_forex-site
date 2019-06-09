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
                  <ul>
                      <li style="    position: relative;
    top: 0px;"><a class="logo" href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a></li>
                      <li><a href="about_us.php" style="font-size: 19px;">About us</a></li>
                      <li><a href="faq.php" style="font-size: 19px;">FAQ</a></li>
                      <li><a href="contact.php" style="font-size: 19px;">Conact us</a></li>
                      </ul>
                      </div>
                      <?php
                      if(isset($_POST['logout'])){
                          setcookie("user","",time()+60*60*24);
                          setcookie("login","",time()+60*60*24);
                          header('Location: https://www.investorsstate.com');
                      }
                      if(isset($_POST['myaccount'])){
                          header('Location: https://www.investorsstate.com/dashbord.php');
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

      
   <div class="container-fluid" style="height: 100%;">
      <div class="row" style="height: 100%;">
            <div class="dashboard col-lg-12">
                <div class="dashboard_border col-lg-push-1 col-lg-10">
                    <div class="dashbord_inner col-lg-push-1 col-lg-10">
                        <div class="dashboard_h1 col-lg-12"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">CHOOSE purchase</h1></div>
                        <div class="ac_wi_ref">
                            <div class="col-lg-12" style="margin-top: 10px;">
                                <form action="https://www.investorsstate.com/amount_ckeck.php" method="get">
                                  <?php 
              $chocie_dep = "select * from deposits where u_username = '$user_coo'";
              $run_chocie_dep = mysqli_query ($con, $chocie_dep);
              if(mysqli_num_rows($run_chocie_dep) >= 1){
                  $x = 1;
                   echo '<div class="invest_margen">
                          <select name="number_of_deposits" class="form-control input-lg" required>
                          <option value="">Choose Date Of Deposit</option>';
                  while ($row_chocie_dep = mysqli_fetch_array($run_chocie_dep)){
                      echo '<option value="'.$x++.'">'.$row_chocie_dep['u_date_s'].'</option>';
                  } 
                  echo '</select>
                          </div>
                          <input type="submit" name="withdrawal" value="withdrawal" style="margin-top:20px;"/>';
              }else{?>
                  <h1 style="font-size: 33px;">You Don't Have Any Earnings To Request Withdraw !</h1>  
                                        <?php } ?>
                                </form>
                            </div>
                            
                        </div>
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
      <div class="container-fluid">
          <div class="row">
              <?php
               $get_message = "select * from adminmessages where username='$user_coo'";
              $run_message = mysqli_query ($con, $get_message);
              $number_of_message = mysqli_num_rows($run_message);
              ?>
                <div class="sidebar_overlay_pro col-lg-12"></div>
                     <div class="generaly_user_info" >
                      <div class="message_box col-lg-3"  style="display: none;">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(image/user_img/<?php echo $fetch_show_user_data->img_src ?>) no-repeat; background-size: cover;">
                          <div class=""><?php echo $number_of_message; ?></div>
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true"></span>
                      <form  action="" method="post">
                      <input type="submit" style="opacity: 0;" value="" name="heddinthemessage'.$submit_id_num.'" />
                      </form>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                          
                              <br/>
                              
                              </div>
                          </div>
                          </div>
                        <div class="profile_body" id="profile_body" style="height: 115px; overflow-y: scroll;">
                            <button onclick="book_suggestion()"></button>
                            </div>
                          <div class="profile_footer" style="height: 115px;">
                          <form method="post">
                          <textarea name="message_content" value="" placeholder="say something" cols="35" rows="2"></textarea>
                            <input type="submit" value="send" name="send_'.$submit_id_num.'" />
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
              <div class="dashboard_footer col-lg-12" style="top: 0;">
                  <div class="footer_menu_link col-lg-push-4 col-lg-4">
                      <ul>
                          <li><a href="#">About US</a></li>
                          <li><a href="#">FAQ</a></li>
                          <li><a href="#">Contact US</a></li>
                          </ul>
                      </div>
                  <div class="col-lg-push-4 col-lg-4">
                        <script language="JavaScript" type="text/javascript">
    TrustLogo("https://www.investorsstate.com/image/18308747_1140658082747439_287284508_n.png", "CL1", "none");
        </script>
                  </div>
                  <div class="clearfix"></div>
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
                          <li><a href="https://www.investorsstate.com"><img src="image/logo.PNG" width="200" height="80"/></a></li>
                      </ul>
                  </div>
                  <div class="copy_rights col-lg-push-2 col-lg-4">
                  <span>Company Registration Number : 10720834</span>
                  </div>
              </div>
          </div>
      </div>

<?php  include"files/footer.php"; ob_end_flush(); ?>