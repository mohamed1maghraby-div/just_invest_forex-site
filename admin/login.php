<?php include "../inc/function.php"; ?>
<?php


// post value
$a_name = @$_POST['a_name'];
$a_pass = @$_POST['a_pass'];

if (isset($_POST['login'])){
    if(empty($a_name) OR empty($a_pass)){
        echo '<script>alert("please enter your data correctly")</script>';
    }else{
        //get admin name && admin pass
        $get_admin = "select * from admin where a_name = '$a_name' AND a_pass = '$a_pass'";
        $run_admin = mysqli_query($con, $get_admin);
        
        //admin isset
        if(mysqli_num_rows($run_admin) == 1){
            $row_admin = mysqli_fetch_array($run_admin);
            
            //admin value isset
            
            $aname = $row_admin['a_name'];
            
            //cookie here 
            
            setcookie("aname",$aname,time()+60*60*24);
            setcookie("adminlogin",1,time()+60*60*24);
            
            echo '<script>alert("welcome to admin samir")</script>';
            
            header("location: ok.php");
        }else{
            echo '<script>alert("the data is not correct")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>login for control panel</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
    <div class="login_all">
            <form action="login.php" method="post">
                <input type="text" name="a_name" placeholder="User name" /><br/>
                <input type="password" name="a_pass" placeholder="password" /><br/>
                <input type="submit" name="login" value="Login"/><br/>
        </form>
        </div>
    </body>
</html>