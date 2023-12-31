<section class="ftco-section py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex mb-3">
                        <div class="w-100 text-center">
                            <h1 class="fw-bold text-primary m-0">
                                Regi<span class="text-secondary">ser</span>
                                Pi<span class="text-secondary">zz</span>a
                            </h1>
                        </div>
                    </div>

                    <form action="pages/handleRegister.php" method="POST" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="username">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control p-3 rounded-pill" id='r_username' autofocus
                                placeholder="Username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="username">Email</label>
                            <input type="email" name="email" class="form-control p-3 rounded-pill" id='r_email'
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label fw-bold" for="password">Mật khẩu</label>
                            <input type="password" name="password" class="form-control p-3 rounded-pill" id='r_password'
                                placeholder="Password" required>
                        </div>
                        <div class="form-group mt-4">
                            <button id='registerSubmitButton' type="submit"
                                class="btn btn-primary rounded-pill py-sm-3 px-sm w-100">Đăng
                                ký</button>
                        </div>
                        <div class="form-group d-md-flex my-4">
                            <div class="w-100 text-center">
                                <a href="?page=login" class="text-secondary">
                                    Đã có tài khoản? Đăng nhập ngay.
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#registerSubmitButton').on('click', (e) => {
        e.preventDefault();
        const username = $('#r_username').val();
        const email = $('#r_email').val();
        const password = $('#r_password').val();

        if (!username){
            alert('Vui lòng nhập username');
            return;
        }
        if (!email){
            alert('Vui lòng nhập email');
            return;
        }
        if (!password){
            alert('Vui lòng nhập password');
            return;
        }

        const data = {
            username, email, password
        };

        $.ajax({
            url: "pages/handleRegister.php",
            type: 'POST',
            data: data,
            success: function (response) {
                alert(response);
                if (response == 'Đăng ký thành công!'){
                    window.location.href = "./?page=login";
                }
            },
            error: function (error) {
                alert(error);
            }
        });
    });
</script>