<?php
require_once('config/database.php');
$sql = "SELECT * FROM products";
$products = $connect->query($sql);
if(!$products) {
    echo "Error";
    die();
}
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn d-none d-md-block" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="assets/images/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">Organic Food Is Good For Health</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="assets/images/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">Natural Food Is Always Healthy</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-md-none d-lg-block about-img position-relative overflow-hidden p-5 pe-0" style="width: 100%; height: 550px;">
                    <img class="img-fluid w-100"
                        src="https://images.unsplash.com/photo-1604382355076-af4b0eb60143?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        style="object-fit: cover">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-4">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Món mới về</h1>
                </div>
            </div>
            <div class="col-lg-8 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $categories = $connect->query($sql);
                    $i = 1;
                    while($row = $categories->fetch_assoc()) {
                        echo ' <li class="nav-item me-2">
                                        <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-'.$i.'">'.$row['category_name'].'</a>
                                    </li>';
                        $i++;
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <!-- products -->
                    <?php
                    while($row = $products->fetch_assoc()) {
                        echo '
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item" style="height: ">
                                        <div class="position-relative bg-light overflow-hidden" style="width: 100%; height: 250px">
                                        <a href="?page=detail&id='.$row['id'].'">
                                            <img class="img-fluid w-100 h-100" src="pages/admin/pages/products/'.$row['thumbnail'].'" alt="thumbnail" style="object-fit: cover">
                                            <div class="bg-secondary rounded text-white position-absolute end-0 top-0 m-3 py-1 px-3">New</div>
                                        </a>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block text-uppercase h5 mb-2 text-black text" href="#">'.$row['product_name'].'</a>
                                            <span class="text-secondary me-1 fw-bold">'.number_format($row['price'], 0, '.', '.').' đ</span>
                                            <span class="text-body text-decoration-line-through">$29.00</span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-100 text-center border-end py-2">
                                                <a class="text-body" href=""><i class="fa fa-eye me-2"></i>View detail</a>
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
<!-- Product End -->


<!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-6 mb-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 550px;">
            <h1 class="display-5 mb-3">Đánh giá của khách hàng</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Đa dạng các loại pizza và nhiều combo hấp dẫn. Khoai tây ở đây có thể dùng để thay thế pate cho mèo nữa! Chắn chắn sẽ quay lại!</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="https://zpsocial-f51-org.zadn.vn/57c3badb3c38d2668b29.jpg" alt="image">
                    <div class="ms-3">
                        <h5 class="mb-1">Phương Bùi</h5>
                        <span>Nhà thiết kế</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Pizza quá ngon mình hay mua cho gia đình ăn ai cũng hài lòng hết! Hy vọng có cơ hội được hợp tác với Pizza3changtrai một ngày nào đó.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="https://zpsocial-f52-org.zadn.vn/3cf0d1730b85e5dbbc94.jpg" alt="image">
                    <div class="ms-3">
                        <h5 class="mb-1">Phú Lê</h5>
                        <span>Project Manager</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">La pizza de Pizza3changtrai no es solo una comida, sino también una obra de arte culinaria. Para los amantes de la pizza.</p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4N_MTX7VKMZYYikeJKtrv1dYP2s6NWJlH2V-xrfESeg&s" alt="image">
                    <div class="ms-3">
                        <h5 class="mb-1">Leo Messi</h5>
                        <span>Cầu thủ</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
                <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                <p class="mb-4">Thành chưa bao giờ trải nghiệm hương vị của cái pizza nào như ở đây cả. Mọi hương vị đều nằm trong một chiếc pizza quả là tuyệt phẩm! </p>
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 rounded-circle" src="https://yt3.googleusercontent.com/ytc/APkrFKZtRCLcHd25P1bAH1nSGBvvR3zuqKYcpAGi1y9Jag=s900-c-k-c0x00ffffff-no-rj" alt="image">
                    <div class="ms-3">
                        <h5 class="mb-1">Trấn Thành</h5>
                        <span>MC</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
