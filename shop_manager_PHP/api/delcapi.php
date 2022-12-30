<?php 
    include("../inc/db.php");
    
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");    
    
    $cart_id=$_POST['cart_id'];
    $del="DELETE from cart where cart_id='$cart_id'";
    $con->query($del);
    $arr=array(
        'msg' => "Item removed successfully"
    );

    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>