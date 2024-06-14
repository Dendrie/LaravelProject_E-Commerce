<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #c7eaf2;
            width: 250px;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            left: 0;
        }
        .sidebar a {
            color: black;
            display: block;
            padding: 15px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #f0f0f0;
        }
        .sidebar a.active {
            color: #23a6af;
        }
        .profile-picture {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            font-size: 24px;
        }
        .header img {
            height: 40px;
        }
        .header .cart {
            display: flex;
            align-items: center;
        }
        .header .cart img {
            height: 30px;
            margin-right: 10px;
        }
        .header .cart span {
            background-color: red;
            color: white;
            padding: 2px 8px;
            border-radius: 50%;
            font-size: 12px;
        }
        .header .cart span::before {
            content: '(';
        }
        .header .cart span::after {
            content: ')';
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .profile-info p {
            margin-bottom: 20px;
            color: #555;
        }
        .profile-info .form-label {
            font-weight: bold;
        }
        .profile-info .form-control {
            border-radius: 5px;
        }
        .profile-info .form-text {
            color: #777;
        }
        .profile-info .save-btn {
            background-color: #FBB03B;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .profile-info .save-btn:hover {
            background-color: #ff9933;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="home"><i class="fas fa-arrow-left"></i> Back to Home</a>
        <a href="profile"><i class="fas fa-user"></i> My Account</a>
        <a href="mypurchased" class="active"><i class="fas fa-shopping-cart"></i> My Purchase</a>
        <a href="#"><i class="fas fa-bell"></i> Notifications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary w-100 mt-3">Logout</button>
        </form>
    </div>
    <div class="content bg-light" style="padding:50px;">
        <div class="header">
            <h1>&nbsp;</h1>
            <div>
                <h1><img src="images/log2.png" alt="Fa Style Logo" style="text-align:center;"> Fa Style | Profile</h1>
            </div>
            <div class="cart">
                <a href="{{ route('cart.view') }}">
                    <img src="{{ asset('images/cart.png') }}" alt="Cart">
                    <span class="cart-count">{{ Auth::user()->cart()->count() }}</span>
                </a>
            </div>
        </div>
        <div class="profile-info">
            <div class="col-9">
                <h2>Orders</h2>
                <p>Here are the orders from you:</p>
                
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="orderTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" href="#all-orders" role="tab" aria-controls="all-orders" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="to-pay-tab" data-bs-toggle="tab" href="#to-pay" role="tab" aria-controls="to-pay" aria-selected="false">To Pay</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="to-ship-tab" data-bs-toggle="tab" href="#to-ship" role="tab" aria-controls="to-ship" aria-selected="false">To Ship</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="to-receive-tab" data-bs-toggle="tab" href="#to-receive" role="tab" aria-controls="to-receive" aria-selected="false">To Receive</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="orderTabsContent">
                    <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
                        <h3>All Orders</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="all-orders-table-body">
                                @foreach ($allParcels as $parcel)
                                    @if ($parcel->user_name == Auth::user()->name)
                                        <tr>
                                            <td>{{ $parcel->user_name }}</td>
                                            <td>{{ $parcel->shipping_address }}</td>
                                            <td>{{ $parcel->contact_number }}</td>
                                            <td>{{ $parcel->product_name }}</td>
                                            <td>{{ $parcel->quantity }}</td>
                                            <td>₱{{ $parcel->total_amount }}</td>
                                            <td>{{ $parcel->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="to-pay" role="tabpanel" aria-labelledby="to-pay-tab">
                        <h3>To Pay</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="to-pay-table-body">
                                @foreach ($toPay as $parcel)
                                    @if ($parcel->user_name == Auth::user()->name)
                                        <tr>
                                            <td>{{ $parcel->user_name }}</td>
                                            <td>{{ $parcel->shipping_address }}</td>
                                            <td>{{ $parcel->contact_number }}</td>
                                            <td>{{ $parcel->product_name }}</td>
                                            <td>{{ $parcel->quantity }}</td>
                                            <td>₱{{ $parcel->total_amount }}</td>
                                            <td>{{ $parcel->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="to-ship" role="tabpanel" aria-labelledby="to-ship-tab">
                        <h3>To Ship</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="to-ship-table-body">
                                @foreach ($toShip as $parcel)
                                    @if ($parcel->user_name == Auth::user()->name)
                                        <tr>
                                            <td>{{ $parcel->user_name }}</td>
                                            <td>{{ $parcel->shipping_address }}</td>
                                            <td>{{ $parcel->contact_number }}</td>
                                            <td>{{ $parcel->product_name }}</td>
                                            <td>{{ $parcel->quantity }}</td>
                                            <td>₱{{ $parcel->total_amount }}</td>
                                            <td>{{ $parcel->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="to-receive" role="tabpanel" aria-labelledby="to-receive-tab">
                        <h3>To Receive</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="to-receive-table-body">
                                @foreach ($toReceive as $parcel)
                                    @if ($parcel->user_name == Auth::user()->name)
                                        <tr>
                                            <td>{{ $parcel->user_name }}</td>
                                            <td>{{ $parcel->shipping_address }}</td>
                                            <td>{{ $parcel->contact_number }}</td>
                                            <td>{{ $parcel->product_name }}</td>
                                            <td>{{ $parcel->quantity }}</td>
                                            <td>₱{{ $parcel->total_amount }}</td>
                                            <td>{{ $parcel->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                        <h3>Completed</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="completed-table-body">
                                @foreach ($completed as $parcel)
                                    @if ($parcel->user_name == Auth::user()->name)
                                        <tr>
                                            <td>{{ $parcel->user_name }}</td>
                                            <td>{{ $parcel->shipping_address }}</td>
                                            <td>{{ $parcel->contact_number }}</td>
                                            <td>{{ $parcel->product_name }}</td>
                                            <td>{{ $parcel->quantity }}</td>
                                            <td>₱{{ $parcel->total_amount }}</td>
                                            <td>{{ $parcel->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
