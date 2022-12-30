<?php 
    include("../inc/db.php");
    
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");    
    
    $cart_id=$_POST['cart_id'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $total=$price*$qty;
    $ins="UPDATE cart set qty='$qty', total='$total' where cart_id='$cart_id' ";
    $con->query($ins);
    $arr=array(
        'msg' => "Qty updated successfully"
    );

    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>