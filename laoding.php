<?php ob_start(); include"files/header.php"; 
include "inc/function.php"; ?>
  <body>
      <?php  $user_coo = $_COOKIE['user']; ?>
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

<div class="container-fluid">
          <div class="row">
              <div class="loading_page">
              <meta http-equiv="refresh" content="1; url='dashbord.php'" />
                  <div class="loading_page_img"></div>
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
                <span class="sidebar_text" style="font-size: 22px; bottom: -17px; font-family: gabriola;"><?php echo $user_coo; ?>/editprofile </span>
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
                  
if(isset($_POST['update'])){
    if($password === $confirm_password){
    if(empty($password) || empty($email) || empty($country) || empty($confirm_password) || empty($_FILES['file'])){
        echo '<script>alert("please complete the fields");</script>';
    }else{
        $edit_porfile = "UPDATE customers SET
        frist_name = '$frist_name',
        last_name = '$last_name',
        password = '$password',
        email = '$email',
        line_1 = '$line_1',
        line_2 = '$line_2',
        city = '$city',
        country = '$country',
        company = '$company',
        state = '$state',
        postcode = '$postcode' WHERE username = '$user_coo' ";
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
                      <input type="text" name="frist_name" value="<?php echo $fetch_show_user_data->frist_name; ?>" placeholder="first name"/>
                      <input type="text" name="last_name" value="<?php echo $fetch_show_user_data->last_name; ?>" placeholder="last name"/>
                      <div class="custom-file">
                         <span>upload image:</span> 
                        <input type="file" name="file" />
                      </div>
                      <input type="text" name="company" value="<?php echo $fetch_show_user_data->company; ?>" placeholder="your company"/>
                      <input type="text" name="email" value="<?php echo $fetch_show_user_data->email; ?>" placeholder="email"/>
                      <input type="text" name="password" value="<?php echo $fetch_show_user_data->password; ?>" placeholder="change password"/>
                      <input type="text" name="confirm_password" value="<?php echo $fetch_show_user_data->password; ?>" placeholder="confirm change password"/>
                  </div>
                  <div class="col-lg-4">
                      <input type="text" name="line_1" value="<?php echo $fetch_show_user_data->line_1; ?>" placeholder="address line 1"/>
                      <input type="text" name="line_2" value="<?php echo $fetch_show_user_data->line_2; ?>" placeholder="address line 2"/>
                      <input type="text" name="city" value="<?php echo $fetch_show_user_data->city; ?>" placeholder="city"/>
                      <input type="text" name="state" value="<?php echo $fetch_show_user_data->state; ?>" placeholder="state"/>
                      <input type="text" name="postcode" value="<?php echo $fetch_show_user_data->postcode; ?>" placeholder="post code"/>
                      <input type="text" name="country" value="<?php echo $fetch_show_user_data->country; ?>" placeholder="country"/>
                      <input type="submit" name="update" value="Update" />
                    </div>
                  <div class="col-lg-4">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(image/user_img/<?php echo $fetch_show_user_data->img_src ?>) no-repeat; background-size: cover;">
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                              <?php echo $fetch_show_user_data->frist_name . " " . $fetch_show_user_data->last_name; ?><br/>
                              <?php echo $fetch_show_user_data->company; ?>
                              </div>
                              <div class="col-lg-3" style="font-size: 10px; position: relative; top: 160px; right: 5px;">
                                <span>ACTIVE<hr/>$<?php echo $active_invest; ?></span>
                                  <span>WITHDRAW<hr/>$<?php echo $withdraw; ?></span>
                                  <span>REF<hr/>$<?php echo $refrerral; ?></span>
                              </div>
                          </div>
                          </div>
                        <div class="profile_body">
                          <span><?php echo $fetch_show_user_data->email; ?></span><br/>
                            <span><?php echo $fetch_show_user_data->line_1; ?>,</span><br/>
                             <span><?php echo $fetch_show_user_data->line_2; ?>,</span><br/>
                            <span><?php echo $fetch_show_user_data->city; ?>,</span><br/>
                            <span><?php echo $fetch_show_user_data->country; ?>.</span>
                          </div>
                          <div class="profile_footer">
                          <span>
Thank you for your trust in us. We trying hardly to be in good relationship with you to now more information you can visit </span><a href="#">about us</a>
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
<?php 
      include"files/footer.php"; ob_end_flush(); ?>