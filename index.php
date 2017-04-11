<?php
//    error_reporting(E_ALL ^ E_NOTICE);
//    error_reporting(E_ERROR | E_PARSE);
    session_save_path("/tmp");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="icon" type="image/x-icon" href="assets/images/favicons/favicon.ico" />
        <link rel="icon" type="image/png" href="assets/images/favicons/favicon.png" />
        <!-- For iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicons/apple-touch-icon-114x114-precomposed.png">
        <!-- For iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicons/apple-touch-icon-72x72-precomposed.png">
        <!-- For iPhone: -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/favicons/apple-touch-icon-60x60-precomposed.png">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/theme.min.css">
        <link rel="stylesheet" href="assets/css/color-defaults.min.css">
        <link rel="stylesheet" href="assets/css/swatch-beige-black.min.css">
        <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
        <link rel="stylesheet" href="assets/css/swatch-black-white.min.css">
        <link rel="stylesheet" href="assets/css/swatch-black-yellow.min.css">
        <link rel="stylesheet" href="assets/css/swatch-blue-white.min.css">
        <link rel="stylesheet" href="assets/css/swatch-green-white.min.css">
        <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
        <link rel="stylesheet" href="assets/css/swatch-white-black.min.css">
        <link rel="stylesheet" href="assets/css/swatch-white-blue.min.css">
        <link rel="stylesheet" href="assets/css/swatch-white-green.min.css">
        <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
        <link rel="stylesheet" href="assets/css/swatch-yellow-black.min.css">
        <link rel="stylesheet" href="assets/css/fonts.min.css" media="screen">
    </head>
    <body>
        <header id="masthead" class="navbar navbar-sticky swatch-black-beige" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="./index.php" class="navbar-brand">
                        <img src="" alt="">Lab107 Booking System
                    </a>
                </div>
                <nav class="collapse navbar-collapse main-navbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                    	<li class="dropdown active"><a href =# class="dropdown-toggle"
                    	data-toggle = "dropdown">Home</a></li>
						<li>
						<?php
