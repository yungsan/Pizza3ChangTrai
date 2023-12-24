<?php 
$page = 'Home';
if (isset($_GET['page'])) {
    $page = ucfirst($_GET['page']); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $page; ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/images/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/login_style.css"> -->

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <!-- JQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico?v=2">
    <style>
        .text {
            overflow: hidden;
            display: -webkit-box !important;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        ::-webkit-scrollbar {
            width: 4px;
            height: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #FFB30E;
            border-radius: .25rem;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i> Al Haram, 3512201, Ai Cập</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>noreply@pizza.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="./" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Pi<span class="text-secondary">zz</span>a</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0 position-relative">
                    <a href="./" class="nav-item nav-link active">Trang Chủ</a>
                    <a href="./?page=promotion" class="nav-item nav-link">Khuyến Mãi</a>
                    <a href="./?page=products" class="nav-item nav-link">Thực đơn</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <a href="./?page=store" class="nav-item nav-link">Chi Nhánh</a>
                    <a href="./?page=contact" class="nav-item nav-link">Liên Hệ</a>
                    <a href="./?page=blog" class="nav-item nav-link">Blog</a>
                    <form action="pages/search/handleSearch.php" method="GET" id='search_form' class='d-none'>
                        <div class="position-absolute top-50 start-0 py-2 w-100">
                            <input type="text" class='w-75 p-3 form-control rounded-pill rounded-end' autofocus name="keyword"
                                placeholder="Nhập tên món ăn" id='searchInput'>
                            <button
                                class='btn btn-primary p-3 position-absolute top-50 end-0 translate-middle rounded-pill rounded-start'
                                id='search_submit'>Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <span class="btn-sm-square bg-white rounded-circle ms-3" id="search_icon">
                        <small class="fa fa-search text-body"></small>
                    </span>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="?page=login">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $user_avatar = $_SESSION['user']['avatar'];
                            echo '<img src="pages/profile/' . $user_avatar . '" alt="user avatar"
                            class="border rounded w-100 h-100 rounded-circle" style="object-fit: cover">';
                        } else {
                            echo '<small class="fa fa-user text-body"></small>';
                        }
                        ?>

                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3 position-relative" href="?page=cart">
                        <small class="fa fa-shopping-bag text-body"></small>
                        <span class="position-absolute bg-primary rounded-circle w-75 h-75 text-black text-center"
                            style="top: -10px; right: -10px" id='cart'>0</span>
                    </a>
                </div>
            </div>
        </nav>
        <script>
            const search_form = document.querySelector('#search_form');
            const search_icon = document.querySelector('#search_icon');
            search_icon.onclick = () => {
                search_form.classList.toggle("d-none");
            };

        </script>
    </div>
    <!-- Navbar End -->