<?php

class PostCategory {
    private ?int $id;
    private string $name;
    private array $expenses;
    
    public function __construct(string $name)
    {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->expenses = [];
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
    
    public function getExpenses() : Post
    {
        return $this->posts;
    }
    public function setPosts(Post $posts) : void
    {
        $this->posts = $posts;
    }
    
    public function addExpenses(Expense $expense) : array
    {
        array_push($this->expenses, $expense);
        return $this->expenses;
    }
    
    public function removeExpenses(Expense $expense) : array
    {
        $index = array_search($expense, $index);
        array_splice($this->expense, $index, 1);
        return $this->expense;
    }
}

?>