<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php
    $generic = $this->requestAction('/pages/getGeneric');
    if(ucfirst($this->params['action']) == 'Index')
    {
        $gtitle = 'Home';
    }
    else
    $gtitle = ucfirst($this->params['action']);
    ?>
    <meta property="og:image" content="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$this->webroot.'images/logo.png';?>" />
    <meta property="og:title" content="<?php if(isset($title)){echo $title." - Charilie's Chopsticks";}else{echo str_replace('_',' ',$gtitle).' - '.$generic['title'];}?>" />
    <meta property="og:type" content="website" />
    <meta name="description" content="<?php if(isset($description)){echo $description;}else{echo $generic['description'];}?>">
    
    <meta name="keywords" content="<?php if(isset($keyword)){echo $keyword;}else{echo $generic['keyword'];}?>">
    <link rel="icon" type="image/ico" href="<?php echo $this->webroot;?>images/favicon.png"/>

    <title><?php if(isset($title)){echo $title." - Charilie's Chopsticks";}else{echo str_replace('_',' ',$gtitle).' - '.$generic['title'];}?></title>

    <!-- Custom styles for this template -->
    <!-- build:css css/main.css -->
    <link href="<?php echo $this->webroot;?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->webroot;?>css/main.css" rel="stylesheet">
    <link href="<?php echo $this->webroot;?>css/timepicker.css" rel="stylesheet">
    <link href="<?php echo $this->webroot;?>css/ui.css" rel="stylesheet">
    <!-- endbuild -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Google fonts -->
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Arvo:700:latin', 'Open+Sans:400,600,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

  </head>
  <body><!--center class="noprint"><h1 style="color:red;">Currently Under Development</h1></center-->

    <div class="top  js--fixed-header-offset">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  col-sm-6">
        <div class="top__slogan">
          Have it your way
        </div>
      </div>
      <div class="col-xs-12  col-sm-6">
        <div class="top__menu">
          <ul class="nav  nav-pills">
            <?php
            if(!$this->Session->read('restaurant'))
            {?>
               
            <!--li><a href="#registerModal" role="button" data-toggle="modal">Register</a></li-->
            <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
            <?php 
            }
            if($this->Session->read('restaurant'))
            {?>
            <li><a href="<?php echo $this->webroot;?>restaurants/dashboard">Dashboard</a></li>
            <li><a href="<?php echo $this->webroot;?>restaurants/logout">Logout</a></li>
            <?php }?>
            
            <?php /*<li class="dropdown  js--mobile-dropdown">
              <a class="dropdown-toggle" href="#">
                English <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Deutsch</a></li>
                <li><a href="#">Espagnol</a></li>
              </ul>
            </li>
            <li class="dropdown  js--mobile-dropdown">
              <a class="dropdown-toggle"  href="#">
                USD <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">EUR</a></li>
                <li><a href="#">YEN</a></li>
              </ul>
            </li><?php /*/?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal register-->
<div class="modal  fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3><span class="light">Register</span> to Charlie's Chopsticks</h3>
        <hr class="divider">
      </div>
      <div class="modal-body">
        <form action="<?php echo $this->webroot;?>restaurants/register" method="post" class="push-down-15" id="registerform">
        
          <div class="form-group">
            <input type="text" id="name" class="form-control  form-control--contact" name="name" placeholder="Restaurant Title" required>
          </div>
          <div class="form-group">
            <input type="email" id="email" class="form-control  form-control--contact" name="email" placeholder="Email" value="" required>
            <div id="emailerror" style="display: none;"></div>
          </div>
          <div class="form-group">
            <input type="password" id="password1" class="form-control  form-control--contact" name="password" value="" placeholder="Password" required>
          </div>
          <div class="form-group">
            <input type="password" id="password2" class="form-control  form-control--contact" name="cpassword" value="" placeholder="Confirm Password" required>
            <div id="confirmerror" style="display: none;"></div>
          </div>
          
          <a href="javascript:void(0);" class="btn  btn-primary" id="registerbtn">REGISTER</a><input type="submit" id="submitregister" style="display: none;" />
        </form>
        <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Already Registered?</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal login-->
