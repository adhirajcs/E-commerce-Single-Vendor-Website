<?php 
    include("inc/db.php");
    include("inc/auth.php");

    $id=$_GET['id'];

    $del="DELETE FROM categories WHERE cat_id='$id'";
    $con->query($del);

    header("location:list-categories.php");
?>