<?php
require('config/database.php');
$user = $_SESSION['user'];
$sql = "SELECT * FROM invoices WHERE user_id = ".$user['id']." ORDER BY id DESC"; 
$bills = $connect->query($sql);
?>
<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="row">
            <div class="col-md-9">
                <div class="container">
                    <h3 class='mb-5 fw-bold'>Lịch sử mua hàng</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã hoá đơn</th>
                                <th scope="col">SĐT người đặt</th>
                                <th scope="col">Địa chỉ giao hàng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ngày lập hoá đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = $bills->fetch_assoc()){
                                echo '<tr>
                                        <th scope="row">
                                            <a href="?page=user&nav=detailBill&id='.$row['id'].'" class="text-black text-decoration-underline">'.$row['id'].'</a>
                                        </th>
                                        <td>'.$row['sdt'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td>
                                            <button class="btn btn-primary rounded-pill">'
                                                . number_format($row['total'], 0, '.', '.').
                                            '</button>
                                        </td>
                                        <td class="rounded-pill">
                                            <button class="btn btn-secondary rounded-pill">'
                                                .$row['created_at'].
                                            '</button>
                                        </td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item w-100 py-3">
                        <a href="?page=user" class='w-100 nav-link'>
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li class="list-group-item w-100 py-3">
                        <a href="?page=user&nav=purchaseHistory" class='text-primary w-100 nav-link fw-bold'>
                            Lịch sử mua hàng
                        </a>
                    </li>
                    <li class="list-group-item w-100 py-3">Đã thích</li>
                    <li class="list-group-item w-100 py-3">Voucher</li>
                    <li class="list-group-item w-100 py-3">Đánh giá của tôi</li>
                    <li class="list-group-item w-100 py-3">Trung tâm trợ giúp</li>
                    <a href="?page=logout" class='mt-3 p-3 text-black btn btn-primary w-100'>Đăng xuất</a>
                </ul>
            </div>
        </div>
    </div>
</section>