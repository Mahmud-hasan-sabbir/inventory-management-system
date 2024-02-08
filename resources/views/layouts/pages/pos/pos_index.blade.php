<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: -14px;margin-left:-16px">
                <div class="card-header" style="background-color: rgb(67, 108, 134)">
                    <h4 class="card-title" style="color: white;margin-left:42%">
                       (Point Of Sales)
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: -31px">
        <div class="col-6">
            <div class="card" style="margin-left: -17px">
                <div class="card-body">
                    <form class="form-valide" action="{{ route('store_sale') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table" style="padding:0px;margin:0px">
                            <thead class="table-dark">
                              <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="product_table">

                            </tbody>
                        </table>
                        <div style="border:1px solid red;background-color:rgb(67, 108, 134);height:150px">
                            <div style="width: 200px;margin-top: 10px;margin-left: 209px">
                                <div id="total-quantity-container">
                                    <h6 style="color:white" name="total_qty">Quantity: <span id="total-quantity">0</span></h6>
                                </div>
                                <div id="total-quantity-container">
                                    <h6 style="color: white" name="total_sub_total">Sub Total: <span id="sub-total">0</span></h6>
                                </div>
                                <h6 id="vat" style="color: white" name="vat">Vat : 0 (10% vat )</h6>

                            </div>
                            <hr style="background-color: white">
                            <div style="width: 200px;margin-top: 10px;margin-left: 209px">
                                <h1 style="font-size: 20px; color: #b3f5c1;padding: 0px;  margin: 0px; margin-left: -205px; " name="total_amount">Total Amount: <span id="total-amount">0</span></h1>
                            </div>
                        </div>

                        <input type="hidden" name="total_quantity" id="inputTotalQuantity" value="0">
                        <input type="hidden" name="vat" id="inputVat" value="0">
                        <input type="hidden" name="total_sub_total" id="inputSubTotal" value="0">
                        <input type="hidden" name="total_amount" id="inputTotalAmount" value="0">
                        <input type="hidden" name="product_details" id="inputProductDetails" value="">

                       <div class="row mt-3">
                        <h6 style="color: #05741d ; text-align:center">Payment Section</h6>
                        <div class="col-md-4">
                            <select class="form-select" name="pay_type" required id="inputGroupSelect01">
                                <option selected disabled>Pay Type</option>
                                <option value="Cash">Cash</option>
                                <option value="Due">Due</option>
                              </select>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="pay_amount" class="form-control" id="pay-amount" placeholder="Pay Amount">
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="due_amount" class="form-control" id="due-amount" placeholder="Due Amount">
                        </div>
                       </div>

                       <input type="hidden" name="order_date" value="{{ now()->format('Y-m-d') }}">


                       <div class="row mt-3">
                        <h6 style="color: #05741d ; text-align:center">Select A Customer Name</h6>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Select Customer</label>
                                <select class="form-select" name="customer_id" required id="inputGroupSelect01">
                                  <option selected disabled>Choose Customer</option>
                                  @foreach ($allCustomer as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                       </div>
                        <div>
                            {{-- <a href="{{ route('invoice_product') }}" class="btn btn-danger btn-sn" style="margin-left: 214px; margin-top: 10px;font-size: 20px;padding: 5px;">Create Invoice</a> --}}
                            <button type="submit" class="btn btn-danger btn-sn" style="margin-left: 214px; margin-top: 10px;font-size: 20px;padding: 5px;">Create Invoice</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card" style="margin-left: -20px">
                <div class="card-header">
                    <h4 class="card-title">
                       All Product
                    </h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display ">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Image</th>
                                    <th style="width: 30%">Name</th>
                                    <th style="width: 20%">Category</th>
                                    <th style="width: 20%">Code</th>
                                    <th style="width: 10%">Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProduct as $data )
                                    <tr>
                                        <td>
                                            <img src="{{ asset($data->image) }}" alt="" style="width: 40px" height="40px">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->category->cat_name }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td>
                                            <button id="add_product" data-id="{{ $data->id }}" type="button" title="Add"
                                                onclick=""
                                                class="btn btn-icon btn-outline-warning border-0 btn-xs mr-2 add_row">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create New Supplier
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form  class="form-valide" action="{{ route('store_supplier') }}" method="POST" enctype="multipart/form-data" id="supplierForm">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="emp_namee"> Supplier Name: </label>
                                    <div class="col-md-7">
                                        <input type="text" name="sup_name" id="sup_name" maxlength="30" class="form-control" placeholder="Enter a name" required oninput="validateInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Supplier Type </label>
                                    <div class="col-md-7" style="float:right">
                                        <select class="form-control" id="type" name="type">
                                            <option value="Distibutor">Distibutor</option>
                                            <option value="Whole Seller">Whole Seller</option>
                                            <option value="Broker">Broker</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Phone Number:</label>
                                    <div class="col-md-7">
                                        <input type="number" class="form-control" name="phone_number" id="phoneNumber" placeholder="Enter a phone Number" required oninput="validateNumberLength(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Email : </label>
                                    <div class="col-md-7">
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Enter a Email" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Address </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="text" class="form-control" id="address" maxlength="200" name="address" placeholder="Enter a Address" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Shop Name </label>
                                    <div class="col-md-7">
                                        <input type="text" name="shop_name" class="form-control" id="shopName" maxlength="50" placeholder="Enter a Shop Name" required>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Account Holder</label>
                                    <div class="col-md-7">
                                        <input type="text" name="acc_holder" maxlength="30" id="AccountHolder" class="form-control" placeholder="Account Holder" required oninput="validateInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Account Number </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="text" class="form-control" maxlength="30" id="accNumber" name="acc_number" placeholder="Account Number" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Bank Name </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="text" class="form-control" maxlength="60" id="bankName" name="bank_name"  placeholder="Bank Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Bank Branch Name </label>
                                    <div class="col-md-7">
                                      <input type="text" class="form-control" id="bankBranchName" maxlength="50" name="bank_branch_name" placeholder="Bank Branch Name" required >
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> City </label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" maxlength="40" id="city" name="city" placeholder="Enter a City" required oninput="validateInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">NID Number</label>
                                    <div class="col-md-7">
                                        <input class="input form-control" id="NID" name="nid" placeholder="X-XXXX-XXXXX-XX-X" autocomplete="off" autofocus title="National ID Input" aria-labelledby="InputLabel" aria-invalid aria-required="true" required tabindex="1" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Remarks : </label>
                                    <div class="col-md-7">
                                        <textarea name="remarks" id="remarks" cols="30" rows="2" class="form-control"  placeholder="Remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" id="viewImage">
                                    <label class="col-md-5 col-form-label">Image </label>
                                    <div class="col-md-7">
                                        <input type="file" name="image" id="image" class="form-control"  onchange="previewImage(this)">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> status </label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreview" style="display: none;">
                                        <img id="preview" alt="Image Preview" class="img-fluid" style="width:96px; max-height: 63px; margin-left:256px; margin-top:2px">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-danger light">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>


