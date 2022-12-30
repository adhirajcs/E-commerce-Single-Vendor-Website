<?php 
    header('Access-Control-Allow-Origin: http://localhost:4200');
    

    include("../inc/db.php");

    $sel="SELECT * from products";
    $rs=$con->query($sel);
    $arr=array();
    while($row=$rs->fetch_assoc()) {
        $arr[]=$row;
    }

    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */


?>