<?php
    include("include/db_sign_up.php");
?>

<!DOCTYPE HTML>
<html>
<style>
/*Задний фон*/
body {
  background-image: url(/images/); /* Путь к фоновому изображению */
  
}
</style>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/style.css"/>


  <title>Cleaning Services</title>
</head>

<body>

  <!-- main block body -->
  <div id="block-body">
    <?php
    include("include/block-header.php");
    ?>
    <!-- блок что в центре -->
    <div id="block-content">
      <content>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="userfname">Enter your Full Name:</label>
  <input type="text" name="userfname">
  <label for="useraddress">Address:</label>
  <input type="text" name="useraddress">
  <label for="useremail">E-mail:</label>
  <input type="text" name="useremail">
  <label for="userenumber">Mobile Number:</label>
  <input type="text" name="usernumber">
  <label for="username">Login:</label>
  <input type="text" name="username">
  <label for="password">Password:</label>
  <input type="password" name="password1">
  <label for="password">Retype Password:</label>
  <input type="password" name="password2">
  <button type="submit" name="submit">Register</button>
  </form>
</content>
</div>

    <?php
    include("include/block-footer.php");
    ?>
  </div>

</body>
</html>