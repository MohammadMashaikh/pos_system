<!-- <h1 class="d-flex justify-content-around mb-5">Users List (<?= $data->users_count ?>)</h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Display Name</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $user) : ?>
                <tr>
                    <td><?= $user->display_name ?></td>
                    <td><a href="./user?id=<?= $user->id ?>" class="btn btn-warning">Check User</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div> -->


<div class="row">
    <div class="col-lg-7 col-md-12 container w-100" >
        <div class="card" style="min-height: 300px">
            <div class="card-header card-header-text">
                <h4 class="card-title text-center">All Users</h4>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                        <tr>
                            <th>Display Name</th>
                            <th>Details</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data->users as $user) : ?>
                <tr>
                <td><?= $user->display_name ?></td>
                 <td><a href="./user?id=<?= $user->id ?>" class="btn btn-primary" style="background-color: #6495ED;">Check User</a></td>

                </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
