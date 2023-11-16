<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
 


    $name = $_FILES['image']['name']; 
    $tmp = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];

    if($error) {

        HTTP::redirect('/admin/products_add.php', 'error=file');
    }

 if($type === "image/jpg" || $type === "image/jpeg" || $type === "image/png"){

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
        "description" => $_POST['description'] ?? 'Unknown',
        "category_id" => $_POST['category_id'] ?? 'Unknown',
        "quantity" => $_POST['quantity'] ?? 'Unknown',
        "price" => $_POST['price'] ?? 'Unknown',
        "image" =>  $_FILES['image']['name'] ?? 'Unknown',
        
    ];

        move_uploaded_file($tmp, "photos/$name");

    


        $table = new UsersTable( new MySQL());

        if ($table){
            $table->insertPrd($data);
            HTTP::redirect("/admin/index.php", "prdadd=true");
        } else {
            HTTP::redirect("/admin/products_add.php", "error=true");
        }
    
} else {

    HTTP::redirect('/admin/products_add.php','Prderror=type');
}
