<div class="row">


                <div class="col-md-2">


                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <!--i class="fa fa-cogs"--></i>Categories
                            </div>
                        </div>
                        <div class="portlet-body">


                            <ul class="ver-inline-menu">

                                <?php
                                                                
                                    if($res['Combo'])
                                    {
                                        ?>
                    
                                        <li><a href="#combo" class="scrolly"><i class="fa fa-plus"></i> Combo</a></li>
                                    <?php
                                    }
                                    ?>
                    
                                    <?php
                                    if($res['MenuCategory'])
                                    {
                                        foreach($res['MenuCategory'] as $mc)
                                        {
                    
                                            ?>
                                            <li><a href="#category<?php echo $mc['id'];?>" class="scrolly">
                                                    <i class="fa fa-plus"></i> <?php echo $mc['title'];?></a></li>
                    
                                        <?php
                                        }
                                    }
                                    ?>
                            </ul>
                        </div>
                    </div>


                    <div class="portlet box blue-steel">
                        <div class="portlet-title">
                            <div class="caption">
                                <!--i class="fa fa-cogs"--></i>Drop by
                            </div>
                        </div>
                        <div class="portlet-body">
<div class="row">

    <div class="col-md-4">
        <img style="max-width: 140%;margin-top:-10%;margin-left:-10%;" src="http://charlieschopsticks.com/assets/admin/layout/img/logo-big.png" />

    </div>

    <div class="col-md-8">

        <address>
            <strong>Charlie's Chopsticks</strong><br>
            970 Upper James Street<br>
            Hamilton, ON L9C 3A5<br>
            <abbr title="Phone">P:</abbr>  (905) 388-9888 to</address>

    </div>


    <div class="col-md-12">


        <address>
            <strong>Email</strong><br>
            <a href="mailto:#">
                order@charlieschopsticks.com</a>
        </address>


    </div>





    </div>


                        </div>
                    </div>


                </div>


                <div class="col-md-7">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <!--i class="fa fa-cogs"--></i>Charlie's Online Ordering System
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php
                                    if($closed)
                                    {
                                        ?>
                                    
                                        <center><h5 style="color: red;">Sorry we're closed. Please come back <?php echo $back;?></h5></center>
                                        
                                    <?php
                                    }
                                    ?>
                                    
                                    <?php
                                    $co_count = 0;
                                    if($res['Combo'])
                                    {
                                        ?>
                                    
                                        <h2 style="margin-top:0;">Combos</h2>
                                    <?php
                                    }
                            
                            foreach($res['Combo'] as $cat)
                            {
                                $co_count++;
                                $cntr=0;
                                if($co_count==1)
                                {
                                ?>
                            <div class="table-scrollable">
                                <table class="">
                                    <tbody>
                                    
                                    <tr>
                                    <?php }?>
                                        <td>

                                            <div class="tiles">
                                                <div class="tile image double ">
                                                    <div class="tile-body">
                                                    <?php
                                                        if($cat['image'])
                                                        {
                                                            ?>
                                                
                                                            <a role="button" data-toggle="modal" href="#Combo<?php echo $cat['id'];?>"><img src="<?php echo $this->webroot;?>images/menus/<?php echo $cat['image'];?>" /></a>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a role="button" data-toggle="modal" href="#Combo<?php echo $cat['id'];?>"><img src="<?php echo $this->webroot; ?>profile/assets/admin/pages/media/gallery/image4.jpg"
                                                             alt=""></a>
                                                        <?php
                                                        }
                                                
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="tile-object"id="combo<?php echo $cat['id'];?>">
                                                        <a href="#Combo<?php echo $cat['id'];?>" role="button" data-toggle="modal" style="display: block;">
                                                            <div class="name" >
                                                                <?php echo $cat['title'];?>
                                                            </div>
                                                            <div class="number">
                                                                &nbsp;
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $ks=0;
                                                $combo_counter=0;
                                                $mmm = $mm->find('all',array('conditions'=>array('Menu.id in ('.$cat['ids'].')')));
                                                $qtys = $cat['qtys'];
                                                $arr_ids = explode(',',$cat['ids']);
                                                $arr_qtys = explode(',',$qtys);
                                                foreach($arr_ids as $k=>$v)
                                                {
                                                    if($arr_qtys[$k])
                                                        $qty[$v] = $arr_qtys[$k];
                                                    else{
                                                        echo "<h1";
                                                        echo $qty[$v] = 1;
                                                        echo "</h1>";}
                                                }
                                            
                                                $cc=0;
                                                foreach($mmm as $ks=>$me)
                                                {
                                            
                                            
                                            
                                            
                                                    $combo_counter++;
                                                    $submenuscat = $this->requestAction('restaurants/getMenucat/'.$me['Menu']['id']);
                                                    //var_dump($submenuscat);
                                                    if($me['Menu']['price']==0 && count($submenuscat)>0)
                                                    {
                                            
                                                        $me['Menu']['price'] = $this->requestAction('restaurants/get_price/'.$me['Menu']['id']);
                                                        $me['Menu']['price'] =number_format($me['Menu']['price'],2);
                                                        $pr = $me['Menu']['price']."+";
                                                    }
                                                    else
                                                    {
                                                        $pr = number_format($me['Menu']['price'],2);
                                                    }
                                                    ?>
                                                    <?php
                                                    if($combo_counter==1)
                                                    {
                                                        ?>
                                            
                                                        <div class="modal  fade" id="Combo<?php echo $cat['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?php echo $me['Menu']['id'];?>Label" aria-hidden="true">
                                                        <input type="hidden" class="combo_price<?php echo $cat['id'];?>" value="<?php echo $cat['price'];?>" />
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                if($combo_counter==1)
                                                {
                                                    ?>
                                                    <div class="modal-dialog" style="width: 70%;">
                                                    <div class="modal-content ">
                                            
                                            
                                                    <div class="modal-header">
                                                        <h3 style="float: left;"><?php echo $cat['title'];?> (<?php echo $cat['price']?>) includes :</h3>
                                                        <button type="button"  class="close close<?php echo $cat['id'];?>" data-dismiss="modal" aria-hidden="true" id="clear_<?php echo $cat['id'];?>">x</button>
                                                        <div class="clearfix"></div>
                                                        <hr class="divider" />
                                                        <?php
                                                        if($cat['description'])
                                                        {
                                                            ?>
                                            
                                                            <div class="col-sm-12" style="font-size: 15px;">
                                            
                                                                <?php if($cat['description']!='undefined')echo $cat['description'];?>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <hr class="divider" />
                                                    </div>
                                                <?php
                                                }
                                                    ?>
                                                    <?php
                                                if($combo_counter==1)
                                                {
                                                    ?>
                                            
                                                    <div class="modal-body">
                                            
                                                <?php
                                                }
                                                    for($ccd=0;$ccd<$qty[$me['Menu']['id']];$ccd++)
                                                    {
                                                        ?>
                                            
                                                        <div style="margin-bottom: 10px;border:1px solid #eee;border-bottom:5px solid #eee;">
                                                            <div class="col-sm-6" style="text-align: left;">
                                                                <h3><?php echo $me['Menu']['menu_item'];?></h3>
                                                                <p><?php if($me['Menu']['description']!='undefined')echo $me['Menu']['description'];?></p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!--img src="<?php if($me['Menu']['image']&& file_exists(APP."webroot/images/menus/".$me['Menu']['image'])){echo $this->webroot;?>images/menus/<?php echo $me['Menu']['image'];}else{echo $this->webroot.'images/default.png';}?>"/-->
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="subitems_<?php echo $cat['id'];?> optionals" style="position: static;<?php if(!$submenuscat){?>display:none;<?php }?>border:none;" >
                                                                <?php if($cntr == 0){$cntr++;?>
                                                                    <div style="display:none;"><input type="checkbox" class="chk" value="" title="<?php echo $cat['id']."_[".$cat['title']."]-_".$cat['price']."_"."";?>" checked="checked" /></div>
                                                                <?php }?>
                                                                <div class="clearfix space10"></div>
                                                                <div style="display:none;"><input type="checkbox" class="chk" value="" title="<?php echo $me['Menu']['id']."_".$me['Menu']['menu_item']."-_0_"."";?>" checked="checked" style="display: none;" /></div>
                                                                <?php
                                            
                                                                $ch = 0;
                                            
                                                                foreach($submenuscat as $subm)
                                                                {
                                            
                                                                    $ch++;?>
                                            
                                                                    
                                                                    <div class="infolist col-xs-12" style="border-right: 5px solid #CCC;margin-bottom: 10px;" >
                                                                    <input type="hidden" class="extra_no_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['itemno'];?>" />
                                                                    <input type="hidden" class="required_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_required'];?>" />
                                                                    <input type="hidden" class="multiple_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_multiple'];?>" />
                                                                    <input type="hidden" class="upto_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['up_to'];?>" />
                                                                        <div style="display: none;"><input type="checkbox" class="chk" checked="checked" style="display: none;" id="<?php echo $subm['MenuCategory']['id'];?>" title="___" value="<?php echo $subm['MenuCategory']['title'];?>" /></div>
                                                                        <a href="javascript:void(0);" <?php /*onclick="$($(this).parent().children('div:eq(0)')).toggle('slow'); $('.extra-<?php echo $subm['MenuCategory']['id'];?>').each(function(){$(this).removeAttr('checked');}) "*/?> ><strong><?php echo $subm['MenuCategory']['title'];?></strong></a> <?php if($subm['MenuCategory']['description'] && $subm['MenuCategory']['description']!='undefined'){?>:<?php }?> <span><em> <?php echo $subm['MenuCategory']['description'];?></em></span>
                                                                        &nbsp; &nbsp;
                                             
                                            							<span style="color: #007FC5;">
                                                                        <?php
                                                                        if($subm['MenuCategory']['up_to']==1)
                                                                            $upto = "up to ";
                                                                        else
                                                                            $upto = "exactly ";
                                                                        if($subm['MenuCategory']['is_required']=='0')
                                                                        {
                                                                            if($subm['MenuCategory']['itemno']>0 &&$subm['MenuCategory']['is_multiple']=='1' )
                                                                                echo "(Select ".$upto.$subm['MenuCategory']['itemno']." Items) ";
                                                                            echo "(Optional)";
                                            
                                                                        }
                                                                        elseif($subm['MenuCategory']['is_required']=='1' )
                                                                        {
                                                                            if($subm['MenuCategory']['itemno']>0 &&$subm['MenuCategory']['is_multiple']=='1')
                                                                                echo "Select ".$upto.$subm['MenuCategory']['itemno']." Items ";
                                            
                                                                            echo "(Mandatory)";
                                                                        }
                                                                        ?></span>
                                                                        <br />
                                                                        <span style="color: red; font-weight: bold;" class="error_<?php echo $subm['MenuCategory']['id'];?>"></span>
                                            
                                                                        <div>
                                                                            <?php
                                                                            $k=0;
                                                                            foreach($subm['Menu'] as $k=>$m)
                                                                            {
                                                                                ?>
                                                                                <div class="subin">
                                            
                                                                                    <?php if($subm['MenuCategory']['is_multiple']=='1'){?>
                                                                                        <div class="col-xs-12 "  style="padding-left:0px;" >
                                                                                            <input type="checkbox" value="" name="extra" class="extra-<?php echo $subm['MenuCategory']['id'];?> spanextra_<?php echo $m['id'];?>" title="<?php echo $m['id']."_".$m['menu_item']."_".$m['price']."_".$subm['MenuCategory']['title'];?>" id="extra_<?php echo $m['id'];?>" />&nbsp;&nbsp;<?php if($m['price'])echo $m['menu_item']."  (+ $".number_format(str_replace('$','',$m['price']),2).")";else{echo $m['menu_item'];}?>
                                                                                            <b>
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="remspan btn btn-small btn-danger" id="remspan_<?php echo $m['id'];?>" style="padding:0 8px;padding-bottom:3px;text-decoration: none; color: #fff;" onclick=""><b>-</b></a>
                                                                                            <span class="span_<?php echo $m['id'];?> allspan" id="sprice_<?php echo $m['price'];?>">&nbsp;1&nbsp;</span>
                                                                                            <a href="javascript:;" class="addspan btn btn-small btn-info" id="addspan_<?php echo $m['id'];?>" onclick="" style="padding:0 8px;padding-bottom:3px;text-decoration: none; color: #fff;"><b>+</b></a></b>
                                                                                        </div>
                                                                                    <?php }else
                                                                                    {?>
                                                                                        <div class="col-xs-12 " style="padding-left:0px;" >
                                                                                            <input type="radio" value="" name="extra_<?php echo $subm['MenuCategory']['id'].$ccd;?>" class="extra-<?php echo $subm['MenuCategory']['id'];?>" title="<?php echo $m['id']."_".$m['menu_item']."_".$m['price']."_".$subm['MenuCategory']['title'];?>" id="extra_<?php echo $m['id'];?>" />&nbsp;&nbsp;<?php if($m['price'])echo $m['menu_item']."  (+ $".number_format(str_replace('$','',$m['price']),2).")";else{echo $m['menu_item'];}?>
                                                                                        </div>
                                                                                    <?php
                                                                                    }?>
                                            
                                            
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            <?php
                                            
                                                                            }
                                            
                                                                            ?>
                                            
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    if($ch%4==0)
                                                                    {
                                                                        ?>
                                                                        <div class="clearfix"></div>
                                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="clearfix"></div>
                                            
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                if($combo_counter == count($mmm))
                                                {
                                                    ?>
                                                    <div class="optionals" style="position: static;">
                                                        <div class="col-xs-12 alignr">
                                            
                                                            &nbsp;<a href="javascript:void(0);" class="btn btn-info--transition add_combo_profile" id="profilemenu<?php echo $cat['id'];?>" style="float: right;margin-left: 10px;" style="">Add</a>&nbsp;
                                                            <a href="javascript:void(0);" class="btn btn-primary--transition  clearall" id="clear_<?php echo $cat['id'];?>" style="float: right;margin-left:10px;" >Clear</a>&nbsp;
                                            
                                                            &nbsp;<button type="button" class="close" id="clear_<?php echo $cat['id'];?>" data-dismiss="modal" aria-hidden="false" style="opacity: 1; text-shadow:none;margin-left: 10px;" >
                                                                <a href="javascript:void(0)" class="btn btn-danger"  >Close</a>
                                                            </button>&nbsp;
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                            
                                                    </div>
                                            
                                                    </div>
                                            
                                                    </div>
                                                <?php
                                                }
                                                    ?>
                                                    <?php
                                                    if($combo_counter == count($mmm))
                                                    {
                                                        //echo count($res['Combo']);
                                                        ?>
                                            
                                            
                                            
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                <?php
                                            
                                                }
?>
                                        </td>
                                        
                                    <?php if($co_count == count($res['Combo'])){?>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <?php }}?>
                            <?php
                            $nco=0;
                            foreach($rescat as $cat)
                            {
                                
                               ?> 
                            <h2 id="category<?php echo $cat['MenuCategory']['id'];?>"><?php echo $cat['MenuCategory']['title'];?></h2>

                            <div class="table-scrollable">
                                <table class="">
                                    <tbody>
                                    <tr>
                                    
                                    <?php
                                        $ks=0;
                                        foreach($cat['Menu'] as $ks=>$me)
                                        {
                                            //var_dump($me);
                                            if(!$me['showmenu'])
                                                continue;
                                            $submenuscat = $this->requestAction('restaurants/getMenucat/'.$me['id']);
                                            //var_dump($submenuscat);
                                            if($me['price']==0 && count($submenuscat)>0)
                                            {
                                    
                                                $me['price'] = $this->requestAction('restaurants/get_price/'.$me['id']);
                                                $me['price'] =number_format($me['price'],2);
                                                $pr = $me['price']."+";
                                            }
                                            else
                                            {
                                                $pr = number_format($me['price'],2);
                                            }
                                            ?>
                                        <td>

                                            <div class="tiles">
                                                <div class="tile image double ">
                                                    <div class="tile-body">
                                                        <?php if(count($submenuscat)>0){?>
                                                            <a href="#Modal<?php echo $me['id'];?>" role="button" data-toggle="modal">
                                                                <img class="i menutileimg" src="<?php if($me['image']&& file_exists(APP."webroot/images/menus/".$me['image'])){echo $this->webroot;?>images/menus/<?php echo $me['image'];}else{echo $this->webroot.'profile/assets/admin/pages/media/gallery/image4.jpg';}?>"/>
                                                            </a>
                                                        <?php }
                                                        else
                                                        {?>
                                                            <a href="#Modal<?php echo $me['id'];?>" role="button" data-toggle="modal">
                                                                <center><img class="i menutileimg" src="<?php if($me['image']&& file_exists(APP."webroot/images/menus/".$me['image'])){echo $this->webroot;?>images/menus/<?php echo $me['image'];}else{echo $this->webroot.'profile/assets/admin/pages/media/gallery/image4.jpg';}?>"/></center>
                                                            </a>
                                                        <?php }?>
                                                    </div>
                                                    <div class="tile-object">
                                                    <a href="#Modal<?php echo $me['id'];?>" role="button" data-toggle="modal" style="display: block;">
                                                        <div class="name">
                                                            <?php echo $me['menu_item']?>
                                                        </div>
                                                        <div class="number">
                                                            $<?php echo $pr;?>
                                                        </div>
                                                    </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="modal  fade" id="Modal<?php echo $me['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?php echo $me['id'];?>Label" aria-hidden="true">
                                                <div class="modal-dialog" style="width: 70%;">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <button type="button" class="close close<?php echo $me['id'];?>" data-dismiss="modal" aria-hidden="true" id="clear_<?php echo $me['id'];?>">x</button>
                                                            <div class="clearfix"></div>
                                
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-sm-6" style="text-align: left;padding:0px;">
                                                                <h3><?php echo $me['menu_item']." : $ ".$pr;?></h3>
                                                                <p><?php if($me['description']!='undefined')echo $me['description'];?></p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!--img width="150" src="<?php if($me['image']&& file_exists(APP."webroot/images/menus/".$me['image'])){echo $this->webroot;?>images/menus/<?php echo $me['image'];}else{echo $this->webroot.'images/default.png';}?>" /-->
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="subitems_<?php echo $me['id'];?> optionals" >
                                                                <!--<span class="topright"><a href="javascript:void(0)" onclick="$('#Modal<?php echo $me['id'];?>').toggle();"><strong class="btn btn-danger">x</strong></a></span>-->
                                
                                                                <div class="clearfix space10"></div>
                                                                <input type="checkbox" class="chk" value="" title="<?php echo $me['id']."_".$me['menu_item']."-_".$me['price']."_"."";?>" checked="checked" style="display: none;" />
                                
                                                                <?php
                                                                //var_dump($submenuscat);
                                                                $ch = 0;
                                                                foreach($submenuscat as $key=>$subm)
                                                                {
                                                                    $ch++;?>
                                
                                                                    <input type="hidden" id="extra_no_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['itemno'];?>" />
                                                                    <input type="hidden" id="required_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_required'];?>" />
                                                                    <input type="hidden" id="multiple_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_multiple'];?>" />
                                                                    <input type="hidden" id="upto_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['up_to'];?>" />
                                                                    <div class="infolist col-xs-12" style="border-right: 5px solid #CCC;margin-bottom:10px" >
                                                                        <input type="checkbox" class="chk" checked="checked" style="display: none;" id="<?php echo $subm['MenuCategory']['id'];?>" title="___" value="<?php echo ($key!=0)?"| ".$subm['MenuCategory']['title']:$subm['MenuCategory']['title'];?>" />
                                                                        <a href="javascript:void(0);" <?php /*onclick="$($(this).parent().children('div:eq(0)')).toggle('slow'); $('.extra-<?php echo $subm['MenuCategory']['id'];?>').each(function(){$(this).removeAttr('checked');}) "*/?> ><strong><?php echo $subm['MenuCategory']['title'];?></strong></a> <?php if($subm['MenuCategory']['description'] && $subm['MenuCategory']['description']!='undefined'){?>:<?php }?> <span><em> <?php echo $subm['MenuCategory']['description'];?></em></span>
                                
                                
                                
                                                                        <br />
                                 
                                							<span>
                                                            <?php
                                                            if($subm['MenuCategory']['up_to']==1)
                                                                $upto = "up to ";
                                                            else
                                                                $upto = "exactly ";
                                                            if($subm['MenuCategory']['is_required']=='0')
                                                            {
                                                                if($subm['MenuCategory']['itemno']>0 &&$subm['MenuCategory']['is_multiple']=='1' )
                                                                    echo "Select ".$upto.$subm['MenuCategory']['itemno']." Items ";
                                                                echo "(Optional)";
                                
                                                            }
                                                            elseif($subm['MenuCategory']['is_required']=='1' )
                                                            {
                                                                if($subm['MenuCategory']['itemno']>0 &&$subm['MenuCategory']['is_multiple']=='1')
                                                                    echo "Select ".$upto.$subm['MenuCategory']['itemno']." Items ";
                                
                                                                echo "(Mandatory)";
                                                            }
                                                            ?></span>
                                                                        <br />
                                                                        <span style="color: red; font-weight: bold;" class="error_<?php echo $subm['MenuCategory']['id'];?>"></span>
                                
                                                                        <div>
                                                                            <?php
                                                                            $k=0;
                                                                            foreach($subm['Menu'] as $k=>$m)
                                                                            {
                                                                                //if($k%3 == 0 ){?>
                                                                                <div class="subin">
                                                                                    <?php //}?>
                                                                                    <?php if($subm['MenuCategory']['is_multiple']=='1'){?>
                                                                                        <div class="col-xs-12 "  style="padding-left:0px;" >
                                                                                            <input type="checkbox" value="" name="extra" class="extra-<?php echo $subm['MenuCategory']['id'];?> spanextra_<?php echo $m['id'];?>" title="<?php echo $m['id']."_".$m['menu_item']."_".$m['price']."_".$subm['MenuCategory']['title'];?>" id="extra_<?php echo $m['id'];?>" />&nbsp;&nbsp;<?php if($m['price'])echo $m['menu_item']."  (+ $".number_format(str_replace('$','',$m['price']),2).")";else{echo $m['menu_item'];}?> &nbsp;&nbsp;
                                                                                            <b>
                                                                                                <a href="javascript:;" class="remspan" id="remspan_<?php echo $m['id'];?>" style="text-decoration: none; color: #fff;" onclick=""><b>&nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                                                                <span class="span_<?php echo $m['id'];?> allspan" id="sprice_<?php echo $m['price'];?>">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                                                                <a href="javascript:;" class="addspan" id="addspan_<?php echo $m['id'];?>" onclick="" style="text-decoration: none; color: #fff;"><b>&nbsp;&nbsp;+&nbsp;&nbsp;</b></a></b>
                                                                                        </div>
                                                                                    <?php }else
                                                                                    {?>
                                                                                        <div class="col-xs-12 " style="padding-left:0px;" >
                                                                                            <input type="radio" value="" name="extra_<?php echo $subm['MenuCategory']['id'];?>" class="extra-<?php echo $subm['MenuCategory']['id'];?>" title="<?php echo $m['id']."_".$m['menu_item']."_".$m['price']."_".$subm['MenuCategory']['title'];?>" id="extra_<?php echo $m['id'];?>" />&nbsp;&nbsp;<?php if($m['price'])echo $m['menu_item']."  (+ $".number_format(str_replace('$','',$m['price']),2).")";else{echo $m['menu_item'];}?>
                                                                                        </div>
                                                                                    <?php
                                                                                    }?>
                                                                                    <?php
                                                                                    //if(($k+1)%3==0)
                                                                                    //{?>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                                <?php
                                                                                //}
                                                                            }
                                
                                                                            ?>
                                
                                
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    if($ch%4==0)
                                                                    {
                                                                        ?>
                                                                        <div class="clearfix"></div>
                                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="clearfix"></div>
                                                                <div class="col-xs-12 alignr">
                                
                                                                    &nbsp;<a href="javascript:void(0);" class="btn btn-info--transition add_menu_profile" id="profilemenu<?php echo $me['id'];?>" style="float: right;margin-left: 10px;" style="">Add</a>&nbsp;
                                                                    <?php if(count($submenuscat)>0){?>&nbsp;<a href="javascript:void(0);" class="btn btn-primary--transition  clearall" id="clear_<?php echo $me['id'];?>" style="float: right;margin-left:10px;" >Clear</a>&nbsp;<?php }?>
                                
                                                                    &nbsp;<button type="button" class="close" id="clear_<?php echo $me['id'];?>" data-dismiss="modal" aria-hidden="false" style="opacity: 1; text-shadow:none;margin-left: 10px;" >
                                                                        <a href="javascript:void(0)" class="btn btn-danger"  >Close</a>
                                                                    </button>&nbsp;
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                
                                                </div>
                                
                                            </div>

                                        </td>
                                        
                                    <?php }?>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>


                </div>


                <div class="col-md-3">



                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                Receipt
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                    </tr>
                                    </thead>
                                    </table>
                                    <table id="clearorder" class="orders">

                                    <!--<tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sushi Roll</strong> 3 piece roll with sesame salmon spicy</td>
                                        <td><span class="label label-sm label-info"> - </span>&nbsp;4 <span
                                                class="label label-sm label-danger">+ </span></td>
                                        <td>$19.99</td>
                                    </tr>-->
                                    
                                </table>
                            </div>


                            <div class="invoice-block">
                                <ul class="list-unstyled amounts">
                                    <li>
                                        <strong >Subtotal:</strong> $<span class="subtotal">12</span>
                                        <input type="hidden" value="<?php if($order){echo $order['Reservation']['subtotal'];}else{?>0.00<?php }?>" class="subtotal" name="subtotal" />
                                    </li>
                                    <li>
                                        <strong>Tax:</strong> $<span class="tax">12.9</span>
                                        <input type="hidden" class="tax" name="tax" value="<?php if($order){echo $order['Reservation']['tax'];}else{?>0.00<?php }?>" />
                                    </li>
                                    <li>
                                        <strong>Grand Total:</strong> $<span class="grandtotal">12489</span>
                                        <input type="hidden" value="<?php if($order){echo $order['Reservation']['g_total'];}else{echo '0.00'; }?>" class="grandtotal" name="g_total" />
                                    </li>
                                </ul>
                                <br>
                                <a class="btn btn-lg blue hidden-print margin-bottom-5">
                                    Submit Order <i class="fa fa-check"></i>
                                </a>
                                <a class="btn btn-lg white hidden-print margin-bottom-5"
                                   onclick="javascript:window.print();">
                                    Restart <i class="fa fa-refresh"></i>
                                </a>

                            </div>


                        </div>


                    </div>




                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                Share with love
                            </div>

                        </div>
                        <div class="portlet-body">
                          <img style="max-width: 100%;" src="https://static.addtoany.com/images/blog/addtoany-svg-sharing-icons.png" />




                        </div>


                    </div>


                    <!-- END BORDERED TABLE PORTLET-->
                </div>
                <!-- END PAGE CONTENT-->
            </div>