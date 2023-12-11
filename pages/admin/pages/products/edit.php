<?php 
require_once('../../config/database.php');
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = ($connect->query($sql))->fetch_assoc();
?>

<div class="flex flex-col flex-wrap overflow-y-auto md:flex-row mb-8">
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Chỉnh sửa sản phẩm
            </h1>
            <input type='text' id='user_id' value="<?php echo $_SESSION['user']['id']; ?>" hidden></input>
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product name" id="product_name" value="<?php echo $result['product_name'] ?>"/>
            </label>
            <label class="block text-sm mb-5">
                <span class="text-gray-700 dark:text-gray-400">Đơn giá</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product price" id="product_price" value="<?php echo $result['price'] ?>"/>
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
                    rows="10" placeholder="Description" id="product_description"><?php echo $result['product_name'] ?></textarea>
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                id="submit">
                Cập nhật
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#submit").on("click", function (e) {
            e.preventDefault();
            sendData();
        });
    });

    function sendData() {
        const product_name = $("#product_name").val();
        const product_price = $("#product_price").val();
        const product_category = $("#product_category").val();
        const product_description = $("#product_description").val();

        const data = {
            product_name,
            product_price,
            product_category,
            product_description
        };


        $.ajax({
            url: "pages/products/handleUpdate.php",
            type: 'POST',
            data: data,
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