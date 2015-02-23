<!-- include jQuery library -->


<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.johnslideshow').cycle({
		fx: 'blindX'
	});
});
</script>

<center><div class="johnslideshow">
		<a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/WeShopLocally.jpg" style="width:100%;"/></a>
		<a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/FreshEating.jpg" style="width:100%;"  /></a>
		<a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/BowlForBowl.jpg" style="width:100%;"/></a>
	</div></center-->

	<!--style>

.demo_wrapper {
	width: 100%;
	margin: 0 auto;
}
@media only screen and (max-device-width: 800px), screen and (max-width: 800px) {
  .demo_wrapper {
    width: 80%;
  }
}
.demo_block {
	width: 100%;
}

	</style-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="<?php echo $this->webroot;?>js/slippry.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->webroot;?>css/slippry.css">

		<section class="demo_wrapper">
			<article class="demo_block">
				<!--h1>Simple demo with default setups</h1>
				<a href="#glob" class='prev'>Prev</a> / <a href="#glob" class='next'>Next</a>
		|| <a href="#glob" class='init'>Init</a> | <a href="#glob" class='reset'>Destroy</a> | <a href="#glob" class='reload'>Reload</a>
		|| <a href="#glob" class='stop'>Stop</a> | <a href="#glob" class='start'>Start</a-->
			<ul id="demo1">
				<li><a><img src="<?php echo $this->webroot;?>images/ShopLocally.jpg"  alt="<a href='<?php echo $this->webroot;?>pages/about'>We Shop Locally</a>" ></a></li>


				<li><a><img src="<?php echo $this->webroot;?>images/FreshEating.jpg"  alt="<a href='<?php echo $this->webroot;?>pages/about'>Fresh Eating</a>"></a></li>


				<li><a><img src="<?php echo $this->webroot;?>images/BowlForBowl.jpg" alt="<a href='<?php echo $this->webroot;?>pages/about'>Bowl For Bowl</a>"></a>

				</li>
			</ul>
			</article>
		</section>

		<script>
			$(function() {
				var demo1 = $("#demo1").slippry({
					transition: 'fade',
					useCSS: true,
					speed: 1000,
					pause: 3000,
					auto: true,
					preload: 'visible'
				});

				$('.stop').click(function () {
					demo1.stopAuto();
				});

				$('.start').click(function () {
					demo1.startAuto();
				});

				$('.prev').click(function () {
					demo1.goToPrevSlide();
					return false;
				});
				$('.next').click(function () {
					demo1.goToNextSlide();
					return false;
				});
				$('.reset').click(function () {
					demo1.destroySlider();
					return false;
				});
				$('.reload').click(function () {
					demo1.reloadSlider();
					return false;
				});
				$('.init').click(function () {
					demo1 = $("#demo1").slippry();
					return false;
				});
			});
		</script>
<br>

<div class="  push-down-30 ">



  <div class="container ">

<!--div class="banners--big  banners--big-left">
<div class="row">
<div class="col-xs-12  col-md-7">
<div class="banners--big__text">What are you feeling like today?
</div>
</div>
<div class="col-xs-12  col-md-5">
<div class="blog__archive">
<a class="blog__banner__link" href="blog.html">SEE FULL MENU &nbsp; <span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>
</div>
</div-->




  <!--div class="row">
<div class="col-xs-12 centerall" >
<h1 class=""><strong>WHAT ARE YOU FEELING LIKE TODAY?</strong></h1>
<hr class="divider">

</div>
</div-->

	  <div class="row centerall">
<div class="col-xs-12">
 <div style="transform:skew(-20deg); background:#007FC5;padding:15px 45px;display: inline-block;">
      <h1 class="center" style="color:white;margin:0px;transform:skew(20deg); " >WHAT ARE YOU FEELING LIKE TODAY?</h1>
