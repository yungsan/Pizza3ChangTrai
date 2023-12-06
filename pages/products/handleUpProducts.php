<?php
    require_once('config/database.php');
    $sql = "SELECT * FROM products";
    $result = $connect->query($sql);
    if (!$result){
        echo "Error";
        die();
    }
?>

<?php
    while ($row = $result->fetch_assoc()){
        echo '<div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="product-item">
            <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="pages/admin/pages/products/'.$row['thumbnail'].'" alt="thumbnail">
                <div class="bg-secondary rounded text-white position-absolute end-0 top-0 m-3 py-1 px-3">New</div>
            </div>
            <div class="text-center p-4">
                <a class="d-block h5 mb-2 text-black" href="#">'.$row['product_name'].'</a>
                <span class="text-secondary me-1 fw-bold">'.number_format($row['price'], 0, '.', '.').'</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
            </div>
            <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                    <a class="text-body" href="http://localhost/Pizza3ChangTrai/?page=detail&&id='.$row['id'].'"><i class="fa fa-eye me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                    <a class="text-body" href=""><i class="fa fa-shopping-bag me-2"></i>Add to cart</a>
                </small>
            </div>
        </div>
    </div>';
    }
?>