<?php
    include_once('config/database.php');
    $sql = "SELECT ID, TenSanPham, DonGia, ChiTiet, HinhAnh FROM sanpham";
    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row['ID'];
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
                    echo'<a class="text-body" href="http://localhost/Pizza3ChangTrai/?page=detail&&id='.$id.'"><i class="fa fa-eye text-primary me-2"></i>View';
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