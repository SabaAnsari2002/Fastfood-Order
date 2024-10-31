<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Order Details</h2>
    <form action="<?php echo site_url('order/place_order'); ?>" method="post">
        
        <div class="form-group">
            <label for="customer_name">Name</label>
            <input type="text" name="customer_name" class="form-control" id="customer_name" required>
        </div>

        <div class="form-group">
            <label for="customer_phone">Phone</label>
            <input type="text" name="customer_phone" class="form-control" id="customer_phone" required>
        </div>

        <div class="form-group">
            <label for="customer_address">Address</label>
            <textarea name="customer_address" class="form-control" id="customer_address" rows="3" required></textarea>
        </div>

        <input type="hidden" name="selected_foods" value="<?php echo implode(', ', $selected_foods); ?>">
        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

        <div class="form-group">
            <label>Total Price</label>
            <p class="form-control-plaintext" id="totalPriceDisplay">$<?php echo number_format($total_price, 2); ?></p> <!-- نمایش مبلغ کل -->
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
        </div>
    </form>
</div>

</body>
</html>
