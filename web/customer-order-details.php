<?php 
session_start();
require_once('../connection/connection.php'); 
//print_r($_SESSION['Receiver']);
$query = $db->query("SELECT * FROM customer_orders WHERE order_no ='".$_GET['order_no']."'");
$customer_order = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $db->query("SELECT * FROM order_details WHERE customer_orderID =".$customer_order['customer_orderID']);
$order_details = $query2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>我的訂單</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.php"><i class="fa fa-heart"></i> 願望清單</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="../index.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>訂單編號 #1735</h1>

                        <p class="lead">訂購日期 <strong>22/06/2013</strong> 目前狀態 <strong><span class="label label-info">待付款</span></strong>.</p>
                        <p class="text-muted">如何有任何訂單問題，請 <a href="contact.html">聯絡我們</a>, 我們會盡快為您處理</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="3">產品</th>
                                        
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th>總價</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($order_details as $item){ ?>
                                <tr>
                                            <td colspan="2">
                                                <a href="#">
                                                    <img src="../uploads/products/<?php echo $item['picture']; ?>" alt="White Blouse Armani" >
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $item['name']; ?></a>
                                            </td>
                                            <td>
                                            <?php echo $item['quantity']; ?>
                                            </td>
                                            <td>$NT<?php echo $item['price']; ?></td>
                                            <td>$NT<?php echo $item['price'] * $item['quantity']; ?></td>
                                            
                                        </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">訂單總金額</th>
                                        <th>$NT <?php echo $customer_order['total']; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">運費</th>
                                        <th>$NT <?php echo $customer_order['shipping']; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">總計</th>
                                        <th>$NT <?php echo $customer_order['total'] + $customer_order['shipping']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                                
                            </div>
                            <div class="col-md-6">
                                <h2>收件者資訊</h2>
                                <p><?php echo $customer_order['name']; ?></p>
                                <p><?php echo $customer_order['phone']; ?></p> 
                                <p><?php echo $customer_order['address']; ?></p> 
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>
