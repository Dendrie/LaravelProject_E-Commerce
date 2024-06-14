<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFD580;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: white;
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
            color: #FBB03B;
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
        .order-status {
            display: flex;
            justify-content: start;
            padding: 10px 0;
            background-color: white;
            border-bottom: 1px solid #ddd;
        }
        .order-status a {
            color: #FBB03B;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }
        .order-status a:hover {
            text-decoration: underline;
        }
        .no-orders {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 70vh;
            color: #888;
            background-color: white;
            padding: 20px;
        }
        .no-orders i {
            font-size: 50px;
            margin-bottom: 20px;
        }
        .chat-now {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <a href="home"><i class="fas fa-arrow-left"></i> Back to Home</a>
    <a href="profile"><i class="fas fa-user"></i> My Account</a>
    <a href="purchased" class="active"><i class="fas fa-shopping-cart"></i> My Purchase</a>
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
            <h1><img src="images/log1.png" alt="Happy Paw Logo" style="text-align:center;"> HAPPY PAW | My Purchase</h1>
        </div>
        <div class="cart">
            <a href="{{ route('cart.view') }}">
                <img src="{{ asset('images/cart.png') }}" alt="Cart">
                <span class="cart-count">{{ Auth::user()->cart()->count() }}</span>
            </a>
        </div>
    </div>

    <div class="order-status" style="padding:20px 50px 20px 50px;">
        <a href="purchased.index">All</a>
        <a href="('purchased.status', 'preparing-your-order')">To Pay</a>
        <a href="('purchased.status', 'waiting-for-courier')">To Ship</a>
        <a href="('purchased.status', 'shipped-out')">To Receive</a>
        <a href="('purchased.status', 'in-transit')">To Receive</a>
        <a href="('purchased.status', 'delivered')">Completed</a>
        <!-- Add links for Cancelled and Return Refund if needed -->
    </div>

    <div class="row">
        <!-- To Pay Section -->
        @foreach($toPayParcels as $parcel)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $parcel->product_image) }}" class="card-img-top" alt="{{ $parcel->product_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $parcel->shop_name }}</h5>
                    <p class="card-text">{{ $parcel->product_name }}</p>
                    <p class="card-text">₱{{ $parcel->total_amount }}</p>
                    <p class="card-text">Quantity: {{ $parcel->quantity }}</p>
                    <p class="card-text">Status: {{ $parcel->status }}</p>
                </div>
            </div>
        </div>
        @endforeach

        <!-- To Ship Section -->
        @foreach($toShipParcels as $parcel)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $parcel->product_image) }}" class="card-img-top" alt="{{ $parcel->product_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $parcel->shop_name }}</h5>
                    <p class="card-text">{{ $parcel->product_name }}</p>
                    <p class="card-text">₱{{ $parcel->total_amount }}</p>
                    <p class="card-text">Quantity: {{ $parcel->quantity }}</p>
                    <p class="card-text">Status: {{ $parcel->status }}</p>
                </div>
            </div>
        </div>
        @endforeach

        <!-- To Receive Section -->
        @foreach($toReceiveParcels as $parcel)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $parcel->product_image) }}" class="card-img-top" alt="{{ $parcel->product_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $parcel->shop_name }}</h5>
                    <p class="card-text">{{ $parcel->product_name }}</p>
                    <p class="card-text">₱{{ $parcel->total_amount }}</p>
                    <p class="card-text">Quantity: {{ $parcel->quantity }}</p>
                    <p class="card-text">Status: {{ $parcel->status }}</p>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Completed Section -->
        @foreach($completedParcels as $parcel)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $parcel->product_image) }}" class="card-img-top" alt="{{ $parcel->product_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $parcel->shop_name }}</h5>
                    <p class="card-text">{{ $parcel->product_name }}</p>
                    <p class="card-text">₱{{ $parcel->total_amount }}</p>
                    <p class="card-text">Quantity: {{ $parcel->quantity }}</p>
                    <p class="card-text">Status: {{ $parcel->status }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- No Orders Section -->
    @if($toPayParcels->isEmpty() && $toShipParcels->isEmpty() && $toReceiveParcels->isEmpty() && $completedParcels->isEmpty())
    <div class="no-orders">
        <i class="fas fa-clipboard-list"></i>
        <p>No Orders Yet</p>
    </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
