if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
console.log('hello')
// console.log(document.querySelectorAll('.minus'))
function ready() {
    var getremove = document.querySelectorAll('.text-danger') 
    for(var i = 0 ; i < getremove.length ; i++) {
        var btn = getremove[i]
        btn.addEventListener('click', remove)
    }
    var getqty = document.querySelectorAll('.qty')
    for(var i = 0 ; i < getqty.length ; i++) {
        var input = getqty[i]
        input.addEventListener('change' , qtychange)
    }
    var getminus = document.querySelectorAll('.minus')
    for(var i = 0 ; i < getminus.length; i++) {
        var btn = getminus[i]
        btn.addEventListener('click', updatetotal)
    }
    var getplus = document.querySelectorAll('.plus')
    for(var i = 0 ; i < getplus.length; i++) {
        var btn = getplus[i]
        btn.addEventListener('click', updatetotal)
    }
}
function qtychange(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updatetotal()
}

function remove(event) {
    var btnclicked = event.target
    btnclicked.parentElement.parentElement.parentElement.parentElement.parentElement.remove()
    updatetotal()
}

function updatetotal() {
    var cartcontainer = document.querySelectorAll('.product_row')[0]
    var cartrow = cartcontainer.querySelectorAll('.card_row')
    // console.log(cartrow)
    var total = 0 ;
    for (var i = 0 ; i < cartrow.length; i++) {
        var cartR = cartrow[i]
        var pricerow = cartR.querySelectorAll('.price')[0]
        var qtyrow = cartR.querySelectorAll('.qty')[0]
        var price = parseFloat(pricerow.innerText.replace('$', ''))
        var qty = qtyrow.value
        console.log(price, qty)
        total = total + (qty * price)
    }
    document.querySelectorAll('.total')[0].innerText = total
}