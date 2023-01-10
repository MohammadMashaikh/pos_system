<?php
session_start();

use Core\Helpers\Fake;
use Core\Model\User;
use Core\Router;

// require_once 'vendor/autoload.php';

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

// This code will run only at the first time of using the app.

// For public access

Router::get('/', "authentication.login"); // Displays the login formRouter::get('/front/post', 'front.single'); // Display home.php

// For web administrators
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// authenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard


Router::get('/items', "items.index"); // list of posts (HTML)
Router::get('/item', "items.single"); // Displays single post (HTML)
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the posts (PHP)
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the posts (PHP)
Router::get('/items/delete', "items.delete"); // Delete the post (PHP)
Router::get('/api/items', 'endpoints.items');
Router::post('/api/items/create', 'endpoints.items_create');

Router::get('/transactions', "transactions.index"); // list of posts (HTML)
Router::get('/transaction', "transactions.single"); // Displays single post (HTML)
// Router::get('/transactions/create', "transactions.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "transactions.store"); // Creates the posts (PHP)
// Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the posts (PHP)
Router::get('/transactions/delete', "transactions.delete"); // Delete the post (PHP)
Router::get('/api/transactions', 'endpoints.transactions');
Router::post('/api/transactions/create', 'endpoints.transactions_create');


Router::get('/transactions/all', "transactions.all_transactions");
Router::get('/transactions/edit', "transactions.edit");

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

// authenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)
// authenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// authenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// authenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)

// this route is just for text the ajax
Router::get('/front/test_ajax', 'front.test_ajax');

Router::redirect();
