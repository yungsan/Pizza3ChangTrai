<?php
require_once('config/database.php');
$sql = "SELECT * FROM products";
$result = $connect->query($sql);
if (!$result) {
    echo "Error";
    die();
}
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
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor
                            duo.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Vegetable</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <!-- products -->
                        <?php
                        while ($product = $result->fetch_assoc()) {
                            echo '
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item" style="height: ">
                                        <div class="position-relative bg-light overflow-hidden" style="width: 100%; height: 250px">
                                        <a href="?page=detail&id=' . $product['id'] . '">
                                            <img class="img-fluid w-100 h-100" src="pages/admin/pages/products/' . $product['thumbnail'] . '" alt="thumbnail" style="object-fit: cover">
                                            <div class="bg-secondary rounded text-white position-absolute end-0 top-0 m-3 py-1 px-3">New</div>
                                        </a>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block text-uppercase h5 mb-2 text-black text" href="#">' . $product['product_name'] . '</a>
                                            <span class="text-secondary me-1 fw-bold">' . number_format($product['price'], 0, '.', '.') . ' đ</span>
                                            <span class="text-body text-decoration-line-through">$29.00</span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center border-end py-2">
                                                <a class="text-body" href=""><i class="fa fa-eye me-2"></i>View detail</a>
                                            </small>
                                            <small class="w-50 text-center py-2">
                                                <a class="text-body" href=""><i class="fa fa-shopping-bag me-2"></i>Add to cart</a>
                                            </small>
                                        </div>
                                    </div>
                            </div>';
                        }
                        ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Header End -->

<!-- Product Start -->