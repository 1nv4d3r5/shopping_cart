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

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <img src="images/carousel/carousel1.jpg" alt="...">
                      <div class="carousel-caption">
                        <h3>Welcome to Pens R Us!!!</h3>
                      </div>
                    </div>
                    <div class="item">
                      <img src="images/carousel/carousel2.jpg" alt="...">
                      <div class="carousel-caption">
                        <h3>We sell only the very best pens!</h3>
                      </div>
                    </div>
                    <div class="item">
                      <img src="images/carousel/carousel3.jpg" alt="...">
                      <div class="carousel-caption">
                        <h3>Please checkout our new arrivals!</h3>
                      </div>
                    </div>
                </div>
            </div> <!-- Carousel -->