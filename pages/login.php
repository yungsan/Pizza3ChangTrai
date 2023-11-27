<?php 
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    header("Location: ?page=user");
    exit();
}
?>
<section class="ftco-section py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex mb-3">
                        <div class="w-100 text-center">
                            <h1 class="fw-bold text-primary m-0">
                                Lo<span class="text-secondary">gi</span>n
                                Pi<span class="text-secondary">zz</span>a
                            </h1>
                        </div>
                    </div>

                    <form action="controllers/loginController.php" class="signin-form" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="username">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control p-3 rounded-pill" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label fw-bold" for="password">Mật khẩu</label>
                            <input type="password" name="password" class="form-control p-3 rounded-pill" placeholder="Password" required>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill py-sm-3 px-sm w-100">Đăng
                                nhập</button>
                        </div>
                        <div class="form-group d-md-flex my-4">
                            <div class="w-50 text-left">
                                <a href="?page=register">
                                    Đăng ký ngay!
                                </a>
                            </div>
                            <div class="w-50 text-md-end">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>