<?php

class Expense {
    private ?int $id;
    private string $name;
    private float $amount;
    private Category $category;
    
    public function __construct(string $name, float $amount, Category $category)
    {
        $this->id = null;
        $this->name = $name;
        $this->amount = $amount;
        $this->category = $category;
    }
    
    public function getId() : ?int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function getAmount() : float
    {
        return $this->amount = $amount;
    }
    public function setAmount(float $amount) : void
    {
        $this->amount = $amount;
    }
    
    public function getCategory() : Category
    {
        return $this->category;
    }
    public function setCategory(Category $category) : void
    {
        $this->category = $category;
    }
    
}

?>