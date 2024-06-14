<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Paw - Seller Centre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.sidebar {
    background-color: #FFA500;
    height: 100vh;
    color: white;
    padding-top: 20px;
    position: fixed;
}

.sidebar .logo h1 {
    text-align: center;
    font-size: 24px;
}

.nav-link {
    color: white;
    margin: 20px 0;
    text-align: center;
}

.nav-link:hover {
    background-color: #FF8C00;
    color: white;
}

.main-content {
    margin-left: 16.66%;
    padding: 20px;
}

.header {
    margin: 20px 0;
    border-bottom: 2px solid #FFA500;
    padding-bottom: 10px;
}

.header h2 {
    margin: 0;
    font-size: 24px;
}

.header .btn {
    margin-right: 10px;
}

.user-icon img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.content {
    padding: 20px;
}

.table th, .table td {
    vertical-align: middle;
    text-align: center;
}

.table img.product-img {
    width: 50px;
    height: auto;
}

.table .form-control {
    width: 150px;
    margin: auto;
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 sidebar">
                <img src="{{ asset('images/log1.png') }}" alt="Happy Paw Logo" height="40">
                <span class="ms-2 fw-bold">HAPPY PAW</span>
                <nav class="nav flex-column">
                    <a class="nav-link" href="sellerorders">Upload Products</a>
                    <a class="nav-link" href="#">My Products</a>
                    <a class="nav-link" href="orderparcel">Orders</a>
                </nav>
            </div>
            <div class="col-10 main-content">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2><a href="home"><b style="color: black; text-decoration:none;font-size:30px;"><- </b></a>Seller Centre</h2>
                    <div>
                        
                        <div class="user-icon d-inline-block">
                            <a href="profile">
                        <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" style="height: 50px; width: 50px; border-radius: 50%;">
                        </a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                    <div class="col-6">
                    <h3>All Orders</h3></div>
                    <div class="col-6" style="text-align:right;">
                    <button class="btn btn-warning">Export</button></div></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product</th>
                                <th>Total Order</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Noemi Peralta</td>
                                <td>Pogo, Alaminos City</td>
                                <td>09955334893</td>
                                <td><img src="pedigree.jpg" alt="Pedigree Adult" class="product-img"></td>
                                <td>x1</td>
                                <td>P159</td>
                                <td>Shipped Out</td>
                                <td>
                                    <select class="form-control">
                                        <option>Preparing Your Order</option>
                                        <option>Waiting for Courier</option>
                                        <option selected>Shipped Out</option>
                                        <option>In Transit</option>
                                        <option>Delivered</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
