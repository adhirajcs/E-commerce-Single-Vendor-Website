<?php 
    include("../inc/db.php");
    
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");    
    
    $cid=$_POST['cid'];
    $arr=array();
    $sel="SELECT cart.*,products.product_name,products.product_image FROM cart INNER JOIN products ON products.product_id=cart.pid WHERE cart.customer_id='$cid'";
    $rs=$con->query($sel);
    while ($row=$rs->fetch_assoc()) {
        $arr[]=$row;
    }
    
    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>