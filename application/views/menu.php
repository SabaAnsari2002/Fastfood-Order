<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Menu</h2>
    <form id="menuForm" action="<?php echo site_url('order'); ?>" method="post">
        <div class="row">
            <?php foreach ($foods as $food): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food->name; ?></h5>
                            <p class="card-text">Price: $<?php echo $food->price; ?></p>
                            <div class="form-check">
                                <input class="form-check-input food-checkbox" type="checkbox" name="selected_foods[]" value="<?php echo $food->id; ?>" data-price="<?php echo $food->price; ?>" id="food<?php echo $food->id; ?>">
                                <label class="form-check-label" for="food<?php echo $food->id; ?>">Select</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <p id="totalPrice">Total Price: $0</p> <!-- نمایش قیمت کل -->
            <button type="submit" class="btn btn-success btn-lg">Confirm Selection</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        // تابع برای محاسبه قیمت کل
        function calculateTotalPrice() {
            let total = 0;
            $('.food-checkbox:checked').each(function() {
                total += parseFloat($(this).data('price')); // جمع آوری قیمت غذاهای انتخاب شده
            });
            $('#totalPrice').text('Total Price: $' + total.toFixed(2)); // نمایش قیمت کل
        }

        // هنگام انتخاب غذا
        $('.food-checkbox').change(function() {
            calculateTotalPrice(); // به روزرسانی قیمت کل
        });

        $('#menuForm').submit(function(event) {
            // بررسی اینکه حداقل یک گزینه انتخاب شده باشد
            if ($('input[name="selected_foods[]"]:checked').length === 0) {
                alert('Please select at least one food item.');
                event.preventDefault(); // جلوگیری از ارسال فرم
            }
        });
    });
</script>

</body>
</html>
