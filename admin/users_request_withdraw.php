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
          <th>amount withdraw</th>
          <th>number of deposits</th>
          <th>confirm</th>
      </tr>
      <?php 
              $get_all_users = "select * from pendingwithdrawals where a_conferm = 'f'";
              $run_all_users = mysqli_query ($con, $get_all_users);
              if(mysqli_num_rows($run_all_users) > 0){
                  $submit_id = 0;
                  while ($row_all_users = mysqli_fetch_array($run_all_users)){
                      $real_username = $row_all_users['u_username'];
                      $real_id = $row_all_users['u_id'];
                      $real_amount = $row_all_users['weekly_earings'];
                      date_default_timezone_set("America/New_York");
                    $u_date = date("Y-m-d");
                        $submit_id++;
                        $succes = @$_POST['succes'.$submit_id]; 
                      
                      
              if(isset($_POST['update'.$submit_id])){
                    header("Refresh:0;");
                  
                   $edit_cus = "UPDATE pendingwithdrawals SET a_conferm = '$succes' WHERE u_username = '$real_username' and u_id = '$real_id'";
                    $run_edit_cus = mysqli_query ($con, $edit_cus);
                  
                  $insert_history_last_payment = "insert into history_last_payment(username,last_payment_weekly,u_date) values('$real_username','$real_amount','$u_date')";
                  $run_history_last_payment = mysqli_query ($con, $insert_history_last_payment);
                  
                  $get_history_withdrew = "select * from history_withdrew where username = '$real_username'";
              $run_history_withdrew = mysqli_query ($con, $get_history_withdrew);
                  
              if(mysqli_num_rows($run_history_withdrew) > 0){
                  $fetch_history_withdrew = mysqli_fetch_object($run_history_withdrew);
                  $update_withdrew_total = $fetch_history_withdrew->withdrew_total + $real_amount;
                  $update_history_withdrew = "UPDATE history_withdrew SET withdrew_total = '$update_withdrew_total' WHERE username = '$real_username'";
                    $run_update_history_withdrew = mysqli_query ($con, $update_history_withdrew);
              }else{
                  $insert_withdrew_total = "insert into history_withdrew(username,withdrew_total,u_date) values('$real_username','$real_amount','$u_date')";
                  $run_insert_withdrew_total = mysqli_query ($con, $insert_withdrew_total);
              }
                  
                  
            }
                      echo '<tr><th scope="row">'. $row_all_users['u_id'] .'</th>
                            <td>'. $row_all_users['u_username'] .'</td>
                            <td>'. $row_all_users['weekly_earings'] .'</td>
                            <td>'. $row_all_users['number_of_deposits'] .'</td>
                            <td><form action="" method="post">
                                <input type="checkbox" value="s" name="succes'.$submit_id.'" />
                                <input type="submit" name="update'.$submit_id.'" value="update" />
                            </form></td></tr>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
       <td>-</td>
       <td>-</td>
        </tr>
                    
      <?php }       ?>
  </table>
</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

<?php include "files/footer.php"; ?>