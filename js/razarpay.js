// Function to open Razorpay payment modal
async function openRazorpay() {
    try {
        // Fetch order ID from PHP server
        const response = await fetch('create_order.php');
        const orderId = await response.text();

        // console.log("Fetched Order ID:", orderId);

        // Razorpay options with fetched order ID
        var options = {
            key: "rzp_live_KcwKYw4K9lWnsk", // Enter the Key ID generated from the Dashboard
            amount: "50000", // Amount in currency subunits (e.g., 50000 = 500 INR)
            currency: "INR",
            name: "Not Just a Number", // Your business name
            description: "Transaction",
            image: "https://abhishekbakshi.in/himanshu/njan.jpeg", // Logo URL
            order_id: orderId.trim(), // Use order_id from PHP response
            callback_url: "https://itsnotjustanumber.com/lp/get-your-lucky-number/thank-you", // Callback URL after payment
            notes: {
                address: "Razorpay Corporate Office",
            },
            theme: {
                color: "#8063a0", // Custom theme color
            },
        };

        var rzp1 = new Razorpay(options);

        // Payment failure handler
        rzp1.on("payment.failed", function (response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });

        // Open Razorpay modal
        rzp1.open();
    } catch (error) {
        console.error("Failed to fetch order ID:", error);
    }
}

// Attach click event listeners to payment buttons
const payButtons = document.querySelectorAll('.pay-btn');
payButtons.forEach((button) => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        openRazorpay();
    });
});

// Attach click event for the 'first-right' container for payment
document.querySelector('.first-right').addEventListener('click', function(e) {
    e.preventDefault();
    openRazorpay();
});

// Attach click event for the 'register_mobile' container for payment
document.querySelector('.register_mobile').addEventListener('click', function(e) {
    e.preventDefault();
    openRazorpay();
});
