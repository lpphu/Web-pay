<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat HTML5/CSS3 Login Form</title>
  
  
  
      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>
  <div class="login-page">
  <div class="form">
    <form action="../models/regis.php" method="post"class="register-form">
      <input name="username" type="text" placeholder="name"/>
      <input name="password" type="password" placeholder="password"/>
      <input name="email" type="text" placeholder="email address"/>
      <button type="submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form action="user.php" method="post" class="login-form">
      <input name="username" type="text" placeholder="username"/>
      <input name="password" type="password" placeholder="password"/>
      <button type="submit" name="login" value="dangnhap">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="../js/index.js"></script>

</body>
</html>
