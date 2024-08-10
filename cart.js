<script>
    const books = [
        { id: 1, title: 'Book 1', price: 10.99, quantity: 1 },
        { id: 2, title: 'Book 2', price: 12.99, quantity: 1 },
        // Add more books as needed
    ];

    function updateCart() {
        const cartItems = document.getElementById('cart-items');
        const cartCount = document.getElementById('cart-count');
        const cartSubtotal = document.getElementById('cart-subtotal');
        const cartTax = document.getElementById('cart-tax');
        const cartTotal = document.getElementById('cart-total');
        
        cartItems.innerHTML = '';
        let subtotal = 0;

        books.forEach(book => {
            const item = document.createElement('div');
            item.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-3');
            item.innerHTML = `
                <div>
                    <h6>${book.title}</h6>
                    <p class="mb-0">$${book.price.toFixed(2)}</p>
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-secondary mr-2" onclick="updateQuantity(${book.id}, -1)">-</button>
                    <span>${book.quantity}</span>
                    <button class="btn btn-sm btn-outline-secondary ml-2" onclick="updateQuantity(${book.id}, 1)">+</button>
                </div>
            `;
            cartItems.appendChild(item);
            subtotal += book.price * book.quantity;
        });

        const tax = subtotal * 0.05;
        const total = subtotal + tax;

        cartCount.textContent = books.reduce((acc, book) => acc + book.quantity, 0);
        cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
        cartTax.textContent = `$${tax.toFixed(2)}`;
        cartTotal.textContent = `$${total.toFixed(2)}`;
    }

    function updateQuantity(bookId, change) {
        const book = books.find(b => b.id === bookId);
        if (book) {
            book.quantity += change;
            if (book.quantity < 1) book.quantity = 1;
        }
        updateCart();
    }

    document.addEventListener('DOMContentLoaded', updateCart);
</script>
