<?php 
            $get_message_text = "select * from adminmessages where username='$user_coo'";
            $run_message_text = mysqli_query ($con, $get_message_text);
            while ($row_show_admin_message = mysqli_fetch_array($run_message_text)){
                    echo '<span>'. $row_show_admin_message['text'] .'</span><br/>';      
                }
 ?>