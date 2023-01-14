<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;
use Core\Model\Item;
use Core\Model\Transaction;



class Admin extends Controller
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

        public function index()
        {
                // get users count
                $user = new User();
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
                // get items count
                $item = new Item();
                $this->data['items'] = $item->get_all();
                $this->data['items_count'] = count($item->get_all());
                // get transactions count
                $transaction = new Transaction();
                $this->data['transactions'] = $transaction->get_all();
                $this->data['transactions_count'] = count($transaction->get_all());


                $this->view = 'dashboard';


                $top_five_expensive = array();
                $stmt = $item->connection->prepare("SELECT * FROM items ORDER BY selling_price DESC LIMIT 5");
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                        $top_five_expensive[] = $row;
                    }
                }
                $this->data['top_five_expensive'] = $top_five_expensive;

        }

        
        
}
