<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
</head>
<body>
    <form action="<?= base_url('payment/verifyPayment') ?>" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="YOUR_KEY_ID"
            data-amount="50000"
            data-currency="INR"
            data-name="Your Company Name"
            data-description="Test payment"
            data-image="https://example.com/your_logo.jpg"
            data-order_id="<?= $orderId ?>"
            data-buttontext="Pay with Razorpay"
            data-prefill.name="Your Name"
            data-prefill.email="your_email@example.com"
            data-prefill.contact="1234567890"
            data-theme.color="#F37254"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden">
    </form>
</body>
</html>
