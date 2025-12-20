<?php

namespace PROJECT\Controllers;
use PROJECT\Models\Company;


class Company_controller 
{


    public function new_company(array $data)
    {
       
        if(empty($data['name']))
        {
            die("Please provide company name");
        }

        if(empty($data['address']))
        {
            die("Plase provide company name");
        }

        $company = new Company();
            
        if($company->company_exists($data['name']))
        {
            die("Company allready exists");
        }

        $company->add_company($data['name'],$data['address'],$data['notes']); 

    }

    public function view_companies():array
    {
        $company=new Company();
        return $resul=$company->get_all_companies();
    }

    public function delete_company(int $id):bool
    {
        if(!isset($id) || empty($id))
        {
            return false;
        }
        else
        {
            $company=new Company();
            return $result=$company->delete_company_by_id($id);
        }
    }

    public function company_for_display(int $id): array
    {
        if(!isset($id) || empty($id))
        {
            return false;
        }
        else
        {
            $company=new Company();
            return $result=$company->get_company_for_display($id);
        }
    }

    public function update_company(array $data): bool
    {
        $id=(int)$data['id'];
        $name=trim($data['name'] ?? "") ; //if there is no data create empty string and avoid warning
        $address=trim($data['address'] ?? "");
        $notes=trim($data['notes'] ?? "") ;

        if(empty($name) || empty($address) || empty($notes)) //if empty string return false and avoid update
        {
            return false;
        }

        $company=new Company();
        return $company->update_company_by_id($id,$name,$address,$notes);
        
    }
}