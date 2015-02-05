<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>
            
            <li><a href="">Order History</a></li>
            
            
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
          Welcome, <?php echo $this->Session->read('name');?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <?php include('subpages/admin_menu.php')?>
    <div class="col-xs-12  col-sm-9">
      <div class="grid">
        <!--<ul class="pagination  shop__amount-filter">
          <li>
            <a class="shop__amount-filter__link  hidden-xs" href="shop.html"><span class="glyphicon glyphicon-th"></span></a>
          </li>
          <li>
              <a class="shop__amount-filter__link  hidden-xs" href="shop-list-view.html"><span class="glyphicon glyphicon-th-list"></span></a>
          </li>
        </ul>-->
        <?php /*
        <div class="shop__sort-filter">
          <select class="js--isotope-sorting  btn  btn-shop">
              <option value='{"sortBy":"price", "sortAscending":"true"}'>By Price (Low to High) &uarr;</option>
              <option value='{"sortBy":"price", "sortAscending":"false"}'>By Price (High to Low) &darr;</option>
              <option value='{"sortBy":"name", "sortAscending":"true"}'>By Name (Low to High) &uarr;</option>
              <option value='{"sortBy":"name", "sortAscending":"false"}'>By Name (High to Low) &darr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"true"}'>By Rating (Low to High) &uarr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"false"}'>By Rating (High to Low) &darr;</option>
          </select>
        </div>
        <?php */?>
        <h3 class="sidebar__title">Order History</h3>
        <hr class="shop__divider">
        <div class="dashboard">
          
           <table class="table table-theme table-striped">
           <thead>
                <tr><th>Ordered By</th><th>Date/Time</th><th>Action</th></tr>
           </thead>
           <tbody>
                <tr><td>Rob</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Van</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Biki</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Rob</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Van</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Biki</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Rob</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Van</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Biki</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Rob</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Van</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
                <tr><td>Biki</td><td>21-8-2014 8:36PM</td><td><a href="<?php echo $this->webroot;?>orders/view" class="btn btn-success">View</a></td></tr>
           </tbody>
           </table>
            
            
              
        </div>
            
          
          <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
        <?php /*<div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div><?php */?>
      </div>
    </div>
  </div>
</div>