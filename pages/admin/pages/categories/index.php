<?php
require_once('../../config/database.php');
$sql = "SELECT * FROM categories";
$products = $connect->query($sql);
$total = $products->num_rows;

$url = basename($_SERVER['REQUEST_URI']);
?>

<!-- Cards -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Số lượng
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                <?php echo $total ?>
            </p>
        </div>
    </div>
    <!-- Card -->
    <a href="./?page=create_category" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                Thêm mới
            </p>
        </div>
    </a>
</div>

<!-- New Table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Tên chuyên mục</th>
                    <th class="px-4 py-3">Số lượng sản phẩm</th>
                    <th class="px-4 py-3">Ngày tạo</th>
                    <th class="px-4 py-3">Ngày cập nhật</th>
                    <th class="px-4 py-3">####</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $i = 1;
                while ($row = $products->fetch_assoc()) {
                    $c_id = $row['id'];
                    $sql = "SELECT COUNT(*) as count FROM products WHERE category_id = $c_id";
                    $product_count = ($connect->query($sql))->fetch_assoc();

                    echo '<tr class="text-gray-700 dark:text-gray-400 product_item">
                            <td class="px-4 py-3 text-sm product_id">
                                ' . $row['id'] . '
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-10 h-10 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="pages/categories/' . $row['thumbnail'] . '"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">' . $row['category_name'] . '</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ' . $product_count['count'] . '
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    ' . $row['created_at'] . '
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    ' . $row['updated_at'] . '
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs text-right">
                                <a href="?page=edit_category&id=' . $row['id'] . '">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 text-primary-500  rounded-full dark:bg-red-700 dark:text-red-100 cursor-pointer edit_button">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-xs text-right">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-700  rounded-full dark:bg-red-700 dark:text-red-100 cursor-pointer delete_button">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                                </svg>
                            </td>
                        </tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const delete_buttons = document.querySelectorAll('.delete_button');
    const product_items = document.querySelectorAll('.product_item');
    const product_ids = document.querySelectorAll('.product_id');
    delete_buttons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            product_items[index].remove();
            delete_product(Number(product_ids[index].innerText));
        });
    });

    function delete_product(id) {
        const data = {
            'product_id': id
        };
        $.ajax({
            url: "pages/categories/handleDelete.php",
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