<?php 
    include("../inc/db.php");
    header('Access-Control-Allow-Origin: http://localhost:4200');
    header("Content-Type: application/json");    
    
    $e=$_POST['email'];
    
    $p=MD5($_POST['password']);

    $sel="SELECT * FROM customers WHERE cust_email='$e' AND cust_password='$p'";
    $rs=$con->query($sel);
    if($rs->num_rows>0){

        $row=$rs->fetch_assoc();

        $arr=array(
        'msg' => "Login done successfully",
        'customerdata'=>$row
    );
    }else {
        $arr=array(
        'msg' => "Invalid Login!!!"
    );
    }
    
    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>