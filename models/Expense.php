<?php

class Expense {
    private ?int $id;
    private string $name;
    private float $amount;
    private Category $category;
    
    public function __construct(string $name, float $amount, Category $category)
    {
        
    }
}

?>