<?php
require('config/database.php');
$invoice_id = $_GET['id'];
$sql = "SELECT * FROM invoice_detail, products 
        WHERE invoice_detail.product_id = products.id
        AND invoice_detail.invoice_id = '$invoice_id'";
$result = $connect->query($sql);
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
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Size</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = $result->fetch_assoc()){
                                echo '<tr>
                                        <th scope="row"">
                                            '.$_GET['id'].'
                                        </th>
                                        <td>
                                            <a href="?page=detail&id='.$row['id'].'" class="text-black text-decoration-underline">
                                            '.$row['product_name'].'
                                            </a>
                                        </td>
                                        <td>
                                            '.$row['amount'].'
                                        </td>
                                        <td class="text-danger fw-bold">
                                            '.$row['size'].'
                                        </td>
                                        <td>
                                            <button class="btn btn-primary rounded-pill">'
                                                . number_format($row['price'], 0, '.', '.').
                                            '</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary rounded-pill">'
                                                . number_format($row['total'], 0, '.', '.').
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