
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
                 <td><a href="./user?id=<?= $user->id ?>" class="btn btn-outline-info">Check User</a></td>

                </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
