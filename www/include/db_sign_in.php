<?php
$dbc = mysqli_connect('localhost', 'admin', '123456', 'db_shop') OR DIE('Ошибка подключения к базе данных');
if(!isset($_COOKIE['id'])) {
  if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    if(!empty($username) && !empty($password)) {
      $query = "SELECT `id` , `username`, `userfname`, `useraddress`, `useremail`, `usernumber`  FROM `signup` WHERE username = '$username' AND password = SHA('$password')";
      $data = mysqli_query($dbc,$query);
      if(mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        setcookie('id', $row['id'], time() + (60*60*24*30));
        setcookie('username', $row['username'], time() + (60*60*24*30));
        setcookie('userfname', $row['userfname'], time() + (60*60*24*30));
        setcookie('useraddress', $row['useraddress'], time() + (60*60*24*30));
        setcookie('useremail', $row['useremail'], time() + (60*60*24*30));
        setcookie('usernumber', $row['usernumber'], time() + (60*60*24*30));
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header('Location: '. $home_url);
      }
      else {
        echo 'Sorry, you must enter a valid username and password';
      }
    }
    else {
      echo 'Sorry, you must fill in the fields correctly';
    }
  }
}
?>