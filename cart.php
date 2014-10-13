<?php
    session_start();
    require_once 'includes/functions.php';
    include 'includes/header.php';
?>

<!-- main content start -->
            <section class="row">
                <main class="col-sm-12">
                    <article>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">                                    
                                    <div class="panel-heading">Shopping Cart</div>
                                    <!-- Table -->
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Edit</th>
                                        </tr>
                                       <?php echo getCart(); ?>
                                    </table>
                                </div>
                            </div>                                     
                        </div>
                        <div class="row">
                            <ul class="shopping-cart-cost">
                                <?php echo getCartTotal(); ?>
                            </ul>
                        </div>
                        <div class="row">                        
                            <a href="checkout.php" class="btn btn-success pull-right purchase-button" role="button">Checkout</a>
                        </div>
                    </article>
                </main>
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
