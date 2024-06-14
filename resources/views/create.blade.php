<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product - Happy Paw</title>
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
    </style>
</head>
<body>
    <div class="header"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-3">
                    <a href="home" style="text-decoration:none;color:#000;"><-</a>
                    <img src="{{ asset('images/log2.png') }}" alt="logo" style="height:40px;margin-left:20px;">Fa Style
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3 side">
                <a href="#" style="text-align:justify;" style="padding:0px;margin:0px;">
                    <b><img src="{{ Auth::user()->shop->shop_image ? asset('storage/' . Auth::user()->shop->shop_image) : asset('images/default.png') }}" alt="Shop" style="height: 50px;width: 50px;border-radius: 50%;">
                    {{ Auth::user()->shop->shop_name }}</b>
                </a>
                <a href="create" class="active">Upload Product</a>
                <a href="MyProducts">My Products</a>
                <a href="orderparcel">Orders</a>
            </div>
            <div class="col-9">
                <h2>Create Product</h2>
                <p>Fill out the form below to create a new product</p>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" disabled selected>Select category</option>
                                    <option value="Mens Clothes">Men's Clothes</option>
                                    <option value="Womens Clothes">Women's Clothes</option>
                                    <option value="Bags">Bags</option>
                                    <option value="Shoes">Shoes</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Miscellaneous">Miscellaneous</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="shipping" class="form-label">Shipping Fee</label>
                                <input type="text" class="form-control" id="shipping" name="shipping" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="images" class="form-label">Product Images (up to 15)</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info save" style="padding:10px 25px;">Create Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
