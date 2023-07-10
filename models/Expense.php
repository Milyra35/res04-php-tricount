<?php

class Expense {
    private ?int $id;
    private string $name;
    private int $amount;
    private Category $category;
    private User $user;
    private array $debt;
    
    public function __construct(string $name, int $amount, Category $category, User $user)
    {
        $this->id = null;
        $this->name = $name;
        $this->amount = $amount;
        $this->category = $category;
        $this->user = $user;
        $this->debt = [];
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
    
    public function getAmount() : int
    {
        return $this->amount = $amount;
    }
    public function setAmount(int $amount) : void
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
    
    public function getUser() : User
    {
        return $this->user;
    }
    public function setUser(User $user) : void
    {
        $this->user = $user;
    }
    
    public function getDebt() : array
    {
        return $this->debt;
    }
    public function setDebt(array $debt) : void
    {
        $this->debt = $debt;
    }
    
    public function addDebt()
    {
        
    }
}

?>