<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Transaction;

class Transactions extends Controller
{

    use Tests;

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
     * Gets all transactions
     *
     * @return array
     */
    public function index()     
    {
        $transaction = new Transaction; // new model transaction.
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.index';
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
    }

    public function all_transactions()     
    {
        $transaction = new Transaction; // new model item.
        $this->permissions(['sales:read']);
        $this->view = 'transactions.all_transactions';
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
    }




    /**
     * Edit the transaction
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transactions.edit';
        $transaction = new Transaction();
        $selected_transaction = $transaction->get_by_id($_GET['id']);
        $this->data['transaction'] = $selected_transaction;
        
    }

    public function update(){
        $transaction = new Transaction();
        $id = $_POST['id'];
        $location = $_POST['location'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $total = $_POST['quantity'] * $_POST['price'];
        $transaction->connection->query("UPDATE transactions SET quantity = $quantity,price = $price,total = $total WHERE id = $id");

        Helper::redirect($location);
    }

    

    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions/all');
    }
}
