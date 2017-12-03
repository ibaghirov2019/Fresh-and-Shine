 <?php
$dbc = mysqli_connect('localhost', 'admin', '123456', 'db_shop') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
  $userfname = mysqli_real_escape_string($dbc, trim($_POST['userfname']));
   $useraddress = mysqli_real_escape_string($dbc, trim($_POST['useraddress']));
    $useremail = mysqli_real_escape_string($dbc, trim($_POST['useremail']));
  $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
  $usernumber = mysqli_real_escape_string($dbc, trim($_POST['usernumber']));
  $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
  $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
  if(!empty($username) && !empty($userfname) && !empty($useraddress) && !empty($useremail) && !empty($usernumber) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
    $query = "SELECT * FROM `signup` WHERE username = '$username'";
    $data = mysqli_query($dbc, $query);
    if(mysqli_num_rows($data) == 0) {
      $query ="INSERT INTO `signup` (userfname, useraddress, useremail, username, usernumber, password ) VALUES ('$userfname', '$useraddress', '$useremail', '$username', '$usernumber', SHA('$password2'))";
      mysqli_query($dbc,$query);
      echo 'Everything is ready, go <a href="index.php"> Home </a> ';
      mysqli_close($dbc);
      exit();
    }
    else {
      echo 'Login already exists';
    }

  }
}
?>