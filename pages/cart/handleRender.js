render();
const total = document.querySelector('.total');
const cart_items = document.querySelectorAll('.cart_item');

reset();
setTotal();
console.log(total);


function reset() {
    const increase_buttons = document.querySelectorAll('.up');
    const decrease_buttons = document.querySelectorAll('.down');
    const delete_buttons = document.querySelectorAll('.delete_button');
    const amount_input = document.querySelectorAll('.so_luong');

    increase_buttons.forEach((btn, index) => {

        btn.addEventListener('click', () => {
            const currentValue = Number(amount_input[index].value);
            amount_input[index].value = currentValue + 1;
            updateCart(index, amount_input[index]);
            setTotal();
        });
    });

    decrease_buttons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const currentValue = Number(amount_input[index].value);
            if (currentValue == 1) return;
            amount_input[index].value = currentValue - 1;

            updateCart(index, amount_input[index]);
            setTotal();
        });
    });

    delete_buttons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const cart = JSON.parse(localStorage.getItem('cart'));
            cart.splice(index, 1);
            // cart_items[index].remove();
    
            cart_count.innerHTML = cart.length;
            localStorage.setItem('cart', JSON.stringify(cart));
            
            render();
            reset();
            setTotal();
        })
    });
}



function setTotal() {
    const cart = JSON.parse(localStorage.getItem('cart'));
    const sum = cart.reduce((total, item) => {
        return total + item.total;
    }, 0)
    total.innerHTML = sum.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
}

function updateCart(index, amount) {
    const cart = JSON.parse(localStorage.getItem('cart'));
    cart[index].amount = Number(amount.value);
    cart[index].total = cart[index].product_price * cart[index].amount;
    localStorage.setItem('cart', JSON.stringify(cart));
}

function render() {
    const cart_list = document.querySelector('#cart_list');
    cart_list.innerHTML = '';
    let CART = JSON.parse(localStorage.getItem('cart'));

    CART.forEach((item, index) => {
        const cart_item = `<div class="col-md-6 border-bottom border-end p-4 mb-3 cart_item">
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
                                        <button style='width: 40px; height: 40px' class='btn border down'>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                            </svg>
                                        </button>
                                        <input type="text" value="${item.amount}"
                                            class='form-control text-center border-end-0 border-start-0 border-top-0 rounded-0 border-primary so_luong'
                                            style="width: 15%" readonly>
                                        <button style='width: 40px; height: 40px' class='btn border up' counter=${index}>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>
                                        <button class='btn btn-outline-primary text-danger delete_button' style='height: fit-content'>
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
        cart_list.insertAdjacentHTML('beforeend', cart_item);
    });
}