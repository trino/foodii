<div class="divider"></div>
<h1>Combos</h1>
<ul class="parentinfo">
                    <?php
                        foreach($combo as $cats)
                        {
                            ?>
                            <li class="infolistwhite row" id="catid<?php echo $cats['Combo']['id'];?>">
                                
                                <div class="col-xs-12 col-sm-4 cattitle<?php echo $cats['Combo']['id'];?>">
                                <div class="col-sm-4" style="padding: 0;">
                                <?php if($cats['Combo']['image']){?>
                                <img src="<?php echo $this->webroot;?>images/menus/<?php echo $cats['Combo']['image'];?>" style="max-width:50%;margin-bottom:5px" />
                                <?php }
                                else
                                {
                                    ?>
                                <img src="<?php echo $this->webroot;?>images/menus/default_combo.jpg" style="max-width:50%;margin-bottom:5px" />
                                
                                <?php
                                }  
                                ?>
                                </div>
                                <div class="col-sm-8"><h3  class="sidebar__title" ><?php echo $cats['Combo']['title'];?></h3></div>
                                
                                <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-3">
                                $<?php echo $cats['Combo']['price'];?>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $cats['Combo']['description'];?>
                                </div>
                                <div class="col-sm-2 marbot icon-move">								
                                    <span style="display: block;float:right;margin-top:15px;"><a href="javascript:void(0)" onclick="$('.Combo<?php echo $cats['Combo']['id'];?>').toggle();"><img style="width: 15px;" src="<?php echo $this->webroot?>img/move.png" /></a></span>
                                    <div style="clear: both;"></div>								
								</div>
                                
                                <div class="clearfix"></div>
                                
								
								
                        
                                <ul class="parentinfo2 Combo<?php echo $cats['Combo']['id'];?>" style="display: none;">
                                <?php
                                $menu_combo = $menu_s->find('all',array('conditions'=>array('Menu.id IN ('.$cats['Combo']['ids'].')'),'order'=>'Menu.display_order'));
                                foreach($menu_combo as $ms)

                                {
                                    $query = $menu_s->findById($ms['Menu']['id']);
                                    $me = $query['Menu'];
                                    ?>
                                    <li class="infolist infolist2 row" id="menu_list_<?php echo $me['id'];?>">
                                        <div class="col-xs-12 col-sm-4">
                                        <?php if($me['image']){?><div class="col-sm-4"><span class="imgmenu" id="img<?php echo $me['id'];?>"><?php if($me['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $me['image'];?>" style="max-width: 50%;" /><?php }?></span></div><?php }?>
                                        <div class="<?php if($me['image']){?>col-sm-8<?php }?>"><strong><?php echo $me['menu_item'];?></strong></div>
                                        
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-8"><em><?php echo $me['description'];?></em></div>
                                        
                                        
                                        
                                        
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                                ?>
                                </ul>
                            </li>
                            <?php
                            
                        }
                    ?>
                </ul>