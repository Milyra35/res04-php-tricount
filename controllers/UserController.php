<?php

require 'AbstractController.php';

class UserController extends AbstractController {
    private UserManager $manager;
    
    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }
    
    public function index()
    {
        $users = $this->manager->getAllUsers();
        $this->render('users/index.phtml', $users);
    }
    
    public function create(array $post)
    {
        $this->render('users/create.phtml', $post);
        
        if(isset($_POST['submitCreate']))
        {
            if(!empty($post['password']) && $post['password'] === $post['confirmPassword'])
            {
                $passwordHash = password_hash($post['password'], PASSWORD_DEFAULT);
                $user = new User($post['username'], $post['email'], $passwordHash);
                $this->manager->insertUser($user);
            }
        }
    }
    
    public function edit(array $post)
    {
        $this->render('users/edit.phtml', $post);
        //var_dump($_POST);
        if(isset($_POST['submitEdit']))
        {
            if(!empty($post['password']) && $post['password'] === $post['confirmPassword'])
            {
                $passwordHash = password_hash($post['password'], PASSWORD_DEFAULT);
                $user = new User($post['username'], $post['email'], $passwordHash);
                $user->setId($post['id']);
                $this->manager->editUser($user);
            }
        }
    }
}

?>