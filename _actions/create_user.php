<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
 


    $name = $_FILES['photo']['name']; 
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];
    $error = $_FILES['photo']['error'];

    if($error) {

        HTTP::redirect('/register.php', 'error=file');
    }

    if($type === "image/jpg" || $type === "image/jpeg" || $type === "image/png"){

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
        "email" => $_POST['email'] ?? 'Unknown',
        "password" => md5($_POST['password']),
        "phone" => $_POST['phone'] ?? 'Unknown',
        "address" => $_POST['address'] ?? 'Unknown',
        "photo" =>  $_FILES['photo']['name'] ?? 'Unknown',
        "role_id" => 2,
    ];

        move_uploaded_file($tmp, "../profile/$name");

    


        $table = new UsersTable( new MySQL());

        if ($table){
            $table->insertUser($data);
            HTTP::redirect("/sign_in.php", "registered=true");
        } else {
            HTTP::redirect("/sign_up.php", "error=true");
        }
    
} else {

    HTTP::redirect('/sign_up.php','Regerror=type');
}
