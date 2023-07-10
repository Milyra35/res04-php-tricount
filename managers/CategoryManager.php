<?php

require 'AbstracManager.php';

class CategoryManager extends AbstractManager {
    
    public function getAllCategories() : array
    {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    
    public function insertCategory(Category $category) : Category
    {
        $query = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");
        $query->execute([$category->getName()]);
        
        $query = $this->db->prepare("SELECT * FROM categories WHERE categories.name = :name");
        $parameters=['name' => $category->getName()];
        $query->execute($parameters);
        $catId = $query->fetch(PDO::FETCH_ASSOC);
        $category->setId($catId['id']);
        
        return $category;
    }
    
    public function editCategory(Category $category) : void
    {
        $query = $this->db->prepare("UPDATE categories SET categories.name = :name");
        $parameters = ['name' => $category->getName()];
        $query->execute($parameters);
    }
    
    public function getCatById(int $id) : Category
    {
        $query = $this->db->prepare("SELECT * FROM categories WHERE categories.id = :id");
        $parameters = ['id' => $id];
        $query->execute($parameters);
        $cat = $query->fetch(PDO::FETCH_ASSOC);
        
        return $cat;
    }
}

?>