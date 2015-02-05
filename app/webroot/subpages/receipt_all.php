        
        
                <div class="noprint">
                <h3 class="sidebar__title">Order Report</h3>
        <hr class="shop__divider">
                    <div>
                        <strong>FILTER BY DATE</strong>
                        <form class="col-xs-12" style="height: auto!important;padding:0!important" method="get" action="<?php echo $this->webroot;?>orders/report">
                        <input type="text" class="datepicker date1 form-control--contact" name="from" placeholder="FROM (Date)" value="<?php if(isset($_GET['from']))echo $_GET['from'];?>" /> <input type="text" class="datepicker date2 form-control--contact" name="to" placeholder="TO (Date)" value="<?php if(isset($_GET['to']))echo $_GET['to'];?>" />
                                    <input type="submit" style="padding:10px;margin-top:-1px;"class="btn btn-primary" value="Go" onclick="return checkFilter();" />
                        <div class="clearfix"></div>
                        
                        </form>
                        <div class="clearfix"></div> 
                    </div>
                    <hr class="shop__divider">
                </div>
           
            
			
			
			
        
              

        <div class="dashboard toprint">
        <div class="test"><center><img alt="Logo" src="<?php echo $this->webroot?>images/CharliesChopsticksLogo.png" style="padding:10px 0;width:100%;"/></center></div>
              <?php
              if($orders){
                $gtot = 0;
              foreach($orders as $order)
              {
              if($this->params['action']=='report')
              {
                ?>
                  <div class="infolist noprint"><strong>RESTAURANT NAME: </strong><?php echo $this->requestAction('/restaurants/getName/'.$order['Reservation']['res_id']);?></div>  
                  <div class="infolist noprint"><strong>ORDERED BY: </strong><?php echo $order['Reservation']['ordered_by'];?></div>                  
                  <div class="infolist noprint"><strong>EMAIL: </strong><?php echo $order['Reservation']['email'];?></div>
                  <div class="infolist noprint"><strong>CONTACT: </strong><?php echo $order['Reservation']['contact'];?></div>
                  <div class="infolist noprint"><strong>ORDERED ON: </strong><?php $date = new DateTime($order['Reservation']['order_time']);echo $date->format('l jS \of F Y h:i:s A');?></div>
                  <div class="infolist noprint"><strong>ORDER READY: </strong><?php if(!$order['Reservation']['order_now']){if($order['Reservation']['order_till']){$date = new DateTime($order['Reservation']['order_till']);echo $date->format('l jS \of F Y h:i:s A');}}else{?>Order now<?php }?></div>
                  
                <?php
                if($order['Reservation']['order_type'] == 'delivery')
                {
                    ?>
                    <div class="infolist noprint"><strong>DELIVERY INFO: </strong><?php if($order['Reservation']['address1']){echo $order['Reservation']['address1'].', ';}if($order['Reservation']['address2']){echo $order['Reservation']['address2'].', ';}if($order['Reservation']['city']){echo $order['Reservation']['city'].', ';}if($order['Reservation']['province']){echo $order['Reservation']['province'].', ';}if($order['Reservation']['postal_code']){echo $order['Reservation']['postal_code'];}?></div>
                    <?php
                }
              }
              
              if($order['Reservation']['remarks'])
                {
                    ?>
                    <div class="infolist noprint"><strong>ADDITIONAL NOTES: </strong><?php echo $order['Reservation']['remarks'];?></div>
                    <?php
                }
                ?>                              
              <div class="infolistwhite">
              <?php if($order['Reservation']['is_free']){?><h2 style="color: #FF9900;text-align:center">FREE CUSTOMER</h2><?php }?>
              
              <?php
              if($this->params['action']=='report')
              {
                ?>
                                
                <?php }?>
                
                 <div class="">
                    
                    <div class="col-xs-12"><br /><strong>Ordered On: </strong>
                    <?php
                    $date = new DateTime($order['Reservation']['order_time']);
                     
                    echo $date->format('l jS \of F Y h:i:s A');?></div>
                    <div class="col-xs-12">
                    <strong>Order Type: </strong> <?php echo ucfirst($order['Reservation']['order_type']);?>
                    <br /><br />
                    </div>
                    <div class="clearfix"></div>
                    <div class="shop__divider"></div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td><strong>Item</strong></td>
                          <td><strong>Price</strong></td>
                          <td><strong>Total</strong></td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                         $menu_ids = $order['Reservation']['menu_ids'];
                         $arr_menu = explode(',',$menu_ids);
                         $arr_qty = explode(',',$order['Reservation']['qtys']);
                         $arr_prs = explode(',',$order['Reservation']['prs']); 
                         $arr_extras = explode(',',$order['Reservation']['extras']);
    
                         foreach($arr_menu as $k=>$me)
                         {
                            if($order['Reservation']['extras']!="")
                            {
                                $extz = str_replace(array("% ",':'),array(" ",': '),$arr_extras[$k]);
                                $extz = str_replace("%",",",$extz);
                            }
                            else
                                $extz = "";                        
                            $m = $menu->findById($me);
                            ?>
                        <tr>   
    
                        <td><?php echo "<strong>".$m['Menu']['menu_item'].": </strong> ".$extz;?></td>
                        <td><?php echo $arr_qty[$k];?> X $<?php echo number_format($arr_prs[$k],2);?></td>
                        <td>$<?php echo number_format(($arr_qty[$k]*$arr_prs[$k]),2);?></td>
                        </tr>
                         <?php
                         }?> 
                         <tr><td colspan="3"><hr /></td></tr> 
                         <tr>                         
                            <td></td>                    
                            <td><strong>Total</strong></td>
                            <td><strong>$<?php echo number_format($order['Reservation']['subtotal'],2);?></strong></td>                        
                         </tr>
                         <tr>
                            <td></td>                    
                            <td><strong>Tax (13%)</strong></td>
                            <td><strong>$<?php echo number_format($order['Reservation']['tax'],2);?></strong></td>                        
                         </tr>
                         <?php
                        if($order['Reservation']['delivery_fee']>0){
                        ?>                                                  
                         <tr>
                            <td></td>                    
                            <td><strong>Delivery</strong></td>
                            <td><strong>$<?php echo number_format($order['Reservation']['delivery_fee'],2);?></strong></td>                        
                         </tr>
                         <?php }?>
                         
                         <tr>
                            <td></td>                    
                            <td><strong>Grand Total</strong></td>
                            <td><strong>$<?php  echo number_format($order['Reservation']['g_total'],2);?></strong></td>
                            <?php $gtot = $gtot+$order['Reservation']['g_total'];?>                        
                         </tr>  
                         <?php
                        if($order['Reservation']['country']){
                        ?>                                                  
                         <tr>
                            <td colspan="3"><strong>Donate to : <?php echo $order['Reservation']['country'];?></strong></td>                    
                                                    
                         </tr>
                         <?php }?>                                                 
                        
                        
                        
                        
                      </tbody>
                    </table>                    
                    
                </div>
              </div>
              <p>&nbsp;</p>
              
              <?php }}?>
              <span style="float: right;"><strong>GRAND TOTAL FOR REPORT: </strong>$<?php echo number_format($gtot,2);?></span>
          <div class="clearfix"></div>
        </div>
            
          
          <div class="clearfix  hidden-xs"></div>
          <script>
            function checkFilter()
            {
                var date1 = $('.date1').val();
                var date2 = $('.date2').val();
                if(date1=='' || date2=='')
                {
                    alert('Date can\'t be blank');
                    return false;
                }
                else{
                date1 = date1.replace('-','').replace('-','');
                date2 = date2.replace('-','').replace('-','');
                
                date1 = parseFloat(date1);
                date2 = parseFloat(date2);
                
                if(date1>date2)
                {
                    alert('Starting date cannot be greater than end date');
                    return false;
                }
                else
                return true;                 
                
                }
            }
          </script>
          <style>
          .date1,.date2{padding-left:5px;}
          </style>