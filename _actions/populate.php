<?php
include("../vendor/autoload.php");

use Faker\Factory as Faker;

use Libs\Database\MySQL;
use Libs\Database\UsersTable;


$faker = Faker::create();
$table = new UsersTable(new MySQL());

if($table){
    echo "Database connection opened.\n";

    for ($i=0; $i < 10; $i++) { 
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => md5('password'),
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'role' =>  1
            
        ];

        $table->insertUser($data);
    }
    echo "Done populating users table.\n";
}