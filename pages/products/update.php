<?php
    $ten_san_pham = $_POST["productName"];
    $don_gia = $_POST["productPrice"];
    $chi_tiet = $_POST['ChiTietSanPham'];
    $file_paths = [];
    // file
    // duyet qua tung file de check xem co loi ko
    $length = count($_FILES['productImage']['name']);

    for ($i = 0; $i < $length; $i++) {
        if ($_FILES['productImage']['error'][$i] > 0) {
            echo '<h1 style="color=red">Hình ảnh bị lỗi. Hãy thử lại!</h1>';
        } else {
            // neu khong loi se bat dau luu file ve server
            $tmp_path = $_FILES['productImage']['tmp_name'][$i];
            $new_path = './upload/' . time() . '_' . $_FILES['productImage']['name'][$i];
            move_uploaded_file($tmp_path, $new_path);
            array_push($file_paths, $new_path);
        }
    }



    // connect database
    include_once('../../config/database.php');

    // insert data
    $pro_id = rand(10,100);
    $hinh_anh = json_encode($file_paths, JSON_UNESCAPED_SLASHES);
    $sql = "INSERT INTO sanpham (ID,TenSanPham, DonGia, ChiTiet, HinhAnh) 
            VALUES ('$pro_id', '$ten_san_pham', '$don_gia', '$chi_tiet', '$hinh_anh')";
    if (!mysqli_query($connect, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

        header("Location: http://localhost:8282/Pizza3ChangTrai/?page=products");
        
?>
