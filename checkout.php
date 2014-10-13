<?php 
    session_start();
    require_once 'includes/functions.php';
    include 'includes/header.php';
?>

<!-- main content start -->
            <section class="row">
                <main class="col-sm-5">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 well">
                                <form role="form">
                                    <h2>Billing Information</h2>
                                    <ul>
                                        <li class="fa fa-cc-paypal fa-2x"></li>
                                        <li class="fa fa-cc-stripe fa-2x"></li>
                                        <li class="fa fa-cc-visa fa-2x"></li>
                                        <li class="fa fa-cc-mastercard fa-2x"></li>
                                        <li class="fa fa-cc-amex fa-2x"></li>
                                    </ul>
                                    <div class="form-group">
                                      <label for="email">Email address</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="johnnycash@gmail.com">
                                    </div>
                                    <div class="form-group">
                                      <label for="name">Name on card</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="John R. Cash">
                                    </div>
                                    <div class="form-group">
                                      <label for="name">Credit card number</label>
                                      <input type="text" class="form-control" id="card_number" name="card_number" placeholder="0123012301230123">
                                    </div>
                                    <div class="form-group">
                                      <label for="name">Security cod on card (CVV)</label>
                                      <input type="text" class="form-control" id="cvv" name="cvv" placeholder="012">
                                    </div>                                   
                                    
                                    <div class="form-group"> 
                                        <label for="name">Card Expiration</label>
                                        <div class="clear-fix"></div>
                                        <div class="btn-group">
                                            <select class="form-control" name="month">
                                                <option value="00">Month</option>
                                                <option value="01">01 - Jan</option>
                                                <option value="02">02 - Feb</option>
                                                <option value="03">03 - Mar</option>
                                                <option value="04">04 - Apr</option>
                                                <option value="05">05 - May</option>
                                                <option value="06">06 - Jun</option>
                                                <option value="07">07 - Jul</option>
                                                <option value="08">08 - Aug</option>
                                                <option value="09">09 - Sep</option>
                                                <option value="10">10 - Oct</option>
                                                <option value="11">11 - Nov</option>
                                                <option value="12">12 - Dec</option>
                                            </select>
                                        </div>     
                                        
                                        <div class="btn-group">
                                            <select class="form-control" name="month">
                                                <option value="00">Year</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                                                                                            
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" checked> Send me product updates
                                      </label>
                                    </div>
                                    <div>                                        
                                        <a href="purchased.php" class="btn btn-success pull-right purchase-button" role="button">Purchase</a>
                                        <a href="cart.php" class="btn btn-primary pull-right purchase-button" role="button">Back</a>
                                    </div>                                    
                                    <br>
                                    <br>
                                 </form>
                            </div>                                     
                        </div>                        
                    </article>
                </main>
                <aside class="col-sm-7">
                    <div class="well">
                        <header>
                            <h2>Purchase Details</h2>
                        </header>
                        <article>
                           <div class="row">  
                                <div class="container-fluid">
                                    <table class="table">
                                        <tr>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php echo getCheckoutInfo(); ?>
                                    </table>                     
                                    <ul class="shopping-cart-cost">
                                        <?php echo getCartTotal(); ?>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </aside>
            </section>
<!-- main content end -->

            <?php include 'includes/footer.html' ?>
        </div>
    </body>
</html>