<div class="modal  fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3><span class="light">Login</span> to Charlie's Chopsticks</h3>
        <hr class="divider">
      </div>
      <div class="modal-body">
        <form action="<?php echo $this->webroot;?>restaurants/login" id="loginform" class="push-down-15" method="post">
          <div class="form-group">
            <input type="text" id="username" name="username" class="form-control  form-control--contact" placeholder="Email">
            <div id="usererror" style="display: none;"></div>
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password" class="form-control  form-control--contact" placeholder="Password">
            <div id="passerror" style="display: none;"></div>
          </div>
          <a href="javascript:void(0)" class="btn  btn-primary loginbtn">SIGN IN</a>
          <div id="formerror" style="display: none;"></div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal  fade" id="suggestModal" tabindex="-1" role="dialog" aria-labelledby="suggestModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3><span class="light">Tell</span> a Friend!</h3>
        <hr class="divider">
      </div>
      <div class="modal-body">
        <form action="<?php echo $this->webroot;?>pages/suggest" id="suggestform" class="push-down-15" method="post">
          <div class="form-group">
            <input required="" type="text" id="yourname" name="name" class="form-control  form-control--contact" placeholder="Your Name">            
          </div>
          <div class="form-group">
            <input type="text" required="" id="fname" name="fname" class="form-control  form-control--contact" placeholder="Friend's Name"/>
          </div>
          <div class="form-group">
            <input type="email" required="" id="femail" name="femail" class="form-control  form-control--contact" placeholder="Friend's Email"/>
          </div>
          <button type="submit" class="btn  btn-primary">Suggest</button>
          
        </form>
      </div>
    </div>
  </div>
</div>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-xs-10  col-md-3">
        <div class="header-logo">
          <a href="<?php echo $this->webroot;?>"><img alt="Logo" src="<?php echo $this->webroot;?>images/logo.png"  style="padding:10px 0;"></a>
        </div>
      </div>
      <div class="col-xs-2  visible-sm  visible-xs">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#collapsible-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
      <div class="col-xs-12  col-md-9">
        <nav class="navbar  navbar-default" role="navigation">
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse  navbar-collapse" id="collapsible-navbar">
    <ul class="nav  navbar-nav" style="  font-family: mainfont!important;font-size:18px;
