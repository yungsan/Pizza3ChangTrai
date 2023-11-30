<?php
    $id = $_GET['id'];
    include_once('config/database.php');

    $sql = "SELECT*FROM sanpham WHERE ID = $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>

<section class="container-fluid page-header mb-5 wow fadeIn bg-none">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <!-- <div class="text-center p-4">
                                     <?php
                                        // $images = json_decode($row['HinhAnh'], true);
                                        // foreach ($images as $img) {
                                        //     echo '<img width="100" height="320" alt="hinh san pham" class="card-img-top" src="'."pages/products/". $img.'"/>';
                                        // }
                                     ?>
                                </div> -->
                                <div class="text-center p-4 "> 
                                    <?php
                                        $images = json_decode($row['HinhAnh'], true);
                                        foreach ($images as $img) {
                                            echo '<img width="100" height="250" alt="hinh san pham" class="card-img-top rounded" src="'."pages/products/". $img.'"/>';
                                        }
                                     ?>
                                </div>
                                <div class="thumbnail text-center">
                                         <img onclick="change_image(this)" class="rounded" src="assets/images/blank_img.webp" width="80" height="68"> 
                                         <img onclick="change_image(this)" class="rounded" src="assets/images/blank_img.webp" width="80" height="68"> 
                                         <img onclick="change_image(this)" class="rounded" src="assets/images/blank_img.webp" width="80" height="68"> 
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Pizza</span>
                                    <?php
                                    echo'<h5 class="text-uppercase">
                                            '.$row['ChiTiet'].'';
                                    echo'</h5>';
                                    ?>
                                    <div class="price d-flex flex-row align-items-center"> 
                                        <?php
                                            echo'<span class="act-price">
                                                    '.$row['DonGia'].'';
                                            echo'</span>';
                                        ?>
                                        <div class="ml-2 mx-2">
                                            <small class="dis-price">130,000đ</small> 
                                            <span> 10% OFF</span> 
                                        </div>
                                    </div>
                                </div>
                                <p class="about">
                                Pizza Hải Sản Xốt Pesto Với Hải Sản (Tôm, Mực) Nhân Đôi Cùng Với Nấm Trên Nền Xốt Pesto Đặc Trưng, Phủ Phô Mai Mozzarella Từ New Zealand Và Quế Tây.
                                </p>
                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Size</h6> 
                                    <label class="radio">
                                        <input type="radio" name="size" value="S" checked> 
                                        <span>S</span> 
                                    </label> 
                                    <label class="radio"> <input type="radio" name="size" value="M"> 
                                        <span>M</span> 
                                    </label> 
                                    <label class="radio"> <input type="radio" name="size" value="L"> 
                                        <span>L</span> 
                                    </label> 
                                </div>
                                <div class="cart mt-4 align-items-center">
                                     <button class="btn btn-danger text-uppercase mr-2 px-4">Thêm vào giỏ hàng</button>
                                     <button class="btn btn-warning text-uppercase mr-2 px-4 mx-3">Mua ngay</button>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function change_image(image){
    var image_container = document.getElementById("main-image");


  image_container.src = image.src;

}
</script>