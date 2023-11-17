<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
 

    $data = [
        "user_id" => $_SESSION['id'] ?? 'Unknown',
        "prd_id" => $_GET['id'] ?? 'Unknown',
        "total_price" => $_GET['total_price'] ?? 'Unknown',
    ];


        $table = new UsersTable( new MySQL());

        if ($table){
            $table->insertOrder($data);
            HTTP::redirect("/checkout.php", "ordered=true");
        } else {
            HTTP::redirect("/product_detail.php", "error=true");
        }
    

