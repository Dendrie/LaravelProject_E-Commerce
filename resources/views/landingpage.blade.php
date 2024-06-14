<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF9B28;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/paw.png') }}" alt="Logo" width="50" style="margin-right: -10px;margin-top:-10px;">
            <span class="ml-2" style="font-family: 'Times New Roman', Times, serif;font-size:30px;font-weight:bolder;color:white; ">HAPPY PAW</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="font-weight:bolder;">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline ml-lg-3">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 300px;">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav ml-lg-3" style="font-size: 25px;">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid" style="background-color: #FFAD4D;padding-right:60px;height:656px;">
    <div class="row">
        <div class="col-5 left-side" style="background-color: darkyellow;padding-left:200px;padding-top:170px;font-family:'Times New Roman', Times, serif;">
            <h1 style="font-weight:bold;font-size:60px;">Everything&nbsp;<span><img src="{{ asset('images/pawprint.png') }}" alt="title" style="width:70px;transform: rotate(45deg);margin-top:-20px;"></span></h1>
            <h1 style="font-weight:bold;font-size:58px;">Your Pets Needs</h1>
            <h3>Pet Supplies, food, products, from the best manufacturers.</h3>
            <br>
            <br>
            <a href="#" class="btn btn-light" style="font-weight: bolder;font-size:large;color:black;">Shop Now&nbsp;&nbsp;<span><i class="bi bi-arrow-right-square-fill" style="margin-bottom: -10px;"></i></span></a>
        </div>
        <div class="col-6 right-side" style="background-color: white;
            border-radius: 70%;
            height: 600px;
            margin-left:100px;
            margin-top: 30px;">
            <img src="{{ asset('images/petss.png') }}" alt="title" style="width:720px;position:fixed;">
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
</body>
</html>
