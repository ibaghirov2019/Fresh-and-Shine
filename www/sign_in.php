<?php
    include("include/db_sign_in.php");
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
  <section>
<?php
  if(empty($_COOKIE['username'])) {
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="username">Login:</label>
  <input type="text" name="username" class="sign_inl" />
  <label for="password">Password:</label>
  <input type="password" name="password" class="sign_inl" />
  <button type="submit" name="submit" class="sign_in" >Login</button>

  </form>
<?php
}
else {
  ?>
  <p> ID: <a><?php echo $_COOKIE['id']; ?></a></p>
  <p> LOGIN: <a><?php echo $_COOKIE['username']; ?></a></p>
  <p> NAME: <a><?php echo $_COOKIE['userfname']; ?></a></p>
  <p> ADDRESS: <a><?php echo $_COOKIE['useraddress']; ?></a></p>
  <p> E-MAIL: <a><?php echo $_COOKIE['useremail']; ?></a></p>
  <p> NUMBER: <a><?php echo $_COOKIE['usernumber']; ?></a></p>
  <p><a href="include/exit.php">EXIT(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php 
}
?>
</section>
      </content>





</div>

    <?php
    include("include/block-footer.php");
    ?>
  </div>

</body>
</html>