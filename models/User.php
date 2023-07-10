<?php

class User {
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    private array $expenses;
    
    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->expenses = [];
        $this->id = null;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    
    public function getId() : ?int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getExpenses() : array
    {
        return $this->expenses;
    }
    public function setExpenses(array $expenses) : void
    {
        $this->expenses = $expenses;
    }
    
    public function addExpense(Expense $expense) : array
    {
        array_push($this->expenses, $expense);
        return $this->expenses;
    }
    
    public function removeExpense(Expense $expense) : array
    {
        $index = array_search($expense, $index);
        array_splice($this->expenses, $index, 1);
        return $this->expenses;
    }
}

?>