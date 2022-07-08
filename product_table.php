<?php 
    require('./class/LoadProductsInfo.php');

    if(isset($_GET['lista_pobrana']) && $_GET['lista_pobrana']=='success'){

        echo '<div class="alert alert-success text-center" role="alert">The list has been successfully loaded!</div>';

    }
    try {

        $Porducts_info = new LoadProductsInfo();
        $products = $Porducts_info->loadProductsInfo();

    } catch (Exception $e) {

        echo 'File dont exist';

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
        <a class="btn btn-dark mb-3" href="./index.php">Render file</a>
        <div class="table-responsive">
            <?php 
                try{
                    if(isset($products)){

                        $Porducts_info = new LoadProductsInfo();
                        $Porducts_info->viewProductTable($products);

                    }else{

                        throw new Exception('Table cant render ERROR');

                    }
                }
                catch (Exception $e) {

                    echo 'Table cant render', $e->getMessage(),"\n";
                    
                }
            ?>
        </div>
    </div>
</body>
</html>