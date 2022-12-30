<?php 
    include("../inc/db.php");
    header('Access-Control-Allow-Origin: http://localhost:4200');
    
    
    $n=$_POST['name'];
    $e=$_POST['email'];
    $ph=$_POST['phone'];
    $p=MD5($_POST['password']);

    $ins="INSERT INTO customers SET cust_name='$n',cust_email='$e',cust_phone='$ph',cust_password='$p'";
    $con->query($ins);

    $arr=array(
        'msg' => "Registration done successfully"
    );
    
    echo json_encode($arr);  /* Use json-encode ($arr) 
                                to convert array to json */

?>