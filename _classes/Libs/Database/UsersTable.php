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

    public function insertOrder($data) 
    {
        try {

            $query = "INSERT INTO sale_orders(user_id,prd_id,total_price,created_at) VALUES(:user_id, :prd_id,:total_price, NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e)
         {
            return $e->getMessage();
        }
    }

    public function insertMsg($data) 
    {
        try {

            $query = "INSERT INTO contacts(author_id,subject,content,created_at) VALUES(:author_id, :subject,:content, NOW())";
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

    public function getMsg() 
    {
        try {

        $stmt= $this->db->query("SELECT contacts.*, users.name AS user, users.photo  FROM contacts LEFT JOIN users ON contacts.author_id = users.id ORDER BY id DESC");
               
        return $stmt->fetchAll();

         } 
    catch(PDOException $e)
        {
        return $e->getMessage();

        }
   }

    public function getOrder() 
    {
        

        $stmt= $this->db->query("SELECT sale_orders.*, users.name AS user, users.photo  FROM sale_orders LEFT JOIN users ON sale_orders.user_id = users.id ");
               
        $stmt->execute();   
        $result = $stmt->fetch();

        return $result ?? false;
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

    public function prdUpdate( $data){
        $stmt = $this->db->prepare("UPDATE products SET name=:name,description=:description,category_id=:category_id,quantity=:quantity,price=:price,image=:image,updated_at=NOW() ");
        $stmt->execute([$data]);
        return $stmt->rowCount();
    }

    public function DeletePrd($id){
        $stmt = $this->db->prepare("DELETE FROM products  WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function DeleteUser($id){
        $stmt = $this->db->prepare("DELETE FROM users  WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function DeleteCat($id){
        $stmt = $this->db->prepare("DELETE FROM categories  WHERE cat_id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function DeleteMsg($id){
        $stmt = $this->db->prepare("DELETE FROM contacts  WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }
    public function ChangeRole($role, $id){
        $stmt = $this->db->prepare("UPDATE users SET role_id=:role WHERE id=:id");
        $stmt->execute(['role'=>$role , 'id'=>$id]);
        return $stmt->rowCount();
    }
}