//                        print_r ($_SESSION);
							if(isset($_SESSION['sid']) && $_SESSION['sid'] != ''){
								echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Hello!! '.$_SESSION['fname'].'</a>';
								echo '<ul class="dropdown-menu">';
								echo '<li><a href="profile.php">Profile</a>';
								echo '</li>';
								if($_SESSION["C_TYPE"]==1){
									echo '<li><a href="management.php">Management</a>';
									echo '</li>';
								}
								echo '<li><a href="logout.php">Logout</a>';
								echo '</li>';
								
                               
                                echo '</ul>';
							} elseif(isset($_SESSION['uid']) && $_SESSION['uid'] != ''){
								echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Hello!! '.$_SESSION['fname'].'</a>';
								echo '<ul class="dropdown-menu">';
								echo '<li><a href="profile.php">Profile</a>';
								echo '</li>';
                                echo '<li><a href="management.php">Management</a>';
                                echo '</li>';
								echo '<li><a href="logout.php">Logout</a>';
								echo '</li>';
                                echo '</ul>';
							}else{
								echo '<li class="">';
                                echo'<a href =login-form.html >Login</a>';
                                echo '</li>';
                                echo '<li class="">';
                                echo'<a href =register-form.html>Register</a>';
                                echo '</li>';
	
							}
						
						?>
						</li>
                    </ul>
                    
                </nav>
            </div>
        </header>
        <div id="content" role="main">
        <!--    <section class="section swatch-black-beige">
                <div class="container" align="center">
                    <form action="color-swatches.html">
                      First name:<br>
                      <input type="text" name="firstname" value="Mickey">
                      <br>
                      Last name:<br>
                      <input type="text" name="lastname" value="Mouse">
                      <br><br>
                      <input type="submit" value="Submit">
                    </form> 
                </div>
            </section>-->

            <section class="section swatch-black-beige">
                <div class="container">
                    <header class="section-header underline text-center">
                        <h1 class="headline super hairline">Latest news</h1>
                    </header>
                    <div class="carousel slide" id="news2">
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#news2" class="active"></li>
                            <li data-slide-to="1" data-target="#news2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                    <a class="feature-image magnific hover-animate" href="assets/images/design/vector/img-4-800x700.png" title="Thats a nice image">
                                                        <img alt="some image" src="assets/images/design/vector/img-4-800x700.png">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="post.html">
                        This theme is so nice!
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">John Langan,</a>
                </small>
                                                    <small class="post-date">
                    <a href="post.html">12 August 2014</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-camera"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quo, veniam culpa maiores iure distinctio atque similique veritatis rem et adipisci eveniet aspernatur aut sapiente amet doloremque eos quasi numquam.
                                                    </p>
                                                    <a class="more-link" href="post.html">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="post.html">
                            <i class="fa fa-folder-open"></i>
                                News
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              flat,
                            </a>
                        
                        
                            <a href="post.html">
                              responsive,
                            </a>
                        
                        
                            <a href="post.html">
                              metro
                            </a>
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="post.html">
                            <i class="fa fa-comments"></i>
                            4 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="post.html">
                        Bootstrap is Really Important
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">Manos Proistak,</a>
                </small>
                                                    <small class="post-date">
                    <a href="post.html">25 July 2013</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-file-text"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quo, veniam culpa maiores iure distinctio atque similique veritatis rem et adipisci eveniet aspernatur aut sapiente amet doloremque eos quasi numquam. In lobortis eget ipsum vestibulum
                                                        tristique. Donec luctus, dolor ut scelerisque luctus, erat elit consectetur arcu, eu pellentesque felis nulla sed massa. Nunc enim sem, ullamcorper ac tincidunt eget, euismod nec leo. Nunc imperdiet
                                                        fringilla erat, sit amet iaculis ipsum congue et.
                                                    </p>
                                                    <a class="more-link" href="post.html">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="post.html">
                            <i class="fa fa-folder-open"></i>
                                News
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              blog
                            </a>
                        
                        
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="post.html">
                            <i class="fa fa-comments"></i>
                            2 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                    <div id="slider-flex5" class="flexslider text-left feature-slider" data-flex-speed="7000" data-flex-animation="slide" data-flex-controls="hide" data-flex-directions="show" data-flex-controlsalign="center" data-flex-captionhorizontal="" data-flex-captionvertical=""
                                                    data-flex-controlsposition="" data-flex-directions-type="">
                                                        <ul class="slides">
                                                            <li>
                                                                <img src="assets/images/design/vector/img-5-800x600.png" alt="some image">
                                                            </li>
                                                            <li>
                                                                <img src="assets/images/design/vector/img-3-800x600.png" alt="some image">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="">
                        It is cool &amp; responsive
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">Dimitrios Pantazis,</a>
                </small>
                                                    <small class="post-date">
                    <a href="">15 May 2014</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-picture-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quo, veniam culpa maiores iure distinctio atque similique veritatis rem et adipisci eveniet aspernatur aut sapiente amet doloremque eos quasi numquam.
                                                    </p>
                                                    <a class="more-link" href="">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="">
                            <i class="fa fa-folder-open"></i>
                                blog
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              flat
                            </a>
                        
                        
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="">
                            <i class="fa fa-comments"></i>
                            5 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                    <a class="feature-image magnific-youtube hover-animate" href="http://www.youtube.com/watch?v=cfOa1a8hYP8" title="Thats a nice image">
                                                        <img alt="some image" src="assets/images/design/vector/img-2-800x600.png">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="post.html">
                        Everybody loves it
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">Chris Pantazis,</a>
                </small>
                                                    <small class="post-date">
                    <a href="post.html">17 January 2014</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-film"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quo, veniam culpa maiores iure distinctio atque similique veritatis rem et adipisci eveniet aspernatur aut sapiente amet doloremque eos quasi numquam.
                                                    </p>
                                                    <a class="more-link" href="post.html">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="post.html">
                            <i class="fa fa-folder-open"></i>
                                News
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              flat,
                            </a>
                        
                        
                            <a href="post.html">
                              responsive
                            </a>
                        
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="post.html">
                            <i class="fa fa-comments"></i>
                            4 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="post.html">
                        It is so cheap
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">Mary Doe,</a>
                </small>
                                                    <small class="post-date">
                    <a href="post.html">30 June 2014</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-quote-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <blockquote>
                                                        <p>Cras aliquet felis in magna accumsan, sit amet mattis arcu auctor. Nunc sollicitudin auctor adipiscing. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam
                                                            lacus ante, egestas id pellentesque vel, tempus at justo.</p>
                                                        <small>
                            Chris Pantazis
                            <cite title="Source Title"> Oxygenna magazine</cite>
                        </small>
                                                    </blockquote>
                                                    <a class="more-link" href="post.html">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="post.html">
                            <i class="fa fa-folder-open"></i>
                                Flat
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              quotes
                            </a>
                        
                        
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="post.html">
                            <i class="fa fa-comments"></i>
                            2 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="grid-post swatch-black-beige">
                                            <article class="post post-showinfo">
                                                <div class="post-media">
                                                    <a class="feature-image magnific-vimeo hover-animate" href="http://vimeo.com/20061744" title="Let&#x27;s talk about it">
                                                        <img alt="some image" src="assets/images/design/vector/img-1-800x600.png">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="post-head text-center">
                                                    <h3 class="post-title">
                    <a href="post.html">
                        Everybody loves it
                    </a>
                </h3>
                                                    <small class="post-author">
                    <a href="blog.html">Chris Pantazis,</a>
                </small>
                                                    <small class="post-date">
                    <a href="post.html">15 August 2014</a>
                </small>
                                                    <div class="post-icon flat-shadow flat-hex">
                                                        <div class="hex hex-big">
                                                            <i class="fa fa-film"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-body">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quo, veniam culpa maiores iure distinctio atque similique veritatis rem et adipisci eveniet aspernatur aut sapiente amet doloremque eos quasi numquam.
                                                    </p>
                                                    <a class="more-link" href="post.html">
                read more
                </a>
                                                </div>
                                                <div class="post-extras">
                                                    <div class="text-center">
                                                        <span class="post-category">
                        <a href="post.html">
                            <i class="fa fa-folder-open"></i>
                                Posts
                        </a>
                    </span>
                                                        <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        
                            <a href="post.html">
                              design,
                            </a>
                        
                        
                            <a href="post.html">
                              blog
                            </a>
                        
                        
                        
                        </span>
                                                    </div>
                                                    <div class="text-center">
                                                        <span class="post-link">
                        <a href="post.html">
                            <i class="fa fa-comments"></i>
                            6 comments
                        </a>
                    </span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer id="footer" role="contentinfo">
                <section class="section swatch-black-beige has-top">
                    <div class="decor-top">
                        <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0 L50 100 L100 0 L100 100 L0 100" stroke-width="0"></path>
                        </svg>
                    </div>
                    
                </section>
            </footer>
        </div>
        <a class="go-top hex-alt" href="javascript:void(0)">
            <i class="fa fa-angle-up"></i>
        </a>
        <script src="assets/js/packages.min.js"></script>
        <script src="assets/js/theme.min.js"></script>
    </body>
</html>
