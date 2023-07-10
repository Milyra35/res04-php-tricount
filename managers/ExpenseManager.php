<?php

require_once 'AbstractManager.php';

class ExpenseManager extends AbstractManager {
    
    public function getAllExpenses() : array
    {
        $query = $this->db->prepare("SELECT * FROM expenses");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $array;
    }
    
    public function getExpensesById(int $id) : Expense
    {
        $query = $this->db->prepare("SELECT * FROM expenses WHERE expenses.id = :id");
        $parameters=['id' => $id];
        $query->execute($parameters);
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $category = getCatById($result['category_id']);
        $expense = new Expense($result['name'], $result['amount'], $category);
        
        return $expense;
    }
    
    public function insertExpense(Expense $expense, User $user) : Expense
    {
        $query=$this->db->prepare("INSERT INTO expenses (name, amount, category_id, buyer_id) VALUES (?, ?, ?, ?)");
        $query->execute([$expense->getName(), $expense->getAmount(), $expense->getCategory()->getId(), $user->getId()]);
        
        $query = $this->db->prepare("SELECT * FROM expenses WHERE expenses.name = :name");
        $parameters=['name' => $expense->getName()];
        $query->execute($parameters);
        $expId = $query->fetch(PDO::FETCH_ASSOC);
        $expense->setId($expId['id']);
        
        return $expense;
    }
    
    public function getExpenseByUser(User $user) : array
    {
        $query=$this->db->prepare("SELECT * FROM expenses WHERE buyer_id = :id");
        $parameters=['id' => $user->getId()];
        $query->execute($parameters);
        $values = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach($values as $value)
        {
            $expense = getExpensesById($value);
            $result[] = $expense;
        }
        
        return $result;
    }
    
    public function getDebtByUser(User $user) : array
    {
        $query=$this->db->prepare("SELECT expense_id FROM user_expenses WHERE debt_id = :id");
        $parameters=['id' => $user->getId()];
        $query->execute($parameters);
        $values = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach($values as $value)
        {
            $debt = getExpensesById($value);
            $result[] = $debt;
        }
        
        return $result;
    }
}

?>