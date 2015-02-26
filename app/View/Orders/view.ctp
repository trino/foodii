
<!--<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
             <li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>
            
            <li><a href="">Order detail</a></li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>-->

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
        <div class="">
        <?php include('subpages/receipt.php');?>
        </div>
        
        </div>
        <div class="noprint">
        <?php
              if($this->params['action']=='view')
              {
                if($order['Reservation']['approved']==1)
                {
                ?>
                  <a href="javascript:void(0)" class="btn btn-primary disabled noprint">APPROVED</a>
                <?php    
                }
                else
                {
                    ?>
                    <a href="<?php echo $this->webroot;?>orders/approve/<?php echo $order['Reservation']['id'];?>" class="btn btn-success noprint">APPROVE</a>
                    <?php
                }
                if($order['Reservation']['cancelled']==1)
                {
                ?>
                  <a href="javascript:void(0)" class="btn btn-danger disabled noprint">CANCELLED</a>
                <?php    
                }
                else
                {
                    ?>
                    <a href="<?php echo $this->webroot;?>orders/cancel/<?php echo $order['Reservation']['id'];?>" class="btn btn-danger noprint">Cancel</a>
                    <?php
                }?>
                <a href="javascript:void(0);" class="btn btn-primary noprint" onclick="window.print();">Print Receipt</a>
              <?php
              }
              ?>
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
