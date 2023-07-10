<?php

require'managers/UserManager.php';
require 'managers/CategoryManager.php';
require 'managers/ExpenseManager.php';

$host = "db.3wa.io";
$port = "3306";
$dbName = "marierichir_phpj91";
$username = "marierichir";
$password = "a616eefc0b8af8e5fb785ae6b42c19f1";

$manager = new UserManager($dbName, $port, $host, $username, $password);

require 'models/User.php';
require 'models/Expense.php';
require 'models/Category.php';
require 'controllers/UserController.php';
require 'controllers/CategoryController.php';
require 'controllers/ExpenseController.php';

$controller = new UserController($manager);

require 'services/Router.php';

?>