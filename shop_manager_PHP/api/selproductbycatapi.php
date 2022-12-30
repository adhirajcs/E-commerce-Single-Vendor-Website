<?php 
    include("../inc/db.php");
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");
    


    $pcat=$_POST['cat'];
    $arr=array();
    $sel="SELECT * from products where product_cat='$pcat'";
    $rs=$con->query($sel);
    while($row=$rs->fetch_assoc()) {
        $arr[]=$row;
    }

    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */


?>