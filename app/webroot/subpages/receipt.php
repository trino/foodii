<?php
if($this->params['action']=='view')
{
?>
<div class="noprint">
  <h3 class="sidebar__title">
    Order Detail
  </h3>
  <hr class="shop__divider">
</div>
<?php }

else
{
?>
<h5 class="centertitle">
  ORDER SUMMARY
</h5>
<div class="divider">
</div>
<?php
}?>


<div class="dashboard toprint">
  <div class="test">
    <center>
      <img alt="Logo" src="
<?php echo $this->webroot?>images/CharliesChopsticksLogo.png" style="padding:10px 0;width:100%;"/>
          </center>
          </div>
          <?php
if($this->params['action']=='view')
{
?>
       <?php if($order['Reservation']['contact']!=""){ ?>
                             <div class="infolist">

                   <table class="table table-hover">
                     <thead>
                       <tr>
                         <td>
                           <strong>
                             Delivery Info
                           </strong>
                         </td>
                         <td>
                           <strong>
                           </strong>
                         </td>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>
                           Name
                         </td>
                         <td>
                           <?=$order['Reservation']['ordered_by']?>
                         </td>
                       </tr>
                       
                       <tr>
                         <td>
                           Contact
                         </td>
                         <td>
                           <?=$order['Reservation']['contact']?>
                         </td>
                       </tr>
                       
                       <tr>
                         <td>
                           Email
                         </td>
                         <td>
                           <?=$order['Reservation']['email']?>
                         </td>
                       </tr>
                       
                       <tr>
                         <td>
                           Address
                         </td>
                         <td>
                           <?php echo $order['Reservation']['address1'] . ', ' .  $order['Reservation']['address2'] . ', ' . $order['Reservation']['city'] . ', ' . $order['Reservation']['province'] . ', ' . $order['Reservation']['postal_code'];?>
                         </td>
                       </tr>
                       
                     </tbody>
                   </table>
                   </div>
                   
                   
<?php
}
?>

          <div class="infolist noprint">
            <strong>
              RESTAURANT NAME: 
            </strong>
            <?php echo $this->requestAction('/restaurants/getName/'.$order['Reservation']['res_id']);?>
          </div>
          
          <div class="infolist noprint">
            <strong>
              ORDERED BY: 
            </strong>
            <?php echo $order['Reservation']['ordered_by'];?>
          </div>
          
          <div class="infolist noprint">
            <strong>
              EMAIL: 
            </strong>
            <?php echo $order['Reservation']['email'];?>
          </div>
          <div class="infolist noprint">
            <strong>
              CONTACT: 
            </strong>
            <?php echo $order['Reservation']['contact'];?>
          </div>
          <div class="infolist noprint">
            <strong>
              ORDERED ON: 
            </strong>
            <?php $date = new DateTime($order['Reservation']['order_time']);echo $date->format('l jS \of F Y h:i:s A');?>
          </div>
          <div class="infolist noprint">
            <strong>
              ORDER READY: 
            </strong>
            <?php if(!$order['Reservation']['order_now']){if($order['Reservation']['order_till']){$date = new DateTime($order['Reservation']['order_till']);echo $date->format('l jS \of F Y h:i:s A');}}else{?>
                    Order now
                    <?php }?>
          </div>
          
          <?php
if($order['Reservation']['order_type'] == 'delivery')
{
?>
          <div class="infolist noprint">
            <strong>
              DELIVERY INFO: 
            </strong>
            <?php if($order['Reservation']['address1']){echo $order['Reservation']['address1'].', ';}if($order['Reservation']['address2']){echo $order['Reservation']['address2'].', ';}if($order['Reservation']['city']){echo $order['Reservation']['city'].', ';}if($order['Reservation']['province']){echo $order['Reservation']['province'].', ';}if($order['Reservation']['postal_code']){echo $order['Reservation']['postal_code'];}?>
          </div>
          <?php
}
}

if($order['Reservation']['remarks'])
{
?>
          <div class="infolist noprint">
            <strong>
              ADDITIONAL NOTES: 
            </strong>
            <?php echo $order['Reservation']['remarks'];?>
          </div>
          <?php
}
?>
          
          <div class="">
            <?php if($order['Reservation']['is_free']){?>
            <h2 style="color: #FF9900;text-align:center">
              FREE CUSTOMER
            </h2>
            <?php }?>
            
            <?php
if($this->params['action']=='view')
{
?>
                
                <?php }?>
                <?php
