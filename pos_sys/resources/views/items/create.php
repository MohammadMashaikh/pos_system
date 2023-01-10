<form action="/items/store" method="POST" class="w-75 container">
    <h1>Create Item</h1>
    <div class="cv-info-1">
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" class="form-control w-50" id="name" name="item_name">
        </div>
        <div class="mb-3">
            <label for="available_quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control w-50" id="available_quantity" name="available_quantity">
        </div>
        <div class="mb-3">
            <label for="item_cost" class="form-label">Item Cost</label>
            <input type="number" class="form-control w-50" id="item_cost" name="item_cost">
        </div>
        <div>
            <label for="selling_price" class="form-label w-50">Item Price</label>
            <input type="number" class="form-control w-50" id="selling_price" name="selling_price">
        </div>
        <!-- <div>
        <label for="formFile" class="form-label">Upload Image</label>
        <input class="form-control w-50" type="file" name="image" id="formFile">
        </div> -->
        <button type="submit" class="btn btn-success mt-4 mx-5">Create</button>
        <a href="/items" class="btn btn-danger ms-3 mt-4">Cancel</a>

</form>

<form class="mt-5" action="/resources/uploads/upload.php" method="post" enctype="multipart/form-data">
        <label for="formFile" class="form-label">Upload Image</label>
        <input class="form-control w-50 mb-2" type="file" name="image" id="formFile">
        <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">

</form>