">
      <li>
        <a href="<?php echo $this->webroot;?>" class="dropdown-toggle">HOME</a>
        
      </li>
      <!--<li class="dropdown">
        <a href="<?php echo $this->webroot;?>pages/shop" class="dropdown-toggle">SHOP<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo $this->webroot;?>pages/shop">Shop (Grid view)</a></li>
          <li><a href="shop-list-view.html">Shop (List view)</a></li>
          <li><a href="single-product.html">Single product</a></li>
          <li><a href="cart.html">Cart</a></li>
          <li><a href="checkout.html">Checkout</a></li>
          <li><a href="order-received.html">Order Received</a></li>
        </ul>
      </li>-->
	        <li >
        <?php $slug = $this->requestAction('restaurants/getslug');?>
        <a href="<?php echo $this->webroot;?>restaurants/profile/<?php echo $slug;?>">ORDER ONLINE</a>
      </li>
 
 	        <li >
        <a href="<?php echo $this->webroot;?>pages/menu">MENU</a>
      </li>
	  
      <li >
        <a href="<?php echo $this->webroot;?>pages/about">ABOUT US</a>
      </li>
    
      <li>
        <a href="<?php echo $this->webroot;?>pages/findus">FIND US</a>
        
      </li>
      <li>
        <a href="<?php echo $this->webroot;?>pages/contact">CONTACT US</a>
        
      </li>
      
      <?php /*?>
      <li class="dropdown">
        <a href="<?php echo $this->webroot;?>pages/features" class="dropdown-toggle">FEATURES <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="features.html">Responsive design</a></li>
          <li><a href="features.html">Retina ready</a></li>
          <li><a href="features.html">Lightning fast</a></li>
          <li><a href="features.html">Search engine optimized</a></li>
          <li><a href="features.html">Layered PSDs included</a></li>
          <li><a href="features.html">Unlimited colors and layouts</a></li>
          <li><a href="features.html">290+ Glyphicons and Zocial icons</a></li>
          <li><a href="features.html">Advance shop filters</a></li>
          
          
          <li><a href="features.html">Awesome support</a></li>
          <li class="dropdown">
            <a href="blog.html" class="dropdown-toggle">3rd level menu</a>
            <ul class="dropdown-menu">
              <li><a href="blog-right-sidebar.html">Blog (Right sidebar)</a></li>
              <li><a href="blog-left-sidebar.html">Blog (Left sidebar)</a></li>
              <li><a href="blog.html">Blog (Alternative)</a></li>
              <li><a href="single-post.html">Single Blogpost</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="<?php echo $this->webroot;?>pages/elements" class="dropdown-toggle">ELEMENTS<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo $this->webroot;?>pages/elements#headings">Headings</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#banners">Banners</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#alerts">Alerts</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#tabs">Tabs</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#buttons">Buttons</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#tables">Tables</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#maps">Maps</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#bars">Bars</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#columns">Columns</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#gallerys">Gallerys</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#code">Code</a></li>
          <li><a href="<?php echo $this->webroot;?>pages/elements#toggles">Toggles</a></li>
        </ul>
      </li><?php */?>
      <!--li class="hidden-xs  hidden-sm">
        <a href="#" class="js--toggle-search-mode"><span class="glyphicon  glyphicon-search  glyphicon-search--nav" style="color:#000"></span></a>
      </li-->
    </ul>
    <!-- search for mobile devices -->
    <form action="<?php echo $this->webroot;?>restaurants/search" method="get" class="visible-xs  visible-sm  mobile-navbar-form" role="form">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-addon">
          <button type="submit" class="mobile-navbar-form__appended-btn"><span class="glyphicon  glyphicon-search  glyphicon-search--nav"></span></button>
        </span>
      </div>
    </form>
    <div class="mobile-cart  visible-xs  visible-sm  push-down-15">
        <?php /*<span class="header-cart__text--price"><span class="header-cart__text">CART</span> $49.35</span>
      <a href="cart.html" class="header-cart__items">
        <span class="header-cart__items-num">3</span>
      </a>*/?>
    </div>
  </div><!-- /.navbar-collapse -->
</nav>
      </div>
      <div class="col-xs-12  col-md-2  hidden-sm  hidden-xs" style="display: none!important;">
        <!-- Cart in header -->
<div class="header-cart">
  <span class="header-cart__text--price"><span class="header-cart__text">CART</span> $49.35</span>
  <a href="#" class="header-cart__items">
    <span class="header-cart__items-num">3</span>
  </a>
  <!-- Open cart panel -->
  <div class="header-cart__open-cart">
  
    <div class="header-cart__product  clearfix  js--cart-remove-target">
      <div class="header-cart__product-image">
        <img alt="Product in the cart" src="<?php echo $this->webroot;?>images/dummy/product-cart.jpg" width="40" height="50">
      </div>
      <div class="header-cart__product-image--hover">
        <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
      </div>
      <div class="header-cart__product-title">
        <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
        <span class="header-cart__qty">Qty: 1</span>
      </div>
      <div class="header-cart__price">
        $16.45
      </div>
    </div>
  
    <div class="header-cart__product  clearfix  js--cart-remove-target">
      <div class="header-cart__product-image">
        <img alt="Product in the cart" src="<?php echo $this->webroot;?>images/dummy/product-cart.jpg" width="40" height="50">
      </div>
      <div class="header-cart__product-image--hover">
        <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
      </div>
      <div class="header-cart__product-title">
        <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
        <span class="header-cart__qty">Qty: 1</span>
      </div>
      <div class="header-cart__price">
        $16.45
      </div>
    </div>
  
    <div class="header-cart__product  clearfix  js--cart-remove-target">
      <div class="header-cart__product-image">
        <img alt="Product in the cart" src="<?php echo $this->webroot;?>images/dummy/product-cart.jpg" width="40" height="50">
      </div>
      <div class="header-cart__product-image--hover">
        <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
      </div>
      <div class="header-cart__product-title">
        <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
        <span class="header-cart__qty">Qty: 1</span>
      </div>
      <div class="header-cart__price">
        $16.45
      </div>
    </div>
  
    <hr class="header-cart__divider">
    <div class="header-cart__subtotal-box">
      <span class="header-cart__subtotal">CART SUBTOTAL:</span>
      <span class="header-cart__subtotal-price">$49.35</span>
    </div>
    <a class="btn btn-darker" href="cart.html">Procced to checkout</a>
  </div>
