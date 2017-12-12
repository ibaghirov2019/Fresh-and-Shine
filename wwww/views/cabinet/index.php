<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">


            <h3 class="title text-center">User's cabinet</h3>
            <h4 class="title text-center">Hi, <?php echo $user['name'];?>!</h4>
            <h4>Full Name: <?php echo $user['name'];?></h4>
            <h4>Login: <?php echo $user['login'];?></h4>
            <h4>E-mail: <?php echo $user['email'];?></h4>
            <h4>Address: <?php echo $user['address'];?></h4>
            <h4>Mobile Number: <?php echo $user['mobnumber'];?></h4>
            <ul>
                <li><a href="/cabinet/edit">Edit data</a></li>
                
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>