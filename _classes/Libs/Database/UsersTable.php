<?php

namespace Libs\Database;

use PDOException;

class UsersTable {
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insertUser($data) 
    {
        try {

            $query = "INSERT INTO users(name,email,password,phone,address,role_id,photo,created_at) VALUES(:name, :email, :password, :phone, :address, :role_id, :photo, NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e)
         {
            return $e->getMessage();
        }
    }

    public function insertPrd($data) 
    {
        try {

            $query = "INSERT INTO products(name,description,category_id,quantity,price,image,created_at) VALUES(:name, :description, :category_id, :quantity, :price, :image, NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e)
         {
            return $e->getMessage();
        }
    }

    public function insertCat($data) 
    {
        try {

            $query = "INSERT INTO categories(name,description,created_at) VALUES(:name, :description, NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e)
         {
            return $e->getMessage();
        }
    }

    public function getUser() 
    {
        try {

        $stmt= $this->db->query("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id ORDER BY id DESC");
               
        return $stmt->fetchAll();

    } 
    catch(PDOException $e)
    {
       return $e->getMessage();
   }
      
    }

    public function getPrd() 
    {
        try {

        $stmt= $this->db->query("SELECT products.*, categories.name AS category, categories.cat_id FROM products LEFT JOIN categories ON products.category_id = categories.cat_id ORDER BY id DESC");
               
        return $stmt->fetchAll();

    } 
    catch(PDOException $e)
    {
       return $e->getMessage();

   }
   }

    public function getPrdId( $id) 
    {
        

        $stmt= $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([ 'id'=>$id]);   
        $result = $stmt->fetch();

        return $result ?? false;
      
    }

    public function getCat() 
    {
        try {

        $stmt= $this->db->query("SELECT * FROM categories ");
               
        return $stmt->fetchAll();

    } 
    catch(PDOException $e)
    {
       return $e->getMessage();
   }
      
    }

    public function FindByEmailAndPassword($email, $password){
        $stmt = $this->db->prepare("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.email = :email AND users.password = :password");
        $stmt->execute(['email' => $email,'password' => $password ]);
        $row = $stmt->fetch();

        return $row ?? false;
    }

    public function prdUpdate($data, $id){
        $stmt = $this->db->prepare("UPDATE products SET name=?,description=?,category_id=?,quantity=?,price=?,image=? WHERE id=:id");
        $stmt->execute([$data,$id]);
        return $stmt->rowCount();
    }

    public function DeletePrd($id){
        $stmt = $this->db->prepare("DELETE FROM products  WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }
}