@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Checkout</h2>
            <form method="POST" action="{{ route('order.success') }}">
                @csrf

                <!-- Add Shipping Address Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Add Shipping Address</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">Shipping Address</label>
                            <input type="text" name="shipping_address" class="form-control" id="address" placeholder="Enter your shipping address" required>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pet Shop Name</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Item Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->shop_name }}</td>
                                        <td>₱{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₱{{ $item->price * $item->quantity }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Subtotal</td>
                                        <td>₱{{ $subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Shipping Fee</td>
                                        <td>₱{{ $shippingFee }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Total</strong></td>
                                        <td><strong>₱{{ $total }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Payment Method</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="payment_method" value="credit_debit_card" checked> Credit/Debit Card
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="payment_method" value="cod"> Cash on Delivery
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="payment_method" value="gcash"> GCash
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="payment_method" value="maya"> Maya
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Place Order Button -->
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
