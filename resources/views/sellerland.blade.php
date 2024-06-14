<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration - Fa Style</title>
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

button.btn-warning {
    background-color: #7bb6c4;
    border-color: #ffa500;
    padding: 10px 20px;
    font-size: 18px;
}

button.btn-warning:hover {
    background-color: #e69500;
    border-color: #e69500;
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
            <div class="col-md-8 text-center bg-white p-5 rounded">
            <img src="images/log2.png" alt="Fa Style Logo" height="40">
            <span class="ms-2 fw-bold">Fa Style</span>
                <h1>Seller Registration</h1>
                <img src="images/sellerland.png" alt="Registration Icon" class="my-4" height="200">
                <h2>Welcome to Fa Style!</h2>
                <p>To get started, register as a seller by providing the necessary information.</p>
                <a class="btn btn-info" href="sellreg">Start Registration</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function startRegistration() {
    window.location.href = "/seller-registration-form"; // Adjust the URL to your registration form route
}

    </script>
</body>
</html>
