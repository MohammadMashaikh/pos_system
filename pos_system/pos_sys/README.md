# Point Of Sales API

Response schema: JSON Object {
"success": boolean,
"message_code": string,
"body": Array
}

GET /transactions

- Fetches all items from stocks
- Request Arguments: None
- 404 will be returned if no item was found

GET /transactions/all

- Fetches all transactions from transactions table
- Request Arguments: None
- 404 will be returned if no transaction was found

POST /sales/create

- creates new transaction
- Request Arguments: {"item_name": string ,"quantity": integer ,"total": integer}
- 422 will be returned if item_name param was not found
- 422 will be returned if quantity param was not found
- 422 will be returned if total param was not found


DELETE /transactions/delete

- deletes the current transaction amount
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found

DELETE /sales/delete

- deletes the current transaction amount
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found