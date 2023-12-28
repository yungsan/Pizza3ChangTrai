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
                                <input type="text" name="sdt" id="sdt" class='form-control p-3' required
                                    placeholder="Phone numbers" value="<?php echo $_SESSION['user']['sdt'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class='form-label fw-bold'>Địa chỉ</label>
                                <input type="text" name="address" id="address" class='form-control p-3' required
                                    placeholder="Address" value="<?php echo $_SESSION['user']['address'] ?>">
                            </div>
                            <input type="text" id="uid" value="<?php echo $_SESSION['user']['id'] ?>" hidden>
                            <div class="text-end">
                                <button class='btn btn-primary w-100 p-3' id='order_button'>Đặt hàng</button>
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
        const total = document.querySelector('.total');
        CART.forEach(item => {
            const cart_item = `<div class="col-md-12 border-bottom border-end p-4 mb-3 cart_item">
                        <span class='d-none p_total'>${item.product_price * item.amount}</span>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="p-0 m-0" style='height: 150px; width: 100%'>
                                    <img src="${item.thumbnail}"
                                        alt="image" class='w-100 h-100 object-fit-cover rounded-3'>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="px-4">
                                    <h4 class='fw-bold'>
                                        ${item.product_name}
                                    </h4>
                                    <button class='btn btn-secondary rounded-pill'>
                                        <label>Size: </label>
                                        <label>${item.size}</label>
                                    </button>
                                    <button class='btn btn-secondary rounded-pill'>
                                        <label>Đơn giá: </label>
                                        <label>${(item.product_price).toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</label>
                                        <label class='d-none p_price'>${item.product_price}</label>
                                    </button>
                                    <div class="my-3 d-flex flex-wrap gap-1">
                                        <label class='d-block mb-1 fw-bold w-100'>Số lượng</label>
                                        <input type="text" value="${item.amount}"
                                            class='form-control text-center border-end-0 border-start-0 border-top-0 rounded-0 border-primary so_luong'
                                            style="width: 15%" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
            const cart_list = document.querySelector('#cart_list');
            cart_list.insertAdjacentHTML('beforeend', cart_item);
        });

        const sum = CART.reduce((total, item) => {
            return total + item.total;
        }, 0)
        total.innerHTML = sum.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
    </script>
    <script>
        const order_button = document.querySelector('#order_button');
        order_button.addEventListener('click', (e) => {
            e.preventDefault();
            const user_id = document.querySelector('#uid').value;
            const products = JSON.parse(localStorage.getItem('cart'));
            const fullname = document.querySelector('#fullname').value;
            const sdt = document.querySelector('#sdt').value;
            const address = document.querySelector('#address').value;
            if (!fullname) {
                alert('Bạn chưa nhập tên.');
                return;
            }
            if (!sdt) {
                alert('Bạn chưa nhập số điện thoại.');
                return;
            }
            if (!address) {
                alert('Bạn chưa nhập địa chỉ.');
                return;
            }
            const data = {
                user_id,
                products,
                fullname, 
                sdt,
                address
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

</section>