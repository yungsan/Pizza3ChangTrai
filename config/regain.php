<?php
    include_once('database.php');
    $sql = "SELECT ID, TenSanPham, DonGia, ChiTiet, HinhAnh FROM sanpham";
    $result = $connect->query($sql);
?>