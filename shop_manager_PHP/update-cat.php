<?php 
    include("inc/db.php");
    include("inc/auth.php");

    $id=$_GET['id'];

    if(isset($_POST['save'])){

        $cname=$con->real_escape_string($_POST['cname']);
        $sql="UPDATE categories SET cat_name='$cname' WHERE cat_id='$id'";
        $con->query($sql);

        header("location:list-categories.php");
        
    }
    else {
        echo "Name did not changed!!!";
    }
    
?>