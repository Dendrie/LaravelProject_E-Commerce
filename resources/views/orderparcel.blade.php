<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Happy Paw</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #bef9ff;
        }
        .side {
            height: 100%;
            background: white;
            border-right: 1px solid #ddd;
        }
        .side a {
            display: block;
            padding: 23px;
            color: black;
            text-decoration: none;
            font-size: 20px;
        }
        .side a:hover {
            background: #f0f0f0;
        }
        .side a.active {
            background: #f0f0f0;
            font-weight: bold;
        }
        .container {
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
        }
        .header {
            height: 30px;
            text-align: left;
        }
        .card {
            height: 100%;
        }
        .card-img-top {
            height: 200px; /* Fixed height for the images */
            object-fit: cover; /* Ensures the image covers the area without distortion */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .carousel-item img {
            max-width: 100%;
            height: auto;
            max-height: 400px; /* Adjust the max-height to make images smaller */
            object-fit: contain; /* Ensures the image is contained within the dimensions */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        select {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="header"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-3">
                    <a href="{{ url('home') }}" style="text-decoration:none;color:#000;"><-</a>
                    <img src="{{ asset('images/log2.png') }}" alt="logo" style="height:40px;margin-left:20px;">Fa Style
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3 side">
                <a href="#" style="text-align:justify;" style="padding:0px;margin:0px;">
                    <b><img src="{{ $shop->shop_image ? asset('storage/' . $shop->shop_image) : asset('images/default.png') }}" alt="Shop" style="height: 50px;width: 50px;border-radius: 50%;"> {{ $shop->shop_name }}</b>
                </a>
                <a href="{{ url('create') }}">Upload Product</a>
                <a href="MyProducts">My Products</a>
                <a href="orderparcel" class="active">Orders</a>
            </div>
            <div class="col-9">
                <h2>Orders</h2>
                <p>Here are the orders from you:</p>
                <button class="btn btn-success float-end mb-3" onclick="printSelectedRows()">Export</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>
                    </thead>
                    <tbody id="orders-table-body">
                        @foreach ($parcels as $parcel)
                            <tr>
                                <td><input type="checkbox" class="select-row"></td>
                                <td>{{ $parcel->user_name }}</td>
                                <td>{{ $parcel->shipping_address }}</td>
                                <td>{{ $parcel->contact_number }}</td>
                                <td>
                                    {{ $parcel->product_name }}
                                </td>
                                <td>{{ $parcel->quantity }}</td>
                                <td>₱{{ $parcel->total_amount }}</td>
                                <td>{{ $parcel->status }}</td>
                                <td>
                                    <form action="{{ route('parcels.updateStatus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parcel_id" value="{{ $parcel->id }}">
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="Preparing Your Order" {{ $parcel->status === 'Preparing Your Order' ? 'selected' : '' }}>Preparing Your Order</option>
                                            <option value="Waiting for Courier" {{ $parcel->status === 'Waiting for Courier' ? 'selected' : '' }}>Waiting for Courier</option>
                                            <option value="Shipped Out" {{ $parcel->status === 'Shipped Out' ? 'selected' : '' }}>Shipped Out</option>
                                            <option value="In transit" {{ $parcel->status === 'In transit' ? 'selected' : '' }}>In transit</option>
                                            <option value="Delivered" {{ $parcel->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('.select-row');
            checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
        });

        function printSelectedRows() {
            let rows = document.querySelectorAll('.select-row:checked');
            let printContent = '<table class="table table-bordered"><thead><tr><th>Customer Name</th><th>Address</th><th>Phone</th><th>Product</th><th>Quantity</th><th>Total Amount</th><th>Status</th></tr></thead><tbody>';
            rows.forEach(row => {
                let cells = row.closest('tr').cells;
                printContent += '<tr>';
                for (let i = 1; i < cells.length - 1; i++) { // Skip the first checkbox cell and the last status change cell
                    printContent += '<td>' + cells[i].innerText + '</td>';
                }
                printContent += '</tr>';
            });
            printContent += '</tbody></table>';
            
            let printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Print Orders</title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>
