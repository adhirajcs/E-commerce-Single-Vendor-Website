<?php 
    include("../inc/db.php");
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");    
    
    $pid = $_POST['pid'];
    $cid = $_POST['cid'];
    $cprice = $_POST['cprice'];
    $qty = $_POST['qty'];
    $total = $cprice * $qty;

    $sel = "SELECT * FROM cart WHERE customer_id='$cid' AND pid='$pid'";
    $rs = $con->query($sel);
    if($rs->num_rows>0) {
        $row = $rs->fetch_assoc();
        $fqty = $row['qty']+qty;
        $ft = $cprice * $fty;
        $cart_id = $row['cart_id'];

        $upd = "UPDATE cart SET qty='$qty', total='$ft', WHERE cart_id='$cart_id'";
        $con->query($upd);
    }
    else {
        $ins = "INSERT INTO cart SET pid='$pid', customer_id='$cid', current_price='$cprice', qty='$qty', total='$total'";
        $con->query($ins);
    }

    $arr=array(
        'msg' => "Add to cart done successfully done!"
    );
    
    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>