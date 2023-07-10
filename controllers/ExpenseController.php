<?php

require_once 'AbstractController.php';

class ExpenseController extends AbstractController {
    private ExpenseManager $manager;
    
    public function __construct(ExpenseManager $manager)
    {
        $this->manager = $manager;
    }
    
    public function index()
    {
        $expenses = $this->manager->getAllExpenses();
        $this->render('index.phtml', $expenses);
    }
    
    public function create(array $post)
    {
        $this->render('create.phtml', $expenses);
        
        if(isset($_POST['submit-create-expense']))
        {
            if(!empty($post['name']) && !empty($post['amount']) && !empty($post['category']))
            {
                $expense = new Expense($post['name'], $post['amount'], $post['category']);
            }
            $this->manager->insertExpense($expense);
        }
    }
    
    public function edit(array $post)
    {
        $this->render('edit.phtml', $post);
        
        if(isset($_POST['submit-edit-expense']))
        {
            if(!empty($post['name']) && !empty($post['amount']) && !empty($post['category']))
            {
                $newExp = new Expense($post['name'], $post['amount'], $post['category']);
                $newExp->setId($post['id']);
            }
            
            $this->manager->editExpense($newExp);
        }
    }
}

?>