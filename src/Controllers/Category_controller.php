<?php

namespace PROJECT\Controllers;
use PROJECT\Models\Category;
use PROJECT\Services\Session_service;

class Category_controller
{
    public function all_categories():array
    {
        
        $category=new Category();
        return $category->get_all_categories();
    }

    public function new_category(array $data): bool
    {

        $category=new Category();
        if($category->category_exists($data['name']) || empty($data['name']))
        {
            return false;
        }
        return $category->add_category($data['name'],$data['description']);
    }

}



