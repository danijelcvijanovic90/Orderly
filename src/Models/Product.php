<?php

namespace PROJECT\Models;
use PROJECT\Models\Db;
use PDO;

class Product extends Db
{
    public function add_new_product(string $name,string $description,int $category_id): bool
    {
        $stmt=$this->pdo->prepare("INSERT INTO meals (name,description,category_id) VALUES(:name,:description,:category_id)");
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":description",$description);
        $stmt->bindparam(":category_id",$category_id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function get_products_by_category_id(int $category_id): array
    {
        $stmt=$this->pdo->prepare("SELECT m.id,m.name,m.description,c.name as category_name 
        FROM meals m 
        LEFT JOIN category c ON m.category_id = c.id
        WHERE m.category_id=:category_id");
        $stmt->bindparam(":category_id",$category_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_product_by_id(int $id): array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM meals WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_product_by_id(int $id): bool
    {
        $stmt=$this->pdo->prepare("DELETE FROM meals WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function update_product_by_id(int $id,string $name,string $description,int $category_id): bool
    {
        $stmt=$this->pdo->prepare("UPDATE meals SET name=:name,description=:description,category_id=:category_id WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":description",$description);
        $stmt->bindparam(":category_id",$category_id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }
    
}