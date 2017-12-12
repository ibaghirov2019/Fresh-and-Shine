<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Catalog</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Shopping Cart</h2>

            <?php if (User::isGuest()): ?>   
                                              <h3>You can not order Cleaning Services. You must first register and log in with your login<h3>   
                                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Sign In</a></li>
                                            <li><a href="/user/register/"><i></i> Sign Up</a></li>
                                        <?php else: ?>


                    <?php if ($result): ?>
                        <p>Order is processed. We will call you back.</p>
                    <?php else: ?>

                        <p>Selected items: <?php echo $totalQuantity; ?>, for the amount of: <?php echo $totalPrice; ?>$</p><br/>

                        <?php if (!$result): ?>                        

                            <div class="col-sm-4">
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <p>To make an order, please fill out the form. Then our manager will contact you.</p>

                                <div class="login-form">
                                    <form action="#" method="post">

                                        <p>Your Full Name</p>
                                        <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                                        <p>Mobile Number</p>
                                        <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>

                                        <p>Day</p>
                                        <input type="text" name="userDay" placeholder="" value="<?php echo $userDay; ?>"/>

                                        <p>Time</p>
                                        <input type="text" name="userTime" placeholder="" value="<?php echo $userTime; ?>"/>

                                        <br/>
                                        <br/>
                                        <input type="submit" name="submit" class="btn btn-default" value="Order" />
                                    </form>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

<?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>