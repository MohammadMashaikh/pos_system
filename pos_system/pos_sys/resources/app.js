
$(function(){
const user_id = $('#user_id');
const addItem = $('#add-item');
const table = $('tbody');
const price = $('#price');
const items = $('#items');
const quantity = $('#quantity');
const totalSalesElement = $('#total-sales');
let totalSales = 0;
var item_id;



$.ajax({
    type: "GET",
    url: "http://system.localhost/sales/all_transaction",
    success: function (data) {
    data.body.forEach((item) => {
        table.append(`
        <tr data-id=${item.id}>
        <td>${item.item_id}</td>
        <td>${item.quantity}</td>
        <td>${item.price}</td>
        <td>${item.total}</td>
        <td>
        <a href="/transactions/edit?id=${item.id}&location=/transactions" class="btn btn-outline-warning">Edit</a>
        <button delete-id=${item.id} class="border-0"><i class="fa-solid fa-trash btn btn-danger"></i></button>
        </td>
        </tr>
        `);


        $(`button[delete-id="${item.id}"]`).click(function () {
            $.ajax({
                type: "DELETE",
                url: "http://system.localhost/sales/delete",
                data: JSON.stringify({
                    id: item.id
                }),
                success: function (response) {
                    $(`tr[data-id="${item.id}"]`).remove();
                }
            });
        });
    }); 
    }
});


$.ajax({
    type: "GET",
    url: "http://system.localhost/sales/all_items",
    success: function (response) {
        var id_data = 1;
        response.body.forEach(element => {
            if(element.available_quantity>0){
            $('#items').append(`
            <option id="${id_data++}" value=${element.id}> ${element.item_name}</option>
            `);
            }
        });
    }
});



$('#items').change(function(){
    item_id = $(this).children(":selected").attr("value")
    $.ajax({
        type: "POST",
        url: "http://system.localhost/sales/single_item",
        data: JSON.stringify({id:item_id}),
        success: function (response) {
            $('#quantity').attr({
                'max':response.body.available_quantity,
                "value":$('#quantity').val(),
            });
            $('#quantity').change(function(){
                quantity_item=$("#quantity").val(),
                $('#price').attr({
                    "value":response.body.selling_price * $('#quantity').val(),
                })
            });
        }
    });
});



let counter = 1;
addItem.click(function (e) {
    e.preventDefault();
    let item = items.val();
    let q = quantity.val();
    let p = price.val();

    if (q == "" || p == "" || item == "") {
        alert("You need to enter the item values to proceed!");
        return;
    }

    

    table.append(`
    <tr>
    <td>${item}</td>
    <td>${q}</td>
    <td>${p}</td>
    <td>${q * p}</td>
    <td>
    <a href="/transactions/edit?id=${item.id}&location=/transactions" class="btn btn-outline-warning">Edit</a>
    <button class="border-0"><i class="fa-solid fa-trash btn btn-danger"></i></button>
    </td>
    </tr>
    `);

    totalSales += q * p;
    totalSalesElement.text(totalSales);
    counter++;
    $('#userInputContainer').trigger('reset');

    data={
        quantity:q,
        item_id:item,
        price:p,
        total:q*p
    }
    $.ajax({
        type: "POST",
        url: "http://system.localhost/sales/create",
        data: JSON.stringify(data),
        success: function (response) {
        }
    });
});

});


