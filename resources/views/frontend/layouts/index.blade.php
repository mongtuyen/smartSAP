<!DOCTYPE html>
<html lang="en">
  <head>
  <title>@yield('title')</title>
    <title>Fotograp &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/fotograp/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/lightgallery.min.css')}}">    
    
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/fotograp/fonts/flaticon/font/flaticon.css')}}">
    
    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/swiper.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/fotograp/css/style.css')}}">
    @yield('custom-css')
  </head>
  <body>
  
  <div class="site-wrap">

    
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
<!--Header-->
    @include('frontend.layouts.partials.header')

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('theme/fotograp/images/hero_bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1>I'm Ben Botsford a Professional Photographer Live in Oakland</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
      <a href="about.html"><img src="{{ asset('theme/fotograp/images/person_7.jpg')}}" alt="Image"></a>
    </div>

    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">My Specialties</h2>
            </div>
          </div>
        <div class="row">
          <div class="col-md-6">
            <div class="site-block-half d-lg-flex">
              <div class="image" style="background-image: url('theme/fotograp/images/img_1.jpg');"></div>
              <div class="text">
                <h3>Nature Photography</h3>
                <p>Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
              </div>
            </div>
            <div class="site-block-half d-lg-flex">
              <div class="image" style="background-image: url('theme/fotograp/images/img_3.jpg');"></div>
              <div class="text">
                <h3>Portrait Photography</h3>
                <p>Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="site-block-half d-lg-flex">
              <div class="image" style="background-image: url('theme/fotograp/images/img_2.jpg');"></div>
              <div class="text">
                <h3>Wedding Photography</h3>
                <p>Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
              </div>
            </div>
            <div class="site-block-half d-lg-flex">
              <div class="image" style="background-image: url('theme/fotograp/images/img_4.jpg');"></div>
              <div class="text">
                <h3>Food & Drink Photography</h3>
                <p>Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 site-block-testimonial" style="background-image: url('theme/fotograp/images/hero_bg_1.jpg');" data-stellar-background-ratio="0.5">
     <div class="container">
       <div class="row block-13 mb-5">
         <div class="col-md-12 text-center" data-aos="fade">
           <div class="nonloop-block-13 owl-carousel">
              <div class="block-testimony">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident suscipit dicta repellat, sit aut at nulla quam sed, neque voluptatum deserunt, vero ipsum natus sint culpa illo. Vel, sed, assumenda.&rdquo;</p>
                <p class="small">&mdash; Marrygrace Woodland</p>
              </div>
              <div class="block-testimony">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident suscipit dicta repellat, sit aut at nulla quam sed, neque voluptatum deserunt, vero ipsum natus sint culpa illo. Vel, sed, assumenda.&rdquo;</p>
                <p class="small">&mdash; Jean Doe</p>
              </div>
              <div class="block-testimony">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident suscipit dicta repellat, sit aut at nulla quam sed, neque voluptatum deserunt, vero ipsum natus sint culpa illo. Vel, sed, assumenda.&rdquo;</p>
                <p class="small">&mdash; Ben Smith</p>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>

    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7" data-aos="fade-up">
            <h2>My Photography</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_1.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Autumn Leaf</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_2.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sea Creatures</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_3.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Enjoying Deep Sea</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_4.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Beautiful Beach</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_5.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Laughter is Science</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="single.html">
              <figure>
                <img src="images/img_6.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Knot Tying</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


   <div class="py-3 mb-5 mt-5">
     <div class="container">
       <div class="row">
         <div class="col-md-12 d-md-flex align-items-center" data-aos="fade">
           <h2 class="text-black mb-5 mb-md-0 text-center text-md-left">Need a photographer?</h2>
           <div class="ml-auto text-center text-md-left">
            <a href="contact.html" class="btn btn-danger py-3 px-5 rounded">Contact Me</a>
           </div>
         </div>
       </div>
     </div>
   </div>


  

  @include('frontend.layouts.partials.footer')


    
    
  </div>

  <script src="{{ asset('theme/fotograp/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery-ui.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/popper.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/swiper.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/aos.js')}}"></script>

  <script src="{{ asset('theme/fotograp/js/picturefill.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/lightgallery-all.min.js')}}"></script>
  <script src="{{ asset('theme/fotograp/js/jquery.mousewheel.min.js')}}"></script>

  <script src="{{ asset('theme/fotograp/js/main.js')}}"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
     @yield('custom-scripts')
  </body>
</html>