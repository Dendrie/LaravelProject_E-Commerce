<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Navbar Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .main-navbar{
    border-bottom: 1px solid #ccc;
}
.main-navbar .top-navbar{
    background-color: #2874f0;
    padding-top: 10px;
    padding-bottom: 10px;
}
.main-navbar .top-navbar .brand-name{
    color: #fff;
}
.main-navbar .top-navbar .nav-link{
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}
.main-navbar .top-navbar .dropdown-menu{
    padding: 0px 0px;
    border-radius: 0px;
}
.main-navbar .top-navbar .dropdown-menu .dropdown-item{
    padding: 8px 16px;
    border-bottom: 1px solid #ccc;
    font-size: 14px;
}
.main-navbar .top-navbar .dropdown-menu .dropdown-item i{
    width: 20px;
    text-align: center;
    color: #2874f0;
    font-size: 14px;
}
.main-navbar .navbar{
    padding: 0px;
    background-color: #ddd;
}
.main-navbar .navbar .nav-item .nav-link{
    padding: 8px 20px;
    color: #000;
    font-size: 15px;
}

@media only screen and (max-width: 600px) {
    .main-navbar .top-navbar .nav-link{
        font-size: 12px;
        padding: 8px 10px;
    }
}
.category-card{
    border: 1px solid #ddd;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    margin-bottom: 24px;
    background-color: #fff;
}
.category-card a{
    text-decoration: none;
}
.category-card .category-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.category-card .category-card-body{
    padding: 10px 16px;
}
.category-card .category-card-body h5{
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: 600;
    color: #000;
    text-align: center;
}
    </style>
</head>
<body>

    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name">Funda Ecom</h5>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input type="search" placeholder="Search your product" class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-cart"></i> Cart (0)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-heart"></i> Wishlist (0)
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> Username 
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Funda Ecom
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">All Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Featured Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Electronics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fashions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accessories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Appliances</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Dog Foods</h4>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="">
                            <div class="category-card-img">
                                <img src="{{asset('images/paw.png')}}" class="w-100" alt="dogpud">
                            </div>
                            <div class="category-card-body">
                                <h5>Laptop</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="">
                            <div class="category-card-img">
                                <img src="mobile.jpg" class="w-100" alt="Mobile Devices">
                            </div>
                            <div class="category-card-body">
                                <h5>Mobile</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="">
                            <div class="category-card-img">
                                <img src="mens-fashion.jpg" class="w-100" alt="Mens Fashion">
                            </div>
                            <div class="category-card-body">
                                <h5>Mens Fashion</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="">
                            <div class="category-card-img">
                                <img src="women.jpg" class="w-100" alt="Women Fashion">
                            </div>
                            <div class="category-card-body">
                                <h5>Women Fashion</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>