<?php
require_once('../../config/database.php');
$sql = "SELECT i.id, fullname, email, total, i.sdt, i.address, created_at FROM invoices i, users WHERE i.user_id = users.id ORDER BY id DESC";
$order = $connect->query($sql);
$total = $order->num_rows;

?>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Mã hoá đơn</th>
                    <th class="px-4 py-3">Khách hàng</th>
                    <th class="px-4 py-3">Địa chỉ giao hàng</th>
                    <th class="px-4 py-3">SĐT người đặt</th>
                    <th class="px-4 py-3">Tổng tiền</th>
                    <th class="px-4 py-3">Ngày lập hoá đơn</th>
                    <th class="px-4 py-3">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $i = 1;
                while ($row = $order->fetch_assoc()) {
                    echo '<tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-bold">
                                <a href="?page=order_detail&id='.$row['id'].'" class="underline">' . $row['id'] . '
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div>
                                    <p class="font-semibold">' . $row['fullname'] . '</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">'
                                        . $row['email'] .
                                    '</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-primary">
                                ' . $row['address'] . '
                            </td>
                            <td class="px-4 py-3 text-sm text-primary">
                                ' . $row['sdt'] . '
                            </td>
                            <td class="px-4 py-3 text-sm text-primary">
                                ' . number_format($row['total'], 0, '.', '.') . '
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-primary-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    ' . $row['created_at'] . '
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