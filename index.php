<?php
    require('./class/LoadFile.php');
    $render = new LoadFile();
    $render->renderFile();
    header('Location: ./product_table.php?lista_pobrana=success');
    exit();
?>