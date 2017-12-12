<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>The data has been edited!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Edit the data</h2>
                        <form action="#" method="post">
                            <p>Full Name:</p>
                            <input type="text" name="name" placeholder="Full Name" value="<?php echo $name; ?>"/>

                            <p>Address:</p>
                            <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"/>

                            <p>E-mail:</p>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>

                            <p>Mobile Number:</p>
                            <input type="text" name="mobnumber" placeholder="Mobile Number" value="<?php echo $mobnumber; ?>"/>

                            <p>Login:</p>
                            <input type="text" name="login" placeholder="Login" value="<?php echo $login; ?>"/>

                            <p>Password:</p>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Save" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>