</div>
</div>
</div>
<hr class="divider">

    <div class="row ">
      <div class="col-xs-12 col-sm-4 centerall">
        <div class="banners-box">
          <a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/CharliesChopsticksRollsIcon.png"  width=300/></a>
          <br />
          <br />
          <a href=<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><div class="banners--medium">ROLLS</div></a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 centerall">
        <div class="banners-box">
          <a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/CharliesChopsticksRiceBowlIcon.png" width=300 /></a>
          <br />
          <br />
          <a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><div class="banners--medium">RICE</div></a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 centerall">
        <div class="banners-box">
          <a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><img src="<?php echo $this->webroot;?>images/CharliesChopsticksDrinksIcon.png" width=300/></a>
          <br />
          <br />
          <a href="<?php echo $this->webroot;?>restaurants/profile/Charlie-s-Chopsticks"><div class="banners--medium">DRINKS</div></a>
        </div>

      </div>

    </div>
  </div>
</div>
<div class="container">
  <!-- Navigation for products -->
<?php /*
<div class="products-navigation  push-down-15">
  <div class="row">
    <div class="col-xs-12  col-sm-8">
      <div class="products-navigation__title">
        <h3><span class="light">Fresh</span> From the Oven </h3>
      </div>
    </div>
    <div class="col-xs-12  col-sm-4">
      <div class="products-navigation__arrows">
        <a href="#js--latest-products-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left  glyphicon-circle  products-navigation__arrow"></span></a>&nbsp;
        <a href="#js--latest-products-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right  glyphicon-circle  products-navigation__arrow"></span></a>
      </div>
    </div>
  </div>
</div>
<?php
<!-- Products -->
<div id="js--latest-products-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="row">




            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/15.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="out-of-stock">&bull;</span> <span class="in-stock--text">Out of stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Ovseni Kosmici</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $2.73
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>





            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-7" data-price="6.9" data-rating="3">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/14.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Eatable Hemp</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $6.9
        </div>
      </div>
    </div>
    <div class="products__category">
      Other
    </div>
  </div>
</div>


           <div class="clearfix visible-xs"></div>


            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-7" data-price="14.95" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/24.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Polnozrnati Svedri</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $14.95
        </div>
      </div>
    </div>
    <div class="products__category">
      Other
    </div>
  </div>
</div>





            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.98" data-rating="3">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/22.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Muesli Traditional</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $2.98
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>


           <div class="clearfix visible-xs"></div>

      </div>
    </div>
    <div class="item">
      <div class="row">


            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="16.88" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/16.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">High Protein Diet Mango</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $16.88
        </div>
      </div>
    </div>
    <div class="products__category">
      Natural Proteins
    </div>
  </div>
</div>





            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-3" data-price="6.18" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/7.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Apricot Kernels</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $6.18
        </div>
      </div>
    </div>
    <div class="products__category">
      Bio
    </div>
  </div>
</div>


           <div class="clearfix visible-xs"></div>


            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="13.71" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/8.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="out-of-stock">&bull;</span> <span class="in-stock--text">Out of stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Acai Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $13.71
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>





            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-4" data-price="7.47" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/9.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Chia Seed</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $7.47
        </div>
      </div>
    </div>
    <div class="products__category">
      Seed
    </div>
  </div>
</div>


      </div>
    </div>
  </div>
</div>
*/?>







