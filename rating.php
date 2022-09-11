<?php
    include("connection.inc.php");
    include("functions.inc.php");
    $userdata = check_login($con);

    if(isset($_GET['rate']) && isset($_GET['hid'])){
        $rate = $_GET['rate'];
        if($rate >5 || $rate <1){
            die("Thank you for Hacking!");
        }
        $id = $userdata['id'];
        $hid = $_GET['hid'];
        $sql = "INSERT INTO rating (customer_id, rating,`product_id`) VALUES ('$id', '$rate','$hid');";
        $result = mysqli_query($con,$sql);
    }
    if(isset($_GET['re']) && isset($_GET['rid'])){
        $rate = $_GET['re'];
        if($rate >5 || $rate <1){
            die("Thank you for Hacking!");
        }
        $rid = $_GET['rid'];
        $query = "UPDATE rating SET
        rating = '$rate'
        WHERE rid = '$rid'
        ";
        mysqli_query($con, $query);
    }
?>
<script>history.go(-1);</script>