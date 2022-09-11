<?php




$user = "SELECT * FROM `users` ";
$user_result = $con->query($user);
if ($user_result->num_rows > 0) {
    while ($user_row = $user_result->fetch_assoc()) {
        $username = $user_row['name'];
        $id = $user_row['id'];
        $rating = "SELECT * FROM rating WHERE customer_id = '$id'";
        $rating_result = $con->query($rating);
        if ($rating_result->num_rows > 0) {
            while ($rating_row = $rating_result->fetch_assoc()) {
                $product_id = $rating_row['product_id'];
                $product = "SELECT * FROM product WHERE id = '$product_id'";
                $product_result = $con->query($product);
                if ($product_result->num_rows > 0) {
                    while ($product_row = $product_result->fetch_assoc()) {
                        $r = $product_row["name"];
                        $datasets[$username][$r] = $rating_row['rating'];
                    }
                }
            }
        }
    }
}

$books = $datasets;
