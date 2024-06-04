<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ENSTETOUAN &mdash; Emploi Temps</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          
          <div class="site-logo mr-auto w-25"><a href="{{ route('home') }}"><img style="width: 30% " src="/images/LOGO_ENS.png"></img></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                    <li><a href="#home-section" class="nav-link">Home</a></li>
                    <li><a href="#courses-section" class="nav-link">About</a></li>
                    <li><a href="#programs-section" class="nav-link">Policy</a></li>
                </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1"  style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">ENS TETOUAN <span style="font-size: 50%">Emploi Temps <span></h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Optimisez votre emploi du temps à l'École Normale Supérieure de Tétouan grâce à notre plateforme intuitive</p>
                </div>
                
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  @if (session('status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
                          {{ session('status') }}
                      </div>
                  @endif
                    <form action="{{ route('password.email') }}" method="POST" class="form-box">
                        @csrf
                        <h3 class="h4 text-black mb-4">Mot de passe oublié</h3>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-pill" value="Envoyer le lien de réinitialisation">
                        </div>
                    </form>
                

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>




  </div> <!-- .site-wrap -->

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const alert = document.getElementById('status-alert');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');
            }, 5000); // 5 seconds

            // Optionally, completely remove the alert from the DOM after the fade out
            setTimeout(() => {
                alert.remove();
            }, 5500); // slightly more than 5 seconds to ensure it has faded out
        }
    });
  </script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


  <script src="js/main.js"></script>

  </body>
</html>