<?php
/*  <!-- Navigation -->
<div class="products-navigation  push-down-15">
  <div class="products-navigation__title">
    <h3><span class="light">Charlie's Chopsticks</span> Locations</h3>
  </div>
</div>

<!-- Products -->
<div class="row homerest">



    <?php
    $i=0;
    foreach($res as $r)
    {
        $i++;
        ?>
        <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2">
  <div class="products__single">
    <figure class="products__image">
      <a href="<?php echo $this->webroot?>restaurants/profile/<?php echo $r['Restaurant']['slug'];?>">

        <img alt="#" class="product__image" src="<?php echo $this->webroot;?>images/restaurants/<?php echo $r['Restaurant']['picture'];?>">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="<?php echo $this->webroot?>restaurants/profile/<?php echo $r['Restaurant']['slug'];?>">
          <span class="glyphicon glyphicon-search"></span>
        </a>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="<?php echo $this->webroot?>restaurants/profile/<?php echo $r['Restaurant']['slug'];?>"><?php echo $r['Restaurant']['name'];?></a>
        </h5>
      </div>
      <div class="col-xs-3">
        <!--div class="products__price">
          <?php echo $r['Restaurant']['cuisine'];?>
        </div-->
      </div>
    </div>
    <div class="products__category">
      <?php echo $r['Restaurant']['street']?>, <?php echo $r['Restaurant']['city']?>, <?php echo $r['Restaurant']['prov_state']?>
    </div>
  </div>
</div>
        <?php
        if($i%2==0)
        {
            ?>
            <div class="clearfix visible-xs"></div>
            <?php
        }
    }

    ?>

</div>


  <!-- Banners big -->
<?php
/*

<div class="banners--big  banners--big-left">
  <div class="row">
    <div class="col-xs-12  col-md-7">
      <div class="banners--big__text">
        Sign up on newsletter for more information about <strong>ProteusThemes</strong>
      </div>
    </div>
    <div class="col-xs-12  col-md-5">
      <div class="banners--big__form">
        <form action="http://proteusthemes.us4.list-manage.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" name="mc-embedded-subscribe-form" role="form" target="_blank">
          <div class="form-group  form-group--form">
            <input type="email" name="EMAIL" class="form-control  form-control--form" placeholder="Enter your E-mail address" required>
            <button class="btn  btn-primary" type="submit">Sign up now</button>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;"><input type="text" name="b_ea0786485977f5ec8c9283d5c_5dad3f35e9" value=""></div>
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="row">
  <div class="col-xs-12 col-sm-8">
    <div class="widgets__navigation">
      <div class="widgets__heading--line">
        <h4 class="widgets__heading">Featured Menu Item</h4>
      </div>

  <?php
  $i=0;
  foreach($menu as $m)
  {
    $i++;
    if(($i+2)%3==0)
    {
        ?>
        <div class="col-xs-12 col-sm-6">
        <?php
    }
    ?>
    <div class="push-down-20 menuall  clearfix">
    <a href="single-product.html">
      <img alt="" class="widgets__products" width="78" height="78" src="<?php echo $this->webroot.'/images/menus/'.$m['Menu']['image'];?>">
    </a>
    <h5 class="products__title">
      <a class="products__link" href="single-product.html">Orange Flavoured Raw Cacao Bar</a>
    </h5>
    <span class="products__price--widgets"><?php echo $m['Menu']['price'];?></span>
    <br><br>


    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

  </div>
    <?php
    if($i%3==0)
    {
        ?>
        </div>
        <?php
    }
  }
  if($i%3!=0)
  {
    echo "</div>";

  }
  ?>


    </div>
  </div>

  <div class="col-xs-12 col-sm-4">
    <div class="widgets__navigation">
      <div class="widgets__heading--line">
        <h4 class="widgets__heading">Weekly Recipe</h4>
      </div>
      <img alt="#" class="product__image" src="images/dummy-licensed/recipe.jpg" width="353" height="186">
      <div class="products__title">
      <div class="push-down-10"></div>
        Delicious organic big-ecologic sandwich
      </div>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est purus, fringilla sit amet arcu quis, feugiat ultrices metus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus.
    </div>
  </div>
</div>
*/
?>



</div>
<div class="testimonials  light-paper-pattern" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
      <div class="col-xs-12  col-sm-6">
        <a href="#js--testimonails-carousel" data-slide="prev"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-left"></span></a>
        <h4 class="testimonials__title"><span class="light">Reviews</span> from user</h4>
        <a href="#js--testimonails-carousel" data-slide="next"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span></a>
        <hr class="divider-dark">
        <div id="js--testimonails-carousel" class="carousel  slide" data-ride="carousel" data-interval="5000">
          <div class="carousel-inner">
            <div class="item  active">
              <q class="testimonials__text">A top quality food delivering super quick! Thank you so much Ordering System,<br>I shall definitely be using you guys again!</q><br><br>
              <cite><b>John Don Joe</b></cite>
            </div>
            <div class="item">
              <q class="testimonials__text">THANKS! I really appreciate the FAST service of Ordering System! Really Really Happy with the service Thanks again.</q><br><br>
              <cite><b>Timonvki</b></cite>
            </div>
            <div class="item">
              <q class="testimonials__text">Great service, perfect for any location. We love you. Very good work! Keep it up :) .</q><br><br>
              <cite><b>Ypclarke</b></cite>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes--rotate">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
    </div>
  </div>
</div>