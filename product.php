<?php 
    session_start();
    require_once 'includes/functions.php';
    include 'includes/header.php';
    
    $productId;
    
    // gets product id from get request, if no
    // id exists then a default product id is provided
    if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
    } else {
        $productId = 2;
    }
?>

<!-- main content start -->
            <section class="row">
                <?php  echo (getSingleProduct($productId)); ?>
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
