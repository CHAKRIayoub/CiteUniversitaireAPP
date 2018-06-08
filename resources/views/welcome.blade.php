<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Cité Universitaire</title>
    <meta name="description" content="Cité Universitaire">
    <meta name="" content="">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400' rel='stylesheet' type='text/css'>
    <!-- Library CSS -->
  <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet"/>
  <link href="{{ asset("css/bootstrap.min.css")}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset("css/css/bootstrap-theme.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/bootstrap-modal-carousel.css") }}">
    <link rel="stylesheet" href="{{ asset("fonts/et-line-font/etline.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/animations.css") }}>
    <link rel="stylesheet" href="{{ asset("css/css/owl.carousel.css") }} >
    <link rel="stylesheet" href="{{ asset("css/css/YTPlayer.css") }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset("css/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/css/component.css") }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset("css/css/theme-responsive.css") }}">

    <!-- Favicons -->
    <script src="{{ asset("js/js/modernizr.custom.js") }}"></script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="75">
<!-- Preloader Start -->
<div class="page-mask">
    <div class="page-loader">
        <div class="loading">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
    </div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div class="wrap">


    <header id="home">
        <!-- Image Background Start -->
        <div class="image-section">

            <div class="color-overlay"></div>

            <div class="container js-full-height">

                <div class="hero-content">
                    <div class="hero-text">
                        <div class="big-title">
                            <h2 class="wow fadeInUp" data-wow-delay="300ms">Cité Universitaire</h2>

                            @auth

                            @else

                            <p class="wow fadeInUp" data-wow-delay="300ms">Faire une demande de logement </p>

                            @endauth
                        </div>

                        
                        <div class="app-store-btn">
                               
                                <p data-wow-delay="300ms" style="color:white;">
                                    @auth

                                    @else
                                        <a href="/login#toregister"  class="btn btn-4 btn-4c" href="">Inscription</a>
                                    @endauth
                                </p>
                        </div>
                        
                        <div class="go-down-icon">
                                
                            <a href="#" class="hidden-xs"><i class="sht sht-down-arrow-icon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Image Background End -->
    </header>
    <!-- client logo section Start-->
    <section id="client-logo" class="client-logo-section padding-top40 padding-bottom20">
        <div class="container">

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="client-logo-section-inner">
                        <div class="row">
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/1.png") }}" alt="Université Mohammed 5 de rabat">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/2.png") }}" alt="Université Hassan 2 de Casablanca">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/6.png") }}" alt="Université Cadi Ayyad de Marrakech">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/3.png") }}" alt="Université Abdelmalek Essaadi">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/4.png") }}" alt="Université Sidi Mohamed Ben Abdellah de Fes">
                            </div>
                            <div class="col-sm-2 text-center">
                                <img src="{{ asset("images/img/brands/5.jpeg") }}" alt="Université Mohammed 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /client logo section Start-->
    <div class="modal fade modal-fullscreen force-fullscreen" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="modal-close">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <section class="header-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo-brand">
                        <h1><a id="logo" href="#"><img src="{{ asset("images/img/aa.png") }}" alt="logo"></a></h1>

                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="top-nav">
                        <nav>

                            <div class="menu-bar">


                                <span class="menu-text" data-text='Close'>Menu</span>

                                <div class="menu-toggle"></div>
                            </div>
                            <div class="menu-container js-full-height">
                                <div class="menu-inner">
                                    <ul class="menu">
                                        <li><a href="#home"><span>Accueil</span></a></li>
                                        <li><a href="#how-it-works"><span>Comment ça marche</span></a></li>
                                        <li><a href="#our-stats"><span>Nos Statistiques</span></a></li>
                                        <li><a href="#screenshots"><span>Photos</span></a></li>
                                        <li><a href="#feedback"><span>Les avis</span></a></li>
                                        <li><a href="#download-our-app"><span>Trouvez-Nous</span></a></li>
                                        <li><a href="#subscribe"><span>Contact</span></a></li>
                                        <li>
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ url('/home') }}"><span>accueil</span></a>
                                            @else
                                                <a href="{{ url('/login') }}"><span>Connexion</span></a>
                                            @endauth
                                        @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-0 Start-->
  
    <!-- Feature-0 End-->

    <!-- Feature Dope-bg Section Start-->
    
    <!-- Feature Dope-bg Section End-->

    <!-- How it works Section Start -->
    <section id="how-it-works" class="working-steps padding-top100 padding-bottom115">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Comment ça marche?</h2>

                        <p class="wow sub_title fadeInUp" data-wow-delay="300ms">
                            étapes trés simple</p>
                    </div>
                </div>
            </div>
            <div class="row padding-top100">
                <div class="work-step-container wow fadeIn">
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">1</span>
                            <i class="sht sht-download-icon-alt"></i>
                            <h4>inscrivez-vous</h4>

                            <p>
                                Inscription
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">2</span>
                            <i class="sht sht-install-icon"></i>
                            <h4>remplir le formulaire</h4>

                            <p>
                                Remplir le formulaire et upload les fichiers
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="work-step-box text-center">
                            <span class="step-no">3</span>
                            <i class="sht sht-play-icon"></i>
                            <h4>Résultat</h4>

                            <p>
                                Attendre le résultat Puis Payment 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it works Section End -->
    <!-- Stats Section Start -->
    <section id="our-stats" class="stats-bg  light">
        <div class="stats-bg-overlay">
            <div class="container padding-top100 padding-bottom100">
                <!-- row start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                            <h2 class="title wow fadeInUp" data-wow-delay="300ms">Nos Statistiques</h2>

                            <p class="wow fadeInUp sub_title" data-wow-delay="300ms">
                                Nous sommes fiers de ces statistiques
                            </p>
                        </div>
                    </div>
                </div>
                <!-- row end -->
                <!-- row start -->
                <div class="row">
                    <!-- col-md-4 start -->
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                        <!-- stat-box start -->
                        <div class="stat-box padding-top70 text-center">
                            <div class="stat-icon">
                                <span class="fa fa-bed" style="font-size: 80px"></span>
                            </div>
                            <div class="stat-box-info">
                                <span class="stats" data-from="0" data-to="10000" data-speed="3000"
                                      data-refresh-interval="50"></span>
                                <h4>
                                    Places
                                </h4>
                            </div>
                        </div>
                        <!-- stat-box end -->
                    </div>
                    <!-- col-md-4 end -->
                    <!-- col-md-4 start -->
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                        <!-- stat-box start -->
                        <div class="stat-box padding-top70 text-center">
                            <div class="stat-icon">
                                <span class="fa fa-group fa-5x"></span>
                            </div>
                            <div class="stat-box-info">
                                <span class="stats" data-from="2450" data-to="2573" data-speed="5000"
                                      data-refresh-interval="50"></span>
                                <h4>
                                    Rating
                                </h4>
                            </div>
                        </div>
                        <!-- stat-box end -->
                    </div>
                    <!-- col-md-4 end -->
                    <!-- col-md-4 start -->
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                        <!-- stat-box start -->
                        <div class="stat-box padding-top70 text-center">
                            <div class="stat-icon">
                                <span class="fa fa-trophy fa-5x"></span>
                            </div>
                            <div class="stat-box-info">
                                <span class="stats" data-from="0" data-to="7" data-speed="1000"
                                      data-refresh-interval="50"></span>
                                <h4>
                                    Récompenses
                                </h4>
                            </div>
                        </div>
                        <!-- stat-box End -->
                    </div>
                    <!-- col-md-4 end -->
                    <!-- col-md-4 start -->
                </div>
                <!-- row end -->
            </div>
        </div>
    </section>
    <!-- Stats Section End -->
    <!-- cHouse-timeline Start -->
   
    <!-- cHouse-timeline End -->
    <!-- Beautiful Design Section Start -->
   


    <!-- Beautiful Design Section End -->
    <!-- Share The Love Section Start -->
    
    <!-- Share The Love Section END -->
    <!--  Features You Will Love Start -->
    <section id="you-love" class="features-love-wrapper padding-top100 padding-bottom30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Caractéristiques que vous allez aimer</h2>

                        <p class="wow sub_title fadeInUp" data-wow-delay="300ms">
                            Notre Cité universitaire contient plusieurs caractéristiques qui sont 
                            <br>vraiment utile pour vous.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row padding-top50">
                <div class="col-md-10 col-md-offset-1">
                    <div class="features-love-inner">
                        <div class="row" data-wow-duration="1.5s" data-wow-delay="1.5s">
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class=" icon icon-desktop"></span>
                                    <h4>TV</h4>

                                    <p>
                                        tv.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class=" icon icon-book-open"></span>
                                    <h4>Biblio</h4>

                                    <p>
                                        Biblio
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="icon icon-cloud"></span>
                                    <h4>Internet</h4>

                                    <p>
                                        Internet avec bonne débit.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-futbol-o fa-5x"></span>
                                    <h4>Terrains de Sport</h4>

                                    <p>
                                        Terrains Foot - Basket - HandBall - Tennis.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-shower fa-5x"></span>
                                    <h4>douche</h4>

                                    <p>
                                        douche.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="features-love text-center wow fadeIn">
                                    <span class="fa fa-cutlery fa-5x"></span>
                                    <h4>Restaurant.</h4>

                                    <p>
                                        Restaurant.
                                    </p>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--  Features You Will Love End -->
    <!-- Testimonial Section Start -->
    <section id="feedback" class="padding-top100 padding-bottom80 testimonial-wrapper">
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Les Avis</h2>
                        <span class="quote-icon icon-quote"></span>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <!-- row start -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="testimonials padding-top30">
                        <div role="tabpanel">
                            <!-- Tab panes start -->
                            <div class="tab-content wow ">
                                <div role="tabpanel" class="tab-pane fade in active" id="testimonial-1">
                                    <blockquote>
                                        Trés bonne services
                                    </blockquote>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="testimonial-2">
                                    <blockquote>
                                        trés bonne services,Merci Beaucoup
                                    </blockquote>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="testimonial-3">
                                    <blockquote>
                                        Merci pour les bonne services.
                                    </blockquote>
                                </div>
                            </div>
                            <!-- Tab panes end-->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs padding-top50" role="tablist">
                                <li role="presentation" class="active">
                                    <div class="client-image">
                                        <a href="#testimonial-1" aria-controls="testimonial-1" role="tab"
                                           data-toggle="tab"><img src="images/img/team/team-member-1.jpg" alt=""></a>
                                    </div>
                                    <div class="client-info">
                                        <span class="client-name">Othmane Bouarda</span>
                                        <span class="client-company-name">Etudiant <strong>Université Rabat</strong></span>
                                    </div>
                                </li>
                                <li role="presentation">
                                    <div class="client-image">
                                        <a href="#testimonial-2" aria-controls="testimonial-2" role="tab"
                                           data-toggle="tab"><img src="images/img/team/team-member-2.jpg" alt=""></a>
                                    </div>
                                    <div class="client-info">
                                        <span class="client-name">Ayoub Chakri</span>
                                        <span class="client-company-name">Etudiant <strong>Université Fes</strong></span>
                                    </div>
                                </li>
                                <li role="presentation">
                                    <div class="client-image">
                                        <a href="#testimonial-3" aria-controls="testimonial-3" role="tab"
                                           data-toggle="tab"><img src="images/img/team/team-member-3.jpg" alt=""></a>
                                    </div>
                                    <div class="client-info">
                                        <span class="client-name">Hicham</span>
                                        <span class="client-company-name">Pr <strong>Université Casablanca</strong></span>
                                    </div>
                                </li>
                            </ul>
                            <!-- Nav tabs End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
    </section>
    <!-- Testimonial Section End -->

    <section id="download-our-app" class="download-our-app ">
        <div class="container">
                <div class="section-title text-center">
                        <h2 class="wow fadeInUp title" data-wow-delay="300ms">Trouvez Nous</h2>
                        
                        
                        
                    </div>
                <div class="mapouter text-center"><div class="gmap_canvas">
                        <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=ENSA de Avenue de la Palestine Mhanech I، Tétouan BP 2222&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
                </div>
                </div>

            
    </section>


    <!-- Email Update Section Start -->
    <section id="subscribe" class="email-update-bg light padding-top200 padding-bottom180">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <div class="section-title wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="title wow fadeInUp" data-wow-delay="300ms">Contacter nous</h2>

                        <p class="wow fadeInUp" data-wow-delay="300ms">
                            Contactez nous pour savoir plus d'information <br/> Nous vous répondrons dès que possible.
                            :)
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <form id="mc-form">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 text-center">
                        <div class="padding-top70">

                            <div class="form-group">
                                <input type="email" class="form-control email-update wow fadeInUp" id="mc-email"
                                       placeholder="Votre Email">
                                <label class="padding-top20" for="mc-email" id="mc-notification"></label>

                                
                                
                            </div>


                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn subscribe-btn wow fadeInUp">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="email-update-hand">
            </div>
        </div>

    </section>
    <!-- Email Update Section End -->
   
    <footer id="main-footer" class="padding-top30 padding-bottom30">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <nav class="footer-nav">
                        <ul class="footer-nav-inner">
                            <li><a href="#home"><span>Accueil</span></a></li>
                            <li><a href="#how-it-works"><span>Comment ça marche</span></a></li>
                            <li><a href="#our-stats"><span>Nos Statistiques</span></a></li>
                            <li><a href="#screenshots"><span>Photos</span></a></li>
                            <li><a href="#feedback"><span>Les avis</span></a></li>
                            <li><a href="#download-our-app"><span>Trouvez-Nous</span></a></li>
                            <li><a href="#subscribe"><span>Contact</span></a></li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12 text-center">
                        <div class="footer-brand padding-top30 padding-bottom30">
                            <img src="images/img/logo-footer.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12 text-center">
                        <div class="footer-copyright">
                            <p>© 2018 <a href="">Cité Universitaire</a>. Developed by <a href=""> ---- </a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer-social text-center">
                        <ul class="footer-social-links">
                            <li class="facebook"><a href="#"><span class="icon icon-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="icon icon-twitter"></span></a></li>
                            <li class="google-plus"><a href="#"><span class="icon icon-googleplus"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scrollup hidden-xs" style="display: inline;"><i class="sht sht-arrow_up-icon"></i></a>
