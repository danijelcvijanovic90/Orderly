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
        $stmt=$this->pdo->prepare("SELECT * FROM meals WHERE category_id=:category_id");
        $stmt->bindparam(":category_id",$category_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}