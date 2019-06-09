<?php ob_start(); include"files/header.php"; 
include "inc/function.php"; ?>

  <body>
      <?php  $user_coo = $_COOKIE['user']; 
      if(empty($user_coo)){
    header('Location: https://www.investorsstate.com');
}

?>
      <?php
          $amount = @$_POST['amount'];
          $username = @$_POST['username'];
          $bank_type = @$_POST['bank_type'];
          $email = @$_POST['email'];
          $email_of_bank = @$_POST['email_of_bank'];
          $username_of_bank = @$_POST['username_of_bank'];
          $your_wallet = @$_POST['your_wallet'];
          $transaction_id = @$_POST['transaction_id'];
      if(isset($_POST['confirm'])){
          
          
        $insert_confirm_data = "insert into payment_check(amount,username,bank_type,email,email_of_bank,username_of_bank,walit,transction_id) values('$amount','$username','$bank_type','$email','$email_of_bank','$username_of_bank','$your_wallet','$transaction_id')";
        $run_confirm_data = mysqli_query($con, $insert_confirm_data);
        if(isset($run_confirm_data)){
            echo '<script>alert("your confirmation under process right now is take from 2 to 8 hours");</script>';
        }
            header( "refresh:0;url=dashbord.php" );
        
    
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

      
   <div class="container-fluid">
      <div class="row">
            <div class="dashboard col-lg-12">
                <div class="dashboard_border col-lg-push-1 col-lg-10">
                    <div class="dashbord_inner col-lg-push-1 col-lg-10">
                    <!-- betcion -->
    <?php $number_of_deposits = @$_GET['banktype']; 
        if($number_of_deposits === 'betcion'){?>
            <div class="dashboard_h1 col-lg-12 animated bounceInLeft">Deposit Information</div>
<div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
            <div class="" style="color: #ff7f01; font-size: 19px;">
                <img src="image/betcion.png" width="300" height="100" /><br/>
         <form action="https://www.investorsstate.com/next_step.php" method="get">
             <input type="number" name="amount" placeholder="amount($)" />
    <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
            <input type="hidden" name="hay_2" value="hay_2" />
         <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
         <input type="submit" name="confirm" value="confirm" />
        </form>
                </div>
                                </div>
                            </div>  
                            <?php } ?>
  <?php $hay_2 = @$_GET['hay_2'];
   if($hay_2 === 'hay_2'){?>
 <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
   <div class="ac_wi_ref animated zoomIn"> 
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        
<form action="https://www.coinpayments.net/index.php" method="post">
	<input type="hidden" name="cmd" value="_pay_simple"/>
	<input type="hidden" name="reset" value="1"/>
	<input type="hidden" name="merchant" value="640a7f2820c14a30458ec089a1cf5925">
	<input type="hidden" name="item_name" value="just investe"/>
	<input type="hidden" name="currency" value="USD"/>
	<input type="text" name="amountf" value="" placeholder="amount($)"/><BR>
	<input type="hidden" name="want_shipping" value="0"/>
	<input type="hidden" name="success_url" value="https://www.investorsstate.com/dashbord.php"/>
	<input type="hidden" name="cancel_url" value="https://www.investorsstate.com/invest.php"/>
	<input type="hidden" name="ipn_url" value="admin@justinveste.com"/>
	<input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png" alt="Buy Now with CoinPayments.net"/>
</form>     
        <?php            $q_amount = @$_GET['amount'];
                      $q_bank_type = @$_GET['bank_type'];
                          $quake_confirm2 = @$_GET['confirm'];
                      if($quake_confirm2 === 'confirm'){
        $insert_confirm_data_a = "insert into payment_check(amount,username,bank_type) values('$q_amount','$user_coo','$q_bank_type')";
        $run_confirm_data_a = mysqli_query($con, $insert_confirm_data_a);
           }
                   
        ?>
        
        </div>
        </div>
     
                    <!-- neteller -->
    <?php    }if($number_of_deposits === 'neteller'){?>
              <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
<div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        please send your funds to this email address
            <div class="" style="color: #83ba3b; font-size: 19px;">
                <img src="image/neteller.png" width="300" height="100" style="padding-top:10px;"/><br/>
        <p style="padding-left:5px; padding-top:15px;">admin@justinveste.com</p>
        </div>
        </div>
    </div>
    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
                        <div class="ac_wi_ref animated zoomIn">
                           <p style="font-size: 28px; font-weight: 600;">After That You Must Enter Your Data Here</p>
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
     <form action="" method="post">
    <input type="number" name="amount" placeholder="amount($)" />
    <input type="email" name="email_of_bank" placeholder="email address of neteller" />
    <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
    <input type="hidden" name="username" value="<?php echo $user_coo; ?>"/>
    <input type="submit" name="confirm" value="confirm" />
        </form>
        
        </div>
        </div>
                        <!-- skrill -->
        <?php }if($number_of_deposits === 'skrill'){?>   
                        <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
<div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        please send your funds to this email address
            <div class="" style="color: #871d66; font-size: 22px;">
                <img src="image/skrill.png" width="300" height="100" style="padding-top:10px;"/><br/>
        <p style="padding-left:5px; padding-top:15px;">admin@justinveste.com</p>
        </div>
        </div>
    </div>
    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
                        <div class="ac_wi_ref animated zoomIn">
                           <p style="font-size: 28px; font-weight: 600;">After That You Must Enter Your Data Here</p>
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
      <form action="" method="post">
    <input type="number" name="amount" placeholder="amount($)" />
    <input type="email" name="email_of_bank" placeholder="email address of skrill" />
     <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
     <input type="hidden" name="username" value="<?php echo $user_coo; ?>"/>
    <input type="submit" name="confirm" value="confirm" />
        </form>
        </div>
        </div>      <!-- payeer -->
                        <?php }if($number_of_deposits === 'payeer'){?>
                        <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
                        <div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
                            <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
                                please send your funds to this email address
                                    <div class="" style="color: #2997d8; font-size: 19px;">
                                        <img src="image/payeer.png" width="300" height="100" style="padding-top:10px;"/><br/>
                                <p style="padding-left:5px; padding-top:15px;">P62471467</p>

                                </div>
                                </div>
                            </div>
                        <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
                        <div class="ac_wi_ref animated zoomIn">
                           <p style="font-size: 28px; font-weight: 600;">After That You Must Enter Your Data Here</p>
        <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
             <form action="" method="post">
    <input type="number" name="amount" placeholder="amount($)" />
    <input type="hidden" name="username" value="<?php echo $user_coo; ?>"/>
    <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
   
    <input type="text" name="your_wallet" placeholder="your wallet (P62471467)" />
    
    <input type="submit" name="confirm" value="confirm" />
        </form>
            
        </div>
        </div>
                            <!-- perfetmoney -->
                        <?php }if($number_of_deposits === 'perfetmoney'){ ?>
                        <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
                        <div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
                            <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
                        <div class="" style="color: #f00f0f; font-size: 19px;">
                            <img src="image/perfectmoney.png" width="300" height="100" style="padding-top:10px;"/><br/>
        <form action="https://www.investorsstate.com/next_step.php" method="get">
            <input type="text" name="email_of_bank" placeholder="your wallet(u14658191)" />
            <input type="hidden" name="hay_1" value="hay_1" />
         <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
         <input type="submit" name="confirm" value="confirm" />
        </form>
                                </div>
                                </div>
                            </div>  
                            <?php } ?>
  <?php $hay_1 = @$_GET['hay_1'];
   if($hay_1 === 'hay_1'){?>
 <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
   <div class="ac_wi_ref animated zoomIn"> 
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        
  <form action="https://perfectmoney.is/api/step1.asp" method="POST">
<input type="hidden" name="PAYEE_ACCOUNT" value="E14658191">
<input type="hidden" name="PAYEE_NAME" value="just investe">
<input type="hidden" name="PAYMENT_ID" value="payment">
<input type="text" name="PAYMENT_AMOUNT" value="" placeholder="amount($)"><BR>
<input type="hidden" name="PAYMENT_UNITS" value="EUR">
<input type="hidden" name="STATUS_URL" value="admin@infintyincome.com">
<input type="hidden" name="PAYMENT_URL" value="https://www.investorsstate.com/dashbord.php">
<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="NOPAYMENT_URL" value="https://www.investorsstate.com/invest.php">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="SUGGESTED_MEMO" value="">
<input type="hidden" name="BAGGAGE_FIELDS" value="">
<input type="submit" name="PAYMENT_METHOD" value="make deposit">
</form>
        
      <?php            $quake_bank_type = @$_GET['bank_type']; 
                      $quake_confirm = @$_GET['confirm'];
                      $quake_email_of_bank = @$_GET['email_of_bank'];
                      if($quake_confirm === 'confirm'){
        $insert_confirm_data = "insert into payment_check(amount,username,bank_type,email,email_of_bank,username_of_bank,walit,transction_id) values('$amount','$user_coo','$quake_bank_type','$email','$quake_email_of_bank','$username_of_bank','$your_wallet','$transaction_id')";
        $run_confirm_data = mysqli_query($con, $insert_confirm_data);
           }
        ?>
        
        </div>
        </div>
     <?php   } ?>
                            <!-- paypal -->
                        <?php if($number_of_deposits === 'paypal'){ ?>
                            
                              <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
<div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        
            <div class="" style="color: #2997d8; font-size: 19px;">
                <img src="image/paypal-logo-png.png" width="300" height="100" style="padding-top:10px;"/><br/>
                
     <form action="https://www.investorsstate.com/next_step.php" method="get">
            <input type="email" name="email_of_bank" placeholder="email of bank" />
            <input type="hidden" name="hay" value="hay" />
         <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
         <input type="submit" name="confirm" value="confirm" />
        </form>
                
        </div>
        </div>
    </div>
    

        
                        <?php }?>
  <?php $hay = @$_GET['hay'];
   if($hay === 'hay'){?>
 <div class="dashboard_h1 col-lg-12 animated bounceInLeft"></div>
   <div class="ac_wi_ref animated zoomIn"> 
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
       <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="UWDMWAFSZQ2NN">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/ar_EG/i/scr/pixel.gif" width="1" height="1">
        </form>
      <?php            $quake_bank_type = @$_GET['bank_type']; 
                      $quake_confirm = @$_GET['confirm'];
                      $quake_email_of_bank = @$_GET['email_of_bank'];
                      if($quake_confirm === 'confirm'){
        $insert_confirm_data = "insert into payment_check(amount,username,bank_type,email,email_of_bank,username_of_bank,walit,transction_id) values('$amount','$user_coo','$quake_bank_type','$email','$quake_email_of_bank','$username_of_bank','$your_wallet','$transaction_id')";
        $run_confirm_data = mysqli_query($con, $insert_confirm_data);
           }
        ?>
        
        </div>
        </div>
     <?php   } ?>
                            
                            <?php if($number_of_deposits === 'adv'){ ?>
                         <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Information</h1></div>
<div class="ac_wi_ref animated zoomIn" style="position: relative; z-index: 1;">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        please send your funds to this wallet
            <div class="" style="color: #00ae6b; font-size: 19px;">
                <img src="image/adv.png" width="300" height="100" style="padding-top:10px;"/><br/>
        <p style="padding-left:5px; padding-top:15px;">E 5872 0726 0118</p>
        </div>
        </div>
    </div>
    <div class="dashboard_h1 col-lg-12 animated bounceInLeft"><h1 style="font-family: gabriola; font-size: 19px; margin-bottom: -6px;">Deposit Confirmation</h1></div>
                        <div class="ac_wi_ref animated zoomIn">
                           <p style="font-size: 28px; font-weight: 600;">After That You Must Enter Your Data Here</p>
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
            <form action="" method="post">
    <input type="number" name="amount" placeholder="amount($)" />
    <input type="hidden" name="username" value="<?php echo $user_coo; ?>"/>
    <input type="hidden" name="bank_type" value="<?php echo $number_of_deposits; ?>"/>
    <input type="email" name="email_of_bank" placeholder="email address of advcash" />
    <input type="text" name="your_wallet" placeholder="your wallet (U 5872 0726 0118)" />
    <input type="text" name="transaction_id" placeholder="*transaction id (very important)" />
    <input type="submit" name="confirm" value="confirm" />
        </form>
        </div>
        </div>
                        <?php } ?>
                        <!--

              <div class="dashboard_h1 col-lg-12"><h1>Deposit Information</h1></div>
<div class="ac_wi_ref">
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
        please send your funds to this email address
            <div class="" style="color: #83ba3b; font-size: 19px;">
                <img src="image/neteller.png" width="300" height="100" style="padding-top:10px;"/><br/>
        <p style="padding-left:5px; padding-top:15px;">admin@justinveste.com</p>
        </div>
        </div>
    </div>
    <div class="dashboard_h1 col-lg-12"><h1>Deposit Confirmation</h1></div>
                        <div class="ac_wi_ref">
                           <p style="font-size: 28px; font-weight: 600;">after that you must enter your data here</p>
    <div class="col-lg-12" style="padding: 0;  margin-top: 10px; margin-bottom: 10px;">
     

        </div>
        </div>

-->
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
      <div class="clearfix"></div>
      <div class="container-fluid">
          <div class="row">
              <div class="dashboard_footer col-lg-12" style=" height: 200px; position: relative; top: 300px; width: 100%;">
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