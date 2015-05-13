<!--<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
             <li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>
            
            <li><a href="">Combo</a></li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>-->


<div class="container ">
    <!-- Big banner -->
    <div class="row " style="padding-top: 20px;">
        <div class="col-xs-12">
            <div class="">
                <!--div class="banners--big">
Welcome, <?php echo $this->Session->read('name');?>
</div-->
            </div>
        </div>
    </div>
  <div class="row">
    <?php include('subpages/admin_menu.php')?>
    <div class="col-xs-12  col-sm-9">
      <div class="grid">
        <h3 class="sidebar__title">Combo Manager</h3>
        <hr class="shop__divider">
        <div class="dashboard">
          
         <div class="">
			
			 <div class="row">    
                 <div class="col-xs-12  col-md-12">
                    <?php
                    if($combos){
                    foreach($combos as $c)
                    {
                        ?>
                        <div class="combos" style="border: 1px solid #dadada;padding:10px;margin-bottom:5px;">
                            <div class="col-sm-3" style="padding-top:7px;">
                                <?php
                                if($c['Combo']['image'])
                                {
                                    ?>
                                    
                                <div class="col-sm-3"><img src="<?php echo $this->webroot;?>images/menus/<?php echo $c['Combo']['image'];?>" style="max-width:100%;" /></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                <div class="col-sm-6"><img src="<?php echo $this->webroot;?>images/menus/default_combo.jpg" style="max-width:100%" /></div>
                                    <?php
                                }
                                ?>
                                <div class="col-sm-6"><strong><?php echo $c['Combo']['title'];?></strong></div>
                                <div class="clearfix"></div>
                                
                                
                            </div>
                            <div class="col-sm-3" style="padding-top:7px;">
                                $<?php echo $c['Combo']['price'];?>
                            </div>
                            <div class="col-sm-3" style="padding-top:7px;">
                                <?php echo $c['Combo']['description'];?>
                            </div>
                            <div class="col-sm-3">
                                <a href="<?php echo $this->webroot;?>restaurants/combo/<?php echo $c['Combo']['id'];?>#add_combo" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure?');" class="btn btn-danger" href="<?php echo $this->webroot;?>restaurants/delete_combo/<?php echo $c['Combo']['id'];?>">Delete</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                    }
                    else
                    {
                        ?>
                        <div class="combos" style="border: 2px solid #e5e5e5;padding:10px;border-bottom:5px solid #e5e5e5;margin-bottom:10px;">
                            <strong>No combos added yet</strong>
                        </div>
                        <?php
                    }
                    ?>
                 </div>
             </div>         

             <a class="btn btn-success" <?php if(!isset($combo)){?>href="javascript:void(0)"  onclick="$('.add_combo').toggle();"<?php }else{?> href="<?php echo $this->webroot;?>restaurants/combo" <?php }?>>Add A New Combo</a><div class="divider"></div>    
<div class="add_combo" id="add_combo" <?php if(!isset($combo)){?>style="display: none;"<?php }?>>
<h2 style="text-align: left;">Add/Edit Combo</h2>							
<div class="banners--big  banners--big-left clearfix">
  <div class="row">
    
    <div class="col-xs-12  col-md-12">
    
      <div class="banners--big__form">
        <form action="" method="post" class="addcat">
          <div class="form-group  form-group--form">
            
			 <input class="form-control  form-control--form" id="combo_title"  type="text" placeholder="Combo Title" value="<?php if(isset($combo['Combo']['title']))echo $combo['Combo']['title'];?>" name="title" style="width: 100%;margin-bottom:5px" />
             <input class="form-control  form-control--form" id="combo_price"  type="text" placeholder="Combo Price" value="<?php if(isset($combo['Combo']['price']))echo '$'.$combo['Combo']['price'];?>" name="price" style="width: 100%;margin-bottom:5px" />
             <textarea class="form-control  form-control--form" id="combo_description" placeholder="Combo Description" name="description" style="width: 100%;height:80px;margin-bottom:5px;"><?php if(isset($combo['Combo']['description']))echo $combo['Combo']['description'];?></textarea>
             <div style="text-align:left" class="combo_img">
                Combo Image &nbsp; <a href="javascript:void(0)" class="btn btn-danger combo_image" id="combo_upload">Browse</a>
                <div class="combo_image_div" style="<?php if(isset($combo['Combo']['image']) && $combo['Combo']['image']){?><?php }else{?>display: none;<?php }?>padding-top:10px">
                    <?php if(isset($combo['Combo']['image']) && $combo['Combo']['image']){
                        ?>
                        <img src="<?php echo $this->webroot;?>images/menus/<?php echo $combo['Combo']['image'];?>" style="width: 120px;" />
                        <?php
                    }
                    else
                    {
                       if(isset($combo['Combo']['image']))
                       {
                        ?>
                        <img src="<?php echo $this->webroot;?>images/menus/default_combo.jpg" style="width: 120px;" />
                        <?php
                       } 
                    }
                    ?>
                </div>
             </div>
             <?php
             if(isset($combo['Combo']['id']))
             {
                ?>
                <input type="hidden" id="combo_id" value="<?php echo $combo['Combo']['id'];?>" />
                <input type="hidden" id="combo_image" value="<?php echo $combo['Combo']['image'];?>" />
                <?php
             }
             else
             {
                ?>
                <input type="hidden" id="combo_image" />
                <?php
             }
             
             ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


                <div class="col-xs-12 col-sm-12">
                <ul class="parentinfo">
                    <li class="infolistwhite row  ui-state-disabled"><h1>Drag and drop above the line</h1></li>
                    <?php
                                if(isset($combo['Combo']['ids'])){
                                $cm = $menu_s->find('all',array('conditions'=>array('Menu.id IN ('.$combo['Combo']['ids'].')'),'order'=>'Menu.display_order'));
                                $qtys = $combo['Combo']['qtys'];
                                $arr_ids = explode(',',$combo['Combo']['ids']);
                                $arr_qtys = explode(',',$combo['Combo']['qtys']);
                                foreach($arr_ids as $k=>$v)
                                {
                                    if($arr_qtys[$k])
                                    $qty[$v] = $arr_qtys[$k]; 
                                    else
                                    $qty[$v] = 1;
                                }
                                //var_dump($mmm);
                                //$cm = $mmm;
                                $c_qt = 0;
                                foreach($cm as $ms)
                                {
                                    $query = $menu_s->findById($ms['Menu']['id']);
                                    $me = $query['Menu'];
                                    ?>
                                    <li class="parentinfo2" id="menu<?php echo $me['id'];?>" style="margin: 0 -15px 15px -15px!important">
                                        <div class="col-xs-12 col-sm-3">
                                            <div style="<?php if($me['image']){?>width: 60%;float:right;<?php }?>"><strong><?php echo $me['menu_item'];?></strong></div>
                                            <?php if($me['image']){?><div style="width: 37%;float:left"><span style="display:inline;" class="imgmenu" id="img<?php echo $me['id'];?>"><?php if($me['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $me['image'];?>" style="max-width:100%;" /><?php }?></span></div><?php }?>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-5"><em><?php echo $me['description'];?></em></div>
                                        <div class="col-xs-12 col-sm-2">QTY: <input value="<?php echo $qty[$me['id']];?>" type="text" class="qty_combo" style="max-width:65%;margin-bottom:5px;" /></div>
                                        <div class="col-xs-12 col-sm-2"><a href="<?php echo $this->webroot;?>restaurants/removeComboMenu/<?php echo $combo['Combo']['id'];?>/<?php echo $me['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a></div>
                                        <div class="clearfix"></div>
                                        
                                    </li>
                                    <?php
                                    $c_qt++;
                                }
                                }
                                ?>
                    <li style="border-bottom:2px dotted #777;padding: 25px 0;margin-bottom:50px" class=""></li>
                    <?php
                        foreach($cat as $cats)
                        {
                            ?>
                            <li class="infolistwhite row ui-state-disabled" id="catid<?php echo $cats['MenuCategory']['id'];?>" style="margin-top: 10px;">
                                
                                    <div class="col-xs-12 col-sm-4 cattitle<?php echo $cats['MenuCategory']['id'];?>">
                                    <?php if($cats['MenuCategory']['cat_image']){?>
                                <div class="col-sm-4" style="padding: 0;"><img style="max-width: 100%;margin-bottom:5px;" src="<?php echo $this->webroot;?>images/category/<?php echo $cats['MenuCategory']['cat_image'];?>" style="width: 120px;border-radius:30px" /></div><?php }?>
                                <div class="<?php if($cats['MenuCategory']['cat_image']){?>col-sm-8<?php }?>"><h3  class="sidebar__title" ><?php echo $cats['MenuCategory']['title'];?></h3></div>
                                <div class="clearfix"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 marbot icon-move">								
                                        <span style="display: block;float:right;margin-top:15px;"><strong>Click to expand &nbsp; </strong> <a href="javascript:void(0)" onclick="$('.parent<?php echo $cats['MenuCategory']['id'];?>').toggle();"><img style="width: 15px;" src="<?php echo $this->webroot?>img/move.png" /></a></span>
                                        <div style="clear: both;"></div>								
    								</div>
                                <div class="clearfix"></div>
                                
							</li>	
								
                        
                                
                                <?php
                                if(isset($combo['Combo']['ids'])){
                                $cm = $menu_s->find('all',array('conditions'=>array('cat_id'=>$cats['MenuCategory']['id'],'Menu.id NOT IN ('.$combo['Combo']['ids'].')'),'order'=>'Menu.display_order'));
                                foreach($cm as $ms)

                                {
                                    $query = $menu_s->findById($ms['Menu']['id']);
                                    $me = $query['Menu'];
                                    ?>
                                    <li class="parentinfo2 parent<?php echo $cats['MenuCategory']['id'];?>" id="menu<?php echo $me['id'];?>" style="display: none;margin: 0 -15px 15px -15px!important;">
                                        <div class="col-xs-12 col-sm-3">
                                            <div style="<?php if($me['image']){?>width: 60%;float:right;<?php }?>"><strong><?php echo $me['menu_item'];?></strong></div>
                                            <?php if($me['image']){?><div style="width: 37%;float:left"><span style="display:inline;" class="imgmenu" id="img<?php echo $me['id'];?>"><?php if($me['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $me['image'];?>" style="max-width:100%" /><?php }?></span></div><?php }?>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-5"><em><?php echo $me['description'];?></em></div>
                                        
                                        <div class="clearfix"></div>
                                        
                                    </li>
                                    <?php
                                }
                                //$cm = $mmm['Menu'];
                                }
                                else{
                                $cm = $cats['Menu'];
                                foreach($cm as $ms)

                                {
                                    $query = $menu_s->findById($ms['id']);
                                    $me = $query['Menu'];
                                    ?>
                                    <li class="parentinfo2 parent<?php echo $cats['MenuCategory']['id'];?>" id="menu<?php echo $me['id'];?>" style="display: none;margin: 0 -15px 15px -15px!important;">
                                        <div class="col-xs-12 col-sm-3">
                                            <div style="<?php if($me['image']){?>width: 60%;float:right;<?php }?>"><strong><?php echo $me['menu_item'];?></strong></div>
                                            <?php if($me['image']){?><div style="width: 37%;float:left"><span style="display:inline;" class="imgmenu" id="img<?php echo $me['id'];?>"><?php if($me['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $me['image'];?>" style="max-width:100%" /><?php }?></span></div><?php }?>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-5"><em><?php echo $me['description'];?></em></div>
                                        
                                        <div class="clearfix"></div>
                                        
                                    </li>
                                    <?php
                                }
                                }
                                ?>
                                
                            
                            <?php
                            
                        }
                    ?>
                </ul>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12">
                <a href="javascript:void(0)" class="btn btn-primary combobtn">Save Combo</a>
                </div>
                </div>
             </div>
              
        </div>
            
          
          <div class="clearfix  hidden-xs"></div>
        </div>
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