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
<?php
session_start();
$connect = mysqli_connect("localhost", "admin", "123456", "db_shop");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Get a price for home cleaning</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

  <div id="shopping-cart">

    <div style="clear:both"></div>
    <h2><?php echo $_COOKIE['username' ];?> Shopping Bag</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th width="20%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="10%">Price Details</th>
    <th width="10%">Order Total</th>
    <th width="5%">Action</th>
    <th width="10%">Day <div class="central-when-pill date-selection">
<input class="pikaday when-font" data-format="MM/DD/YYYY" id="quote_request_date" name="quote_request_date" type="text" value="11/13/2017">
</div></th>
<th width="10%">Time <div class="central-when-pill">
<div class="select-wrapper form-select-wrapper">
<select id="quote_request_start_time" name="quote_request_start_time"><option value="07:00">7:00 AM</option>
<option value="07:30">7:30 AM</option>
<option value="08:00">8:00 AM</option>
<option value="08:30">8:30 AM</option>
<option value="09:00">9:00 AM</option>
<option value="09:30">9:30 AM</option>
<option value="10:00">10:00 AM</option>
<option value="10:30">10:30 AM</option>
<option value="11:00">11:00 AM</option>
<option value="11:30">11:30 AM</option>
<option value="12:00">12:00 PM</option>
<option value="12:30">12:30 PM</option>
<option value="13:00">1:00 PM</option>
<option value="13:30">1:30 PM</option>
<option value="14:00">2:00 PM</option>
<option value="14:30">2:30 PM</option>
<option value="15:00">3:00 PM</option>
<option value="15:30">3:30 PM</option>
<option value="16:00">4:00 PM</option>
<option value="16:30">4:30 PM</option>
<option value="17:00" selected="selected">5:00 PM</option>
<option value="17:30">5:30 PM</option>
<option value="18:00">6:00 PM</option>
<option value="18:30">6:30 PM</option>
<option value="19:00">7:00 PM</option>
<option value="19:30">7:30 PM</option>
<option value="20:00">8:00 PM</option>
<option value="20:30">8:30 PM</option>
<option value="21:00">9:00 PM</option></select>
</div>
<input id="quote_request_date_start" name="quote_request[date_start]" type="hidden" value="2017-11-21 19:30:00">
<input id="display_date" name="display_date" type="hidden" value="2017-11-13 17:00:00 -0500">
</div></th>

    </tr>
    <?php
  if(!empty($_SESSION["cart"]))
  {
    $total = 0;
    foreach($_SESSION["cart"] as $keys => $values)
    {
      ?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>$ <?php echo $values["product_price"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
      $total = $total + ($values["item_quantity"] * $values["product_price"]);
    }
    ?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
  }
  ?>
    </table>
    </div>
    <input type="submit" name="add" style="margin-top:15px;" class="btn btn-default" value="Order">
    </div>

    <?php 
}
?>
</section>
      </content>
    </div>

 </body>
</html>



</div>

    <?php
    include("include/block-footer.php");
    ?>
  </div>

</body>
</html>