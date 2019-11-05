<?php

require_once "config.php";
session_start();
//selecting database
mysqli_select_db($conn, 'webtechtest');

/* for flash message */
if(isset($_SESSION['error'])) {
  echo '<p style = "color:red">' .$_SESSION['error'] ."</p>";
  unset ($_SESSION['error']);
}

// post data will be set once user click submit button
if(isset($_POST['email']) && isset($_POST['password']) ){  //insert VALUES

  $email = $_POST['email'];
  $password = $_POST['password'];
  //running a query and check if we are getting any result
  $query = "select * from admin where email = '" .$email ."' and password = '".$password ."';";
  $res = mysqli_query($conn, $query);
  if($res && mysqli_num_rows($res) > 0){
    $_SESSION['success'] = 'Welcome Bikash!';
    header('Location: viewcomplaint.php');
    return;
  }
  else{
    $_SESSION['error'] = 'Incorrect username or password';
    header('Location: admin.php');
    return;
  }
}
?>

<!-- view -->
<html>
<head></head>
<body>
  <h1>Login</h1>
  <form method="post">
    <p> Email: <input type="email" name="email" size="30"></p>
      <p> Password: <input type="text" name="password" size="30"></p>
        <input type="submit" value="Login">
      </form>
    </body>
  </html>
