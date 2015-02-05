                                        <?php
                                        $query = $menu_s->findById($menu['Menu']['id']);
                                        ?>
                                        <div class="col-xs-12 col-sm-3" style="margin-top:8px;">
                                            <div style="width: 60%;float:right"><strong><?php echo $menu['Menu']['menu_item'];?></strong></div>
                                            <div style="width: 37%;float:left"><span id="img1219" class="imgmenu" style="display: inline;"><?php if($menu['Menu']['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $menu['Menu']['image'];?>" style="max-width: 100%;" /><?php }?></span></div>
                                            <div class="clearfix"></div>                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-1"  style="margin-top:8px;"><em>$<?php echo number_format($menu['Menu']['price'],2);?></em></div>
                                        <div class="col-xs-12 col-sm-3"  style="margin-top:8px;"><em><?php echo $menu['Menu']['description'];?></em></div>
                                        <div class="col-xs-12 col-sm-5">
                                            <a href="javascript:void(0)" onclick="$('.item<?php echo $menu['Menu']['id'];?>').show();" id="editmenu<?php echo $menu['Menu']['id'];?>" class="btn btn-success">Edit</a>
                                            <a href="javascript:void(0)" id="uploadimage<?php echo $menu['Menu']['id'];?>" class="uploadimg btn btn-info">Add Image</a>
                                            <a href="javascript:void(0)" id="deletemenu<?php echo $menu['Menu']['id'];?>" class="btn btn-danger deletemenu">Delete</a>
                                            <br /><input type="checkbox" id="showmenu<?php echo $me['id'];?>" class="showmenu" <?php if($me['Menu']['showmenu']){?>checked="checked"<?php }?> /> <strong>Show Menu</strong></div>
                                            
                                        <div class="clearfix"></div>
                                        <div class="menu_item item<?php echo $menu['Menu']['id']?> col-xs-12 col-sm-8" style="display: none;margin-top: 10px;">
                                        <input type="text" name="menu_item" placeholder="" value="<?php echo $menu['Menu']['menu_item'];?>" id="menuname<?php echo $menu['Menu']['id']?>" />
                                        <input type="text" name="price" placeholder="" value="$<?php echo number_format($menu['Menu']['price'],2);?>" id="menuprice<?php echo $menu['Menu']['id']?>" />
                                        <input type="text" name="description" placeholder="" value="<?php echo $menu['Menu']['description'];?>" id="menudesc<?php echo $menu['Menu']['id']?>" />
                                        <input type="hidden" name="cat_id" value="<?php echo $cat['MenuCategory']['id'];?>" id="menucat<?php echo $menu['Menu']['id']?>" />
                                        <input type="hidden" name="has_opt" value="1" id="had_opt<?php echo $menu['Menu']['id'];?>" />
                                        <?php
                                        if($query['MenuCategory'])
                                        {
                                        ?>
                                        <input type="hidden" id="had_opt<?php echo $menu['Menu']['id']?>" value="1" />
                                        <div class="optional" id="addopt_item_<?php echo $menu['Menu']['id']?>" style="">
                                        <?php foreach($query['MenuCategory'] as $scats){
                                            if(is_array($scats))
                                            {
                                                //var_dump($scats);
                                                    echo $this->requestAction('/restaurants/optional_in/'.$scats['id']);
                                                    ?>
                                                    
                                                    <?php
                                                
                                            }
                                        }?>
                                        <a href="javascript:void(0)" class="addmoresubM btn btn-warning" id="subM<?php if(isset($menu['Menu']['id']))echo $menu['Menu']['id'];?>" >+ Add Sub Category</a>
                                        </div>
                                        <?php }?>
                                        
                                        <button class="btn btn-primary savemenu" id="save<?php echo $menu['Menu']['id']?>">Save</button>
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                        
