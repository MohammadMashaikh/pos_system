<?php
session_start();

use Core\Model\User;
use Core\Router;


spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'user_id' => $logged_in_user->id,
        'is_admin_view' => true
    );
}



Router::get('/', "authentication.login"); 

// For web administrators
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// authenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard


Router::get('/items', "items.index"); 
Router::get('/item', "items.single"); 
Router::get('/items/create', "items.create"); 
Router::post('/items/store', "items.store"); 
Router::get('/items/edit', "items.edit"); 
Router::post('/items/update', "items.update"); 
Router::get('/items/delete', "items.delete"); 


Router::get('/transactions', "transactions.index"); 
Router::get('/transaction', "transactions.single");  
Router::get('/transactions/delete', "transactions.delete");





Router::get('/transactions/all', "transactions.all_transactions");
Router::get('/transactions/edit', "transactions.edit");
Router::post('/transactions/update', "transactions.update");

//=========================================================================================
Router::get('/sales', "sales.index");
Router::get('/sales/all_items', "sales.get_all_items");
Router::post('/sales/single_item', "sales.get_item");
Router::get('/sales/all_transaction', "sales.index");
Router::delete('/sales/delete', "sales.delete");


Router::get('/sale', "sales.single");
Router::post('/sales/create', "sales.create");
Router::post('/sales/store', "sales.store");
Router::get('/sales/edit', "sales.edit");
Router::post('/sales/update', "sales.update");
//=========================================================================================

Router::get('/users', "users.index"); 
Router::get('/user', "users.single"); 
Router::get('/users/create', "users.create"); 
Router::post('/users/store', "users.store"); 
Router::get('/users/edit', "users.edit"); 
Router::post('/users/update', "users.update"); 
Router::get('/users/delete', "users.delete"); 



Router::redirect();
