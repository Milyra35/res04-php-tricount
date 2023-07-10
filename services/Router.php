<?php

if(isset($_GET['route']))
{
    if($_GET['route'] === "users")
    {
        $controller->indexUsers();
    }
    else if($_GET['route'] === "user-create")
    {
        $controller->createUsers($_POST);
    }
    else if($_GET['route'] === "user-edit")
    {
        $controller->editUsers($_POST);
    }
    else if($_GET['route'] === "admin-category")
    {
        $controller->indexCategory();
    }
    else
    {
        $controller->indexUsers();
    }
}

?>