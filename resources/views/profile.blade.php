<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #c7eaf2;
            width: 250px;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            left: 0;
        }
        .sidebar a {
            color: black;
            display: block;
            padding: 15px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #f0f0f0;
        }
        .sidebar a.active {
            color: #23a6af;
        }
        .profile-picture {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            font-size: 24px;
        }
        .header img {
            height: 40px;
        }
        .header .cart {
            display: flex;
            align-items: center;
        }
        .header .cart img {
            height: 30px;
            margin-right: 10px;
        }
        .header .cart span {
            background-color: red;
            color: white;
            padding: 2px 8px;
            border-radius: 50%;
            font-size: 12px;
        }
        .header .cart span::before {
            content: '(';
        }
        .header .cart span::after {
            content: ')';
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .profile-info p {
            margin-bottom: 20px;
            color: #555;
        }
        .profile-info .form-label {
            font-weight: bold;
        }
        .profile-info .form-control {
            border-radius: 5px;
        }
        .profile-info .form-text {
            color: #777;
        }
        .profile-info .save-btn {
            background-color: #53a2aa;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .profile-info .save-btn:hover {
            background-color: #ff9933;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="home"><i class="fas fa-arrow-left"></i> Back to Home</a>
        <a href="profile" class="active"><i class="fas fa-user"></i> My Account</a>
        <a href="mypurchased"><i class="fas fa-shopping-cart"></i> My Purchase</a>
        <a href="#"><i class="fas fa-bell"></i> Notifications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary w-100 mt-3">Logout</button>
        </form>
    </div>
    <div class="content bg-light" style="padding:50px;">
        <div class="header">
            <h1>&nbsp;</h1>
            <div>
                <h1><img src="images/log2.png" alt="Fa Style Logo" style="text-align:center;"> Fa Style | Profile</h1>
            </div>
            <div class="cart">
                <a href="{{ route('cart.view') }}">
                    <img src="{{ asset('images/cart.png') }}" alt="Cart">
                    <span class="cart-count">{{ Auth::user()->cart()->count() }}</span>
                </a>
            </div>
        </div>
        <div class="profile-info">
            <h1><b>My Profile</b></h1>
            <p>Manage and protect your account</p>
            <form id="profile-form" class="row" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}">
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label"><b><h2>Profile Picture</h2></b></label>
                        <div>
                            <img id="profile-picture-preview" src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" class="profile-picture">
                        </div>
                        <input type="file" class="form-control mt-2" id="profile_picture" name="profile_picture" accept="image/*">
                        <div class="form-text">File size: maximum 10 MB<br>File extension: JPEG, .PNG</div>
                        @if(!$user->is_seller)
                            <div id="seller-status" class="mt-3">
                                <a href="sellerland">Want to be a seller?</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('profile_picture').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('profile-picture-preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
