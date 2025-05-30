<?php
    include_once __DIR__ . "/zero-function.php";

    $product_code = filter_input(INPUT_GET, 'product-code');
    $product_price = filter_input(INPUT_GET, 'product-price');

    $errors = [];

    if(empty($product_code) && empty($product_price)) {
        $errors[] = 'missing product code and product id';
    } elseif (empty($product_code)) {
        $errors[] = 'missing product code';
    } 
    
    /* 
        Since empty('0') return true
        and empty('') returns true
        we have to test for a condition where 0 is the price of a product.
    */

        
    if (isAnEmptyNonZeroString($product_price)) {
        $errors[] = 'missing product price';
    }
    
    if (strlen($product_code) < 3) {
        $errors[] = 'product code contains few characters';
    }

    if(!is_numeric($product_price)) {
        $errors[] = 'price was not a number';
    }

    if(sizeof($errors) > 0) {
        print "<h3>Data validation errors:</h3> <ul>";

        foreach ($errors as $error) {
            print "<li>$error</li>";
        }

        print "</ul>";
    } else {
        print 'input data was error free';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Costume Rental Company</title>
    </head>
    <body>
        <?php if(empty($errors)) { ?>
            <h1>Data received:</h1>
            <p>Product Code: <?= $product_code ?></p>
            <p>Product price: <?= $product_price ?></p>
        <?php } ?>
    </body>
</html>