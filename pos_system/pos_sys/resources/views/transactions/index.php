<body class="container my-5">
    <div class="d-flex justify-content-between">
        <h1>HTU POS System</h1>
        <div>
            <strong>Total Sales</strong>
            <span id="total-sales">0</span>
        </div>
    </div>
    <hr>

    <form id="userInputContainer" class="my-4 d-flex justify-content-between">
        <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Items</span>

            <select id="items" class="form-select" aria-label="Default select example">
                <option name="item" selected>Select One Of The Items</option>



            </select>
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Quantity</span>
            <input id="quantity" type="number" class="form-control" aria-describedby="addon-wrapping" min="1">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Total (JOD)</span>
            <input id="price" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">
        </div>

        <button id="add-item" class="btn btn-success">Add</button>

    </form>

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
                                <th scope="col">Item name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody id="cc">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


</body>