</div>
      </div>
    </div>
  </div>

  <!--Search open pannel-->
  <div class="search-panel">
    <div class="container">
      <div class="row">
        <div class="col-sm-11">
          <form class="search-panel__form" action="<?php echo $this->webroot;?>restaurants/search">
            <button type="submit"><span class="glyphicon  glyphicon-search"></span></button>
            <input type="text" name="s" class="form-control" placeholder="Enter Search Term"/>
          </form>
        </div>
        <div class="col-sm-1">
          <div class="search-panel__close  pull-right">
            <a href="#" class="js--toggle-search-mode"><span class="glyphicon  glyphicon-circle  glyphicon-remove" style="color:#000"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>






			<?php
            $test = false;
            $test = $this->Session->flash();
            
            if($test)
            {
                ?>
                <div class="alert  alert-success  uppercase  fade  in flash">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #FFF;opacity:1;">x</button>
                <?php
            } 
            echo '<center>'.$test.'</center>'; ?>
            <?php
            if($test)
            {
                ?>
            </div>
            <?php }
            ?>
            
            <?php
                
            if($displaybackground)
            {
            	
            	?>
<div style=" background-color: #fafafa;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#fafafa), to(#fff));
  background-image: -webkit-linear-gradient(top, #fafafa, #fff);
  background-image:    -moz-linear-gradient(top, #fafafa, #fff);
  background-image:      -o-linear-gradient(top, #fafafa, #fff);
  background-image:         linear-gradient(to bottom, #fafafa, #fff);">
  
  <?php
}
?>

			<?php echo $this->fetch('content'); ?>
			
			            <?php
                
if($displaybackground)
{
?>
</div>
<?php
}
?>


<footer class="js--page-footer">
    <div class="footer-widgets">
      <div class="container">
        <div class="row">

		  
          <div class="col-xs-12  col-sm-3">
            <nav class="footer-widgets__navigation">
              <div class="footer-wdgets__heading--line">
                <h4 class="footer-widgets__heading">Connect with Us</h4>
              </div>
<p>Check out our social media page and support us. Stay in the loop for all the latest deals and promotions.</p><br>
              <!--<p class="push-down-25">Coming soon. </p>-->

              <a class="social-container" href="https://www.facebook.com/charlieschopsticks"><span class="zocial-facebook"></span></a>
              <!--<a class="social-container" href="https://twitter.com/"><span class="zocial-twitter"></span></a>-->
			                <a class="social-container" href="http://instagram.com/charlieschopsticks"><span class="zocial-instagram"></span></a>

              <!--<a class="social-container" href="#"><span class="zocial-email"></span></a>-->
            </nav>
          </div>
		  
          <div class="col-xs-12  col-sm-3">
            <nav class="footer-widgets__navigation">
              <div class="footer-wdgets__heading--line">
                <h4 class="footer-widgets__heading">Navigation</h4>
              </div>
              <ul class="nav nav-footer">
                <li><a href="<?php echo $this->webroot;?>">Home</a></li>
                <li><a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks">View Menu</a></li>
                <li><a href="<?php echo $this->webroot;?>pages/about">About Us</a></li>
                <li><a href="<?php echo $this->webroot;?>pages/contact">Contact Us</a></li>
                <li><a href="<?php echo $this->webroot;?>pages/term">Terms of use</a></li>
                <li><a href="<?php echo $this->webroot;?>pages/privacy">Privacy policy</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-xs-12  col-sm-3">
            <div class="footer-widgets__navigation" style="line-height: 18px;">
              <div class="footer-wdgets__heading--line">
                <h4 class="footer-widgets__heading">Hours of Operation</h4>
              </div>

              <?php
              $hours = $this->requestAction('/pages/getHours');
              ?>
              <p>Sunday : <strong><?php get_formated_date($hours['Restaurant']['sunday_from']);?> to <?php get_formated_date($hours['Restaurant']['sunday_to']);?></strong></p>
			

            <p>Monday : <strong><?php get_formated_date($hours['Restaurant']['monday_from']);?> to <?php get_formated_date($hours['Restaurant']['monday_to']);?></strong></p>
			
            
            <p>Tuesday : <strong><?php get_formated_date($hours['Restaurant']['tuesday_from']);?> to <?php get_formated_date($hours['Restaurant']['tuesday_to']);?></strong></p>
			
            
            <p>Wednesday : <strong><?php get_formated_date($hours['Restaurant']['wednesday_from']);?> to <?php get_formated_date($hours['Restaurant']['wednesday_to']);?></strong></p>
			
            <p>Thursday : <strong><?php get_formated_date($hours['Restaurant']['thursday_from']);?> to <?php get_formated_date($hours['Restaurant']['thursday_to']);?></strong></p>
			
            <p>Friday : <strong><?php get_formated_date($hours['Restaurant']['friday_from']);?> to <?php get_formated_date($hours['Restaurant']['friday_to']);?></strong></p>
			
            <p>Saturday : <strong><?php get_formated_date($hours['Restaurant']['saturday_from']);?> to <?php get_formated_date($hours['Restaurant']['saturday_to']);?></strong></p>
			
            </div>
          </div>
          <div class="col-xs-12  col-sm-3">
            <div class="footer-widgets__navigation">
                <div class="footer-wdgets__heading--line">
                  <h4 class="footer-widgets__heading">Contact Us</h4>
                </div>
                <strong>Charlie's Chopsticks</strong><br>

				Unit 3, 970 Upper James Street<br>
Hamilton, ON<br>
L9C 3A5<br>
                <a class="footer__link--small" href="pages/findus">View Google map <span class="glyphicon glyphicon-chevron-right glyphicon--footer-small"></span></a><br><br>
                <a class="footer__link" href="#"><span class="glyphicon glyphicon-earphone glyphicon--footer"></span>  905-388-9888</a><br>
                <a class="footer__link" href="#"><span class="glyphicon glyphicon-envelope glyphicon--footer"></span> contact@charlieschopstics.com</a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12  col-sm-6">
            <div class="footer__text--link">
              <a class="footer__link" href="<?php echo $this->webroot;?>">Charlies Chopsticks</a> © Copyright 2014
            </div>
          </div>
          <div class="col-xs-12  col-sm-6">
            <div class="footer__text">
              Powered by </span> <a class="footer__link" href="http://www.trinoweb.com" target="_blank">Trino Web</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="search-mode__overlay"></div>
    
    
    <script data-main="scripts/main" src="<?php echo $this->webroot;?>bower_components/requirejs/require.js"></script>    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    

    <!--<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-33538073-8', 'proteusthemes.com');
      ga('send', 'pageview');

    </script>-->
  </body>
</html>
<?php
function get_formated_date($to_format)
{
    $arr_hours = explode(':',$to_format);
    if($arr_hours[0]>11)
    {
        if($arr_hours[0]==12)
        {
            echo $arr_hours[0].':'.$arr_hours[1].' PM';
        }
        else
        echo ($arr_hours[0]-12).':'.$arr_hours[1].' PM';
    }
    else
    {
        if($arr_hours[0]==00)
        {
            echo '12'.':'.$arr_hours[1].' AM';
        }
        else
        echo $arr_hours[0].':'.$arr_hours[1].' AM';
    }
}
?>
<?php echo $this->element('sql_dump'); ?>