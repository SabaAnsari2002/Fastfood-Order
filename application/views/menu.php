<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Menu</h2>
    <form action="<?php echo site_url('order'); ?>" method="post">
        <div class="row">
            <?php foreach ($foods as $food): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food->name; ?></h5>
                            <p class="card-text">Price: $<?php echo $food->price; ?></p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="selected_foods[]" value="<?php echo $food->name; ?>" id="food<?php echo $food->id; ?>">
                                <label class="form-check-label" for="food<?php echo $food->id; ?>">Select</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Confirm Selection</button>
        </div>
    </form>
</div>

</body>
</html>
