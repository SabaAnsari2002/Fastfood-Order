<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Successful</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="text-center">
        <div class="alert alert-success p-4" role="alert">
            <h4 class="alert-heading">Order Placed Successfully!</h4>
            <p>Thank you for your order. We have received your details and will prepare your food shortly.</p>
            <hr>
            <p class="mb-0">We hope you enjoy your meal!</p>
        </div>
        <a href="<?php echo site_url('home'); ?>" class="btn btn-primary mt-3">Back to Home</a>
    </div>
</div>

</body>
</html>
