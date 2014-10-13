<?php
session_start();
require_once 'includes/functions.php';

// gets the product id and action to be done from the query string
$productId = isset($_GET['productId']) ? $_GET['productId'] : redirectTo('cart.php');
$action = isset($_GET['action']) ? $_GET['action'] : redirectTo('cart.php');

// performs the cart update function
switch($action) { 
    
case "add":
    // checks if session array was created; creates one
    // if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    // searches session for product id, if found then
    // increment quantity of item in cart by 1
    foreach($_SESSION['cart'] as $pk => $pv) {
        foreach($pv as $k => $v) {        
            if ($k == 'id' && $v == $productId) {
                //$pk['quantity'] ++;
                //$_SESSION['cart'][$product]['quantity'] ++;
                $_SESSION['cart'][$pk]['quantity']++;                
                $found = true;
                break;
            }
        }
        if ($found) { break; }
    }
       
    // if product id was not found, then add item to 
    // the cart with a quantity of 1
    if (!$found) {
        $_SESSION['cart'][] = [            
            'id' => $productId,
            'quantity' => 1            
        ];                
    }        
    break;
 
case "remove":  
    $found = false;
    if (!isset($_SESSION['cart'])) {
        // if the session is not set and there are no items in the cart
        // then the remove process should not even occur
        redirectTo('index.php');
    } else {
        // searches session for product id, if found then
        // decrement quantity of item in cart by 1
        foreach($_SESSION['cart'] as $pk => $pv) {
            foreach($pv as $k => $v) {        
                if ($k == 'id' && $v == $productId) {                
                    $_SESSION['cart'][$pk]['quantity']--;                
                    $found = true;
                    // if quantity of item is zero, then remove item from session
                    if ($_SESSION['cart'][$pk]['quantity'] == 0) {
                        unset($_SESSION['cart'][$pk]);    
                    }
                    break;
                }
            }
            if ($found) { break; }
        }    
    }
    
    
//case "update":
    // get the new quantity amount using js and append to query string
    // get the quantity from query string
    // compare new quantity with old quantity and validate
    // add or remove based on number; show error if request amounts to a quantity that is negative
    // return to cart page
}

redirectTo('cart.php');