

    <div class="card container" style="width: 18rem;">
        <img src="<?= $data->user->image  ?>" style="border-radius: 100%;" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $data->user->display_name ?></h5>
            <p class="card-text">Email:<td><?= $data->user->email ?></td></p>
            <p class="card-text">Username: <td><?= $data->user->username ?></td></p>
            <p class="card-text"><td><?= $data->user->created_at ?></td></p>
            <p class="card-text"><td><?= $data->user->updated_at ?></td></p>
            <p class="card-text">Role: <td><?= $data->user->role ?></td></p>


            <a href="/users" class="btn btn-success">Back</a>
            <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>
            <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger">Delete</a>

        </div>
    </div>