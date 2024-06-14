<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFD580;
            position: relative;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 40px;
        }
        .header h1 {
            font-size: 24px;
        }
        .cart-table {
            width: 100%;
        }
        .cart-table th, .cart-table td {
            text-align: center;
            vertical-align: middle;
        }
        .cart-table img {
            width: 50px;
        }
        .total-price {
            font-size: 18px;
            text-align: right;
            margin-top: 20px;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1><a href="{{ route('home') }}">←</a></h1>
        <div style="text-align:center;">
            <h1><img src="images/log2.png" alt="Fa  Style Logo"> Fa  Style | Checkout</h1>
        </div>
        <div>
            <a href="profile">
                <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" style="height: 50px;width:50px; border-radius: 50%;">
            </a>
        </div>
    </div>
    <table class="table table-hover cart-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Shop</th>
                <th>Shipping</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>
                    <img src="{{ $item['product_image'] }}" alt="product-image">
                    {{ $item['product_name'] }}
                </td>
                <td>₱{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>₱{{ $item['price'] * $item['quantity'] }}</td>
                <td>{{ $item['shop_id'] }}</td>
                <td>{{ $item['shipping'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-price">
        <strong>Total Price: <span id="total-price">₱{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $items)) }}</span></strong>
    </div>
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <input type="hidden" name="items" value="{{ json_encode($items) }}">
        <button type="submit" class="checkout-btn">Place Order</button>
    </form>
</div>
</body>
</html>
