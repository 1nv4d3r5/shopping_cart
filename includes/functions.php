<?php
// loads database
function dbInit() {
	// instanciate database
	return $db = new SQLITE3('shopping.db');
}

// returns a truncated product name
// which allows product discriptions to 
// conform to page formatting
function shortName($length, $description) {        
    // truncates string if length is greater than 'n' chars.
    if(strlen($description) > $length) {            
        $description = preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, $length));
        $description .= '...';
    }
    
    return $description;
}

// returns all products for view on the shop page
function getAllProducts() {
    $name = '';
    // get database
	$db = dbInit(); 
    // stores all products
    $product_list = '';
	// buil query
	$query_string = 'SELECT * FROM products; ';
	// get results from database
	$result = $db->query($query_string);

    while($row = $result->fetchArray()) {         
        // shortens the length of a product name
        // by truncating words after a specified length
        $name = shortName(24, $row['name']);        
        $product_list .= ''.
            '<div class="col-sm-4">'.
                '<div class="thumbnail">'.
                    '<a href="#">'.
                    '<img src="images/products/'. $row['image_small'] .'" alt="' . $row['name'] . '">'.
                    '</a>'.
                    '<div class="caption text-center">'.
                        '<p><a href="product.php?productId=' . $row['id'] . '">'. $name .'</a></p>'.
                        '<a href="update_cart.php?productId=' . $row['id'] . 
                        '&action=add" class="btn btn-primary" role="button">Add to cart</a></p>'.                 
                    '</div>'.
                '</div>'.
            '</div>';                
    }
	// return products
    return $product_list;
}

// returns a single product and its details for the product page
function getSingleProduct($id) {
    // get database
	$db = dbInit();         
    // stores all products
    $product_details = '';		
    // build query
    $stm = $db->prepare('SELECT * FROM products WHERE id = :id');
    $stm->bindParam(':id', $id);
    // get results from database
    $result = $stm->execute();
    
    while($row = $result->fetchArray()) {         
        // build dynamic content
        $product_details .= ''.
            '<main class="col-sm-8">'.
                '<article>'.
                    '<div class="thumbnail">'.
                        '<img src="images/products/'. $row['image_large'] .'" alt="' . $row['name'] . '">'.
                    '</div>'.
                '</article>'.                 
            '</main>'.
            '<aside class="col-sm-4">'.
                '<header>'.
                    '<h4>'. $row['name'] .'</h4>'.
                '</header>'.
                '<article>'.
                    '<p>' . $row['description'] . '</p>'.                     
                    '<p><h5>Price&#58; &#36;' . money_format('%i', $row['price']) . 
                        '</h5><a href="update_cart.php?productId=' . $row['id'] . 
                        '&action=add" class="btn btn-primary" role="button">Add to cart</a></p>'.
                '</article>'.           
            '</aside>';                
    }
   
	// return products
    return $product_details;
}

// returns the number of cart items for use
// with the shopping cart badge icon on top of page
function getCartBadge() {
    $badge = 0;
    // get cart items and update badge icon in header
    if (isset($_SESSION['cart'])) {
        $badge = count($_SESSION['cart']);
    }
    
    return $badge;
}

// builds the item list for the shopping cart page
function getCart() {
    $cart_content = '';
    $subtotal = 0;
    
    // get database
	$db = dbInit(); 
    
    if (isset($_SESSION['cart'])) {                 
        foreach ($_SESSION['cart'] as $item) {            
            // prepare statement for query
            $stm = $db->prepare('SELECT * FROM products WHERE id=:id');
            $stm->bindParam(':id', $item['id']);
            // get results from database
            $result = $stm->execute();
            
            // build shopping cart output
            while($row = $result->fetchArray()) {                
                $subtotal += $row['price'];
                $cart_content .= ''.
                    '<tr>'.
                        '<td>' . $row['name'] . '</td>'.
                        '<td>&#36;' . money_format('%i', ($item['quantity'] * $row['price'])) .'</td>'.
                        '<td class="col-sm-1"><input class="form-control"'.
                            'type="text" value="' . $item['quantity'] . '" size="1"></td>'.
                        '<td><a href="update_cart.php?productId=' . $item['id'] . 
                            '&action=remove" class="btn btn-danger" role="button">remove</a></td>'.
                    '</tr>';
            }
        }               
    } else {        
        $cart_content .= ''.
            '<tr>'.
                '<td> None </td>'.
                '<td>&#36; 0.00 </td>'.
                '<td class="col-sm-1"><input class="form-control"'.
                    'type="text" value="0" size="1"></td>'.
                '<td><a href="#" class="btn btn-primary" role="button" disabled>update</a></td>'.
            '</tr>';
    }
    
    setCartTotal($subtotal);
    return $cart_content;
}

