<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
                              <script>
                        
function showUser(str) {
  if (str=="") {
    document.getElementById("profile_body").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("profile_body").innerHTML=this.responseText;
    }
  }
  xmlhttp.onchange=function() {document.getElementById("profile_body").innerHTML=this.responseText;}
  
  xmlhttp.open("GET","process.php",true);
  xmlhttp.send();
}
var checkInterval = setInterval(function(){
        showUser();
    },10000);
                              

       
</script>
</head>
<body>

<?php
$q = intval($_GET['q']);
$user_coo = $_COOKIE['user']; 
$con = mysqli_connect('localhost','justqtaq_moh555','uWuMiyCLlZ9?','justqtaq_moh555');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"justqtaq_moh555");
$sql="SELECT * FROM adminmessages WHERE username = '$user_coo'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['text'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>