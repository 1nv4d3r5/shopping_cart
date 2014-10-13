<?php 
    session_start();
    require_once 'includes/functions.php';
    include 'includes/header.php';
?>

<!-- main content start -->
            <section class="row">
                <main class="col-sm-12">
                    <article>
                        <p>Select from our assortment of specialty pens. Take your time browsing through our collection of high quality writing instuments. You can resta assure that we have taken our time selecting only the best pens for our collection.</p>
                    </article>
                    <article class="content">
                        <div class="row">
                            <?php
                                // returns a list of all the products in the db
                                echo getAllProducts();
                            ?>
                        </div>
                    </article>
                </main>
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
