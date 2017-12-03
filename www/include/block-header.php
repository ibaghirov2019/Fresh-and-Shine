<?php
    include("include/db_sign_in.php");
?>


  <div id="block-header">

  	
   <!--  <img id="img-logo" src="/images/1.png" /> -->
    
    <ul id="header-top-menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="allcervices.php">All Services</a></li>
      <li><a href="coming_soon.php"> Team</a></li>
      <li><a href="coming_soon.php">About Us</a></li>
      <li><a href="coming_soon.php">Contact Us</a></li>
    </ul>



  <div id="block-search">
      <form method="GET" action="search.php?q=" >
        <span ></span>
        <input type="text" id="input-search" name="q" placeholder="Search" />
        <input type="submit" id="button-search" value="Search" />
        </span>
      </form>
      
    </div> 




<div id="block-sign_in">
     <content>
  <section>
<?php
  if(empty($_COOKIE['username'])) {
?>
  <p id="reg-auth-title" align="right">
      <a class="sign_up" href="sign_in.php">Sign in</a>
      <a class="rgstr" href="sign_up.php">Sign Up</a>
    </p>
<?php
}
else {
  ?>
  <p id="reg-auth-exit" align="right">
    <a href="sign_in.php"><?php echo $_COOKIE['username']; ?></a>
    <a href="include/exit.php">EXIT</a>
  </p>
<?php 
}
?>
</section>
      </content>

    </div> 




    
  
    <p align="right" id="block-basket"><img src="/images/6.png" /><a href="shopping_cart.php">Shopping Cart</a></p>
    
<!--     <img id="logo-line" src="/images/9.png"> -->

  </div>