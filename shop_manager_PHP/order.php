<?php include("inc/db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("inc/menu.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("inc/top.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List Order</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Billing Name</th>
                                <th>Billing Phone</th>
                                <th>Billing Address</th>
                                <th>Shipping Name</th>
                                <th>Shipping Phone</th>
                                <th>Shipping Address</th>
                                <th>View Details</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selb = "SELECT * FROM bill";
                            $rsb = $con->query($selb);
                            while ($rowb = $rsb->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $rowb['bname']; ?></td>
                                    <td><?php echo $rowb['bphone']; ?></td>
                                    <td><?php echo $rowb['baddress']; ?></td>
                                    <td><?php echo $rowb['sname']; ?></td>
                                    <td><?php echo $rowb['sphone']; ?></td>
                                    <td><?php echo $rowb['saddress']; ?></td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rowb['order_id']; ?>">
                                            Details
                                        </button>

                                        <div class="modal" id="myModal<?php echo $rowb['order_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Details of order no. (#<?php echo $rowb['order_id']; ?>)</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product Name</th>
                                                                    <th>Product Image</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Total</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $oid = $rowb['order_id'];
                                                                $sel = "SELECT sorder.*,products.product_name,products.product_image FROM sorder INNER JOIN products ON products.product_id=sorder.pid WHERE sorder.order_id='$oid'";
                                                                $rs = $con->query($sel);
                                                                while ($row = $rs->fetch_assoc()) {
                                                                ?>

                                                                    <tr>
                                                                        <td><?php echo $row['product_name']; ?></td>
                                                                        <td><img src="http://localhost/shop_manager/product_img/<?php echo $row['product_image']; ?>" style="width: 80px;" /></td>
                                                                        <td><?php echo $row['price']; ?></td>
                                                                        <td>


                                                                            <?php echo $row['qty']; ?>

                                                                        </td>
                                                                        <td><?php echo $row['total']; ?></td>

                                                                    </tr>

                                                                <?php }  ?>

                                                            </tbody>
                                                        </table>

                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include("inc/footer.php"); ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>