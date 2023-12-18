<?php
require_once('../../config/database.php');
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = ($connect->query($sql))->fetch_assoc();
?>

<div class="flex flex-col flex-wrap overflow-y-auto md:flex-row mb-8">
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-2/3">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Chỉnh sửa sản phẩm
            </h1>
            <input type='text' id='user_id' value="<?php echo $_SESSION['user']['id']; ?>" hidden />
            <input type='text' id='product_id' value="<?php echo $id; ?>" hidden />
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product name" id="product_name" value="<?php echo $result['product_name'] ?>" />
            </label>
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Đơn giá</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product price" id="product_price" value="<?php echo $result['price'] ?>" />
            </label>
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Chuyên mục</span>
                <select
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    id='product_category'>
                    <?php
                    require_once('../../config/database.php');
                    $sql = "SELECT * FROM categories";
                    $products = $connect->query($sql);
                    while ($row = $products->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
                    }
                    ?>
                </select>
            </label>
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Mô tả</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    rows="10" placeholder="Description"
                    id="product_description"><?php echo $result['product_name'] ?></textarea>
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                id="submit">
                Cập nhật
            </button>
        </div>
    </div>
    <div class="w-1/3">
        <!-- thumbnail -->
        <div class="h-32 md:h-auto md:w-full cursor-pointer hover:opacity-50 rounded-md">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden thumb  rounded-md"
                src="pages/products/<?php echo $result['thumbnail'] ?>" alt="thumbnail" id="thumbnail" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                src="pages/products/<?php echo $result['thumbnail'] ?>" alt="Office" />
            <input type="file" name="avatar" id="thumbnail_input" hidden>
        </div>
        <!-- images -->
        <div class="flex flex-wrap col-gap-1 row-gap-5 justify-evenly md:h-auto md:ful cursor-pointer hover:opacity-50 mt-3"
            id="imagesContainer">
            <?php 
            $images = json_decode($result['images'], true);
            foreach ($images as $image){
                echo '<div class="w-1/4 rounded-md">
                        <img aria-hidden="true" class="rounded-md object-cover w-full h-full dark:hidden" src="pages/products'.$image.'" alt="image" />
                    </div>';
            }
            ?>
        </div>
        <button class='bg-secondary-300 w-full p-3 rounded-lg mt-4' id='images_button'>
            Cập nhật hình ảnh
        </button>
        <input type="file" name="images" id="images_input" multiple hidden>
    </div>
</div>

<script>
    const thumbnail = document.querySelector('#thumbnail');
    const thumbnail_input = document.querySelector('#thumbnail_input');
    thumbnail.addEventListener('click', () => thumbnail_input.click());
    previewThumbnail(thumbnail_input, thumbnail);
    const images_button = document.querySelector('#images_button');
    const images_input = document.querySelector('#images_input');
    const imagesContainer = document.querySelector('#imagesContainer');
    images_button.addEventListener('click', () => images_input.click());
    images_input.onchange = evt => {
        imagesContainer.innerHTML = '';
        const files = images_input.files;
        for (let i = 0; i < files.length; i++) {
            const url = URL.createObjectURL(files[i]);
            const html = `  <div class="w-1/4 rounded-md">
                                <img aria-hidden="true" class="rounded-md object-cover w-full h-full dark:hidden" src="${url}" alt="image" />
                            </div>`;
            imagesContainer.insertAdjacentHTML('beforeend', html);
        }
    };
    function previewThumbnail(input, img) {
        input.onchange = evt => {
            const [file] = input.files;
            img.src = URL.createObjectURL(file);
        }
    }


    // jquery
    $(document).ready(function () {
        $("#submit").on("click", function (e) {
            e.preventDefault();
            sendData();
        });
    });

    function sendData() {
        const user_id = $("#user_id").val();
        const product_id = $("#product_id").val();
        const product_name = $("#product_name").val();
        const product_price = $("#product_price").val();
        const product_category = $("#product_category").val();
        const product_description = $("#product_description").val();
        let product_thunbnail = $("#thumbnail_input")[0].files[0];
        let product_images = $("#images_input").prop("files");

        const formData = new FormData();

        formData.append("user_id", user_id);
        formData.append("product_id", product_id);
        formData.append("product_name", product_name);
        formData.append("product_price", product_price);
        formData.append("product_category", product_category);
        formData.append("product_description", product_description);
        if (!thumbnail) {
            product_thunbnail = 'NULL'
        }
        formData.append("thumbnail", product_thunbnail);
        for (const image of product_images) {
            formData.append("images[]", image);
        }

        $.ajax({
            url: "pages/products/handleUpdate.php",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                alert(response);
            },
            error: function (error) {
                alert(error);
            }
        });
    }
</script>