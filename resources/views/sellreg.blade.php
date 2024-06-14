<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration - Happy Paw</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #dfeff4;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #dfeff4;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .user-icon img {
            border-radius: 50%;
        }

        .bg-white {
            background-color: white !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-warning {
            background-color: #ffa500;
            border-color: #ffa500;
            padding: 10px 20px;
            font-size: 18px;
        }

        .btn-warning:hover {
            background-color: #e69500;
            border-color: #e69500;
        }

        .card {
            border-radius: 10px;
        }

        .card-header {
            border-bottom: 2px solid #e9ecef;
        }
    </style>
</head>
<body>
    <header class="py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
        
            </div>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white p-5">
                <img src="images/log2.png" alt="Fa Style Logo" height="40">
                <span class="ms-2 fw-bold">Fa Style</span>
                    <div class="card-header bg-white border-0 text-center">
                        <h5>Fa Style | Seller Registration</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (Auth::user()->is_registered_seller)
                            <script>
                                window.location.href = "{{ route('products.create') }}";
                            </script>
                        @else
                            <form action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="shopName">Shop Name</label>
                                    <input type="text" class="form-control" id="shopName" name="shop_name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pickupAddress">Pickup Address</label>
                                    <textarea class="form-control" id="pickupAddress" name="pickup_address" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="contact_number">Phone Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ Auth::user()->contact_number }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="shopImage">Shop Image (Optional)</label>
                                    <input type="file" class="form-control" id="shopImage" name="shop_image" accept="image/*">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
