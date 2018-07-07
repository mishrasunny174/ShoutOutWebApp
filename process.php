<?php include 'database.php';
  if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    date_default_timezone_set('Asia/Kolkata');
    $datetime = date('y-m-d').' '.date('h-i-s');
    if(!isset($user) || !isset($message) || $user=='' || $message == '') {
      $error = "Please enter name and message";
      header('Location: index.php?error='.urlencode($error));
      exit();
    }
    else {
      $query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$datetime')";
      if(!mysqli_query($connection, $query)){
        echo 'FATAL ERROR: please try again later'.mysqli_error($connection);
      }
      else {
        header('Location: index.php');
        exit();
      }
    }
  }
  else {
    echo 'ERROR: Access Denied';
  }
?>
