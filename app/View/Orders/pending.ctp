<!--<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            <?php
            if($this->params['action'] == 'pending')
            { 
                ?>
                <li><a href="<?php echo $this->webroot;?>restaurants/dashboard">Dashboard</a></li>
            
                <li><a href="">Pending Orders</a></li>
                <?php
            }
            else
            {
                ?>
                <li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>
            
                <li><a href="">Order History</a></li>
                <?php 
            }
            ?>
            
            
            
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
        <h3 class="sidebar__title"><?php if($this->params['action'] == 'pending'){?>Pending Orders<?php }else{?>Order History<?php }?></h3>
        <hr class="shop__divider">
        <div class="dashboard">
          
           <table class="table table-theme table-striped">
           <thead>
                <tr><th>Ordered By</th><th style="width: 250px;">Date/Time</th><th style="width: 200px;">Action</th><th style="width: 100px;">Status</th></tr>
           </thead>
           <tbody>
           <?php
           foreach($order as $o)
           {
                ?>
                <tr><td><?php echo $o['Reservation']['ordered_by']?></td><td><?php echo $o['Reservation']['order_time'];?></td>
                <td><a href="<?php echo $this->webroot;?>orders/view/<?php echo $o['Reservation']['id']?>" class="btn btn-success">View</a>
                <a href="<?php echo $this->webroot;?>orders/delete/<?php echo $o['Reservation']['id']?><?php if($this->params['action']=='history')echo "?history";?>" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php if($o['Reservation']['cancelled']==1){?>Cancelled<?php }?><?php if($o['Reservation']['approved']==1){?>Approved<?php }?>
				
				
				</td></tr>
                <?php
           }
           ?>
           </tbody>
           </table>
           <?php if($count>$limit){?>
           <div class="pagination2" style="margin:5px auto;width:300px">
            <ul>
            <?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
            <?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
            <?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
            </ul>
            </div> 
            <?php }?>
              
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