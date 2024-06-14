<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Happy Paw</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="#" class="active">My Products</a>
                <a href="orderparcel">Orders</a>
            </div>
            <div class="col-9">
                <h2>My Products</h2>
                <p>Here are the products you have created:</p>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="card">
                                <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('images/default-product.png') }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text"><strong>Price:</strong> ₱{{ $product->price }}</p>
                                    <p class="card-text"><strong>Shop:</strong> {{ $product->shop->shop_name }}</p>
                                    <button class="btn btn-danger mt-auto" data-product-id="{{ $product->id }}" onclick="confirmDelete(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let productIdToDelete = null;

        function confirmDelete(button) {
            productIdToDelete = button.getAttribute('data-product-id');
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            confirmDeleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (productIdToDelete) {
                deleteProduct(productIdToDelete);
            }
        });

        function deleteProduct(productId) {
            const url = `/products/${productId}`;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token // Include CSRF token for security
                }
            })
            .then(response => {
                if (response.ok) {
                    // Remove the card from the UI
                    const card = document.querySelector(`button[data-product-id="${productId}"]`).closest('.col-12.col-md-6.col-lg-4.mb-3');
                    card.remove();
                    alert('Product deleted successfully.');
                    const confirmDeleteModal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
                    confirmDeleteModal.hide();
                } else {
                    alert('Failed to delete product.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
