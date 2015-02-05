<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="<?php echo $this->webroot;?>restaurants/search?s=">Restaurant</a></li>
            
            <li class="active">Search</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <!-- Big banner -->
  <div class="row">
    <div class="col-xs-12">
      <div class="push-down-30">
        <div class="banners--big">
          Search result for <strong>"<?php echo $_GET['s'];?>"</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <?php
  foreach($search as $s)
  {
    ?>
        <div class="">
          <div class="col-xs-6 col-sm-3">
            <div class="products__single">
              <div class="products__image  push-down-15">
                <a href="<?php echo $this->webroot.'restaurants/profile/'.$s['Restaurant']['slug'];?>">
                  <img alt="#" class="product__image" width="263" height="334" src="<?php echo $this->webroot;?>images/restaurants/<?php echo $s['Restaurant']['picture'];?>">
                </a>
                <div class="product-overlay">
                  <a class="product-overlay__more" href="<?php echo $this->webroot.'restaurants/profile/'.$s['Restaurant']['slug'];?>">
                    <span class="glyphicon glyphicon-search"></span>
                  </a>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-9">
            
            <div class="products__title">
              <a  href="<?php echo $this->webroot.'restaurants/profile/'.$s['Restaurant']['slug'];?>"><h5 class="sidebar__title"><?php echo $s['Restaurant']['name'];?></h5></a>
            </div>
            
            <p>
            <?php echo $s['Restaurant']['description'];?>
            </p>
            <div class="products__price fnone">
              <strong><?php echo $s['Restaurant']['cuisine'];?></strong>
            </div>
            <div class="martop15">
                <a href="<?php echo $this->webroot.'restaurants/profile/'.$s['Restaurant']['slug'];?>" class="btn btn-primary">View Profile</a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
    <?php
  }
  ?>
          
  </div>
</div>