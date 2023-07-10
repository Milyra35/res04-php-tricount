<?php

require 'AbstractController.php';

class CategoryController extends AbstractController {
    private CategoryManager $manager;
    
    public function __construct(CategoryManager $manager)
    {
        $this->manager = $manager;
    }
    
    public function index()
    {
        $categories = $this->manager->getAllCategories();
        $this->render('index.phtml', $categories);
    }
    
    public function create(array $post)
    {
        $this->render('create.phtml', $categories);
        
        if(isset($_POST['submit-create-category']))
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