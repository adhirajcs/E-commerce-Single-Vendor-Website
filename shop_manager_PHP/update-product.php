<?php 
    include("inc/db.php");
    include("inc/auth.php");

    $id=$_GET['id'];

    if(isset($_POST['save'])){

        $pname=$con->real_escape_string($_POST['pname']);
        $pprice=$_POST['pprice'];
        $pcat=$_POST['pro_cat_name'];

        $file=$_FILES['pimage']['name'];

        if($file)
        {
            $fn=time().$_FILES['pimage']['name'];
            $buf=$_FILES['pimage']['tmp_name'];

            $sel="SELECT * from products where product_id='$id'";
            $rs=$con->query($sel);
            $row=$rs->fetch_assoc();
            unlink("produt_img/".$row['product_image']);
            move_uploaded_file($buf,"product_img/".$fn);

            $sel="UPDATE products set product_name='$pname',product_price='$pprice',product_cat='$pcat',product_image='$fn' where product_id='$id'";

            $con->query($sel);
            header("location:list-products.php");
        }
        else
        {
            $sel="UPDATE products set product_name='$pname',product_price='$pprice',product_cat='$pcat' where product_id='$id'";
            $con->query($sel);
        header("location:list-products.php");
        }
        
    }
    
?>