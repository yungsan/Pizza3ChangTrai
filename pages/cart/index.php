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
                            <a href='?page=checkout' type="button" id="checkoutButton" class="btn btn-primary m-2">
                                Tiến hành đặt hàng
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row py-5" id='cart_list'></div>
            </div>
        </div>
    </div>

    <script src="pages/cart/handleRender.js"></script>
    <script>
        const checkoutButton = document.querySelector('#checkoutButton');
        const CART =JSON.parse(localStorage.getItem('cart'));
        if (CART.length == 0) {
            checkoutButton.classList.add('d-none');
        }
    </script>
</section>