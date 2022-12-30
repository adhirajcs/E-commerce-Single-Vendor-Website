<?php
    include("inc/db.php");
    include("inc/auth.php");

    $id=$_GET['id'];

    $sel="SELECT * from products where product_id='$id'";
    $rs=$con->query($sel);
    $row=$rs->fetch_assoc();
    unlink("product_img/".$row['product_image']);

    $sql="DELETE from products where product_id='$id'";
    $con->query($sql);
    header("location:list-products.php");

?>