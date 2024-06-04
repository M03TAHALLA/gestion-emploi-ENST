
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/images/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .form-box {
        max-width: 500px;
        margin: 0 auto;
        padding: 30px;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-box h3 {
        margin-bottom: 20px;
        font-weight: 600;
        color: #333;
    }

    .form-box .form-control {
        border-radius: 50px;
        padding: 10px 20px;
    }

    .form-box .btn-pill {
        border-radius: 50px;
        padding: 10px 20px;
    }

    .form-box .text-danger {
        margin-top: 10px;
    }
</style>

    </style>
</head>
<body>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <a href="{{ route('home') }}"> <div class="site-logo mr-auto w-25"><img style="width: 30%;  margin-left:60px" src="/images/LOGO_ENS.png"></img></div>
            </a>
          </div>
        </div>
  
      </header>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8">
            <!-- Include the form here -->
            <form action="{{ route('password.update') }}" method="POST" class="form-box bg-light p-4 border rounded shadow-sm">
                @csrf
                <h3 class="h4 text-black mb-4" style="text-align: center">Réinitialiser le mot de passe</h3>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Nouveau mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Nouveau mot de passe" required>
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group" style="text-align: center">
                    <input type="submit" class="btn btn-success pl-5 pr-5 pt-2 pb-2"  value="Réinitialiser">
                </div>
            </form>
        </div>
    </div>
    
    <!-- resources/views/auth/reset-password.blade.php -->
    
</body>
</html>