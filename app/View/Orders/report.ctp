<!--<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
             <li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>
            
            <li><a href="">Print Report</a></li>
            
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
        <div class="toprint">
        <?php include('subpages/receipt_all.php');?>
        </div>
        </div>
       
                <a href="javascript:void(0);" class="btn btn-primary noprint" onclick="window.print();">Print Receipt</a>
              
        <hr class="shop__divider">
        
      </div>
    </div>
  </div>
</div>