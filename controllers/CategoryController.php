<?php

require_once 'AbstractController.php';

class CategoryController extends AbstractController {
    private CategoryManager $manager;
    
    public function __construct(CategoryManager $manager)
    {
        $this->manager = $manager;
    }
    
    public function indexCategory()
    {
        $categories = $this->manager->getAllCategories();
        $this->render('admin/category/index.phtml', $categories);
    }
    
    public function createCategory(array $post)
    {
        $this->render('admin/category/create.phtml', $categories);
        
        if(isset($_POST['submit-create-category']))
        {
            if(!empty($post['name']))
            {
                $category = new Category($post['name']);
            }
            $this->manager->insertCategory($category);
        }
    }
    
    public function editCategory(array $post)
    {
        $this->render('admin/category/edit.phtml', $post);
        
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