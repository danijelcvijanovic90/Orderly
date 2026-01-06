<?php

namespace PROJECT\Models;
use PDO;

class Company extends Db
{

    public function company_exists(string $name) :bool
    {
        $stmt=$this->pdo->prepare("SELECT id FROM company WHERE name = :name LIMIT 1");
        $stmt->bindparam(':name',$name);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function add_company(string $name,string $address,string $notes): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO company (name,address,notes) VALUES (:name,:address,:notes)");
        $stmt->bindparam (":name",$name);
        $stmt->bindparam (":address",$address);
        $stmt->bindparam(":notes",$notes);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function get_company_by_name(string $name): ?array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM company WHERE name = :name");
        $stmt -> bindparam (":name",$name);
        $stmt -> execute();

        return $stmt -> fetch(PDO::FETCH_ASSOC) ?: null; //if name does not exists return null
    }


    public function get_company_by_id(int $id): ?int
    {
        $stmt = $this -> pdo -> prepare ("SELECT id FROM company WHERE id = :id");
        $stmt -> bindparam (":id",$id);
        $stmt -> execute();

        return $stmt -> fetchColumn() ?: null; //if id does not exists return null
    }

    public function get_all_companies(): array
    {
        $stmt = $this->pdo->prepare ("SELECT * FROM company");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_company_by_id (int $id): bool
    {
        $stmt = $this -> pdo -> prepare("DELETE FROM company WHERE id = :id");
        $stmt -> bindparam(":id",$id);
        $stmt -> execute();

        return $stmt -> rowCount() > 0; // if something is deleted from DB return true
    }

    public function get_company_for_display(int $id): ?array
    {
        $stmt=$this->pdo->prepare("SELECT id,name,address,notes FROM company WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function update_company_by_id(int $id,string $name,string $address, string $notes): bool
    {
        $stmt=$this->pdo->prepare("UPDATE company SET name=:name,address=:address,notes=:notes WHERE id=:id");
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":address",$address);
        $stmt->bindparam(":notes",$notes);
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->rowCount()>0;

    }
}