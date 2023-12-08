<?php
$id = $_GET['id'];
include_once('config/database.php');

$sql = "SELECT * FROM products WHERE id = $id";
$row = ($connect->query($sql))->fetch_assoc();
$images = json_decode($row['images'], true);
$c_id = $row['category_id'];
$sql = "SELECT category_name FROM categories WHERE categories.id = $c_id";
$category = ($connect->query($sql))->fetch_assoc();
?>
<style>
    .activeSize {
        background: #F17228 !important;
        border-color: #F17228 !important;
        font-weight: bold;
        color: white !important;
    }
</style>
<section class="container-fluid page-header mb-5 wow fadeIn bg-none" style="background: none; padding-top: 8rem"
    data-wow-delay="0.1s">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12" style='width: 100%; height: 500px;'>
                            <img src="pages/admin/pages/products/<?php echo $row['thumbnail']; ?>" alt="thumbnail"
                                class='img-thumbnail border-0 rounded-4 w-100 h-100' style="object-fit: cover;">
                        </div>
                        <div class="col-md-12 position-relative mt-1 w-100" style='overflow-x: scroll'
                            id="imagesContainer">
                            <div class="d-flex gap-2" style='width: <?php echo count($images) * 100 ?>px;'>
                                <?php
                                foreach ($images as $image) {
                                    echo " <div style='width: 100px; height: 100px;'>
                                                <img src=pages/admin/pages/products/" . $image . " alt='image' class='product_image border-0 rounded-4 w-100 h-100' style='object-fit: cover'>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-5">
                    <div class="mb-3">
                        <input type="text" id="pid" hidden value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="mb-3">
                        <span class='text-secondary fw-bold'>
                            <?php echo $category['category_name']; ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <h3 class='text-uppercase' id="product_name">
                            <?php echo $row['product_name']; ?>
                        </h3>
                    </div>
                    <div class="mb-3">
                        <p class='text-muted lh-lg'>
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <span class='text-secondary fw-bold h3' id='_product_price'>
                            <?php echo number_format($row['price'], 0, '.', '.'); ?> VND
                        </span>
                        <input type="number" id='product_price' hidden value="<?php echo $row['price'] ?>" />
                        <span class='text-muted text-decoration-line-through'>
                            499.000 đ
                        </span>
                    </div>
                    <div class="mb-2">
                        <label class='d-block fw-bold'>Kích thước</label>
                        <div class="d-flex col-md-6 gap-3" id='sizes'>
                            <button class="activeSize w-25 form-control text-center ">S</button>
                            <button class="w-25 form-control text-center ">M</button>
                            <button class="w-25 form-control text-center ">L</button>

                        </div>
                    </div>
                    <div class="mb-4 d-flex gap-2 flex-wrap">
                        <label class='d-block mb-1 fw-bold w-100'>Số lượng</label>
                        <button style='width: 40px; height: 40px' class='btn border' id='down'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </button>
                        <input type="text" id='so_luong' value="1"
                            class='form-control text-center border-end-0 border-start-0 border-top-0 rounded-0 border-primary'
                            style="width: 15%" readonly>
                        <button style='width: 40px; height: 40px' class='btn border' id='up'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <button id='addToCart_button' class='btn btn-primary p-3 rounded-pill w-100'>Thêm vào giỏ
                                hàng</button>
                        </div>
                        <div class="col-md-6">
                            <button class='btn btn-secondary p-3 rounded-pill w-100'>Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const imagesContainer = document.querySelector('#imagesContainer');
    xScroll(imagesContainer);
    const product_images = imagesContainer.querySelectorAll('.product_image');
    product_images.forEach(image => {
        image.onclick = () => {
            document.querySelector('img[alt="thumbnail"]').src = image.src;
        }
    });


    const size_buttons = document.querySelectorAll('#sizes button');
    size_buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            if (!btn.classList.contains('activeSize')) {
                document.querySelector('.activeSize').classList.remove('activeSize');
                btn.classList.add('activeSize');
            }
            let multiple = 1;
            const size = btn.innerText;
            if (size == 'M') {
                multiple = 1.1;
            }
            else if (size == 'L') {
                multiple = 1.2;
            }
            updatePrice(multiple);
        });
    });

    const increase_button = document.querySelector('#up');
    const decrease_button = document.querySelector('#down');
    const amount_input = document.querySelector('#so_luong');
    increase_button.addEventListener('click', () => {
        const currentValue = Number(amount_input.value);
        amount_input.value = currentValue + 1;
    })
    decrease_button.addEventListener('click', () => {
        const currentValue = Number(amount_input.value);
        if (currentValue == 1) {
            return;
        }
        amount_input.value = currentValue - 1;
    })

    const addToCart_button = document.querySelector('#addToCart_button');

    addToCart_button.onclick = () => {
        const product_id = Number(document.querySelector('#pid').value);
        const product_name = document.querySelector('#product_name').innerText;
        let product_price = Number(document.querySelector('#product_price').value);
        const amount = Number(amount_input.value);
        const size = document.querySelector('.activeSize').innerHTML;
        const thumbnail = document.querySelector('img[alt="thumbnail"]').src;

        if (size == 'M'){
            product_price *= 1.1;
        }
        else if (size == 'L'){
            product_price *= 1.2;
        }

        const data = {
            product_id,
            product_name,
            product_price,
            amount,
            size,
            thumbnail
        };

        const cart_values = JSON.parse(localStorage.getItem('cart'));
        cart_values.push(data);
        localStorage.setItem('cart', JSON.stringify(cart_values));
        cart_count.innerHTML = cart_values.length;
    }

    function xScroll(element) {
        element.addEventListener('wheel', (event) => {
            event.preventDefault();

            element.scrollBy({
                left: event.deltaY < 0 ? -30 : 30,
            });
        });
    }

    function updatePrice(multiple) {
        const _product_price = document.querySelector('#_product_price');
        const product_price = document.querySelector('#product_price');
        _product_price.innerText = (Number(product_price.value) * multiple).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
    }
</script>