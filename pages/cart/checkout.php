<section>
    <div class="container-fluid page-header mb-5" style="background: none; padding-top: 8rem">
        <div class="container pt-2">
            <!-- Cart body -->
            <div class="row mt-2">
                <!-- Cart footer -->
                <div class="col-md-6 overflow-scroll" style='height: 500px'>
                    <div class="row">
                        <div class="col-md-12 justify-content-between d-flex">
                            <span class="h4 fw-bold">Tổng cộng:</span>
                            <span class="total h4 text-secondary fw-bold">0</span>
                        </div>
                    </div>
                    <div class="row py-5" id='cart_list'></div>
                </div>
                <div class="col-md-6">
                    <form action="#" method="POST">
                        <div class="container">
                            <div class="mb-3">
                                <label for="fullname" class='form-label fw-bold'>Họ tên</label>
                                <input type="text" name="fullname" id="fullname" class='form-control p-3'
                                    placeholder="Full name" value="<?php echo $_SESSION['user']['fullname'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sdt" class='form-label fw-bold'>Số điện thoại</label>
                                <input type="text" name="sdt" id="sdt" class='form-control p-3'
                                    placeholder="Phone numbers" value="<?php echo $_SESSION['user']['sdt'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class='form-label fw-bold'>Địa chỉ</label>
                                <input type="text" name="address" id="address" class='form-control p-3'
                                    placeholder="Address" value="<?php echo $_SESSION['user']['address'] ?>">
                            </div>
                            <div class="mb-1">
                                <label for="sdt" class='form-label fw-bold'>Phương thức thanh toán</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" value='1'
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" value='2'
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Chuyển khoản
                                </label>
                            </div>
                            <input type="text" id="uid" value="<?php echo $_SESSION['user']['id'] ?>" hidden>
                            <div class="text-end">
                                <button class='btn btn-primary w-50 p-2' id='order_button'>Đặt hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        let CART = JSON.parse(localStorage.getItem('cart'));
        console.log(CART);
        CART.forEach(item => {
            const cart_item = `<div class="col-md-12 d-flex border-bottom border-end p-4 mb-3 cart_item">
                        <span class='d-none p_total'>${item.product_price * item.amount}</span>
                        <div class="p-0 m-0" style='height: 100px; width: 100px'>
                            <img src="${item.thumbnail}"
                                alt="image" class='w-100 h-100 object-fit-cover rounded-circle'>
                        </div>
                        <div class="px-4">
                            <h4 class='fw-bold'>
                                ${item.product_name}
                            </h4>
                            <button class='btn btn-secondary rounded-pill'>
                                <label>Size: </label>
                                <label>${item.size}</label>
                            </button>
                            <button class='btn btn-secondary rounded-pill'>
                                <label>Số lượng: </label>
                                <label>${(item.amount)}</label>
                                <label class='d-none p_price'>${item.amount}</label>
                            </button>
                        </div>
                    </div>`;
            const cart_list = document.querySelector('#cart_list');
            cart_list.insertAdjacentHTML('beforeend', cart_item);
        });

    </script>
    <script>
        const radio_buttons = document.querySelectorAll('.form-check input');
        radio_buttons.forEach(btn => {
            btn.addEventListener('change', () => {
                let shipping = 0;
                if (btn.value == 1) {
                    shipping += 25000;
                }
                total.innerHTML = (_total + shipping).toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
            });
        });
    </script>
    <script>
        const order_button = document.querySelector('#order_button');
        order_button.addEventListener('click', (e) => {
            e.preventDefault();
            const user_id = document.querySelector('#uid').value;
            const products = JSON.parse(localStorage.getItem('cart'));
            const data = {
                user_id,
                products
            };
            $.ajax({
                url: "pages/cart/handleCheckout.php",
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response == "Đặt hàng thành công!") {
                        localStorage.setItem('cart', '[]');
                        cart_count.innerText = 0;
                        window.location.href = "?page=user&nav=purchaseHistory";
                    }
                    alert(response);
                },
                error: function (error) {
                    alert(error);
                }
            });
        });

    </script>
    <script src="pages/cart/updatetotal.js"></script>

</section>