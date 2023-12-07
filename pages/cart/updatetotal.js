const increase_buttons = document.querySelectorAll('.up');
const decrease_buttons = document.querySelectorAll('.down');
const amount_input = document.querySelectorAll('.so_luong');
const price = document.querySelectorAll('.p_price');
const total = document.querySelector('.total');
const p_total = document.querySelectorAll('.p_total');
const delete_buttons = document.querySelectorAll('.delete_button');
const cart_items = document.querySelectorAll('.cart_item');
let _total = 0;
setTotal();

delete_buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        cart_items[index].classList.add('d-none');
        const cart = JSON.parse(localStorage.getItem('cart'));
        cart.splice(cart[index], 1);
        cart_count.innerHTML = cart.length;
        localStorage.setItem('cart', JSON.stringify(cart));
    })
});

increase_buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        const currentValue = Number(amount_input[index].value);
        amount_input[index].value = currentValue + 1;
        p_total[index].innerHTML = Number(price[index].innerHTML) * Number(amount_input[index].value);
        setTotal();
    });
});

decrease_buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        const currentValue = Number(amount_input[index].value);
        if (currentValue == 1) {
            return;
        }
        amount_input[index].value = currentValue - 1;
        p_total[index].innerHTML = Number(price[index].innerHTML) * Number(amount_input[index].value);
        setTotal();
    });
});

function setTotal(){
    let newSum = 0;
    p_total.forEach((item) => {
        newSum += Number(item.innerHTML);
    });
    _total = newSum;
    total.innerHTML = newSum.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}