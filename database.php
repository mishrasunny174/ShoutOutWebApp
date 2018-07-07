<?php
  $connection = mysqli_connect('localhost','sunny','password','shoutout_webapp');
  if(mysqli_connect_errno())
  {
    echo 'unable to connect to MySQL  database'.mysqli_connect_error();
  }
 ?>
