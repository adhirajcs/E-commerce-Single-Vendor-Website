<?php include("inc/db.php"); 

if(isset($_POST['save'])){

	$cname=$con->real_escape_string($_POST['cname']);

	$ins="INSERT INTO categories SET cat_name='$cname'";
	$con->query($ins);

	header("location:list-categories.php");
}
else{
	echo "Invalid Input!";
}
?>