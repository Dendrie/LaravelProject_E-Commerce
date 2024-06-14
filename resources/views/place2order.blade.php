<?php
use App\Models\Product;
$items = [];
$total = 0;

if (request()->has(['product_id', 'product_name', 'product_image', 'price', 'quantity'])) {
     $product = Product::with('shop')->find(request('product_id'));

     if ($product) {
    $items[] = [
        'product_id' => request('product_id'),
        'product_name' => request('product_name'),
        'product_image' => request('product_image'),
        'price' => request('price'),
        'quantity' => request('quantity'),
        'shop_name' => $product->shop->shop_name
    ];
    $total = $items[0]['price'] * $items[0]['quantity'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Paw Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #ffdd88; font-family: Arial, sans-serif; }
        .card { border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .card-header { background-color: #fff; border-bottom: none; padding: 1.5rem 1rem; display: flex; align-items: center; }
        .card-header h3 { margin: 0; display: inline-block; vertical-align: middle; }
        .card-header img { margin-right: 10px; }
        .card-body { padding: 2rem; }
        .btn-group-toggle .btn { border-radius: 30px; padding: 0.75rem 1rem; }
        .table-borderless td { border: none; }
        .table-borderless td, .table-borderless th { padding: 0.25rem 0; }
        .profile-pic { height: 50px; width: 50px; border-radius: 50%; }
        .popup-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 1000; }
        .popup { background: white; padding: 20px; border-radius: 10px; text-align: center; justify-content: center; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 30%; max-width: 400px; margin-top: 250px;margin-left:500px;}
        .popup h2 { margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('cart.view') }}" class="btn btn-secondary">Back</a>
            <div class="text-center flex-grow-1">
                <img src="{{ asset('images/log1.png') }}" alt="Happy Paw Logo" style="height:50px;">
                <h3 class="d-inline-block mb-0">HAPPY PAW | Checkout</h3>
            </div>
            <a href="profile">
                <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" class="profile-pic">
            </a>
        </div>
        <div class="card-body">
            @if (!empty($items))
            <form id="orderForm" action="{{ route('order.save') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="shippingAddress" class="font-weight-bold">Shipping Address</label>
                    <input type="text" class="form-control" id="shippingAddress" name="shippingAddress" placeholder="Enter shipping address" required>
                </div>
                <div class="form-group">
                    <label for="contactNumber" class="font-weight-bold">Contact Number</label>
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter contact number" required>
                </div>
                <input type="hidden" name="userName" value="{{ Auth::user()->name }}">
                <input type="hidden" name="shopName" value="{{ $items[0]['shop_name'] }}">
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Item Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td colspan="2">
                                <img src="{{ $item['product_image'] }}" alt="product-image" style="width: 50px;">
                                <input type="hidden" name="productimage" value="{{ $item['product_image'] }}">
                                <span>{{ $item['product_name'] }}</span>
                                <input type="hidden" name="productname" value="{{ $item['product_name'] }}">
                            </td>
                            <td>₱<span class="item-price">{{ $item['price'] }}</span></td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-decrement" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center quantity-input" name="quantity" value="{{ $item['quantity'] }}" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-increment" type="button">+</button>
                                    </div>
                                </div>
                            </td>
                            <td>₱<span class="item-subtotal">{{ $item['price'] * $item['quantity'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <p class="font-weight-bold">Order Total: ₱<span id="orderTotal">{{ $total }}</span></p>
                </div>
                <hr>
                <h4>Payment Method</h4>
                <div class="btn-group btn-group-toggle d-flex justify-content-between" data-toggle="buttons">
                    <label class="btn btn-outline-warning flex-fill mr-2">
                        <input type="radio" name="paymentMethod" value="creditDebit" autocomplete="off" required> Credit/debit card
                    </label>
                    <label class="btn btn-outline-warning flex-fill mr-2">
                        <input type="radio" name="paymentMethod" value="cashOnDelivery" autocomplete="off"> Cash on delivery
                    </label>
                    <label class="btn btn-outline-warning flex-fill mr-2">
                        <input type="radio" name="paymentMethod" value="gcash" autocomplete="off"> GCash
                    </label>
                    <label class="btn btn-outline-warning flex-fill">
                        <input type="radio" name="paymentMethod" value="maya" autocomplete="off"> Maya
                    </label>
                </div>
                <hr>
                <h4>Order Summary</h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right">₱<span id="subtotal">{{ $total }}</span></td>
                        </tr>
                        <tr>
                            <td>Shipping Fee</td>
                            <td class="text-right">₱80</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Total</td>
                            <td class="text-right font-weight-bold">₱<span id="finalTotal">{{ $total + 80 }}</span></td>
                            <input type="hidden" name="totalAmount" value="{{ $total + 80 }}">
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-warning btn-block font-weight-bold" id="placeOrderBtn">Place Order</button>
            </form>
            @else
            <div class="alert alert-warning" role="alert">
                No items in your cart.
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Overlay Popup -->
<div class="popup-overlay" id="orderPopup">
    <div class="popup">
        <h2>Item Ordered</h2>
        <button id="confirmOrder" class="btn btn-primary">OK</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    function updateTotals() {
        let total = 0;
        $('.item-subtotal').each(function() {
            total += parseFloat($(this).text());
        });
        $('#orderTotal').text(total.toFixed(2));
        $('#subtotal').text(total.toFixed(2));
        $('#finalTotal').text((total + 80).toFixed(2));
        $('input[name="totalAmount"]').val((total + 80).toFixed(2));
    }

    $('.btn-increment').on('click', function() {
        const quantityInput = $(this).closest('.input-group').find('.quantity-input');
        let quantity = parseInt(quantityInput.val());
        quantity++;
        quantityInput.val(quantity);
        const price = parseFloat($(this).closest('tr').find('.item-price').text());
        $(this).closest('tr').find('.item-subtotal').text((price * quantity).toFixed(2));
        updateTotals();
    });

    $('.btn-decrement').on('click', function() {
        const quantityInput = $(this).closest('.input-group').find('.quantity-input');
        let quantity = parseInt(quantityInput.val());
        if (quantity > 1) {
            quantity--;
            quantityInput.val(quantity);
            const price = parseFloat($(this).closest('tr').find('.item-price').text());
            $(this).closest('tr').find('.item-subtotal').text((price * quantity).toFixed(2));
            updateTotals();
        }
    });

    $('#placeOrderBtn').on('click', function(e) {
        e.preventDefault();
        $('#orderPopup').show();
    });

    $('#confirmOrder').on('click', function() {
        $('#orderForm').submit();
    });
});
</script>
</body>
</html>
