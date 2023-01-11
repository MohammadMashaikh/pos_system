<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Sale;
use Core\Model\Item;
use Core\Model\Transaction;
use Exception;

class Sales extends Controller
{

    use Tests;
    protected $request_body;
    protected $http_code = 200;

    protected $response_schema = array(
        "success" => true, // to provide the response status.
        "message_code" => "", // to provide message code for the front-end developer for a better error handling
        "body" => []
    );

    function __construct()
    {
        $this->auth();
        $this->request_body = (array) json_decode(file_get_contents("php://input"));
    }

    public function render()
    {
        header("Content-Type: application/json"); // changes the header information
        http_response_code($this->http_code); // set the HTTP Code for the response
        echo json_encode($this->response_schema); // convert the data to json format
    }


    function get_all_items()
    {
        try {
            $items = new Item();
            $all_item = $items->get_all();
            $this->response_schema['body'] = $all_item;
            $this->response_schema['message_code'] = "all items added";
        } catch (Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }


    function get_item()
    {
        try {
            $items = new Item();
            $all_item = $items->get_by_id($this->request_body['id']);
            $this->response_schema['body'] = $all_item;
            $this->response_schema['message_code'] = "all items added";
        } catch (Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }


    /**
     * Gets all transactions
     *
     * 
     */
    public function index()
    {
        try {
            $transaction = new Transaction();
            $item = $transaction->get_all();
            if (empty($item)) {
                $this->http_code = 404;
                throw new \Exception("Sql_response_error");
            }
            $this->response_schema['body'] = $item;
        } catch (\Throwable $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }


    /**
     * create transactions
     *
     * 
     */
    public function create()
    {

        try {
            $transaction = new Transaction;
            if (!isset($this->request_body['quantity'])) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }
            if (!isset($this->request_body['item_id'])) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }
            if (!isset($this->request_body['price'])) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }
            if (!isset($this->request_body['total'])) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }

            $transaction->create($this->request_body);


            $this->response_schema['message_code'] = "item_created";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }


    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $Transaction = new Transaction;
        try {
            if (!isset($this->request_body['id'])) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            $stmt = $Transaction->connection->prepare("DELETE FROM transactions WHERE id=?");
            $stmt->bind_param('i', $this->request_body['id']);
            if (!$stmt->execute()) {
                $this->http_code = 500;
                throw new \Exception("item_was_not_deleted");
            }
            $stmt->close();

            $this->response_schema['message_code'] = "item_was_deleted";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }
}
