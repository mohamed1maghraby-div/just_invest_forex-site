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
  <div class="panel-heading">All user</div>

  <!-- Table -->
  <table class="table">
      <tr>
          <th>id</th>
          <th>username</th>
          <th>deposite</th>
          <th>bank type</th>
          <th>date of deposite</th>
          <th>total balance</th>
          <th>earnings</th>
      </tr>
      <?php 
              $get_all_users = "select * from deposits";
              $run_all_users = mysqli_query ($con, $get_all_users);
              if(mysqli_num_rows($run_all_users) > 0){
                  while ($row_all_users = mysqli_fetch_array($run_all_users)){
                      $id=$row_all_users['u_id'];
                      echo '<tr><th scope="row">'. $row_all_users['u_id'] .'</th>
                            <td><a href="https://www.investorsstate.com/admin/user_that_deposite_money.php?numberbank='.$row_all_users['number_of_deposits'].'&user='. $row_all_users['u_username'] .'">'. $row_all_users['u_username'] .'</a></td>
                            <td>'. $row_all_users['active_invest'] .'</td>
                            <td>'. $row_all_users['u_bank_type'] .'</td>
                            <td>'. $row_all_users['u_date_s'] .'</td>
                            <td>'. $row_all_users['weekly_earings'] .'</td>
                            <td>'. $row_all_users['total_earing'] .'</td></tr>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
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
          $numberbank = @$_GET['numberbank'];
          $get_deposits = "select * from deposits where u_username = '$user' and number_of_deposits = '$numberbank'";
              $run_get_doposits = mysqli_query ($con, $get_deposits);
              $fetch = mysqli_fetch_object($run_get_doposits);
          
          $quake_numer_of_deposits = $fetch->number_of_deposits;
          $total_earing = $fetch->total_earing + $_POST['weeklyearing'];
          $numberofdeposit = $_POST['numberofdeposit'];
          $weeklyearing = $_POST['weeklyearing'];
          if(isset($_POST['update'])){
              header("Refresh:0;");
           $edit_cus = "UPDATE deposits SET 
           weekly_earings = '$weeklyearing',
           numbers_of_send = '$numberofdeposit',
           total_earing= '$total_earing' WHERE u_username = '$user' and number_of_deposits = '$quake_numer_of_deposits'";
            $run_edit_cus = mysqli_query ($con, $edit_cus);
          }
          ?>
          <div class="sidebar_overlay_pro"></div>
          <div class="generaly_user_info" id="<?php echo $fetch->u_username; ?>_show">
              <div class="col-lg-12 ">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(justinveste/../../image/diagram_bank.JPG) no-repeat; background-size: cover;">
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true"></span>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                              <?php echo $fetch->active_invest; ?>
                          <?php echo $fetch->u_bank_type; ?>
                              <br/>
                              </div>
                          </div>
                          </div>
                        <div class="profile_body">
                          <span>username: <?php echo $fetch->u_username; ?></span><br/>
                            <span><?php echo $fetch->u_date_s; ?></span><br/>
                            <form action="" method="post">
                                <input type="text" name="numberofdeposit" value="<?php echo $fetch->numbers_of_send; ?>"/><br/>
                                <span><?php echo $fetch->total_earing; ?></span><br/>
                                <input type="text" name="weeklyearing" value="<?php echo $fetch->weekly_earings; ?>"/>
                                <input type="submit" name="update" value="update" />
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