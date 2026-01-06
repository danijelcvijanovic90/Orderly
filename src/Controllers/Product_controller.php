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

    public function delete_product_by_id(int $id): bool
    {
        if(empty($id))
        {
            return false;
        }

        $id=(int)$id;

        $product=new Product();
        return $product->delete_product_by_id($id);
    }

    public function get_product_by_id(int $id): array
    {
        if(empty($id))
        {
            return false;
        }

        $id=(int)$id;

        $product=new Product();
        return $result=$product->get_product_by_id($id);
    }

    public function update_product_by_id(array $data): bool
    {
        if(empty($data['id']))
        {
            return false;
        }
        $id=(int)$data['id'];

        $product=new Product();
        return $result=$product->update_product_by_id($data['id'],$data['name'],$data['description'],$data['category_id']);
    }

    public function get_all_products(): array
    {
        $product=new Product();
        return $result=$product->get_all_products();
    }
    
}