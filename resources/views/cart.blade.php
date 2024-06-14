<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #b2e8f0; position: relative; }
        .container { background-color: white; padding: 20px; border-radius: 10px; margin-top: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
        .header img { height: 40px; }
        .header h1 { font-size: 24px; }
        .cart-table { width: 100%; }
        .cart-table th, .cart-table td { text-align: center; vertical-align: middle; }
        .cart-table img { width: 50px; }
        .total-price { font-size: 18px; text-align: right; margin-top: 20px; }
        .checkout-btn { display: block; width: 100%; margin-top: 20px; padding: 10px; background-color: #85E2F6; color: white; border: none; border-radius: 5px; font-size: 18px; }
        .popup-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 1000; }
        .popup { background: white; padding: 20px; border-radius: 10px; text-align: center; justify-content: center; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 30%; max-width: 400px; margin-top: 230px; margin-left: 580px; }
        .popup h2 { margin-bottom: 20px; }
        .popup button { margin: 5px; }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-controls button {
            background: none;
            border: 1px solid #53a2aa;
            color: #53a2aa;
            font-size: 18px;
            width: 30px;
            height: 30px;
            line-height: 1;
            text-align: center;
            cursor: pointer;
        }
        .quantity-controls input {
            width: 50px;
            text-align: center;
            border: none;
            outline: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateTotal() {
                let total = 0;
                let hasCheckedItem = false;
                $('.item-checkbox:checked').each(function() {
                    const row = $(this).closest('tr');
                    const price = parseFloat(row.find('.item-price').text().replace('₱', ''));
                    const quantity = parseInt(row.find('.item-quantity').val());
                    total += price * quantity;
                    hasCheckedItem = true;
                });
                $('#total-price').text('₱' + total.toFixed(2));
                $('.checkout-btn').prop('disabled', !hasCheckedItem);
            }

            function updateItemTotal(row) {
                const price = parseFloat(row.find('.item-price').text().replace('₱', ''));
                const quantity = parseInt(row.find('.item-quantity').val());
                const itemTotal = price * quantity;
                row.find('.item-total').text('₱' + itemTotal.toFixed(2));
            }

            function updateQuantity(itemId, quantity) {
                $.ajax({
                    url: `/cart/${itemId}`,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        // Update successful, no need to do anything here
                    },
                    error: function(error) {
                        // Handle error
                        console.log(error);
                    }
                });
            }

            $('.item-quantity').on('change', function() {
                const row = $(this).closest('tr');
                const itemId = row.data('id');
                const quantity = $(this).val();
                updateQuantity(itemId, quantity);
                updateItemTotal(row);
                updateTotal();
            });

            $('.item-checkbox').on('change', function() {
                updateTotal();
            });

            updateTotal();

            // Confirmation popup for remove button
            $('.remove-item').on('click', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const popupOverlay = $('.popup-overlay');
                const confirmButton = $('#confirm-remove');
                const cancelButton = $('#cancel-remove');

                // Show popup
                popupOverlay.show();

                // Confirm button click
                confirmButton.on('click', function() {
                    form.submit();
                });

                // Cancel button click
                cancelButton.on('click', function() {
                    popupOverlay.hide();
                });
            });

            // Handle checkout button click
            $('.checkout-btn').on('click', function(e) {
                e.preventDefault();
                const selectedItems = [];
                $('.item-checkbox:checked').each(function() {
                    const row = $(this).closest('tr');
                    selectedItems.push({
                        product_id: row.data('id'),
                        product_name: row.find('.products-name').text(),
                        product_image: row.find('img').attr('src'),
                        price: parseFloat(row.find('.item-price').text().replace('₱', '')),
                        quantity: parseInt(row.find('.item-quantity').val())
                    });
                });

                $('<form>', {
                    "method": "post",
                    "action": "{{ route('checkout.process') }}"
                })
                .append($('<input>', {
                    "name": "_token",
                    "value": '{{ csrf_token() }}',
                    "type": "hidden"
                }))
                .append($('<input>', {
                    "name": "items",
                    "value": JSON.stringify(selectedItems),
                    "type": "hidden"
                }))
                .appendTo('body')
                .submit();
            });

            // Handle quantity controls
            $('.quantity-controls button').on('click', function() {
                const row = $(this).closest('tr');
                const input = row.find('.item-quantity');
                let quantity = parseInt(input.val());

                if ($(this).text() === '+') {
                    quantity++;
                } else if ($(this).text() === '-' && quantity > 1) {
                    quantity--;
                }

                input.val(quantity);
                input.trigger('change');
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><a href="{{ route('home') }}">←</a></h1>
            <div style="text-align:center;">
                <h1><img src="images/log2.png" alt="Fa Style Logo"> Fa Style | Shopping Cart</h1>
            </div>
            <div>
                <a href="profile">
                    <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" style="height: 50px; width: 50px; border-radius: 50%;">
                </a>
            </div>
        </div>
        <table class="table table-hover cart-table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr data-id="{{ $item->id }}">
                    <td><input type="checkbox" class="item-checkbox"></td>
                    <td>
                        <img src="{{ $item->product_image }}" alt="product-image">
                        {{ $item->product_name }}
                    </td>
                    <td class="item-price">₱{{ $item->price }}</td>
                    <td class="quantity-controls">
                        <button type="button">-</button>
                        <input type="number" name="quantity" class="item-quantity" value="{{ $item->quantity }}" min="1" readonly>
                        <button type="button">+</button>
                    </td>
                    <td class="item-total">₱{{ $item->price * $item->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger remove-item">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-price">
            <strong>Total Price: <span id="total-price">₱0.00</span></strong>
        </div>
        <button class="checkout-btn" style="text-align:center; text-decoration:none;">Checkout</button>
    </div>

    <!-- Confirmation Popup -->
    <div class="popup-overlay">
        <div class="popup">
            <h2>Are you sure you want to remove this item?</h2>
            <button id="confirm-remove" class="btn btn-danger">Yes</button>
            <button id="cancel-remove" class="btn btn-secondary">No</button>
        </div>
    </div>
</body>
</html>
