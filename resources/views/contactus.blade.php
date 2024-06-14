<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #dfeff4;
      color: #333;
      font-family: Arial, sans-serif;
      padding: 30px;
    }

    .container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
    }

    h2, h3 {
      font-family: 'Georgia', serif;
    }

    #back-to-home {
      color: black;
      margin-bottom: 20px;
      display: inline-block;
    }

    #contact-form .form-control {
      background-color: #f7f7f7;
      border-radius: 5px;
    }

    #contact-form .form-group {
      margin-bottom: 1.5rem;
    }

    #contact-form label {
      font-weight: bold;
    }

    #contact-form .btn {
      background-color: #4091a2;
      border: none;
      color: #333;
      font-weight: bold;
    }

    .contact-details {
      background-color: #a8c6ca;
      padding: 20px;
      border-radius: 8px;
    }

    .contact-details a {
      color: #007bff;
    }

    .contact-details p {
      margin-bottom: 1rem;
    }

    .contact-details i {
      margin-right: 10px;
    }

    .contact-details .btn {
      background-color: transparent;
      border: none;
      color: #333;
      margin-right: 10px;
      padding: 0;
    }

    .contact-details .btn:hover {
      text-decoration: underline;
    }

    .text-center {
      font-family: 'Times New Roman', Times, serif;
    }

    /* Popup Overlay */
    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .popup {
      background: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      justify-content: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 30%;
      max-width: 400px;
      color: green;
    }

    .popup h2 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <a href="home" class="btn btn-link" id="back-to-home"><- Back to Home</a>
  <h1 class="text-center"><b>Get in Touch</b></h1>
  <div class="row mt-4">
    <div class="col-md-6">
      <h3>Write Us</h3>
      <form id="contact-form">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" class="form-control" id="name" placeholder="your name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="your email">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" rows="4" placeholder="Write a message"></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
      </form>
    </div>
    <div class="col-md-6">
      <h3>Contact Us</h3>
      <div class="contact-details">
        <p><i class="fas fa-map-marker-alt"></i> Address: No where near, Pangasinan</p>
        <p><i class="fas fa-phone"></i> Phone: 0928-951-3579</p>
        <p><i class="fas fa-envelope"></i> Email: <a href="mailto:fastyle@gmail.com">fastyle@gmail.com</a></p>
        <p>Social Media:</p>
        <p>
          <a href="#" class="btn"><i class="fab fa-facebook-f"></i>Facebook</a>
          <a href="#" class="btn"><i class="fab fa-instagram"></i>Instagram</a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="popup-overlay">
  <div class="popup">
    <h2>Request has been Submitted</h2>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
  document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    document.querySelector('.popup-overlay').style.display = 'flex';
    setTimeout(() => {
      document.querySelector('.popup-overlay').style.display = 'none';
    }, 3000);
    document.getElementById('contact-form').reset();  // Clear the form
  });
</script>

</body>
</html>
