// Cart data
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Add to Cart functionality
document.querySelectorAll(".add-to-cart").forEach((button) => {
  button.addEventListener("click", (event) => {
    const id = event.target.dataset.id;
    const name = event.target.dataset.name;
    const price = parseFloat(event.target.dataset.price);

    // Check if item already exists in cart
    const existingItem = cart.find((item) => item.id === id);
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      cart.push({ id, name, price, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    alert(`${name} added to cart!`);
  });
});

// View Cart functionality
document.getElementById("view-cart").addEventListener("click", (event) => {
  event.preventDefault();

  const cartContainer = document.getElementById("cart-container");
  const cartItems = document.getElementById("cart-items");
  const cartTotal = document.getElementById("cart-total");

  // Toggle cart visibility
  cartContainer.style.display = cartContainer.style.display === "none" ? "block" : "none";

  // Populate cart
  cartItems.innerHTML = "";
  let total = 0;

  cart.forEach((item) => {
    total += item.price * item.quantity;
    cartItems.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td>$${item.price.toFixed(2)}</td>
        <td>${item.quantity}</td>
      </tr>
    `;
  });

  cartTotal.textContent = `Total: $${total.toFixed(2)}`;
});
