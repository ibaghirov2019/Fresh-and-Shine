<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Shopping Cart</h2>
                    
                    <?php if ($productsInCart): ?>
                        <p>You have selected the following services:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Name</th>
                                <th>Cost, $</th>
                                <th>Area </th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $productsInCart[$product['id']];?></td> 
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Total Cost, $:</td>
                                <td><?php echo $totalPrice;?></td>
                            </tr>
                            
                        </table>
                        
                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Order</a>
                    <?php else: ?>
                        <p>The basket is empty</p>
                        
                        <a class="btn btn-default checkout" href="/allservices/"><i class="fa fa-shopping-cart"></i> Back to services</a>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>