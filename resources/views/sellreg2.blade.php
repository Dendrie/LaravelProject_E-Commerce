<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-color: #ffcc80;
}

.card {
    margin: auto;
    max-width: 600px;
}

.card-header {
    background-color: #ff9900;
    color: white;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Seller Registration</h2>
            </div>
            <div class="card-body">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Submit Business Information?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="submit_info" id="submitNow" value="now" checked>
                            <label class="form-check-label" for="submitNow">Submit Now</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="submit_info" id="submitLater" value="later">
                            <label class="form-check-label" for="submitLater">Submit Later</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Seller Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="seller_type" id="soleProprietorship" value="sole_proprietorship" checked>
                            <label class="form-check-label" for="soleProprietorship">Sole Proprietorship</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="seller_type" id="partnershipCorporation" value="partnership_corporation">
                            <label class="form-check-label" for="partnershipCorporation">Partnership/Corporation</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registeredName">Registered Name</label>
                        <input type="text" class="form-control" id="registeredName" name="registered_name" placeholder="Last Name, First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="registeredAddress">Registered Address</label>
                        <input type="text" class="form-control" id="registeredAddress" name="registered_address" value="North Luzon/Pangasinan/Burgos/Poblacion" required>
                    </div>
                    <div class="form-group">
                        <label for="specificAddress">Specific Address</label>
                        <input type="text" class="form-control" id="specificAddress" name="specific_address" value="Poblacion, Burgos, Pangasinan" required>
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postal_code" value="2410" required>
                    </div>
                    <div class="form-group">
                        <label for="birCertificate">BIR Certificate of Registration</label>
                        <input type="file" class="form-control-file" id="birCertificate" name="bir_certificate" accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" name="agree_terms" required>
                        <label class="form-check-label" for="agreeTerms">I agree to these <a href="#">Terms and Conditions</a> and <a href="#">Data Privacy Policy</a></label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back();">Back</button>
                </form>
            </div>
        </div>
    </div>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submit_info = $_POST['submit_info'];
    $seller_type = $_POST['seller_type'];
    $registered_name = $_POST['registered_name'];
    $registered_address = $_POST['registered_address'];
    $specific_address = $_POST['specific_address'];
    $postal_code = $_POST['postal_code'];
    $agree_terms = isset($_POST['agree_terms']);

    // File upload
    if (isset($_FILES['bir_certificate']) && $_FILES['bir_certificate']['error'] == 0) {
        $file_tmp = $_FILES['bir_certificate']['tmp_name'];
        $file_name = $_FILES['bir_certificate']['name'];
        $file_size = $_FILES['bir_certificate']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];

        if (in_array($file_ext, $allowed_ext) && $file_size <= 20971520) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $file_path = $upload_dir . basename($file_name);
            if (move_uploaded_file($file_tmp, $file_path)) {
                echo "File uploaded successfully.";
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }

    echo "<h2>Form Data</h2>";
    echo "Submit Info: " . htmlspecialchars($submit_info) . "<br>";
    echo "Seller Type: " . htmlspecialchars($seller_type) . "<br>";
    echo "Registered Name: " . htmlspecialchars($registered_name) . "<br>";
    echo "Registered Address: " . htmlspecialchars($registered_address) . "<br>";
    echo "Specific Address: " . htmlspecialchars($specific_address) . "<br>";
    echo "Postal Code: " . htmlspecialchars($postal_code) . "<br>";
    echo "Agreed to Terms: " . ($agree_terms ? 'Yes' : 'No') . "<br>";
}
?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
