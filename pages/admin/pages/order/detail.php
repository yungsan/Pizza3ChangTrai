<?php
require_once('../../config/database.php');
$invoice_id = $_GET['id'];
$sql = "SELECT * FROM invoice_detail i, products 
        WHERE i.product_id = products.id
        AND i.invoice_id = '$invoice_id'";
$result = $connect->query($sql);
?>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th scope="col">Mã hoá đơn</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Size</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-bold">
                                ' . $invoice_id . '
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div>
                                    <p class="font-semibold">' . $row['product_name'] . '</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-primary font-semibold">
                                ' . $row['amount'] . '
                            </td>
                            <td class="px-4 py-3 text-sm text-primary font-semibold">
                                ' . $row['size'] . '
                            </td>
                            <td class="px-4 py-3 text-sm text-primary">
                            <span class="px-2 py-1 font-semibold leading-tight text-secondary-700 bg-secondary-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                ' . 
                                number_format($row['price'], 0, '.', '.') 
                                . '                                
                            </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-primary">
                                <span class="px-2 py-1 font-semibold leading-tight text-primary-700 bg-primary-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                ' . 
                                number_format($row['total'], 0, '.', '.') 
                                . '                                
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Giao hàng thành công
                                </span>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>