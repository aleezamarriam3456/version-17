// Toggle Sidebar with Animation
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    if (sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
        mainContent.style.marginLeft = "0";
    } else {
        sidebar.classList.add("active");
        mainContent.style.marginLeft = "250px"; // Adjust based on sidebar width
    }
}

// Update Stats Dynamically
function updateStats() {
    // Example: Fetching data from an API (placeholder for now)
    const totalOrders = Math.floor(Math.random() * 500);
    const totalProducts = Math.floor(Math.random() * 200);
    const totalUsers = Math.floor(Math.random() * 1000);

    document.querySelector("#stats .stat-card:nth-child(1) p").textContent = totalOrders;
    document.querySelector("#stats .stat-card:nth-child(2) p").textContent = totalProducts;
    document.querySelector("#stats .stat-card:nth-child(3) p").textContent = totalUsers;
}

// Add Hover Effects to Buttons
function addButtonHoverEffects() {
    const buttons = document.querySelectorAll("button");
    buttons.forEach((button) => {
        button.addEventListener("mouseover", () => {
            button.style.transform = "scale(1.05)";
            button.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";
        });

        button.addEventListener("mouseout", () => {
            button.style.transform = "scale(1)";
            button.style.boxShadow = "none";
        });
    });
}

// Highlight Table Rows on Hover
function highlightTableRows() {
    const rows = document.querySelectorAll("table tbody tr");
    rows.forEach((row) => {
        row.addEventListener("mouseover", () => {
            row.style.backgroundColor = "#f9f9f9"; // Change to desired hover color
        });

        row.addEventListener("mouseout", () => {
            row.style.backgroundColor = ""; // Reset background
        });
    });
}

// Initialize Dashboard Features
function initializeDashboard() {
    updateStats();
    addButtonHoverEffects();
    highlightTableRows();
}

// Run Initialization on Page Load
document.addEventListener("DOMContentLoaded", initializeDashboard);
// Toggle Sidebar
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');

    const mainContent = document.getElementById('mainContent');
    if (sidebar.classList.contains('active')) {
        mainContent.style.marginLeft = "250px";
    } else {
        mainContent.style.marginLeft = "0";
    }
}
document.querySelectorAll('a[href="#cart"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = "/cart.html"; // Adjust URL as per your project setup
    });
  });
  