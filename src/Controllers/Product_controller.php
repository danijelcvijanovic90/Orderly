<?php

namespace PROJECT\Controllers;
use PROJECT\Models\Product;

class Product_controller
{
    public function new_product(array $data): bool
    {
        if(empty($data['name']) || empty($data['description']) || empty($data['category_id']))
        {
            return false;
        }

        $category_id=(int)$data['category_id'];
        $new_product=new Product();
        
        return $new_product->add_new_product($data['name'],$data['description'],$category_id);
    }

    public function get_products_by_category_id(int $category_id): array
    {
        $get_products=new Product();
        return $result=$get_products->get_products_by_category_id($category_id);       
    }
}