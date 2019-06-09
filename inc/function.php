<?php

// database connect

$con =@mysqli_connect('localhost', 'root', '12345678', 'just_inverst');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>