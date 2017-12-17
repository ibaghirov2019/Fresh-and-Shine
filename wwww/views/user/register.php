<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>You are registered!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Registration on the site</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Your Full Name" value="<?php echo $name; ?>"/>
                            <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="number" name="mobnumber" placeholder="Mobile Number" value="<?php echo $mobnumber; ?>"/>
                            <input type="text" name="login" placeholder="Login" value="<?php echo $login; ?>"/>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Register" />
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