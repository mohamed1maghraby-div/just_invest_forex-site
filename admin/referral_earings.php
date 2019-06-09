<?php

$login_cookie = $_COOKIE['aname'];

if(empty($login_cookie) || $login_cookie !== 'moh555'){
    header("location: login.php");
}

?>
<?php include "files/header.php"; ?>
   <div class="container-fluid" style="height: 100%;">
      <div class="row" style="height: 100%;">
            <div class="dashboard col-lg-12">
                <div class="dashboard_border col-lg-push-1 col-lg-10">
                    <div class="dashbord_inner col-lg-push-1 col-lg-10">
                        <div class="ac_wi_ref">
                            <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">general referral</div>
   <!-- Table -->
  <table class="table">
      <tr>
          <th>id</th>
          <th>referral name</th>
          <th>main user</th>
          <th>date of register</th>
      </tr>
      <?php 
              $get_all_referral_users = "select * from customers where referral !=''";
              $run_all_referral_users = mysqli_query ($con, $get_all_referral_users);
              if(mysqli_num_rows($run_all_referral_users) > 0){
                  while ($row_all_referral_users = mysqli_fetch_array($run_all_referral_users)){
                  echo '<tr><th scope="row">'. $row_all_referral_users['u_id'] .'</th>
                        <td>'. $row_all_referral_users['referral'] .'</td>
                        <td>'. $row_all_referral_users['username'] .'</td>
                        <td>'. $row_all_referral_users['u_date_of_register'] .'</td>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
       <td>-</td>
       <td>-</td>
       <td>-</td>
        </tr>      
      <?php } ?>
  </table>
</div>
<div class="panel panel-default">
   <!-- Default panel contents -->
  <div class="panel-heading">referral earnings</div>
  <!-- Table -->
  <table class="table">
      <tr>
          <th>id</th>
          <th>referral name</th>
          <th>referral earings</th>
          <th>main user that deposit</th>
          <th>main price</th>
          <th>date of deposite</th>
      </tr>
      <?php 
              $get_all_users = "select * from deposits where referral !=''";
              $run_all_users = mysqli_query ($con, $get_all_users);
              if(mysqli_num_rows($run_all_users) > 0){
                  while ($row_all_users = mysqli_fetch_array($run_all_users)){
                      $id=$row_all_users['u_id'];
                      echo '<tr><th scope="row">'. $row_all_users['u_id'] .'</th>
                            <td>'. $row_all_users['referral'] .'</td>
                            <td>'. $row_all_users['referral_earning'] .'</td>
                            <td>'. $row_all_users['u_username'] .'</td>
                            <td>'. $row_all_users['u_main_price'] .'</td>
                            <td>'. $row_all_users['u_date_s'] .'</td>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
        </tr>
                    
      <?php } ?>
  </table>
</div>
                            
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">referral earning request</div>

  <!-- Table -->
  <table class="table">
      <tr>
          <th>id</th>
          <th>referral name</th>
          <th>referral earning request</th>
          <th>date</th>
      </tr>
      <?php 
              $get_all_users_request = "select * from referral_earings_request where admin_confirm = 's'";
              $run_all_users_request = mysqli_query ($con, $get_all_users_request);
              if(mysqli_num_rows($run_all_users_request) > 0){
                  while ($row_all_users_request = mysqli_fetch_array($run_all_users_request)){
                      echo '<tr><th scope="row">'. $row_all_users_request['id'] .'</th>
                            <td><a href="https://www.investorsstate.com/admin/referral_earings.php?numberbank='.$row_all_users_request['number_of_deposits'].'&id='.$row_all_users_request['id'] .'&user='. $row_all_users_request['referral_name'] .'">'. $row_all_users_request['referral_name'] .'</a></td>
                            <td>'. $row_all_users_request['referral_earning_request'] .'</td>
                            <td>'. $row_all_users_request['date_s'] .'</td>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
       <td>-</td>
       <td>-</td>
       <td>-</td>
        </tr>
                    
      <?php } ?>
  </table>
</div>

                        </div>
                    </div>
                </div>
            </div>
          
          <?php 
          $user = @$_GET['user'];
          $id_quake = @$_GET['id'];
          $numberbank = @$_GET['numberbank'];
          $get_quake_referral_request = "select * from referral_earings_request where referral_name = '$user'";
          $run_get_quake_referral_request = mysqli_query ($con, $get_quake_referral_request);
          $fetch_referral_request = mysqli_fetch_object($run_get_quake_referral_request);
          
          
          $admin_confirn = $_POST['admin_confirn'];
          if(isset($_POST['will_send'])){
           $edit_et = "UPDATE referral_earings_request SET 
           admin_confirm = '$admin_confirn' WHERE referral_name = '$user' and id = '$id_quake'";
            $run_edit_et = mysqli_query ($con, $edit_et);
              header("location: referral_earings.php");
          }
          ?>
          <div class="sidebar_overlay_pro"></div>
          <div class="generaly_user_info" id="<?php echo $fetch_referral_request->referral_name; ?>_show">
              <div class="col-lg-12 ">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(justinveste/../../image/referral-logo.jpg) no-repeat; background-size: cover;">
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true" style="z-index: 5;"></span>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                              user: <?php echo $fetch_referral_request->referral_name; ?><br/>
                              user earning :<?php echo $fetch_referral_request->referral_earning_request; ?>$<br/>
                          <?php echo $fetch_referral_request->date_s; ?>
                              <br/>
                              </div>
                          </div>
                          </div>
                        <div class="profile_body">
                          <span>username: <?php echo $fetch_referral_request->referral_name; ?></span><br/>
                            <span><?php echo $fetch_referral_request->date_s; ?></span><br/>
                            <form action="" method="post">
                                you will send mony : <input type="checkbox" name="admin_confirn" value="f"/><br/>
                                <input type="submit" name="will_send" value="will send" />
                            </form>
                          </div>
                          <div class="profile_footer">
                          <span>
                            Thank you for your trust in us. We trying hardly to be in good relationship with you to now more information you can visit </span><a href="#">about us</a>
                          </div>
                      </div>
                    </div> 
                </div>
        </div>
      </div>

<?php include "files/footer.php"; ?>