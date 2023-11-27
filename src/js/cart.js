function addToCart(productID) {
    var qty = document.getElementById(productID + '-qty').value;
    var product = {
        id: productID,
        quantity: parseInt(qty),
    };
    if (localStorage.getItem('cart') === null) {
        var cart = [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
    } else {
        var cart = JSON.parse(localStorage.getItem('cart'));
        var index = cart.findIndex(item => item.id === productID);
        if (index !== -1) {
            cart[index].quantity += parseInt(qty);
        } else {
            cart.push(product);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    updateCartCount();
}

function displayCartItems(containerID) {
    var cartContainer = document.getElementById(containerID);
    cartContainer.innerHTML = '';
    if (localStorage.getItem('cart') !== null) {
        var cart = JSON.parse(localStorage.getItem('cart'));
        cart.forEach(item => {
            var productContainer = document.createElement('div');
            productContainer.className = 'cart-item';
            productContainer.innerHTML = `
                <img src="../images/${item.id}.png" alt="Product">
                <div class="cart-item-details">
                    <h3>${item.id}</h3>
                    <p>Quantity: ${item.quantity}</p>
                </div>
            `;
            cartContainer.appendChild(productContainer);
        });
    }
    displayTotalPrice(containerID);
}

function displayTotalPrice(containerID) {
    var cartContainer = document.getElementById(containerID);
    if (localStorage.getItem('cart') !== null) {
        var cart = JSON.parse(localStorage.getItem('cart'));
        var totalPrice = cart.reduce((total, item) => {
            return total + item.quantity;
        }, 0);
        var totalContainer = document.createElement('div');
        totalContainer.className = 'cart-total';
        totalContainer.innerHTML = `<p>Total: ${totalPrice}kr</p>`;
        cartContainer.appendChild(totalContainer);
    }
}

function updateCartCount() {
    var cartCount = 0;
    if (localStorage.getItem('cart') !== null) {
        var cart = JSON.parse(localStorage.getItem('cart'));
        cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    }
    document.getElementById('count').innerText = cartCount;
}
