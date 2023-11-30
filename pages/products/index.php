<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bg-none" style="background: none; padding-top: 8rem" data-wow-delay="0.1s">
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
                            include_once('config/regain.php');
                            while ($row = $result->fetch_assoc()) {
                                    echo'<div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
                                        echo'<div class="product-item">';
                                            echo'<div class="position-relative bg-light overflow-hidden">';
                                                $images = json_decode($row['HinhAnh'], true);
                                                    foreach ($images as $img) {
                                                        echo '<img width="90" height="230" alt="hinh san pham" class="card-img-top" src="'."pages/products/". $img.'"/>';
                                                    }
                                                echo'<div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>';
                                            echo'</div>';
                                            echo'<div class="text-center p-4">';
                                                echo'<a class="d-block h5 mb-2 text-black" href="">' . $row['ChiTiet'] . '</a>';
                                                echo'<span class="text-primary me-1">'.$row['DonGia'].'đ</span>';
                                                echo'<span class="text-body text-decoration-line-through">$29.00</span>';
                                            echo'</div>';
                                            echo'<div class="d-flex border-top">';
                                                echo'<small class="w-50 text-center border-end py-2">';
                                                echo'<a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View';
                                                echo'detail</a>';
                                                echo'</small>';
                                                echo'<small class="w-50 text-center py-2">';
                                                echo'<a class="text-body" href=""><i';
                                                echo'class="fa fa-shopping-bag text-primary me-2"></i>Add';
                                                echo'to cart</a>';
                                                echo'</small>';
                                            echo'</div>';
                                        echo'</div>';
                                    echo'</div>';

                                // echo '<div class="col-md-4 mb-4">';
                                // echo '<div class="card">';
                                // $images = json_decode($row['HinhAnh'], true);
                                //     foreach ($images as $img) {
                                //         echo '<img width="90" height="230" alt="hinh san pham" class="card-img-top" src="'."pages/products/". $img.'"/>';
                                //     }
                                // echo '<div class="card-body">';
                                // echo '<p class="card-text">' . $row['ChiTiet'] . '</p>';
                                // echo '<div class="d-grid gap-2 d-md-block">';
                                // echo '<button type="button" class="btn btn-primary">'.$row['DonGia'].'đ</button>';
                                // echo '</div>';
                                // echo '</div>';
                                // echo '</div>';
                                // echo '</div>';
                            }
                  
                            $connect->close();
                        ?>
                        <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Header End -->

<!-- Product Start -->