<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
 


   

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
        "description" => $_POST['description'] ?? 'Unknown',
    ];


        $table = new UsersTable( new MySQL());

        if ($table){
            $table->insertCat($data);
            HTTP::redirect("/admin/categories.php", "catadd=true");
        } else {
            HTTP::redirect("/admin/categories_add.php", "error=true");
        }
    

