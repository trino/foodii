
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="<?php echo $this->webroot;?>restaurants/profile/<?php echo $res['Restaurant']['slug'];?>">Restaurant</a></li>
            
            <li class="active">Order</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div id="overlay" class="ui-widget-overlay col-xs-12" style="z-index: 1001; display: none;"></div>
<div id='PleaseWait' class="col-xs-12" style='display: none; z-index:1006; position: fixed; top: 50%; left: 50%;'><img src='<?php echo $this->webroot;?>images/ajaxloader.gif'/></div>

<div class="container">
  <!-- Big banner -->
  <div class="row">
    <div class="col-xs-12">
      <div class="push-down-30">
        <div class="banners--big">
          Order Confirmation
        </div>
      </div>
    </div>
	
	    
	
	
  </div>
  <div class="row" style="margin-bottom: 15px;">

          <div class="col-xs-12 col-sm-6">
          <div class="toprint">
          <?php include('subpages/receipt.php');?>
          </div>

          <div class="mybtns"><a href="<?php echo $this->webroot;?>restaurants/profile/<?php echo $res['Restaurant']['slug'];?>/<?php echo $order['Reservation']['id'];?>" class="btn btn-warning mybtns">Edit Order</a> <?php if($this->Session->read('restaurant') && $order['Reservation']['order_type']!='delivery'){?><a href="javascript:void(0);" class="btn btn-primary mybtns" onclick="window.print();$.ajax({url:'<?php echo $this->webroot;?>restaurants/instore/<?php echo $order['Reservation']['id'];?>',success:function(){window.location = '<?php echo $this->webroot;?>restaurants/success_order/<?php echo $order['Reservation']['id'];?>?success';}});">Print Receipt</a><?php }else{?><a href="javascript:void(0);" class="btn btn-primary mybtns" onclick="window.print();">Print Receipt</a><?php }?></div>
          </div>
          <div class="col-xs-12 col-sm-6">
          <h5 class="centertitle"><?php if($order['Reservation']['order_type']=='delivery'){?>DELIVERY<?php  }else{?>PICKUP<?php }?> DETAILS</h5>
          <div class="divider"></div>
                    <form action="<?php echo $this->webroot;?>restaurants/confirm_order/<?php echo $order['Reservation']['id'];?>" id="orderform" class="push-down-15" method="post" onsubmit='$("#overlay, #PleaseWait").show();'>
                      <div class="form-group">
                        <div class="col-xs-12">
                        <input type="text" required="" id="fullname" name="ordered_by" class="form-control  form-control--contact" placeholder="Name">
                        </div>                        
                      </div>
                      <div class="form-group">
                      <div class="col-xs-12 col-sm-6">
                        <input type="email" required="" id="ordered_email" name="email" class="form-control  form-control--contact" placeholder="Email">                        
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <input type="text" required="" id="ordered_contact" name="contact" class="form-control  form-control--contact" placeholder="Phone Number">
                        </div>
                        <div class="clearfix"></div>                        
                      </div>
                      <div class="form-group">
                          <div class="col-xs-12 col-sm-6">
                            <input type="text" required="" id="ordered_on_date" name="ordered_on_date" class="form-control  form-control--contact" placeholder="Date">
                            <input type="text" required="" id="ordered_on_time" name="ordered_on_time" class="form-control  form-control--contact" placeholder="Time">
                          </div>  
                          <div class="col-xs-12 col-sm-1" style="padding-top: 30px;">
                            OR
                          </div>
                          <div class="col-xs-12 col-sm-5" style="padding-top: 30px;">
                            <input type="checkbox" value="1" name="order_now" class="order_now"  /> ORDER NOW
                          </div>
                          <div class="clearfix"></div>    
                          
                      </div>
                      <div class="form-group">
                                                
                      </div>
                      <?php if($order['Reservation']['order_type']=='delivery'){?>
                      <div class="form-group">
                         <div class="col-xs-12">
                         <!--textarea required="" placeholder="Address 1" name="address1"></textarea-->			
						  <input type="text" required="" name="address1" class="form-control  form-control--contact" placeholder="Address 1">
                        </div>                        

                      </div>
                      <div class="form-group">
                        <!--textarea placeholder="Address 2" name="address2"></textarea-->   
                        <div class="col-xs-12">
						<input type="text" name="address2" class="form-control  form-control--contact" placeholder="Address 2">
                        </div>                        
						
                      </div>
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-4">                        
                            <input type="text" required="" id="city" name="city" class="form-control  form-control--contact" placeholder="City"/>                        
                        </div>
                        <div class="col-xs-12 col-sm-4">
                        <select name="province" class="form-control form-control--contact" required="">
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Ontario" selected="selected">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                            <option value="Quebec">Quebec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                        </select>
                                                
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <input type="text" required="" id="postal_code" name="postal_code" class="form-control  form-control--contact" placeholder="Postal Code"/>
                        </div>                        
                        <div class="clearfix"></div>
                      </div>
                      <?php }?>
                      <div class="form-group">
                        <div class="col-xs-12">
                        <textarea name="remarks" placeholder="Additional Notes" ></textarea>
                        </div> 
                        <div class="clearfix"></div>                       
                      </div>
                      <?php if(!isset($_GET['free'])){?>
                      <div class="form-group">
                      <div class="col-xs-12">
                      <h3 class="sidebar__title">Donate</h3><p>We will make a donation on your behalf to the Country selected below.</p>
                      </div>
                        <div class="col-xs-6" style="display:none;">                            
                            <input type="number" name="donation" placeholder="Amount($)" class="form-control  form-control--contact" />
                        </div> 
                        <div class="col-xs-12">                            
                            <select name="country" class="form-control  form-control--contact">
                                <option value="">Select country</option>
                                
                                <?php
                                unset($country);
                                $country = array('India','Vietnam','Philippines','Malaysia','Indonesia');
                                foreach($country as $c)
                                {
                                    ?>
                                        <option value="<?php echo $c;?>"><?php echo $c;?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> 
                        <div class="clearfix"></div>                       
                      </div>
                      <?php }?>
                      
                       <div class="form-group">
                      
                        <div class="col-xs-12">                            
                            <input type="radio" checked="checked" name="cash_type" value="1" class="" />&nbsp; Cash&nbsp; &nbsp; &nbsp; 
                                                  

                            <input type="radio" name="cash_type" value="0" class="" />&nbsp;  Debit/Credit
                            <strong style="color: #E02323;display:block;margin-top:5px;">We do not accept american express</strong>

                        </div> 
                        <div class="clearfix"></div>                       
                      </div>
                      <div class="col-xs-12">
                      <input type="submit" value="Submit Order" class="btn btn-success noprint"  />
                      </div>
                    </form>
            
          </div>
          <div class="clearfix"></div>
        
          
  </div>
</div>
