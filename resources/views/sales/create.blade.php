@extends('admin.master')
@section('admin')


        <div class="nxl-content">
            <!-- [ page-header ] start -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Invoice</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex d-md-none">
                <a href="javascript:void(0)" class="page-header-right-close-toggle">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                    <i class="feather-layers me-2"></i>
                    <span>Save as Draft</span>
                </a>
                <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                    <i class="feather-save me-2"></i>
                    <span>Save Invoice</span>
                </a>
            </div>
        </div>
        <div class="d-md-none d-flex align-items-center">
            <a href="javascript:void(0)" class="page-header-right-open-toggle">
                <i class="feather-align-right fs-20"></i>
            </a>
        </div>
    </div>
</div>
<!-- [ page-header ] end -->

<!-- [ Main Content ] start -->
<form action="{{ route('sales.store') }}" method="POST">
    @csrf
    <div class="main-content"> 
        <div class="row">
            <div class="col-xl-12">
                <div class="card invoice-container">
                    <div class="card-header">
                        <h5>Create Invoice</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="px-4 pt-4">
                            <div class="d-md-flex align-items-center justify-content-between">
                                <div class="mb-4 mb-md-0 your-brand">
                                    <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                        <img src="{{ asset('backend/assets/images/logo-abbr.png') }}" class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                        <div class="position-absolute start-50 top-50 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                        </div>
                                        <input class="file-upload" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="d-md-flex align-items-center justify-content-end gap-4">
                                    <div class="form-group mb-3 mb-md-0">
                                        <label for="customer_id" class="form-label">Customer Selection:</label>
                                        <select name="customer_id" id="customer_id" class="form-control" required>
                                            <option value="" disabled selected>Select a customer...</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-dashed">

                        <!-- Add Items Section -->
                        <div class="px-4 clearfix">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold">Add Items:</h6>
                                    <span class="fs-12 text-muted">Add items to the invoice</span>
                                </div>
                                <div class="avatar-text avatar-sm" data-bs-toggle="tooltip" title="Information">
                                    <i class="feather feather-info"></i>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered overflow-hidden" id="tab_logic">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center wd-450">Product</th>
                                            <th class="text-center wd-150">Qty</th>
                                            <th class="text-center wd-150">Price</th>
                                            <th class="text-center wd-150">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoice-body">
                                        <tr id="addr0">
                                            <td>1</td>
                                            <td>
                                                <select name="product[]" class="form-control product-select" onchange="updatePriceAndTotal(this)" required>
                                                    <option value="" disabled selected>Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="qty[]" class="form-control qty" placeholder="Enter Qty" min="1" value="1" oninput="calculateTotal(this)" required>
                                            </td>
                                            <td>
                                                <input type="number" name="price[]" class="form-control price" placeholder="Enter Price" step="0.01" min="0.01" required>
                                            </td>
                                            <td>
                                                <input type="number" name="total[]" class="form-control total" placeholder="0.00" readonly required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button id="delete_row" class="btn btn-sm bg-soft-danger text-danger" disabled>Delete</button>
                                <button id="add_row" class="btn btn-sm btn-primary">Add Items</button>
                            </div>
                        </div>

                        <hr class="border-dashed">

                        <!-- Grand Total Section -->
                        <div class="col-xl-12">
                            <div class="card stretch-full">
                                <div class="card-body">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="fw-bold">Grand Total:</h6>
                                            <span class="fs-12 text-muted">Grand total for the invoice</span>
                                        </div>
                                        <div class="avatar-text avatar-sm" data-bs-toggle="tooltip" title="Grand total invoice">
                                            <i class="feather feather-info"></i>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tab_logic_total">
                                            <tbody>
                                                <tr>
                                                    <th class="text-dark fw-semibold">Sub Total</th>
                                                    <td class="w-25">
                                                        <input type="number" name="sub_total" id="sub_total" class="form-control border-0 bg-transparent p-0" placeholder="0.00" readonly required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-dark fw-semibold">Tax (%)</th>
                                                    <td class="w-25">
                                                        <div class="input-group mb-2 mb-sm-0">
                                                            <input type="number" class="form-control border-0 bg-transparent p-0" id="tax" value="5" readonly>
                                                            <div class="input-group-addon">%</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-dark fw-semibold">Tax Amount</th>
                                                    <td class="w-25">
                                                        <input type="number" name="tax_amount" id="tax_amount" class="form-control border-0 bg-transparent p-0" placeholder="0.00" readonly required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-dark fw-semibold bg-gray-100">Grand Total</th>
                                                    <td class="bg-gray-100 w-25">
                                                        <input type="number" name="total_amount" id="total_amount" class="form-control border-0 bg-transparent p-0 fw-bolder text-dark" placeholder="0.00" readonly required>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <input type="hidden" name="sales_id" id="sales_id" value="{{ $sales_id ?? '' }}"> <!-- Hidden Sales ID -->
                                    <div class="d-flex justify-content-end gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary">Create Invoice</button>
                                        <a href="" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>







