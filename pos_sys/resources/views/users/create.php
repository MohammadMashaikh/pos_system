<form action="/users/store" method="POST" enctype="multipart/form-data" id="create_form" class="w-50 container">
    <h1>Create User</h1>
    <div class="cv-info-1">
        <div class="mb-3">
            <label for="display-name" class="form-label">Display Name</label>
            <input type="text" class="form-control" id="display-name" name="display_name">
        </div>
        <div class="mb-3">
            <label for="user-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user-email" name="email">
        </div>
        <div class="mb-3">
            <label for="user-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username-email" name="username">
        </div>
        <div class="mb-3">
            <label for="user-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password-email" name="password">
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

        <button type="submit" class="btn btn-success mt-4">Create</button>
        <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a>

</form>