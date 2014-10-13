<?php 
    session_start();
    require_once 'includes/functions.php'; 
    
    // empties shopping cart and cost sessions;
    unset($_SESSION['cart']);
    unset($_SESSION['cost']);    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pens R Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="well">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                   <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>                    
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                    
                    </button>
                    <a href="index.php" class="navbar-brand logo">Pens</a>
                </div>
                <!-- Collection of nav links for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="shop.php">Shop</a></li>                                                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="cart.php"><span class="badge"><?php echo getCartBadge(); ?></span> Cart</a></li>                                                          <li><a href="checkout.php">Checkout</a></li>
                    </ul>  
                </div>
            </nav>           
<!-- main content start -->
            <section class="row">
                <main class="col-sm-12">
                    <article class="jumbotron">
                        <h1>Purchase <?php echo (true) ? 'Success' : 'Failed'; ?></h1>
                        <h3>
                            <?php 
                                echo (true) ? 'Thank you for your purchase&#33; '.
                                    'Your order is being process and a confirmation '.
                                        'email will be sent to you shortly.' :
                                        'An error occured while processing your order.'.
                                        'Please contact our customer service.<br>';
                            ?>
                        </h3>
                    </article>
                    <a
                </main>                
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
