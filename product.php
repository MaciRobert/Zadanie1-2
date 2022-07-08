<?php
require('./class/LoadProductDetal.php');

$Porducts_info = new LoadProductDetal();
$product_info_array=$Porducts_info->loadDataProductDetal();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $product_info_array['product_name']; ?></title>
</head>
<body>
    <div class="container mt-5">
        <div class = "card">
            <h3 class="text-center mt-3"><?= $product_info_array['product_name']; ?></h3>
            <div class="mt-3">
                <img src="<?= $product_info_array['image_src']; ?>" style=" max-width: 500px; max-height: 500px;" class="rounded mx-auto d-block" alt="...">
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $product_info_array['product_code_name_space'].": ".$product_info_array['product_code_number']; ?></li>
                    <li class="list-group-item"><?= $product_info_array['price']." ". $product_info_array['price_promo']." "; ?><del style="color:red"><?= $product_info_array['price_old']; ?></del></li>
                    <li class="list-group-item"><?= $product_info_array['stars_likes']; ?></li>
                    <?php
                        $Porducts_info = new LoadProductDetal();
                        $Porducts_info->showVariants($product_info_array['product_name'],$product_info_array['script_info']);
                    ?>
                </ul>
            </div>
        </div>
        <a href="./product_table.php" class="btn btn-dark mt-3">Back</a>
    </div>
</body>
</html>