</div>
<!-- Wrapper End -->
<script src="{{ asset("js/js/jquery.min.js") }}"></script>
<script src="{{ asset("js/js/jquery-ui.js") }}"></script>
<script src="{{ asset("js/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.ajaxchimp.min.js") }}"></script>
<script src="{{ asset("js/js/modernizr.js") }}"></script>
<script src="{{ asset("js/js/classie.js") }}"></script>
<script src="{{ asset("js/js/fappear.js") }}"></script>
<script src="{{ asset("js/js/jquery.hoverIntent.minified.js") }}"></script>
<script src="{{ asset("js/js/TweenMax.min.js") }}"></script>
<script src="{{ asset("js/js/owl.carousel.js") }}"></script>
<script src="{{ asset("js/js/waypoints.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.countTo.js") }}"></script>
<script src="{{ asset("js/js/wow.js") }}"></script>
<script src="{{ asset("js/js/jquery.waitforimages.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.nicescroll.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/js/jquery.scrollTo.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.localScroll.min.js") }}"></script>
<script src="{{ asset("js/js/jquery.parallax.js") }}"></script>
<script src="{{ asset("js/js/jquery.mb.YTPlayer.min.js") }}"></script>
<script src="{{ asset("js/js/custom.js") }}"></script>

</body>
</html>