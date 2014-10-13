<?php 
    session_start();
    require_once 'includes/functions.php';
    include 'includes/header.php' 
?>

<!-- main content start -->
            <section class="row">
                <main class="col-sm-8">
                    <article>
                        <h3>Welcome</h3>
                        <p>We are a web store dedicated to providing unique, high-quality writing instruments and stationery products with fast shipping and top-notch service. Our passionate team of stationery enthusiasts scour the globe to discover remarkable items to share with customers.</p>
                    </article>
                    <article>
                        <div class="row">
                            <?php echo getNewProducts(2); ?>
                        </div>                        
                    </article>
                </main>

                <aside class="col-sm-4">
                    <header>
                        <h5>
                            What Our Customers Are Saying
                        </h5>
                    </header>
                    <article>
                        <p>This is the best white gel pen I've come across. I use them frequently for card making and these are the only pens I've come across that I don't have to go back and re-write or re-draw what I've already worked on. The white is vibrant, it doesn't disappear into the paper and dull out and I have never experienced any skipping. They are such good quality I'm so happy I bought a box!</p>
                        <p>This is the best white gel pen I've come across. I use them frequently for card making and these are the only pens I've come across that I don't have to go back and re-write or re-draw what I've already worked on.<p>
                    </article>                    
                </aside>
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
