<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #72cee3;
        }

        .header {
            background-color: #72cee3;
            padding: 10px;
            text-align: left;
        }
        .footer {
            background-color: #72cee3;
            padding: 20px;
            text-align: left;
        }
        .header a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        .about-us-section {
            position: relative;
            width: 100%;
            height: 400px; /* Adjust as needed */
            background-image: url('images/aboutus.jpeg');
            background-size: cover;
            background-position: center 1%; /* Lower the image by adjusting the percentage */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: -1;
            border-radius: 25px;
        }

        .about-us-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 25px;
            
        }

        .about-us-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .about-us-content h1 {
            font-size: 68px;
            font-weight: bold;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .about-us-content h1 img {
            width: 100px; /* Adjust size as needed */
            height: auto;
        }

        .about-us-content p {
            font-size: 22px;
            margin: 20px 0 0 0;
        }

        .about-us-content img {
            margin-top: 28px; 
            width: 100px;
            height: auto;
        }

        .main-content {
            padding: 40px;
            background-color: #ffffff;
            text-align: center;
            margin-top: -40px;
            z-index: 2;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .main-content h2 {
            font-size: 42px;
            font-weight: bold;
            color: #18709e;
            text-align: center;
            margin-top: -30px;
            justify-content: center;
            align-self: center;
            margin-top:-40px;
            
        }

        .main-content p {
            font-size: 18px;
            color: #333333;
        }

        .main-content .columns {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .main-content .col-6 {
            width: 45%;
            text-align: left;
        }

        .main-content .col-6 h3 {
            font-size: 24px;
            color: #73c5db;
            font-weight: bold;
            margin-top: 0;
        }

        .main-content .col-6 ul {
            columns: 2; 
            padding-left: 20px;
        }

        .main-content .col-6 ul li {
            font-size: 18px;
            font-weight: bold;
            break-inside: avoid; 
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .white-bg{
            background-color: rgba(255, 255, 255, 0.7);
            margin:0px 130px 0px 130px;
            padding:10px 78px 68px 78px;
            text-align:justify;
            font-weight:bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            border-radius: 25px;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <a href="home">← Back to Home</a>
    </div>
    <div class="container">
    <div class="about-us-section">
        <div class="about-us-overlay"></div>
        <div class="about-us-content" style="margin-top:130px">
            <h1>About Us <img src="images/log2.png" alt="Paw" style="margin-top:-30px;"></h1>
            <div class="white-bg">
                <p>Welcome to Fa Style, your premier online fashion destination! At Fa Style, we believe fashion is an expression of your unique personality. Discover the latest trends and timeless pieces to ensure you always look and feel your best. Explore our curated collections and elevate your wardrobe with Fa Style!</p>
            </div>
        </div>
    </div>
    <div class="main-content" style="padding-top:50px;">
        <span><h2><img src="images/dart.png" alt="Logo"></span>Our Mission</h2>
        <p style="padding:0px 120px 10px 120px;font-weight:bolder;font-size:20px;">Our mission at Fa Style is to enhance your fashion experience by providing high-quality products, expert advice, and outstanding customer service. We strive to be your go-to resource for all things fashion, offering a wide range of apparel and accessories that cater to every style and occasion.</p>
        <div class="columns">
            <div class="col-6" style="border:3px solid  #084885;border-radius:25px;padding-top:15px;">
                <h3 style="text-align:center;">What We Offer</h3>
                <ul style="padding-left:120px;">
                    <li>Clothes</li>
                    <li>Other Fashion Products</li>
                    <li>Accessories</li>
                    <li>Safe Shopping</li>
                </ul>
            </div>
            <div class="col-6" style="border:3px solid  #084885;border-radius:25px;padding-top:15px;">
                <h3 style="text-align:center;">Why Choose Happy Paw?</h3>
                <ul style="padding-left:120px;">
                    <li>Quality Assurance</li>
                    <li>Expert Advice</li>
                    <li>Quality Assurance</li>
                    <li>Expert Advice</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
