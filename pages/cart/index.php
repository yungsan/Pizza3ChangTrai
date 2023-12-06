<section>
    <div class="container-fluid page-header mb-5" style="background: none; padding-top: 8rem">
        <div class="container pt-2">
            <!-- Cart body -->
            <div class="row mt-2">
                <!-- Cart footer -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="h4 fw-bold">Tổng cộng:</span>
                            <span class="total h4 text-secondary fw-bold">0</span>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary m-2">
                                Tiến hành đặt hàng
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row py-5" id='cart_list'>
                    <!-- <div class="col-md-6 d-flex justify-content-between border p-4 shadow-sm rounded-3">
                        <div class="p-0 m-0" style='height: 100px; width: 100px'>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Pizza_Vi%E1%BB%87t_Nam_%C4%91%E1%BA%BF_d%C3%A0y%2C_x%C3%BAc_x%C3%ADch_%28SNaT_2018%29_%287%29.jpg"
                                alt="image" class='w-100 h-100 object-fit-cover rounded-circle'>
                        </div>
                        <div class="px-4">
                            <h4 class='fw-bold'>
                                PIZZA HẢI SẢN
                            </h4>
                            <button class='btn btn-secondary rounded-pill'>
                                <label>Size: </label>
                                <label>S</label>
                            </button>
                            <button class='btn btn-secondary rounded-pill'>
                                <label>Đơn giá: </label>
                                <label>499.000</label>
                            </button>
                            <div class="my-3 d-flex flex-wrap">
                                <label class='d-block mb-1 fw-bold w-100'>Số lượng</label>
                                <button style='width: 40px; height: 40px' class='btn border' id='down'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                </button>
                                <input type="text" id='so_luong' value="1"
                                    class='form-control text-center border-end-0 border-start-0 border-top-0 rounded-0 border-primary'
                                    style="width: 15%" readonly>
                                <button style='width: 40px; height: 40px' class='btn border' id='up'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button class='btn btn-outline-primary text-black' style='height: fit-content'>
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        let CART = JSON.parse(localStorage.getItem('cart'));
        console.log(CART);
        CART.forEach(item => {
            const cart_item = `<div class="col-md-6 d-flex justify-content-between border-bottom border-end p-4 mb-3 cart_item">
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
                                <label>Đơn giá: </label>
                                <label>${(item.product_price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}</label>
                                <label class='d-none p_price'>${item.product_price}</label>
                            </button>
                            <div class="my-3 d-flex flex-wrap">
                                <label class='d-block mb-1 fw-bold w-100'>Số lượng</label>
                                <button style='width: 40px; height: 40px' class='btn border down'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                </button>
                                <input type="text" value="${item.amount}"
                                    class='form-control text-center border-end-0 border-start-0 border-top-0 rounded-0 border-primary so_luong'
                                    style="width: 15%" readonly>
                                <button style='width: 40px; height: 40px' class='btn border up'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button class='btn btn-outline-primary text-danger delete_button' style='height: fit-content'>
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </div>`;
            const cart_list = document.querySelector('#cart_list');
            cart_list.insertAdjacentHTML('beforeend', cart_item);
        });

    </script>
    <script src="pages/cart/updatetotal.js"></script>

</section>