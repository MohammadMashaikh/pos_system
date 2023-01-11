
   <div class="card container" style="width: 18rem;">
        <img src="<?= $data->item->image?>" style="border-radius: 100%;" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $data->item->item_name ?></h5>
            <p class="card-text">Quantity: <td><?= $data->item->available_quantity ?></td></p>
            <p class="card-text">Item Cost: <td><?= $data->item->item_cost ?></td></p>
            <p class="card-text">Item Price: <td><?= $data->item->selling_price ?></td></p>
            <p class="card-text">Created At: <td><?= $data->item->created_at ?></td></p>
            <p class="card-text">Updated At: <td><?= $data->item->updated_at ?></td></p>

            <a href="/items" class="btn btn-success">Back</a>
            <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
            <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>

        </div>
    </div>