        <div style="color:#666;">
        Hello,<br/><br/>
                Thank you for using Charlie's Chopsticks. Your order has been submitted for approval, we will contact you soon.
        </div>
        <div style="background: #f5f5f5;border-radius: 10px;padding:5px;margin-top: 10px;">
        <center><img alt="Logo" src="<?php echo $base_url;if($base_url[strlen($base_url)-1]!='/'){?>/<?php }?>images/CharliesChopsticksLogo.png" style="padding:10px 0;"></center>
        <?php if($order['Reservation']['is_free']){?><h2 style="color: #FF9900;text-align:center">FREE CUSTOMER</h2><?php }?>
        
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>RESTAURANT NAME: </strong><?php echo $this->requestAction('/restaurants/getName/'.$order['Reservation']['res_id']);?></div>  
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ORDERED BY: </strong><?php echo $order['Reservation']['ordered_by'];?></div>                  
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>EMAIL: </strong><?php echo $order['Reservation']['email'];?></div>
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>PHONE: </strong><?php echo $order['Reservation']['contact'];?></div>
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ORDERED ON: </strong><?php $date = new DateTime($order['Reservation']['order_time']);echo $date->format('l jS \of F Y h:i:s A');?></div>
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ORDERED TYPE: </strong><?php echo $order['Reservation']['order_type'];?></div>
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ORDER READY: </strong><?php if(!$order['Reservation']['order_now']){if($order['Reservation']['order_till']){$date = new DateTime($order['Reservation']['order_till']);echo $date->format('l jS \of F Y h:i:s A');}}else{?>Order now<?php }?></div>
        <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ORDERED CITY: </strong><?php echo $order['Reservation']['city_receipt'];?></div>
         <?php
                if($order['Reservation']['order_type'] == 'delivery')
                {
                    ?>
                    <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>DELIVERY INFO: </strong><?php if($order['Reservation']['address1']){echo $order['Reservation']['address1'].', ';}if($order['Reservation']['address2']){echo $order['Reservation']['address2'].', ';}if($order['Reservation']['city']){echo $order['Reservation']['city'].', ';}if($order['Reservation']['province']){echo $order['Reservation']['province'].', ';}if($order['Reservation']['postal_code']){echo $order['Reservation']['postal_code'];}?></div>
                    <?php
                }
                
         if($order['Reservation']['remarks'])
                {
                    ?>
                    <div style="margin:5px;background:#FFF;color:#666;border-radius:5px;padding:5px;"><strong>ADDITIONAL NOTES: </strong><?php echo $order['Reservation']['remarks'];?></div>
                    <?php
                }
                ?>        
        <table style="width: 100%;color:#666">
        <tr><td style="padding: 3px;"><strong>Item</strong></td><td style="padding: 3px;"><strong>Quantity</strong></td><td style="padding: 3px;"><strong>Price</strong></td><td style="padding: 3px;"><strong>Total</strong></td></tr>
         <?php
                     $menu_ids = $order['Reservation']['menu_ids'];
                     $arr_menu = explode(',',$menu_ids);
                     $arr_qty = explode(',',$order['Reservation']['qtys']);
                     $arr_prs = explode(',',$order['Reservation']['prs']); 
                     $arr_ext = explode(',',$order['Reservation']['extras']);
                     foreach($arr_menu as $k=>$me)
                     {
                          if($order['Reservation']['extras']!="")
                          {
                                $extz = str_replace(array("% ",':'),array(" ",': '),$arr_ext[$k]);
                                $extz = str_replace("%",",",$extz);
                          } 
                          else
                                $extz = "";   
                        $m = $menu->findById($me);
                        ?>
                    <tr>  
                    <td style="padding: 3px;"><?php echo $m['Menu']['menu_item'];if($arr_ext[$k]){?> <span style="font-size: 12px;">(with: <?php echo $extz;?>)</span><?php }?></td>
                    <td style="padding: 3px;"><?php echo $arr_qty[$k];?></td>
                    <td style="padding: 3px;">$<?php echo number_format($arr_prs[$k],2);?></td>
                    <td style="padding: 3px;">$<?php echo number_format(($arr_qty[$k]*$arr_prs[$k]),2);?></td>
                    </tr>
                     <?php
                     }?> 
                     <tr><td colspan="4"><hr style="height: 0;border-top:1px solid #CCC" /></td></tr> 
                     <tr>
                     <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"><strong>Total</strong></td>
                    <td style="padding: 3px;"><strong>$<?php echo number_format($order['Reservation']['subtotal'],2);?></strong></td>
                    </tr>
                    <tr>
                    <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"><strong>Tax (13%)</strong></td>
                    <td style="padding: 3px;"><strong>$<?php echo number_format($order['Reservation']['tax'],2);?></strong></td>
                    
                    </tr> 
                    
                    <?php
                    if($order['Reservation']['delivery_fee']>0){
                    ?> 
                    <tr>
                     <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"></td>
                    <td style="padding: 3px;"><strong>Delivery</strong></td>
                    <td style="padding: 3px;"><strong>$<?php echo number_format($order['Reservation']['delivery_fee'],2);?></strong></td>
                    </tr>
                    <?php }?>
                    
                    <tr>
                            <td style="padding: 3px;"></td>                    
                            <td style="padding: 3px;"><strong>Grand Total</strong></td>
                            <td style="padding: 3px;"><strong>$<?php  echo number_format($order['Reservation']['g_total'],2);?></strong></td>                        
                         </tr>        
                    <tr>
                  <td style="padding: 3px;">
                  </td>
                  
                  <td style="padding: 3px;">
                    <strong>
                      Payment type
                    </strong>
                  </td>
                  <td style="padding: 3px;">
                    
                      
                      <?php  $cash = array('Debit/Credit','Cash');echo $cash[$order['Reservation']['cash_type']];?>
                    
                  </td>
                  
                </tr>                                             
                         <?php
                        if($order['Reservation']['country']){
                        ?>                                                  
                         <tr>
                            <td colspan="3" style="padding: 3px;"><strong>Donate to : <?php echo $order['Reservation']['country'];?></strong></td>                    
                                                    
                         </tr>
                         <?php }?>
        </table>    
        </div>            
        <div style="margin-top: 10px;color:#666;">
        Thank you,<br />
        The Charlie's Chopsticks Team
        </div>
              
        
                               

                 
                    
                   
                    
                    
                    
                    
                    
                   
                    
                    
                    