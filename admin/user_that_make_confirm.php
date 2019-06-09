<?php

$login_cookie = $_COOKIE['aname'];

if(empty($login_cookie) || $login_cookie !== 'moh555'){
    header("location: login.php");
}

?>
<?php include "files/header.php"; ?>
   <div class="container-fluid" style="height: 100%;">
      <div class="row" style="height: 100%;">
            <div class="dashboard col-lg-18">
                <div class="dashboard_border col-md-push-1 col-lg-18 " style="margin-right:50px;">
                    <div class="dashbord_inner  col-lg-18 ">
                        <div class="ac_wi_ref">
                            <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">All user</div>

  <!-- Table -->
  <table class="table">
      <tr>
          <th>id</th>
          <th>username</th>
          <th>bank type</th>
          <th>amount($)</th>
          <th>email</th>
          <th>email of bank</th>
          <th>username of bank</th>
          <th>wallet</th>
          <th>transction id</th>
      </tr>
      <?php 
              $get_all_users_confirm = "select * from payment_check";
              $run_all_users_confirm = mysqli_query ($con, $get_all_users_confirm);
              if(mysqli_num_rows($run_all_users_confirm) > 0){
                  while ($row_all_users_confirm = mysqli_fetch_array($run_all_users_confirm)){
                      echo '<tr><th scope="row">'. $row_all_users_confirm['id'] .'</th>
                            <td>'. $row_all_users_confirm['username'] .'</td>
                            <td>'. $row_all_users_confirm['bank_type'] .'</td>
                            <td>'. $row_all_users_confirm['amount'] .'</td>
                            <td>'. $row_all_users_confirm['email'] .'</td>
                            <td>'. $row_all_users_confirm['email_of_bank'] .'</td>
                            <td>'. $row_all_users_confirm['username_of_bank'] .'</td>
                            <td>'. $row_all_users_confirm['walit'] .'</td>
                            <td>'. $row_all_users_confirm['transction_id'] .'</td>';
                  }
              }else{?>
       <tr>
       <th scope="row">-</th>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
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
                          
        </div>
      </div>

<?php include "files/footer.php"; ?>