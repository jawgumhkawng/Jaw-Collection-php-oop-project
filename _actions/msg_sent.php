<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

 
    $data = [
        "author_id" => $_POST['author_id'] ?? 'Unknown',
        "subject" => $_POST['subject'] ?? 'Unknown',
        "content" => $_POST['content'] ?? 'Unknown',
        
       
    ];

        $table = new UsersTable( new MySQL());

        if ($table){
            $table->insertMsg($data);
            HTTP::redirect("/contact.php", "msg=true");
        } else {
            HTTP::redirect("/contact.php", "error=true");
        }
    


?>