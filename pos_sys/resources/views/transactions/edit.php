
<form action="/transactions/update" method="POST" class="w-50 container">
<div class="mb-3">
    <a style="color:black;" class="text-decoration-none" href="/transactions/all">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>
    </a>
</div>
<h1>Transaction</h1>
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="item_name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $data->transaction->item_name ?>">
    </div>
    <div class="mb-3">
        <label for="available_quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="available_quantity" name="quantity" value="<?= $data->transaction->quantity ?>">
    </div>
    <div class="mb-3">
        <label for="item-cost" class="form-label">Item Cost</label>
        <input type="text" class="form-control" id="item-cost" name="price" value="<?= $data->transaction->price ?>">
    </div>
    <div class="mb-3">
        <label for="item-cost" class="form-label">Total</label>
        <input type="text" class="form-control" id="item-cost" name="total" value="<?= $data->transaction->total ?>">
    </div>
    
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>