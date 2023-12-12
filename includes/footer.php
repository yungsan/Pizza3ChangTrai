<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="fw-bold text-primary mb-4">Pi<span class="text-secondary">zz</span>a</h1>
                <p>
                    Pizza3changtrai cam kết chất lượng nguyên liệu cao và an toàn. Giao
                    hàng nhanh chóng đưa sản phẩm đến với bạn khi còn nóng.
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Thông tin</h4>
                <p><i class="fa fa-map-marker-alt me-3"></i> Al Haram, Nazlet El-Semman, Al Giza Desert, Giza
                    Governorate 3512201, Ai Cập</p>
                <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-3"></i>noreply@pizza.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Hỗ trợ</h4>
                <a class="btn btn-link" href="">Giới thiệu</a>
                <a class="btn btn-link" href="">Liên hệ</a>
                <a class="btn btn-link" href="">Dịch vụ</a>
                <a class="btn btn-link" href="">Điều khoản sử dụng</a>
                <a class="btn btn-link" href="">Tuyển dụng</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Đăng ký nhận tin</h4>
                <p>Nhận thông báo về các ưu đãi sớm nhất dành riêng cho bạn.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Đăng
                        ký</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Pizza3changtrai.com</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/wow/wow.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
<script>
    const cart_count = document.querySelector('#cart');
    let cart = localStorage.getItem('cart');
    let number_of_cart = 0;
    if (!cart) {
        localStorage.setItem('cart', '[]');
    }
    else {
        number_of_cart = JSON.parse(localStorage.getItem('cart')).length;
    }
    cart_count.innerHTML = number_of_cart;

</script>
</body>

</html>