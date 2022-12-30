<?php

    include("../inc/db.php");

    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");

    $arr = array();
    $cid = $_POST['cid'];
    $selb = "SELECT * FROM bill WHERE cid='$cid'";
    $rsb = $con->query($selb);
    while ($rowb = $rsb->fetch_assoc()) {
        $x = array();
        $oid = $rowb['order_id'];
        $sel = "SELECT sorder.*,products.product_name,products.product_image FROM sorder INNER JOIN products ON products.product_id=sorder.pid WHERE sorder.order_id='$oid' ";
        $rs = $con->query($sel);
        while ($row = $rs->fetch_assoc()) {

            $x[] = $row;
        }
        $rowb['child'] = $x;
        $arr[] = $rowb;
    }

    echo json_encode($arr);

?>