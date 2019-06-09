<div class="clearfix"></div>
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
              $name_of_username = @$_POST['username'];
              $walet_equlation = "select * from customers where username = '$name_of_username'";
              $run_walet_equlation = mysqli_query ($con, $walet_equlation);
              $fetch_walet_equlation = mysqli_fetch_object($run_walet_equlation);
              
              $deposits_data = "select * from deposits where u_username = '$fetch_walet_equlation->username'";
              $run_deposits_data = mysqli_query ($con, $deposits_data);
              if(mysqli_num_rows($run_deposits_data) > 0){
                  $numberofdeposit = mysqli_num_rows($run_deposits_data);
              }
              $fetch_deposits_data = mysqli_fetch_object($run_deposits_data);
              
              
              // values
              $number_of_deposite = @$_POST['number_of_deposite'];
              $number_of_bunes = @$_POST['number_of_bunes'];
              $active_invest = @$_POST['number_of_bunes'] + @$_POST['number_of_deposite'];
              date_default_timezone_set("America/New_York");
              $date_of_deposite = date("Y-m-d");
              $u_bank_type = @$_POST['name_of_bank'];
              $numer_of_deposits = $numberofdeposit + 1;
              $numbers_of_send = '0';
              $total_earing = '0';
              $weekly_earings = '0';
              $a_conferm = 'f';
              $referral = $fetch_walet_equlation->referral;
              $referral_earning = @$_POST['number_of_deposite'] * 5 / 100 ;
              $u_username = $fetch_walet_equlation->username;
              if(isset($_POST['insert'])){
                  if(empty($u_username) || empty($number_of_deposite) || empty($numer_of_deposits) ){
                       echo '<script>alert("number of wallet is not right");</script>';
                  }else{
                      
                    $insert_w = "insert into deposits(referral,referral_earning,u_username,	bunes,u_main_price,active_invest,u_date_s,u_bank_type,numbers_of_send,number_of_deposits,total_earing,weekly_earings) values('$referral','$referral_earning','$u_username','$number_of_bunes','$number_of_deposite','$active_invest','$date_of_deposite','$u_bank_type','$numbers_of_send','$numer_of_deposits','$total_earing','$weekly_earings')";
                    $run_w = mysqli_query($con, $insert_w);  
                      
                   $insert_hestory = "insert into history_last_deposit(username,last_deposit,u_date) values('$u_username','$number_of_deposite','$date_of_deposite')";
                     $run_insert_hestory = mysqli_query($con, $insert_hestory);   
                      
                      
                  }
              }
              ?>
              <div class="sidebar_body edit_profile col-lg-12">
       <form action="" method="post">
            <input type="text" name="username" placeholder="username"/>
            <input type="text" name="number_of_deposite" placeholder="amount($)"/>
            <input type="text" name="number_of_bunes" placeholder="number of bunes"/>
            <select name="name_of_bank" class="form-control" style="background: #414141; border: 1px solid #414141; border-radius: 0; width: 90%; margin-top: 10px; margin-bottom: 10px; padding: 10px 12px; height: 50px;">
                <option value="betcion" >betcion</option>
                <option value="neteller" >neteller</option>
                <option value="skrill" >skrill</option>
                <option value="payeer" >payeer</option>
                <option value="perfetmoney" >perfetmoney</option>
                <option value="payza" >payza</option>
                <option value="paypal" >paypal</option>
                <option value="advcash" >advcash</option>
           </select>
            <input type="submit" name="insert" value="insert" />
        </form>
                  </div>
              </div>
          </div>
      </div>
<div class="clearfix"></div>
<div class="container-fluid" style="height: 100%;">
  <div class="row" style="height: 100%;">
      <div class="sidebar_overlay_pro_1"></div>
      <div class="col-lg-12" style="height: 100%;">
          <div class="admin_side_bar" >
            <div class="admin_side_bar_menu">
                <div class="admin_menu_word">Menu</div>
              </div>
          </div>
          <div class="admin_main_menu">
            <?php include "sidebar.php"; ?>
          </div>
      </div>
    </div>
</div>
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
      <script src="js/js.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>