<?php include 'database.php'; ?>
<?php
  $query = 'SELECT * FROM shouts';
  $result = mysqli_query($connection, $query);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shout it!</title>
    <link rel='stylesheet' href='css/style.css' type='text/css'/>
  </head>
  <body>
    <div id='shoutbox'>
      <header>
        <h1>Shout-Out Box</h1>
      </header>
      <div id='shouts'>
        <ul>
          <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <li class='shout'>
              <span id='datetime_span'><?php echo $row['time']; ?> :
              </span>
              <strong>
              <span id='name_span'>
                <?php echo $row['user']?>
              </span>
            </strong>
              <span id='message_span'>
                 - <?php echo $row['message'] ?>
              </span>
              </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <div id='input_box'>
        <?php if(isset($_GET['error'])) : ?>
          <div class='error'>
            <?php echo $_GET['error']; ?>
          </div>
        <?php endif ?>
        <form method="post" action="process.php">
          <input type='text' name='user' placeholder="Enter your name"/>
          <input type='text' name='message' placeholder="Enter your message"/>
          <br>
          <input type='submit' name='submit' value='Shout it out' class='shout_out_button'/>
        </form>
      </div>
    </div>
  </body>
</html>
