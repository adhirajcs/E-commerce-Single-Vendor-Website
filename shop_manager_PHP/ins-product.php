<?php
    include("inc/db.php");
    
    if(isset($_POST['save'])) {
        $pname=$con->real_escape_string($_POST['pname']);
        $pprice=$_POST['pprice'];
        $pcat=$_POST['pro_cat_name'];

        $fn=time().$_FILES['pimage']['name'];
        $buf=$_FILES['pimage']['tmp_name'];

        move_uploaded_file($buf,"product_img/".$fn);

        $sel="INSERT into products set product_name='$pname',product_price='$pprice',product_cat='$pcat',product_image='$fn'";

        $con->query($sel);
        header("location:list-products.php");
    }
?>