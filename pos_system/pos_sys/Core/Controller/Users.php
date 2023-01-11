<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }

        /**
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.index';
                $user = new User; // new model post.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Display the HTML form for User creation
         *
         * @return void
         */
        public function create()
        {
                $this->permissions(['user:create']);
                $this->view = 'users.create';
        }

        /**
         * Creates new User
         *
         * @return void
         */
        public function store()
        {
                $this->permissions(['user:create']);
                $user = new User();
                $permissions = null;
                
                if (!empty($_FILES)) {
                        $ext = explode('/', $_FILES['image']['type']);
                        $ext = $ext[array_key_last($ext)];
                        $name = $_POST['username'];
                        $file_name = "item-$name.$ext";
                        $photo = "./images/$file_name";
                        move_uploaded_file($_FILES['image']['tmp_name'], "./images/$file_name");
                        $_POST['image'] = $photo;
                    }

                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;
                        case 'procurement':
                                $permissions = User::PROCUREMENT;
                                break;
                        case 'seller':
                                $permissions = User::SELLER;
                                break;
                        case 'accountant':
                                $permissions = User::ACCOUNTANT;
                                break;
                }
               
                $_POST['permissions'] = \serialize($permissions);
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->create($_POST);
                Helper::redirect('/users');
        }

        /**
         * Display the HTML form for User update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Updates the User
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();
                // process role
                $permissions = null;
                if (!empty($_FILES)) {
                        $ext = explode('/', $_FILES['image']['type']);
                        $ext = $ext[array_key_last($ext)];
                        $name = $_POST['username'];
                        $file_name = "item-$name.$ext";
                        $photo = "./images/$file_name";
                        move_uploaded_file($_FILES['image']['tmp_name'], "./images/$file_name");
                        $_POST['image'] = $photo;
                    }
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;
                        case 'procurement':
                                $permissions = User::PROCUREMENT;
                                break;
                        case 'seller':
                                $permissions = User::SELLER;
                                break;
                        case 'accountant':
                                $permissions = User::ACCOUNTANT;
                                break;
                }
               
                $_POST['permissions'] = \serialize($permissions);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
        }

        /**
         * Delete the User
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
}
