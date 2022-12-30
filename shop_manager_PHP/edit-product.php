<?php 
    include("inc/db.php");
    include("inc/auth.php");

    $pid=$_GET['pid'];
    $cid=$_GET['cid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("inc/menu.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("inc/top.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php 
                    
                    $sql="SELECT * from products where product_id=$pid";
                    $rs1=$con->query($sql);
                    if ($rs1->num_rows>0) {
                      $row1=$rs1->fetch_assoc();

                    ?>

                    <!-- Page Heading -->
                    <h3>Change Product Name</h3>
                    <form action="update-product.php?id=<?php echo $pid; ?>" method="post" enctype="multipart/form-data">
                    
                        <p>Category Name:
                        <select name="pro_cat_name">
                            <?php 
                                $x="SELECT * from categories where cat_id='$cid'";
                                $crs=$con->query($x);

                                if($crs->num_rows > 0) {
                                    $crow = $crs->fetch_assoc(); 
                            ?>
                            <option value="<?php echo $crow['cat_id']; ?>"> <?php echo $crow['cat_name']; ?> </option>
                            <?php } ?>

                            <?php
                            $x="SELECT * from categories";
                            $rs=$con->query($x);
                            while($row=$rs->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                            <?php } ?>

                        </select></p>
                        
                        <p>New Product Name:
                        <input type="text" value="<?php echo $row1['product_name']; ?>" name="pname" placeholder="Type a new name"></p>

                        <p>Product Price: 
                        <input type="number" value="<?php echo $row1['product_price'] ; ?>" name="pprice"></p>
                        <p>Product Image: 
                        <img style="width:200px;" src="product_img/<?php echo $row1['product_image'] ?>" alt="Unable to display the image">

                        <input type="file" name="pimage"></p>

                        <p><input type="submit" name="save" value="Update" class="btn btn-success">
                        </p>
                    </form>
                    <?php } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("inc/footer.php"); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>