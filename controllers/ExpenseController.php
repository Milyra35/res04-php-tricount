<?php

require 'AbstractController.php';

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
            if(!empty($post['name']))
            {
                $category = new Category($post['name']);
            }
            $this->manager->insertCategory($category);
        }
    }
    
    public function edit(array $post)
    {
        $this->render('edit.phtml', $post);
        
        if(isset($_POST['submit-edit-category']))
        {
            if(!empty($post['name']))
            {
                $newCat = new Category($post['name']);
                $newCat->setId($post['id']);
            }
            
            $this->manager->editCategory($newCat);
        }
    }
}

?>