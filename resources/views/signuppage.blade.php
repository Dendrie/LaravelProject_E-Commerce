<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .outer-container {
            background-color: #c7eaf2;
            height: 100vh;
        }
        .inner-container {
            background-color: white;
            margin-top: 35px;
            height: 690px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 3%;
        }
    </style>
</head>
<body>
    <div class="container-fluid outer-container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="inner-container">
                    <div class="container left-side" style="margin-top:-230px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;padding-left: 50px;padding-right: 50px;margin-top:0px;">
                        <h2 style="font-size:50px;font-weight:bolder;text-align:center;margin-top:0px;">Sign Up</h2>
                        <br>
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0"><i class="bi bi-person"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control rounded-pill" id="name" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0"><i class="bi bi-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control rounded-pill" id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0"><i class="bi bi-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control rounded-pill" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0"><i class="bi bi-key"></i></span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control rounded-pill" id="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0"><i class="bi bi-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_number" class="form-control rounded-pill" id="contact_number" placeholder="Enter your contact number">
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="btn rounded-pill" style="margin-top: 30px;background-color:#4499ad;height:50px;width:120px;color:white;font-weight:bolder;font-size:larger;text-align:center;margin-bottom:20px;">Sign Up</button>
                            </div>
                        </form>
                        <div style="text-align: center;margin-top:-20px;">
                            <h6>________________________________________</h6>
                        </div>
                        <div style="text-align: center;">
                            <h6>Already have an account? <a href="{{ route('loginpage') }}">Login</a></h6>
                        </div>
                    </div>

                    <div class="container right-side" style="background-color: #9bc6cb;height:500px;margin:30px;border-radius:5%;">
                        <div class="loginpic align-items-center" style="padding-top: 50px;">
                            <img src="{{ asset('images/log2.png') }}" alt="login" style="width:50px;position:fixed;margin-left:85px;">
                            <span><h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman';font-weight:bolder;color:white;margin-left:10px;text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fa Style</h1></span>
                        </div>
                        <img src="{{ asset('images/fashion3.png') }}" alt="login" style="width:420px;margin-top:-30px;">
                        <h3 style="color:white;margin-top:-60px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman';text-align:center;"></h3>
                        <h3 style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman';"> <br>Your best friend in shopping!</h3>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
