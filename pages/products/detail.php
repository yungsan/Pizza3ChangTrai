<section>
    <div class="container mt-5 ">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-10 mt-5">
                <div class="card mt-5 border border-warning ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <?php
                                $id = $_GET['id'];
                                require_once('config/database.php');

                                $stmt = $connect->prepare("SELECT * FROM products WHERE id = ?");
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();


                                ?>
                                <!-- <div class="text-center p-4">
                                        <?php
                                        // $images = json_decode($row['HinhAnh'], true);
                                        // foreach ($images as $img) {
                                        //     echo '<img width="100" height="320" alt="hinh san pham" class="card-img-top" src="'."pages/products/". $img.'"/>';
                                        // }
                                        ?>
                                    </div> -->
                                <div class="text-center p-3 ">
                                    <?php
                                    $images1 = $row['thumbnail'];
                                    echo '<img style="object-fit: cover;" width="110" height="280" alt="hinh san pham" class="card-img-top rounded" src="' . "pages/admin/pages/products/" . $images1 . '"/>';
                                    ?>
                                </div>
                                <div class="thumbnail text-center">
                                    <?php
                                    $images2 = json_decode('' . $row['images'] . '');
                                    foreach ($images2 as $img) {
                                        echo '<img class="rounded mx-2" width="80" height="68" alt="hinh san pham" src="' . "pages/admin/pages/products/" . $img . '"/>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-2">
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Pizza</span>
                                    <?php
                                    echo '<h5 id="' . $row['id'] . '" class="text-uppercase">
                                                ' . $row['product_name'] . '';
                                    echo '</h5>';
                                    ?>
                                    <div class="price mt-3  d-flex flex-row align-items-center">
                                        <?php
                                        echo '<span class="act-price">
                                                        ' . $row['price'] . '';
                                        echo '</span>';
                                        ?>
                                        <div class="ml-2 mx-2">
                                            <small class="dis-price">130,000đ</small>
                                            <span> 10% OFF</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo '<p class="about my-3">
                                                Chi tiết sản phẩm:
                                                ' . $row['description'] . '';
                                echo '</p>';
                                ?>
                                <div class="row">
                                    <div class="sizes mt-5 p-3">
                                        <h6 class="text-uppercase">Size</h6>
                                        <label class="radio">
                                            <input type="radio" name="size" value="S" checked="checked">
                                            <span>S</span>
                                        </label>
                                        <label class="radio"> 
                                            <input type="radio" name="size" value="M" checked="checked">
                                            <span>M</span>
                                        </label>
                                        <label class="radio"> 
                                            <input type="radio" name="size" value="L" checked="checked">
                                            <span>L</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="cart mt-5 mb-2 align-items-center">
                                    <button class="btn btn-danger text-uppercase mr-2 px-4 mx-3 " id="addToCart">
                                        Thêm vào giỏ hàng
                                    </button>
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



<!-- Trong phần HTML của trang chi tiết sản phẩm -->

<script>
    $(document).ready(function() {
        $('#addToCart').on('click', function() {
            addToCart();
        });
    });

    function addToCart() {
        var productId = <?php echo $row['id']; ?>;
        var productName = '<?php echo $row['product_name']; ?>';
        var productPrice = <?php echo $row['price']; ?>;
        var productName = '<?php echo $row['thumbnail']; ?>';
        var selectedSize = $('input[name="size"]:checked').val();

        var data1 = {
            id: productId,
            name: productName,
            price: productPrice,
            thumbnail: productName,
            size: selectedSize
        };

        $.ajax({
                type: 'POST',
                url: 'pages/products/addToCart.php',
                data: data1
            })
            .done(function(response) {
                console.log(response);
            })
            .fail(function(error) {
                console.error('Error:', error);
            });

    }
</script>