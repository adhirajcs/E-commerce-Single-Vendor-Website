<?php 

   include("../inc/db.php");
   header('Access-Control-Allow-Origin: http://localhost:4200');
   header("Content-Type: application/json");  

   $bname=$_POST['bname'];
   $baddress=$_POST['baddress'];
   $bphone=$_POST['bphone'];

   $sname=$_POST['sname'];
   $sphone=$_POST['sphone'];
   $saddress=$_POST['saddress'];
   $cid=$_POST['cid'];


   $ins="INSERT INTO bill SET bname='$bname',baddress='$baddress',bphone='$bphone',sname='$sname',sphone='$sphone',saddress='$saddress',cid='$cid'";
   $con->query($ins);

   $order_id = $con->insert_id;

   $sel="SELECT * FROM cart WHERE customer_id='$cid'";
   $rs=$con->query($sel);
   while ($row=$rs->fetch_assoc()) {
   $pid=$row['pid'];
   $qty=$row['qty'];
 	$price=$row['current_price'];
   $total=$row['total'];

   $ins="INSERT INTO sorder SET pid='$pid',price='$price',qty='$qty',total='$total',order_id='$order_id'";
	$con->query($ins);

   }


$del="DELETE FROM cart WHERE customer_id='$cid'";
$con->query($del);

$arr=array(
'msg'=>"Order done successfully"
);
echo json_encode($arr);

?>