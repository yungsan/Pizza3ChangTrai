
<section>
    <div class="container mt-5 ">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-10 mt-5">
                    <div class="card mt-5 border border-danger ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                <?php
                                    $id = $_GET['id'];
                                    include_once('config/database.php');

                                    $sql = "SELECT*FROM products WHERE id = $id";
                                    $result = $connect->query($sql);
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
                                            echo '<img style="object-fit: cover;" width="110" height="280" alt="hinh san pham" class="card-img-top rounded" src="'."pages/admin/pages/products/". $images1.'"/>';
                                        ?>
                                    </div>
                                    <div class="thumbnail text-center">
                                        <?php
                                            $images2 = json_decode(''.$row['images'].'');
                                            foreach ($images2 as $img) {
                                                echo '<img class="rounded mx-2" width="80" height="68" alt="hinh san pham" src="'."pages/admin/pages/products/".$img.'"/>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-2">
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Pizza</span>
                                        <?php
                                        echo'<h5 class="text-uppercase">
                                                '.$row['product_name'].'';
                                        echo'</h5>';
                                        ?>
                                        <div class="price mt-3  d-flex flex-row align-items-center"> 
                                            <?php
                                                echo'<span class="act-price">
                                                        '.$row['price'].'';
                                                echo'</span>';
                                            ?>
                                            <div class="ml-2 mx-2">
                                                <small class="dis-price">130,000đ</small> 
                                                <span> 10% OFF</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        echo'<p class="about my-3">
                                                Chi tiết sản phẩm:
                                                '.$row['description'].'';
                                        echo'</p>';
                                    ?>
                                    <div class="mt-5">
                                        <label for="" class="text-uppercase h6 radio">Số lượng</label>
                                        <input type="text" class="" name="" id="" value=" 1" style="width: 2rem; height:1.5rem;"/>
                                    </div>
                                    <div class="row">
                                        <div class="sizes mt-3">
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
                                    </div>
                                    <div class="cart mt-5 mb-2 align-items-center">
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