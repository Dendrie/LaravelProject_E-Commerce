<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fa Style</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f0f0; }
        header { background-color: #AFECEF !important; position: sticky; top: 0; z-index: 1020; }
        .navbar { margin-bottom: 20px; justify-content: space-between; position: sticky; top: 102px; z-index: 1030; font-weight: bolder; }
        .carousel-item img, video { max-height: 530px; margin: 0px -20px 0px -15px; width: 100%; }
        .product-carousel { position: relative; overflow: hidden; margin-left: 70px; margin-right: 69px; }
        .product-row { display: flex; transition: transform 0.8s ease; will-change: transform; overflow: hidden; }
        .carousel-control-prev, .carousel-control-next { display: none; position: absolute; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; background-color: blue; border-radius: 50%; justify-content: center; align-items: center; cursor: pointer; }
        .carousel-control-prev { left: 0; }
        .carousel-control-next { right: 0; }
        .product-carousel:hover .carousel-control-prev, .product-carousel:hover .carousel-control-next { display: flex; }
        .carousel-control-prev-icon, .carousel-control-next-icon { width: 20px; height: 20px; background-size: 100%, 100%; }
        .product-card { border: 1px solid #e0e0e0; border-radius: 5px; overflow: hidden; transition: transform 0.2s ease-in-out; width: 200px; height: 400px; flex-shrink: 0; margin-left: 20px;}
        .product-card:hover { transform: scale(0.96); cursor: pointer; }
        .card-img-top { height: 180px; object-fit: cover; width: 100%; }
        .card-body { padding: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .card-subtitle { font-size: 0.9em; color: #007bff; }
        .card-title { font-size: 1.2em; margin-top: 10px; margin-bottom: 10px; color: #000; } 
        .card-text { font-size: 1em; color: #000; } 
        .price-text { font-size: 1.1em; color: #ff3333; } 
        .btn-group { display: flex; justify-content: center; }
        .btn-primary { background-color: #007bff; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; transition: background-color 0.2s; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-secondary { background-color: #6c757d; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; transition: background-color 0.2s; }
        .btn-secondary:hover { background-color: #5a6268; }
        .custom-font { font-family: 'Times New Roman', cursive; color: #F9D440; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; }
        .highlight { color: #F9D440; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; }
        .carousel { margin: 0; padding: 0; }
        .links .link { color: #fff; font-weight: bold; text-decoration: none; margin-right: 10px; }
        .links .separator { color: #fff; font-weight: bold; }
        .links .link:hover { color: #ffcc00; text-decoration: underline; }
        .product-row { scrollbar-width: none;}
        .product-row::-webkit-scrollbar {display: none;}
        .popup-overlay {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.5);display: none;justify-content: center;align-items: center;z-index: 1000;}
        .popup {background: white;padding: 20px;border-radius: 10px;text-align: center;justify-content: center;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);width: 30%;max-width: 400px;margin-top: 230px;margin-left: 580px;color:green;}
        .popup h2 {margin-bottom: 20px;}
        footer {text-align: center;margin-top: 20px;}
        .footer-top { background-color: #a8c6ca; padding: 10px 30px; display: flex; justify-content: center; gap: 350px;}
        .footer-top .icon img { width: 40px; height: 40px;}
        .footer-middle { background-color: #9bc6cb; padding: 10px 0; font-size: 16px;color:#fff;}
        .footer-middle a { color: #fff; text-decoration: none; margin: 0 10px;font-weight: bold;}
        .footer-middle a:hover { text-decoration: underline;}
        .footer-bottom { background-color: #84b6b9;padding:10px; font-weight: bold; font-size: 14px;height: 65px;}
        .footer-bottom p { margin: 5px 0;} 
</style>
</head>
<body>
    <header class="py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center col-2.5">
                <img src="{{ asset('images/log2.png') }}" alt="Logo" class="img-fluid" style="max-height: 70px;">
                <a href="#" style="text-decoration:none;"><h1 class="ml-3 mb-0 custom-font"><b style="font-size:55px;">
                    <span class="highlight">Fa</span> Style
                </b></h1></a>
            </div>
            <div class="d-flex align-items-center col-6">
                <input type="text" class="form-control" placeholder="Search..." style="height: 50px;color:#000;border-top-right-radius:0px;border-bottom-right-radius:0px;background-color:#fff;border:2px solid #2986cc;">
                <button class="btn btn-primary" style="height: 50px;border-top-left-radius:0px;border-bottom-left-radius:0px;width:75px;"><b style="font-size:20px;">Go</b></button>
            </div>
            <div class="d-flex align-items-center justify-content-between col-2.5">
    @auth
        <div class="d-flex align-items-center">
            <a href="profile">
                <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/default.png') }}" alt="Profile" style="height: 50px;width:50px; border-radius: 50%;">
            </a>
            <span class="ml-2">{{ Auth::user()->first_name }}</span>
        </div>
    @else
        <a href="{{ route('loginpage')}}" class="btn btn-outline-secondary">Log In / Sign Up</a>
    @endauth
    <div class="separator" style="border-left: 3px solid #000;height: 50px;margin: 0 15px;"></div>
    <!-- Inside the header -->
<a href="{{ route('cart.view') }}" class="btn btn-outline-primary">
    <img src="{{ asset('images/cart.png') }}" alt="Cart" style="height: 30px;">
    <span class="badge badge-pill badge-danger cart-count">{{ Auth::user()->cart()->count() }}</span> <!-- Added class for identification -->
</a>

</div>

        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom:1px solid #afa8a8;margin-bottom:0px;background-color:#fff;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-between">
                    <div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                    <li class="nav-item"><a class="nav-link" href="#">Mens Wear</a></li><div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                    <li class="nav-item"><a class="nav-link" href="#">Women's Wear</a></li><div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                    <li class="nav-item"><a class="nav-link" href="#">Shoes</a></li><div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                    <li class="nav-item"><a class="nav-link" href="#">Accessories</a></li><div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                    <li class="nav-item"><a class="nav-link" href="#">Miscellaneous</a></li><div class="separator" style=" border-left: 2px solid #ccc;height: 30px;"></div>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/homepix.jpg') }}" class="d-block w-110" alt="...">
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top:6vh;">
            @php
                $categories = [
                    'Mens Wear' => $mensClothes,
                    'Womens Wear' => $womensClothes,
                    'Bags' => $bags,
                    'Shoes' => $shoes,
                    'Accessories' => $accessories,
                    'Miscellaneous' => $miscellaneous,
                ];
            @endphp

            @foreach($categories as $categoryName => $products)
                <h2 class="mb-4">{{ $categoryName }}</h2>
                <div id="{{ str_replace(' ', '-', strtolower($categoryName)) }}-carousel" class="product-carousel">
                    <div class="product-row">
                        @foreach($products as $product)
                            <div class="product-card" style="background-color:#fff;">
                                <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('images/default-product.png') }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">{{ $product->shop->shop_name }}</h6>
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text price-text">Price: ₱{{ $product->price }}</p>
                                    <button class="btn btn-outline-primary add-to-cart-btn" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}" data-product-image="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('images/default-product.png') }}" data-shop-id="{{ $product->shop->id }}">
                                        <img src="{{ asset('images/cart.png') }}" alt="Cart" style="height: 30px;">
                                    </button>
                                    <button class="btn btn-primary buy-now-btn" 
            data-product-id="{{ $product->id }}" 
            data-product-name="{{ $product->name }}" 
            data-product-image="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('images/default-product.png') }}" 
            data-shop-id="{{ $product->shop->id }}" 
            data-price="{{ $product->price }}"
            style="padding:10px;width:90px;">
            Buy Now
        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel-control-prev" onclick="moveCarousel('{{ str_replace(' ', '-', strtolower($categoryName)) }}-carousel', -1)">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </div>
                        <div class="carousel-control-next" onclick="moveCarousel('{{ str_replace(' ', '-', strtolower($categoryName)) }}-carousel', 1)">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </div>
                    </div>
                @endforeach
    </div>

    <footer>
        <div class="footer-top">
            <div class="icon"><img src="images/Picture1.png" alt="Security"></div>
            <div class="icon"><img src="images/Picture2.png" alt="Wallet"></div>
            <div class="icon"><img src="images/Picture3.png" alt="Delivery"></div>
        </div>
        <div class="footer-middle">
            <a href="aboutus">About Us</a> |
            <a href="contactus">Contact Us</a> |
            <a href="privacy&policy">Privacy Policy</a> |
            <a href="terms&condition">Terms & Conditions</a> |
            <a href="cookies">Cookie Policy</a>
        </div>
        <div class="footer-bottom">
            <p>© Copyright Fa Style 2024</p>
            <p>Powered by Laravel</p>
        </div>
    </footer>

    <!-- Popup Overlay -->
    <div class="popup-overlay">
        <div class="popup">
            <h2>Success! Item added to cart</h2>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function moveCarousel(id, step) {
            const carousel = document.getElementById(id);
            const row = carousel.querySelector('.product-row');
            const cardWidth = carousel.querySelector('.product-card').offsetWidth;
            const visibleCards = Math.floor(carousel.offsetWidth / cardWidth);
            let scrollPosition = row.scrollLeft;

            if (step === 1) {
                scrollPosition += cardWidth * visibleCards;
            } else {
                scrollPosition -= cardWidth * visibleCards;
            }

            $(row).animate({ scrollLeft: scrollPosition }, 800); 
        }
        $(document).ready(function () {
            $('.add-to-cart-btn').click(function () {
                var productId = $(this).data('product-id');
                var productName = $(this).data('product-name');
                var productImage = $(this).data('product-image');
                var shopId = $(this).data('shop-id');
                var price = parseFloat($(this).closest('.product-card').find('.price-text').text().replace('Price: ₱', ''));

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        shop_id: shopId,
                        product_name: productName,
                        product_image: productImage,
                        quantity: 1, // Assuming a default quantity of 1
                        price: price // Pass the price to the controller
                    },
                    success: function (response) {
                        // Update the cart count in the header
                        var newCartCount = response.cart_count;
                        $('.cart-count').text(newCartCount);

                        // Display the popup overlay
                        $('.popup-overlay').fadeIn();

                        // Automatically close the popup after 1.5 seconds
                        setTimeout(function () {
                            $('.popup-overlay').fadeOut();
                        }, 1500);
                    },
                    error: function (xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            alert(xhr.responseJSON.error);
                        } else {
                            alert('An error occurred. Please try again.'); 
                        }
                    }
                });
            });
            $('.popup-overlay').click(function (e) {
                if ($(e.target).hasClass('popup-overlay')) {
                    $(this).fadeOut();
                }
            });
        });
        $(document).ready(function() {
        $('.buy-now-btn').click(function() {
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productImage = $(this).data('product-image');
            var shopId = $(this).data('shop-id');
            var price = $(this).data('price');
            var quantity = 1; // Assuming a default quantity of 1

            // Create a form dynamically
            var form = $('<form>', {
                action: '{{ route("placeorder") }}', // Ensure this route is correct
                method: 'POST'
            });

            // Add CSRF token for security
            form.append($('<input>', {
                type: 'hidden',
                name: '_token',
                value: '{{ csrf_token() }}'
            }));

            // Add product details to the form
            form.append($('<input>', {
                type: 'hidden',
                name: 'product_id',
                value: productId
            }));
            form.append($('<input>', {
                type: 'hidden',
                name: 'product_name',
                value: productName
            }));
            form.append($('<input>', {
                type: 'hidden',
                name: 'product_image',
                value: productImage
            }));
            form.append($('<input>', {
                type: 'hidden',
                name: 'shop_id',
                value: shopId
            }));
            form.append($('<input>', {
                type: 'hidden',
                name: 'price',
                value: price
            }));
            form.append($('<input>', {
                type: 'hidden',
                name: 'quantity',
                value: quantity
            }));

            // Append the form to the body and submit it
            $('body').append(form);
            form.submit();
        });
    });
    $(document).ready(function () {
        $('.buy-now-btn').click(function () {
    var productId = $(this).data('product-id');
    var productName = $(this).data('product-name');
    var productImage = $(this).data('product-image');
    var shopId = $(this).data('shop-id');
    var price = $(this).data('price');
    var quantity = 1; // Assuming a default quantity of 1

    // Construct the URL with query parameters
    var url = "{{ route('placeorder') }}";
    url += '?product_id=' + productId;
    url += '&product_name=' + productName;
    url += '&product_image=' + productImage;
    url += '&shop_id=' + shopId;
    url += '&price=' + price;
    url += '&quantity=' + quantity;

    // Redirect the user to the checkout page with the product details
    window.location.href = url;
});
    });
    </script>

</body>
</html>
