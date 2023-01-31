<form action="/users/update" method="POST" enctype="multipart/form-data" id="create_form" class=" container w-50">
    <div class="mb-3">
        <a style="color:black" class="text-decoration-none" href="/user?id=<?= $data->user->id ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </a>
    </div>
    <h1>Edit User</h1>
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
    <div class="">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name" value="<?= $data->user->display_name ?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email ?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value="<?= $data->user->username ?>">
    </div>
    <div class="mb-3">
        <label for="user-role" class="form-label">Role</label>
        <select class="form-select" aria-label="Role" name="role">
            <option value="admin">Admin</option>
            <option value="seller">Seller</option>
            <option value="procurement">Procurement</option>
            <option value="accountant">Accountant</option>
        </select>
    </div>
    <label for="formFile" class="form-label">Upload Image</label>
    <input class="form-control" type="file" name="image" id="formFile">
    
    <button type="submit" class="btn btn-warning mt-2">Update</button>
    <a href="/user?id=<?= $data->user->id ?>" class="btn btn-danger ms-3 mt-2">Cancel</a>

</form>