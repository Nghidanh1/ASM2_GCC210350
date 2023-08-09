<?php
require_once('header.php');
require_once('connect.php');
$sql = "SELECT * FROM `product`";
$c = new Connect();
$dblink = $c->connectToMySQL();


$re = $dblink->query($sql);
$row = $re->fetch_assoc()
?>
<img src="./Images/top-5-cong-ty-san-xuat-do-choi-tre-em-uy-tin-nhat-o-viet-nam-3.jpg" style="width: 40%;" alt="Centered Image" ;>
<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget text-center">
                    <h2 class="product-wid-title">New product</h2>
                    <a href="allproducts.php" class="wid-view-more">View All</a>
                    <?php
                    $sql = "SELECT * FROM `product` ORDER BY `pid` DESC LIMIT 3";
                    $re = $dblink->query($sql);

                    while ($row = $re->fetch_assoc()) {
                    ?>
                        <div class="single-wid-product text-center">
                            <a href="detail.php?id=<?= $row['pid'] ?>"><img src="./images/<?= $row['pimage'] ?>" style="width: 60%;" alt="" class="product-thumb"></a>
                            <h2><a href="detail.php?id=<?= $row['pid'] ?>"><?= $row['pname'] ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?= $row['pprice'] ?>&#36;</ins>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>