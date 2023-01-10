<h1 class="d-flex justify-content-around mb-3">Transaction List (<?= $data->transactions_count ?>)</h1>


    <div class="row">
        <div class="col-lg-8 col-md-12 mb-4" style="margin-left: 12rem; margin-top:1rem;">
            <div class="card" style="min-height: 300px">
                <div class="card-header card-header-text">
                    <h4 class="card-title text-center">All Transactions</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item id</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data->transactions as $transaction) :  ?>
                            <tr>
                                <td><?= $transaction->id ?></td>
                                <td><?= $transaction->item_id ?></td>
                                <td><?= $transaction->quantity ?></td>
                                <td><?= $transaction->price ?></td>
                                <td><?= $transaction->total ?></td>

                                <td>

                                    <a href="/transactions/edit?id=<?= $transaction->id ?>" class="btn btn-outline-warning">Edit</a>
                                    <a href="/transactions/delete?id=<?= $transaction->id ?>" class="btn btn-outline-danger">Delete</a>

                                    


                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
