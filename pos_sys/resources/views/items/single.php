<?php

use Core\Helpers\Helper;
?>


<a href="/items" class="btn btn-success mx-3">Back</a>


<div class="row">
    <div class="col-lg-8 col-md-12 mt-5" style="margin-left: 10rem;">
        <div class="card" style="min-height: 200px;">
        <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>

            <div class="card-header card-header-text">
                <h4 class="card-title text-center">Item Details</h4>
            </div>
<div class="card-content table-responsive">
<table  class="table table-hover container">
    <thead class="text-primary">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Cost</th>
            <th scope="col">Price</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>


        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $data->item->item_name ?></td>
            <td><?= $data->item->available_quantity ?></td>
            <td><?= $data->item->item_cost ?></td>
            <td><?= $data->item->selling_price ?></td>
            <td><?= $data->item->created_at ?></td>
            <td><?= $data->item->updated_at ?></td>

    </tbody>
    
</table>
</div>
<a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>


        </div>
    </div>



