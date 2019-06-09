<?php

$login_cookie = $_COOKIE['aname'];

if(empty($login_cookie) || $login_cookie !== 'moh555'){
    header("location: login.php");
}




?>
<?php include "files/header.php"; 
$deposit_deal_end = "select * from deposits";
          $run_deposit_deal_end = mysqli_query ($con, $deposit_deal_end);
        if(mysqli_num_rows($run_deposit_deal_end) > 0){
              while ($row_deposit_deal_end = mysqli_fetch_array($run_deposit_deal_end)){
                  $quake_id = $row_deposit_deal_end['u_id'];
                  date_default_timezone_set("America/New_York");
                  $medo_1 = date("Y-m-d");
                  $medo_2 = $row_deposit_deal_end['u_date_s'];
                  $date1=date_create($medo_2);
                  $date2=date_create($medo_1);
                  $diff=date_diff($date1,$date2);
                  echo $diff->format("%a");
                  $asdd = $diff->format("%a");
$update_user_deposite = "UPDATE deposits SET dealy_date = '$asdd' WHERE u_id = '$quake_id'";
$run_user_deposite = mysqli_query ($con, $update_user_deposite);
                  if($asdd >= 61){
                      echo 'medo';
$delet_user_deposite = "DELETE FROM deposits WHERE u_id = '$quake_id'";
$run_delet_user_deposite = mysqli_query ($con, $delet_user_deposite);
                  }
              }
        }?>
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
          <th>date of rigister</th>
          <th>messgae</th>
      </tr>
      <?php 
              $get_all_users = "select * from customers";
              $run_all_users = mysqli_query ($con, $get_all_users);
              if(mysqli_num_rows($run_all_users) > 0){
                  $submit_id_num = 0;
                  while ($row_all_users = mysqli_fetch_array($run_all_users)){
                      echo '<tr><th scope="row">'. $row_all_users['id'] .'</th>
                            <td><a id="'. $row_all_users['username'] .'">'. $row_all_users['username'] .'</a></td>
                            <td>'. $row_all_users['u_date_of_register'] .'</td>
                            <div class="sidebar_overlay_pro"></div>
                            <div class="generaly_user_info" id="'. $row_all_users['username'] .'_show">
                            
                              <div class="col-lg-12">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(just_inverst/../../image/user_img/'.$row_all_users['img_src'].') no-repeat; background-size: cover;">
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true"></span>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 185px; left: 10px;">
                          '. $row_all_users['frist_name'] .' '. $row_all_users['last_name'] .'
                              <br/>
                              '. $row_all_users['company'] .'
                              </div>
                          </div>
                          </div>
                        <div class="profile_body">
                          <span>'. $row_all_users['email'] .'</span><br/>
                            <span>username: '. $row_all_users['username'] .'</span><br/>
                            <span>password: '. $row_all_users['password'] .'</span><br/>
                            <span>'. $row_all_users['line_1'] .',</span><br/>
                             <span>'. $row_all_users['line_2'] .',</span><br/>
                            <span>'. $row_all_users['city'] .',</span><br/>
                            <span>'. $row_all_users['country'] .'.</span>
                          </div>
                          <div class="profile_footer">
                          <span>
                            Thank you for your trust in us. We trying hardly to be in good relationship with you to now more information you can visit </span><a href="#">about us</a>
                          </div>
                      </div>
                    </div>
                          </div>';
                      $quake_user = $row_all_users['username'];
                       $get_message = "select * from adminmessages where username='$quake_user' and admin_delet = 's'";
                        $run_message = mysqli_query ($con, $get_message);
                      
                      $get_message_re = "select * from adminmessages where username='$quake_user'";
                      $run_message_re = mysqli_query ($con, $get_message_re);
                      
                      $get_message_ad = "select * from user_messages where username='$quake_user'";
                      $run_message_ad = mysqli_query ($con, $get_message_ad);
                      
                      $number_of_message = mysqli_num_rows($run_message);
                      echo '<td><a id="'. $row_all_users['username'] .'_message">'. $number_of_message .'</a></td></tr>';
                  $submit_id_num++;
                  if(isset($_POST['heddinthemessage'.$submit_id_num])){
                      $message_seen = "UPDATE adminmessages SET admin_delet = 'f' WHERE username = '$quake_user'";
                      $run_message_seen = mysqli_query ($con, $message_seen);
                      header('Location: https://www.investorsstate.com/admin/index.php');
                  }
                      echo '<div class="sidebar_overlay_pro"></div>
                            <div class="generaly_user_info" id="'. $row_all_users['username'] .'_message_show">
                            
                              <div class="col-lg-12">
                      <div class="profile_display">
                      <div class="profile_img" style="background: url(just_inverst/../../image/user_img/'.$row_all_users['img_src'].') no-repeat; background-size: cover;">
                      <span class="glyphicon glyphicon-remove prorfile_colse" aria-hidden="true"></span>
                      <form  action="" method="post">
                      <input type="submit" style="opacity: 0;" value="" name="heddinthemessage'.$submit_id_num.'" />
                      </form>
                          <div class="profile_img_content col-lg-12" style="padding: 0;">
                          <div class="name_and_company col-lg-9" style="padding: 0; font-size: 16px; position: relative; top: 120px; left: 10px;">
                          '. $row_all_users['email'] .'
                              <br/>
                              '. $row_all_users['username'] .'
                              </div>
                          </div>
                          </div>
                        <div class="profile_body" style="height: 115px; overflow-y: scroll; background: rgb(90, 90, 90); overflow-x: hidden; ">messages from user<br/>';
                        while ($row_show_user_message = mysqli_fetch_array($run_message_re)){
                          echo '<span>'. $row_show_user_message['text'] .'</span><span style="font-size: 10px; float: right; " >'.$row_show_user_message['date'].'</span><br/><hr style="clear: both;"/>';
                            
                          }
                  
                  $message_user_email = $row_all_users['email'];
                  $textarea_value = $_POST['message_content'];
                  date_default_timezone_set("America/New_York");
                    $u_date = date("Y-m-d");
                   if(isset($_POST['send_'.$submit_id_num])){
                       if(!empty($textarea_value)){
                           $insert_message = "INSERT INTO user_messages(username,email,text,date,user_delet_message) VALUES('$quake_user','$message_user_email','$textarea_value','$u_date','s')";
                           $run_insert_message = mysqli_query ($con, $insert_message);
                           
                       }
                   }
                        echo '</div>
                        <div class="profile_body" style="height: 115px; overflow-y: scroll;">your message to user<br/>';
                        while ($row_show_user_message_ad = mysqli_fetch_array($run_message_ad)){
                          echo '<span>'. $row_show_user_message_ad['text'] .'</span> <span style="font-size: 10px; float: right; "> '.$row_show_user_message_ad['date'].'</span><br/><hr style="clear: both;"/>';
                          }
                        echo '</div>
                          <div class="profile_footer" style="height: 115px;">
                          <form method="post">
                          <textarea name="message_content" value="" placeholder="say something" cols="35" rows="2"></textarea>
                            <input type="submit" style="width: 100%; position: relative; z-index: 3;" value="send" name="send_'.$submit_id_num.'" />
                          </form>
                          </div>
                      </div>
                    </div>
                          </div>';
                  
              
                      
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
                          
        </div>
      </div>

<?php include "files/footer.php"; ?>