<!-- [ Main Content ] end -->


<script>

var products = @json($products);

// Initialize row count
let rowCount = 1;

// Add new row functionality
document.getElementById('add_row').addEventListener('click', function() {
    rowCount++;
    let newRow = document.createElement('tr');
    newRow.id = `addr${rowCount - 1}`;

    // Assuming `products` is a global JS object or array fetched from the server
    let productOptions = '<option value="" disabled selected>Select Product</option>';
    products.forEach(product => {
        productOptions += `<option value="${product.id}" data-price="${product.price}">${product.name}</option>`;
    });

    newRow.innerHTML = `
        <td>${rowCount}</td>
        <td>
            <select name="product[]" class="form-control product-select" onchange="updatePriceAndTotal(this)">
                ${productOptions}
            </select>
        </td>
        <td><input type="number" name="qty[]" placeholder="Enter Qty" class="form-control qty" step="1" min="1" value="1" oninput="calculateTotal(this)"></td>
        <td><input type="number" name="price[]" placeholder="Enter Unit Price" class="form-control price" step="1.00" min="1" readonly></td>
        <td><input type="number" name="total[]" placeholder="0.00" class="form-control total" readonly></td>
    `;

    document.getElementById('invoice-body').appendChild(newRow);

    // Enable the delete button when there are more than 1 rows
    document.getElementById('delete_row').disabled = rowCount <= 1 ? true : false;

    // Recalculate the subtotal
    calculateSubtotal();
});

// Delete row functionality
document.getElementById('delete_row').addEventListener('click', function() {
    if (rowCount > 1) {
        document.getElementById(`addr${rowCount - 1}`).remove();
        rowCount--;

        // Disable delete button if there's only 1 row left
        document.getElementById('delete_row').disabled = rowCount === 1;

        // Recalculate the subtotal
        calculateSubtotal();
    }
});

// Function to update price and total when product is selected
function updatePriceAndTotal(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const price = selectedOption.getAttribute('data-price');
    const row = selectElement.closest('tr');
    const priceInput = row.querySelector('.price');
    priceInput.value = price;

    const qtyInput = row.querySelector('.qty');
    if (!qtyInput.value) {
        qtyInput.value = 1;
    }

    calculateTotal(qtyInput);
    calculateSubtotal(); // Recalculate subtotal after price update
}

// Function to calculate total (price * quantity)
function calculateTotal(quantityInput) {
    const row = quantityInput.closest('tr');
    const qty = parseFloat(quantityInput.value) || 0;
    const price = parseFloat(row.querySelector('.price').value) || 0;
    const total = qty * price;
    row.querySelector('.total').value = total.toFixed(2);
    calculateSubtotal(); // Recalculate subtotal after total update
}

// Function to calculate subtotal (sum of all totals)
function calculateSubtotal() {
    const totalInputs = document.querySelectorAll('.total');
    let subtotal = 0;

    totalInputs.forEach(input => {
        subtotal += parseFloat(input.value) || 0;
    });

    document.getElementById('sub_total').value = subtotal.toFixed(2);

    // Calculate tax (5% of subtotal)
    const taxRate = 5; // 5%
    const taxAmount = (subtotal * taxRate) / 100;
    document.getElementById('tax_amount').value = taxAmount.toFixed(2);

    // Calculate grand total
    const grandTotal = subtotal + taxAmount;
    document.getElementById('total_amount').value = grandTotal.toFixed(2);
}


</script>

                    
        
        
@endsection