// calculates order cost and stores data in session
function setCartTotal($subtotal) {
    $shipping = money_format('%i', 4.99);
    define("TAX", 0.0344);
    $total_tax = money_format('%i', ($subtotal * TAX));
    $net_total = money_format('%i', ($subtotal + $total_tax + $shipping));

    $_SESSION['cost'] = [
        'subtotal' => money_format('%i', $subtotal),
        'shipping' => $shipping,
        'tax' => $total_tax,
        'total' => $net_total
    ];
}

// builds shopping cart cost output
function getCartTotal() {
    // if cost session not created; display default
    if (!isset($_SESSION['cost'])) {
        $_SESSION['cost']['subtotal'] = 0;
        $_SESSION['cost']['shipping'] = 0;
        $_SESSION['cost']['tax'] = 0;
        $_SESSION['cost']['total'] = 0;
    }
    
    $output = '';
    $output .= '<li><strong>Subtotal: &#36;' . $_SESSION['cost']['subtotal'] . '</strong></li>'.
               '<li><strong>Shipping Cost: &#36;' . $_SESSION['cost']['shipping'] . '</strong></li>'.
               '<li><strong>Tax: &#36;' . $_SESSION['cost']['tax'] . '</strong></li>'.
               '<li><strong>Total: &#36;' . $_SESSION['cost']['total'] . '</strong></li>';
    return $output;
}

// builds checkout page order information output 
function getCheckoutInfo() {
    $checkout_content = '';
    $name = '';    
    // get database
	$db = dbInit(); 
    
    if (isset($_SESSION['cart'])) {        
        foreach ($_SESSION['cart'] as $item) { 
            // prepare query statement
            $stm = $db->prepare('SELECT * FROM products WHERE id=:id');
            $stm->bindParam(':id', $item['id']);
            // get query results from db
            $result = $stm->execute();
            
            // build checkout page order detail output
            while($row = $result->fetchArray()) {                
                // shortens the length of a product name
                // by truncating words after a specified length
                $name = shortName(25, $row['name']);
                $checkout_content .= ''.
                    '<tr>'.
                        '<td>' . $name . '</td>'.                    
                        '<td class="col-sm-1">'. $item['quantity'] . '</td>'.
                        '<td>&#36;' . money_format('%i', ($item['quantity'] * $row['price'])) .'</td>'.    
                    '</tr>';
            }
        }               
    } else {        
        $checkout_content .= ''.
            '<tr>'.
                '<td>None</td>'.                    
                '<td class="col-sm-1">0</td>'.
                '<td>&#36;0.00</td>'.    
            '</tr>';
    }
    return $checkout_content;
}

// returns the top 2 newest products for 
// view on homepage
function getNewProducts($limit) {
    // stores all products
    $product_list = '';
    // get database
	$db = dbInit(); 
    // prepare statement for query
    $stm = $db->prepare('SELECT * FROM products ORDER BY id desc LIMIT :limit');
    $stm->bindParam(':limit', $limit);
    // get results from database
    $result = $stm->execute();
    
    // loop through query result and build product details code
    while($row = $result->fetchArray()) {
        $name = shortName(24, $row['name']);                 
        $product_list .= ''.
            '<div class="col-sm-6">'.
                '<div class="thumbnail">'.
                    '<img src="images/products/' . $row['image_small'] . '" alt="' . $name . '">'.
                    '<div class="caption text-center">'.
                    '<p><a href="product.php?productId=' . $row['id'] . '">'. $name .'</a></p>'.
                        '<p><a href="update_cart.php?productId=' . $row['id'] . '&action=add"'. 
                            'class="btn btn-primary" role="button">Add to cart</a></p>'.
                    '</div>'.
                '</div>'.
            '</div>';               
    }
    return $product_list; 
}

// redirects user to specified page
function redirectTo($page) {
    header("Location: {$page}");
    exit();
}
