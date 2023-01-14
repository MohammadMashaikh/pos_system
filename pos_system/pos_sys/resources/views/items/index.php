    <h1 class="d-flex justify-content-around">Items List (<?= $data->items_count ?>)</h1>

    <div class="row my-5">

        <?php foreach ($data->items as $item) : ?>
            <div class="mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-75">
                    <span style="background-color: lightblue; width: 35%; margin: 4px;" class="border">$<?= $item->selling_price ?></span>
                    <div>
                        <img src="<?= $item->image ?>" class="card-img-top w-50" style="border-radius: 100%; margin-left: 2.5rem;" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <?= $item->item_name ?>
                        </h5>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="./item?id=<?= $item->id ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>