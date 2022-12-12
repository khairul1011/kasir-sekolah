
<!DOCTYPE html>
<html>
<head>
  <title>form login</title>
      <link rel="stylesheet" type="text/css" href="stylelogin.css">

</head>
<body>
<div class="login-box">
  <h2>Login</h2>
  <form method="post" action="ceklogin.php">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <a type="submit" href="ceklogin.php" name="login">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
  </form>
</div>
</body>
</html>