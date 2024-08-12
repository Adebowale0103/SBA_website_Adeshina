document.addEventListener('DOMContentLoaded', function() {
    const cartItems = [];
    const cartItemsList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
const checkoutButton = document.getElementById('checkout-button');

    // Function to update the cart display
    function updateCart() {
        // Clear the existing cart items
        cartItemsList.innerHTML = '';

        // Add each item to the cart
        let total = 0;
        cartItems.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.name} - $${item.price}`;
            cartItemsList.appendChild(li);
            total += parseFloat(item.price);
        });

        // Update the total price
        cartTotal.textContent = `Total: $${total.toFixed(2)}`;
    }

    // Event listener for "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-item');
            const itemPrice = this.getAttribute('data-price');

            // Add item to cart
            cartItems.push({ name: itemName, price: itemPrice });

            // Update cart display
            updateCart();
        });
    });

//start
if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            if (cartItems.length > 0) {
                // Here, you can define the checkout process
                // For demonstration, we'll just alert the cart contents
                let checkoutMessage = 'Proceeding to checkout with the following items:\n';
                cartItems.forEach(item => {
                    checkoutMessage += `${item.name} - $${item.price}\n`;
                });
                checkoutMessage += `Total: $${cartTotal.textContent.replace('Total: $', '')}`;
                
                alert(checkoutMessage);

		//payment page

const paymentPageUrl = `/payment-process?cart=${cartData}&total=${totalAmount}`;
                window.location.href = paymentPageUrl;

                // Optionally, you can clear the cart after checkout
                cartItems.length = 0;
                updateCart();
            } else {
                alert('Your cart is empty. Add items before checking out.');
            }
        });
    }
});