if($this->
params['action']!='order')
{
/*
?>
                <div class="infolist">
                  <strong>
                    RESTAURANT NAME: 
                  </strong>
                  <?php echo $this->
requestAction('/restaurants/getName/'.$order['Reservation']['res_id']);?>
                </div>
                <div class="infolist">
                  <strong>
                    RESTAURANT EMAIL: 
                  </strong>
                  <?php echo $this->
requestAction('/restaurants/getEmail/'.$order['Reservation']['res_id']);?>
                </div>
                <div class="infolist">
                  <strong>
                    RESTAURANT PHONE: 
                  </strong>
                  <?php echo $this->
requestAction('/restaurants/getContact/'.$order['Reservation']['res_id']);?>
                </div>
                <?php */}?>
                <div class="infolist">
                  
                  <div class="col-xs-12">
                    <br />
                    <strong>
                      Ordered On: 
                    </strong>
                    <?php
$date = new DateTime($order['Reservation']['order_time']);

echo $date->format('l jS \of F Y h:i:s A');?>
                   </div>
                   <div class="col-xs-12">
                     <strong>
                       Order Type: 
                     </strong>
                     
                     <?php echo ucfirst($order['Reservation']['order_type']);?>
                     <br />
                     <br />
                   </div>
                   <div class="clearfix">
                   </div>
                   <div class="shop__divider">
                   </div>
                   <table class="table table-hover">
                     <thead>
                       <tr>
                         <td style="width: 50%;">
                           <strong>
                             Item
                           </strong>
                         </td>
                         <td>
                           <strong>
                             Price
                           </strong>
                         </td>
                         <td>
                           <strong>
                             Total
                           </strong>
                         </td>
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
if(is_numeric($me))
{                        
$m = $menu->findById($me);
$tt = $m['Menu']['menu_item'];
}
else
{
$m = $combo->findById(str_replace("C_"," ",$me));
$tt = $m['Combo']['title'];
}
?>
                        <tr>
                          
                          
                          <td>
                            <?php echo "<strong>".$tt.": </strong>".$extz;?>
                          </td>
                          <td>
                            <?php echo $arr_qty[$k];?>
                            X $
                            <?php echo number_format($arr_prs[$k],2);?>
                          </td>
                          <td>
                            $
                            <?php echo number_format(($arr_qty[$k]*$arr_prs[$k]),2);?>
                          </td>
                        </tr>
                        <?php
}?>
                        
                        <tr>
                          <td colspan="3">
                            <hr />
                          </td>
                        </tr>
                        
                        <tr>
                          
                          <td>
                          </td>
                          
                          <td>
                            <strong>
                              Total
                            </strong>
                          </td>
                          <td>
                            <strong>
                              $
                              <?php echo number_format($order['Reservation']['subtotal'],2);?>
                            </strong>
                          </td>
                          
                        </tr>
                        <tr>
                          <td>
                          </td>
                          
                          <td>
                            <strong>
                              Tax (13%)
                            </strong>
                          </td>
                          <td>
                            <strong>
                              $
                              <?php echo number_format($order['Reservation']['tax'],2);?>
                            </strong>
                          </td>
                          
                        </tr>
                        <?php if($order['Reservation']['delivery_fee']>0){ ?>
                        
                        <tr>
                          <td>
                          </td>
                          
                          <td>
                            <strong>
                              Delivery
                            </strong>
                          </td>
                          <td>
                            <strong>
                              $
                              <?php echo number_format($order['Reservation']['delivery_fee'],2);?>
                            </strong>
                          </td>
                          
                        </tr>
                        <?php }?>
                        
                        <tr>
                          <td>
                          </td>
                          
                          <td>
                            <strong>
                              Grand Total
                            </strong>
                          </td>
                          <td>
                            <strong>
                              $
                              <?php  echo number_format($order['Reservation']['g_total'],2);?>
                            </strong>
                          </td>
                          
                        </tr>
                        <tr>
                          <td>
                          </td>
                          
                          <td>
                            <strong>
                              Payment type
                            </strong>
                          </td>
                          <td>
                            
                              
                              <?php  $cash = array('Debit/Credit','Cash');echo $cash[$order['Reservation']['cash_type']];?>
                            
                          </td>
                          
                        </tr>
                        
                        <?php if($order['Reservation']['country']){ ?>
                        
                        <tr>
                          <td colspan="3">
                            <strong>
                              Donate to : 
                              <?php echo $order['Reservation']['country'];?>
                            </strong>
                          </td>
                          
                          
                        </tr>
                        <?php }?>
                        
                        
                      </tbody>
                   </table>
    
                   <div class="shop__divider">
                   </div>
                   <center>
                     <h3>
                       Thank you for your order
                     </h3>
                     <p>
                       GST/HST: 83409 3189 RT0001
                     </p>
                   </center>
                   
                </div>
          </div>
          
</div>


<div class="clearfix  hidden-xs"></div>