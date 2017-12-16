 <?php include ROOT . '/views/layouts/header.php'; ?>

 <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>All Services</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>"
                                         class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>"
                                         >                                                                                    
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
            <div class="features_items"><!--features_items-->
                <?php foreach ($categoryProducts as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
                                    <h2>$<?php echo $product['price']; ?></h2>
                                    <p>
                                        <a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </p>
                                    <h10>Enter area</h10>
                                    <form method="post" action="/cart/add/<?php echo $product['id']; ?>" class="fa fa-shopping-cart">
                                        <input type="number" name="size" value="1"/>
                                        <input type="submit" value="Add to Cart" class="btn btn-default add-to-cart">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>                              

            </div><!--features_items-->
        </div>
    </div>
</div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>