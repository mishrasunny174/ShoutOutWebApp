<?php include 'database.php'; ?>

<?php
function convertSafe($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
?>

<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $user = mysqli_real_escape_string($connection,convertSafe($_POST['user']));
    $message = mysqli_real_escape_string($connection,convertSafe($_POST['message']));
    date_default_timezone_set('Asia/Kolkata');
    $datetime = date('Y-m-d').' '.date("h-i-s a");
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
