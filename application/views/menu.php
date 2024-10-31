<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        #detailCard {
            position: fixed; /* برای قرار دادن کارت به صورت ثابت */
            top: 50%; /* وسط صفحه */
            left: 50%; /* وسط صفحه */
            transform: translate(-50%, -50%); /* برای تراز کردن وسط */
            z-index: 1050; /* بالاتر از سایر عناصر */
            display: none; /* پنهان کردن کارت به صورت پیش فرض */
            width: 300px; /* عرض کارت */
            max-width: 80%; /* حداکثر عرض */
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* پس‌زمینه تار */
            display: none; /* پنهان کردن پس‌زمینه تار */
            z-index: 1040; /* زیر کارت جزئیات */
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Menu</h2>
    <form id="menuForm" action="<?php echo site_url('order'); ?>" method="post">
        <div class="row">
            <?php foreach ($foods as $food): ?>
                <div class="col-md-4 mb-4">
                    <div class="card food-card" data-id="<?php echo $food->id; ?>" data-name="<?php echo $food->name; ?>" data-price="<?php echo $food->price; ?>">
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

<!-- پس‌زمینه تار -->
<div class="overlay" id="overlay"></div>

<!-- کارت جزئیات انتخاب -->
<div id="detailCard" class="card">
    <div class="card-body">
        <h5 class="card-title" id="detailName"></h5>
        <p class="card-text" id="detailPrice"></p>
        <button id="closeDetail" class="btn btn-secondary">Close</button>
    </div>
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

        // نمایش جزئیات غذا با کلیک بر روی کارت
        $('.food-card').click(function() {
            const name = $(this).data('name');
            const price = $(this).data('price');
            $('#detailName').text(name);
            $('#detailPrice').text('Price: $' + price);
            $('#overlay').show(); // نمایش پس‌زمینه تار
            $('#detailCard').show(); // نمایش کارت جزئیات
        });

        // بستن کارت جزئیات
        $('#closeDetail').click(function() {
            $('#overlay').hide(); // پنهان کردن پس‌زمینه تار
            $('#detailCard').hide(); // پنهان کردن کارت جزئیات
        });

        // بستن کارت جزئیات با کلیک بر روی پس‌زمینه تار
        $('#overlay').click(function() {
            $('#overlay').hide();
            $('#detailCard').hide(); // پنهان کردن کارت جزئیات
        });
    });
</script>

</body>
</html>
