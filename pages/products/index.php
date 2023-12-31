<?php
require_once('config/database.php');

$sql = "SELECT * FROM products ORDER BY id DESC";
$products = $connect->query($sql);

?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bg-none" style="background: none; padding-top: 8rem"
    data-wow-delay="0.1s">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row mb-3">
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-4">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản phẩm</h1>
                    </div>
                </div>
            </div>
            <div class="tab-content" id='abc'>
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <!-- products -->
                        <?php
                        while ($row = $products->fetch_assoc()) {
                            echo '
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item" style="height: ">
                                        <div class="position-relative bg-light overflow-hidden" style="width: 100%; height: 250px">
                                        <a href="?page=detail&id=' . $row['id'] . '">
                                            <img class="img-fluid w-100 h-100" src="pages/admin/pages/products/' . $row['thumbnail'] . '" alt="thumbnail" style="object-fit: cover">
                                            <div class="bg-secondary rounded text-white position-absolute end-0 top-0 m-3 py-1 px-3">New</div>
                                        </a>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block text-uppercase h5 mb-2 text-black text" href="#">' . $row['product_name'] . '</a>
                                            <span class="text-secondary me-1 fw-bold">' . number_format($row['price'], 0, '.', '.') . ' đ</span>
                                            <span class="text-body text-decoration-line-through">
                                            '.number_format($row['price'] * 1.3, 0, '.', '.').' đ
                                            </span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-100 text-center border-end py-2 text-primary">
                                                <a class="text-body" href="?page=detail&id=' . $row['id'] . '"><i class="fa fa-eye me-2"></i>Xem chi tiết</a>
                                            </small>
                                        </div>
                                    </div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Header End -->

<!-- Product Start -->