<script>
    $(document).on('click', '#add_product', function () {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ route('get_product') }}' + '?id=' + id,
            method: 'GET',
            dataType: "json",
            success: function (response) {
                console.log(response);
                var html = '<tr>';
                html += '<td style="width:5%; display:none" class="product-id">'+response.id+'</td>';
                html += '<td style="width:35%">' + response.name + '</td>';
                html += '<td style="width:20%;padding:0px"><input type="number" class="form-control quantity-input" style="padding: 0px;height:32px"></td>';
                html += '<td style="width:20%;" class="selling-price">' + response.selling_price + '</td>';
                html += '<td style="width:20%" class="total"></td>';
                html += '<td style="width:5%"><button class="delete_row" style="margin-right: 6px;border:none;float:right"><i class="fa fa-trash" aria-hidden="true" style="font-size:20px"></i></button></td>';
                html += '</tr>';

                $('#product_table').append(html);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    // Event listener for the quantity input
    $(document).on('input', '.quantity-input', function () {
    var quantity = parseInt($(this).val()) || 0;
    var sellingPrice = parseFloat($(this).closest('tr').find('.selling-price').text()) || 0;
    var total = quantity * sellingPrice;

    $(this).closest('tr').find('.total').text(total);
    updateTotalQuantity();
    updateSubTotal();
});

$(document).on('click', '.delete_row', function () {
    $(this).closest('tr').remove();
    updateTotalQuantity();
    updateSubTotal();
});

function updateTotalQuantity() {
    var totalQuantity = 0;
    $('.quantity-input').each(function () {
        totalQuantity += parseInt($(this).val()) || 0;
    });
    $('#total-quantity').text(totalQuantity);
}

function updateSubTotal() {
    var subTotal = 0;

    // Calculate subtotal
    $('.total').each(function () {
        subTotal += parseFloat($(this).text()) || 0; // Use parseFloat instead of parseInt for decimals
    });

    $('#sub-total').text(subTotal);

    // Calculate VAT (10% of subtotal)
    var vat = subTotal * 0.1;

    // Update the VAT display
    $('#vat').text('Vat : ' + vat);

    // Update the total including VAT
    var totalWithVat = subTotal + vat;
    var formattedTotalWithVat = totalWithVat.toLocaleString();
    $('#total-amount').text(formattedTotalWithVat);

    // Event listener for the pay amount input
    $('#pay-amount').on('input', function () {
        // Get the entered pay amount
        var payAmount = parseFloat($(this).val()) || 0;

        // Calculate due amount
        var dueAmount = totalWithVat - payAmount;

        // Set due amount to 0 if pay amount is 0
        dueAmount = (payAmount === 0) ? 'due amonut' : dueAmount;

        // Update the "Due Amount" field
        $('#due-amount').val(dueAmount);
    });
}

// Call the function to update the subtotal initially
updateSubTotal();



function prepareProductDetails() {
    var productDetails = [];

    // Loop through the table rows and extract product details
    $('#product_table tr').each(function () {
        var productId = $(this).find('.product-id').text();
        var quantity = $(this).find('.quantity-input').val() || 0;
        var sellingPrice = parseFloat($(this).find('.selling-price').text()) || 0;
        var total = parseFloat($(this).find('.total').text()) || 0;

        productDetails.push({
            id: productId,
            quantity: quantity,
            selling_price: sellingPrice,
            total: total
        });
    });

    // Set the value of the hidden input
    $('#inputProductDetails').val(JSON.stringify(productDetails));
}

$('form').submit(function (event) {
    prepareProductDetails();
});

</script>

<script>
    $(document).ready(function () {
        function updateHiddenFields() {
            $('#inputTotalQuantity').val($('#total-quantity').text());
            $('#inputVat').val($('#vat').text().match(/\d+/)[0]);
            $('#inputSubTotal').val($('#sub-total').text());
            $('#inputTotalAmount').val($('#total-amount').text());
        }
        $('#total-quantity, #vat, #sub-total, #total-amount').on('DOMSubtreeModified', function () {
            updateHiddenFields();
        });
    });
</script>























