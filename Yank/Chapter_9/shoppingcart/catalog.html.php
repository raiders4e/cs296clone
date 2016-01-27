<?php include_once $_SERVER['DOCUMENT_ROOT'] .
    '/Yank/Chapter_9/includes_C8/helpers.inc.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Product Catalog</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
        }
    </style>
    </head>
    <body>
        <p>Your shopping cart contains <?php
        echo count($_SESSION['cart']); ?> items.</p> <!-- Use built-in PHP function count to output the number of items in the array stored in the SESSION variable $_SESSION['cart']-->
        <p><a href="?cart">View your cart</a></p> <!-- Provide a link to view contents of shopping cart. -->
        <table border="1">
            <thead>
                <tr>
                    <th>Item Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php htmlout($item['desc']); ?></td>
                    <td>
                        $<?php echo number_format($item['price'], 2); ?> <!-- 3.  We use PHP's built-in number_format function to display the prices with two digits after the decimal point -->
                    </td>
                    <td>
                        <form action="" method="post">
                            <!-- For each item in the catalog, we provide a form with a BUY button that submits the unique ID of the item. -->
                            <div>
                                <input type="hidden" name="id" value="<?php 
                                    htmlout($item['id']); ?>">
                                <input type="submit" name="action" value="Buy">
                            </div>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>All prices are in imaginary dollars.</p>
    </body>
</html>
