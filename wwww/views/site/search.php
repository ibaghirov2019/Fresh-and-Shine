<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <h3>Search</h3> 
                <form  method="post" action="search.php?go"  id="searchform"> 
                    <input  type="text" name="name"> 
                    <input  type="submit" name="submit" value="Search"> 
                </form> 
                <?php
                     if (isset($_POST['submit'])) { //to check if the form was submitted
                       $username= $_POST['name'];
                       if (strpos($username, 'te') !== false) {
                          echo '<a href="/team/">Team Page</a>';
                      }
                      elseif (strpos($username, 'regi') !== false) {
                          echo '<a href="/user/register/">Registration Page</a>';
                      }
                      elseif (strpos($username, 'log') !== false) {
                          echo '<a href="/user/login/">Login Page</a>';
                      }
                      elseif (strpos($username, 'cabi') !== false) {
                          echo '<a href="/cabinet/">Cabinet Page</a>';
                      }
                      elseif (strpos($username, 'ho') !== false) {
                          echo '<a href="/">Home Page</a><br/>';
                          echo '<a href="/category/13">Home Cleaning</a>';
                      }
                      elseif (strpos($username, 'offi') !== false) {
                          echo '<a href="/category/14">Office Cleaning</a>';
                      }
                      elseif (strpos($username, 'carp') !== false) {
                          echo '<a href="/category/15">Carpet Cleaning</a>';
                      }
                      elseif (strpos($username, 'poo') !== false) {
                          echo '<a href="/category/16">Pool Cleaning</a>';
                      }
                      elseif (strpos($username, 'serv') !== false) {
                          echo '<a href="/allservices/">All Services Page</a>';
                      }
                      elseif (strpos($username, 'abo') !== false) {
                          echo '<a href="/about/">About Us Page</a>';
                      }
                      elseif (strpos($username, 'cont') !== false) {
                          echo '<a href="/contacts/">Contact Us Page</a>';
                      }
                      elseif (strpos($username, 'car') !== false) {
                          echo '<a href="/cart">Shopping Cart Page</a>';
                      }
                      else{
                        echo '404 Page Not Found The page you requested was not found';
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>