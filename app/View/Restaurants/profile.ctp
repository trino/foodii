<style>
    /* div{border:1px solid green;} */
</style>

<div class="breadcrumbs" style="margin-bottom:10px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav>
                    <ol class="breadcrumb">

                        <li><a href="<?php echo $this->webroot; ?>">Home</a></li>

                        <li class="active"><?php echo $res['Restaurant']['name']; ?></li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="">

    <div class="row  marbott">
        <div class="col-xs-12">
            <div class="" style="margin-bottom:-13px;">
                <div class="banners--big" style="padding:10px;">
                    Charlie's Chopsticks Online Ordering
                </div>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-xs-12 col-sm-2 sidecat">
            <aside class="sidebar sidebar--shop  scr-fixed">


                <div class="shop-filter">

                    <h5 class="sidebar__subtitle">Categories</h5>
                    <ul class="nav  nav--filter">
                        <?php
                            if ($res['Combo']) {
                                ?>

                                <li><a href="#combo" class="scrolly">
                                        <div class="col-xs-6" style="padding-left: 0;">Combo</div>
                                        <div class="col-xs-6"><img
                                                src="<?php echo $this->webroot;?>images/menus/default_combo.png"
                                                class="catimage"/></div>
                                        <div class="clearfix"></div>
                                    </a></li>
                            <?php
                            }
                        ?>

                        <?php
                            if ($res['MenuCategory']) {
                                foreach ($res['MenuCategory'] as $mc) {

                                    ?>
                                    <li><a href="#category<?php echo $mc['id'];?>" class="scrolly">
                                            <div class="col-xs-6" style="padding:0px;"><?php echo $mc['title'];?></div>
                                            <div class="col-xs-6"><img
                                                    src="<?php echo $this->webroot;?>images/category/<?php echo $mc['cat_image'];?>"
                                                    class="catimage"/></div>
                                            <div class="clearfix"></div>
                                        </a></li>

                                <?php
                                }
                            }
                        ?>

                    </ul>


                </div>
            </aside>
        </div>
        <div class="col-xs-12 col-sm-10">
            <div class="grid">

                <div class="row menulisting">
                    <div class="col-xs-12 col-sm-8 menuparent"
                         style="border:1px solid #e4e4e4;padding:10px;background:#fff;margin-bottom:10px;">
                        <?php
                            if ($closed) {
                                ?>

                                <center><h5 style="color: red;">Sorry we're closed. Please come
                                        back <?php echo $back;?></h5></center>
                            <?php
                            }
                        ?>
                        <?php
                            $co_count = 0;
                            if ($res['Combo']) {
                                ?>

                                <h4 style="" class="sidebar__subtitle " id="combo">Combos</h4>
                            <?php
                            }
                            foreach ($res['Combo'] as $cat) {
                                $co_count++;
                                $cntr = 0;
                                ?>

                                <div class="col-sm-4"
                                     style="margin-bottom:1px; padding:10px;background: #fcfcfc;border:1px solid #f4f4f4;border-bottom:5px solid #efefef;">


                                    <?php
                                        if ($cat['image']) {
                                            ?>

            <a role="button" data-toggle="modal" href="#Combo<?php echo $cat['id'];?>"><center><img src="<?php echo $this->webroot;?>images/menus/<?php echo $cat['image'];?>" style="width:133px;" /></a></center>
        <?php
                                        } else {
                                            ?>
            <a role="button" data-toggle="modal" href="#Combo<?php echo $cat['id'];?>"><center><img src="<?php echo $this->webroot;?>images/menus/default_combo.jpg" style="width:133px;" /></a></center>
        <?php
                                        }

                                    ?>
                                    <br/>

                                    <div class="col-sm-10" style="padding:0 10px;"><strong
                                            id="combo<?php echo $cat['id'];?>"><a href="#Combo<?php echo $cat['id'];?>"
                                                                                  role="button"
                                                                                  data-toggle="modal"><?php echo $cat['title'];?></a></strong>
                                    </div>
                                    <div class="col-sm-2"><a href="#Combo<?php echo $cat['id'];?>" role="button"
                                                             data-toggle="modal"><span
                                                class="glyphicon glyphicon-move"></span></a></div>
                                    <div class="clearfix"></div>


                                </div>
                                <?php
                                if ($co_count % 3 == 0) {
                                    ?>
                                    <div class="clearfix"></div>
                                <?php
                                }
                                if ($co_count == count($res['Combo'])) {
                                    if ($co_count % 3 != 0) {
                                        ?>
                                        <div class="clearfix"></div>
                                    <?php
                                    }
                                    ?>


                                    <hr class="divider"/>
                                <?php
                                }

                                ?>
                                <?php
                                $ks = 0;
                                $combo_counter = 0;
                                $mmm = $mm->find('all', array('conditions' => array('Menu.id in (' . $cat['ids'] . ')')));
                                $qtys = $cat['qtys'];
                                $arr_ids = explode(',', $cat['ids']);
                                $arr_qtys = explode(',', $qtys);
                                foreach ($arr_ids as $k => $v) {
                                    if ($arr_qtys[$k])
                                        $qty[$v] = $arr_qtys[$k];
                                    else {
                                        echo "<h1";
                                        echo $qty[$v] = 1;
                                        echo "</h1>";
                                    }
                                }

                                $cc = 0;
                                foreach ($mmm as $ks => $me) {

                                    $combo_counter++;
                                    $submenuscat = $this->requestAction('restaurants/getMenucat/' . $me['Menu']['id']);
                                    //var_dump($submenuscat);
                                    if ($me['Menu']['price'] == 0 && count($submenuscat) > 0) {

                                        $me['Menu']['price'] = $this->requestAction('restaurants/get_price/' . $me['Menu']['id']);
                                        $me['Menu']['price'] = number_format($me['Menu']['price'], 2);
                                        $pr = $me['Menu']['price'] . "+";
                                    } else {
                                        $pr = number_format($me['Menu']['price'], 2);
                                    }
                                    ?>
                                    <?php
                                    if ($combo_counter == 1) {
                                        ?>

                                        <div class="modal  fade" id="Combo<?php echo $cat['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?php echo $me['Menu']['id'];?>Label" aria-hidden="true">
                                        <input type="hidden" class="combo_price<?php echo $cat['id'];?>"
                                               value="<?php echo $cat['price'];?>"/>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                if ($combo_counter == 1)
                                {
                                    ?>
                                    <div class="modal-dialog" style="width: 70%;">
                                    <div class="modal-content ">


                                    <div class="modal-header">
                                        <h3 style="float: left;"><?php echo $cat['title'];?> (<?php echo $cat['price']?>
                                            ) includes :</h3>
                                        <button type="button" class="close close<?php echo $cat['id'];?>"
                                                data-dismiss="modal" aria-hidden="true"
                                                id="clear_<?php echo $cat['id'];?>">x
                                        </button>
                                        <div class="clearfix"></div>
                                        <hr class="divider"/>
                                        <?php
                                            if ($cat['description']) {
                                                ?>

                                                <div class="col-sm-12" style="font-size: 15px;">

                                                    <?php if ($cat['description'] != 'undefined') echo $cat['description'];?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                        <hr class="divider"/>
                                    </div>
                                <?php
                                }
                                    ?>
                                    <?php
                                if ($combo_counter == 1)
                                {
                                    ?>

                                    <div class="modal-body">

                                <?php
                                }
                                    for ($ccd = 0; $ccd < $qty[$me['Menu']['id']]; $ccd++) {
                                        ?>

                                        <div
                                            style="margin-bottom: 10px;border:1px solid #eee;border-bottom:5px solid #eee;">
                                            <div class="col-sm-6" style="text-align: left;">
                                                <h3><?php echo $me['Menu']['menu_item'];?></h3>

                                                <p><?php if ($me['Menu']['description'] != 'undefined') echo $me['Menu']['description'];?></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <!--img src="<?php if ($me['Menu']['image'] && file_exists(APP . "webroot/images/menus/" . $me['Menu']['image'])) {
                                                    echo $this->webroot; ?>images/menus/<?php echo $me['Menu']['image'];
                                                } else {
                                                    echo $this->webroot . 'images/default.png';
                                                }?>"/-->
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="subitems_<?php echo $cat['id'];?> optionals"
                                                 style="position: static;<?php if (!$submenuscat) { ?>display:none;<?php }?>border:none;">
                                                <?php if ($cntr == 0) {
                                                    $cntr++; ?>
                                                    <input type="checkbox" class="chk" value=""
                                                           title="<?php echo $cat['id'] . "_[" . $cat['title'] . "]-_" . $cat['price'] . "_" . ""; ?>"
                                                           checked="checked" style="display: none;"/>
                                                <?php }?>
                                                <div class="clearfix space10"></div>
                                                <input type="checkbox" class="chk" value=""
                                                       title="<?php echo $me['Menu']['id'] . "_" . $me['Menu']['menu_item'] . "-_0_" . "";?>"
                                                       checked="checked" style="display: none;"/>
                                                <?php

                                                    $ch = 0;

                                                    foreach ($submenuscat as $subm) {

                                                        $ch++;?>


                                                        <div class="infolist col-xs-12"
                                                             style="border-right: 5px solid #CCC;margin-bottom: 10px;">
                                                            <input type="hidden"
                                                                   class="extra_no_<?php echo $subm['MenuCategory']['id'];?>"
                                                                   value="<?php echo $subm['MenuCategory']['itemno'];?>"/>
                                                            <input type="hidden"
                                                                   class="required_<?php echo $subm['MenuCategory']['id'];?>"
                                                                   value="<?php echo $subm['MenuCategory']['is_required'];?>"/>
                                                            <input type="hidden"
                                                                   class="multiple_<?php echo $subm['MenuCategory']['id'];?>"
                                                                   value="<?php echo $subm['MenuCategory']['is_multiple'];?>"/>
                                                            <input type="hidden"
                                                                   class="upto_<?php echo $subm['MenuCategory']['id'];?>"
                                                                   value="<?php echo $subm['MenuCategory']['up_to'];?>"/>
                                                            <input type="checkbox" class="chk" checked="checked"
                                                                   style="display: none;"
                                                                   id="<?php echo $subm['MenuCategory']['id'];?>"
                                                                   title="___"
                                                                   value="<?php echo $subm['MenuCategory']['title'];?>"/>
                                                            <a href="javascript:void(0);" <?php /*onclick="$($(this).parent().children('div:eq(0)')).toggle('slow'); $('.extra-<?php echo $subm['MenuCategory']['id'];?>').each(function(){$(this).removeAttr('checked');}) "*/
                                                            ?> ><strong><?php echo $subm['MenuCategory']['title'];?></strong></a> <?php if ($subm['MenuCategory']['description'] && $subm['MenuCategory']['description'] != 'undefined') { ?>:<?php }?>
                                                            <span><em> <?php echo $subm['MenuCategory']['description'];?></em></span>
                                                            &nbsp; &nbsp;

							<span style="color: #007FC5;">
                            <?php
                                if ($subm['MenuCategory']['up_to'] == 1)
                                    $upto = "up to ";
                                else
                                    $upto = "exactly ";
                                if ($subm['MenuCategory']['is_required'] == '0') {
                                    if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                        echo "(Select " . $upto . $subm['MenuCategory']['itemno'] . " Items) ";
                                    echo "(Optional)";

                                } elseif ($subm['MenuCategory']['is_required'] == '1') {
                                    if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                        echo "Select " . $upto . $subm['MenuCategory']['itemno'] . " Items ";

                                    echo "(Mandatory)";
                                }
                            ?></span>
                                                            <br/>
                                                            <span style="color: red; font-weight: bold;"
                                                                  class="error_<?php echo $subm['MenuCategory']['id'];?>"></span>

                                                            <div>
                                                                <?php
                                                                    $k = 0;
                                                                    foreach ($subm['Menu'] as $k => $m) {
                                                                        ?>
                                                                        <div class="subin">

                                                                            <?php if ($subm['MenuCategory']['is_multiple'] == '1') { ?>
                                                                                <div class="col-xs-12 "
                                                                                     style="padding-left:0px;">
                                                                                    <input type="checkbox" value=""
                                                                                           name="extra"
                                                                                           class="extra-<?php echo $subm['MenuCategory']['id']; ?> spanextra_<?php echo $m['id']; ?>"
                                                                                           title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title']; ?>"
                                                                                           id="extra_<?php echo $m['id']; ?>"/>&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                                                        echo $m['menu_item'];
                                                                                    } ?>
                                                                                    <b>
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;<a
                                                                                            href="javascript:;"
                                                                                            class="remspan btn btn-small btn-danger"
                                                                                            id="remspan_<?php echo $m['id']; ?>"
                                                                                            style="padding:0 8px;padding-bottom:3px;text-decoration: none; color: #fff;"
                                                                                            onclick=""><b>-</b></a>
                                                                                        <span
                                                                                            class="span_<?php echo $m['id']; ?> allspan"
                                                                                            id="sprice_<?php echo $m['price']; ?>">&nbsp;1&nbsp;</span>
                                                                                        <a href="javascript:;"
                                                                                           class="addspan btn btn-small btn-info"
                                                                                           id="addspan_<?php echo $m['id']; ?>"
                                                                                           onclick=""
                                                                                           style="padding:0 8px;padding-bottom:3px;text-decoration: none; color: #fff;"><b>+</b></a></b>
                                                                                </div>
                                                                            <?php } else {
                                                                                ?>
                                                                                <div class="col-xs-12 "
                                                                                     style="padding-left:0px;">
                                                                                    <input type="radio" value=""
                                                                                           name="extra_<?php echo $subm['MenuCategory']['id'] . $ccd;?>"
                                                                                           class="extra-<?php echo $subm['MenuCategory']['id'];?>"
                                                                                           title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title'];?>"
                                                                                           id="extra_<?php echo $m['id'];?>"/>&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                                                        echo $m['menu_item'];
                                                                                    }?>
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
                                                        if ($ch % 4 == 0) {
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
                                if ($combo_counter == count($mmm))
                                {
                                    ?>
                                    <div class="optionals" style="position: static;">
                                        <div class="col-xs-12 alignr">

                                            &nbsp;<a href="javascript:void(0);"
                                                     class="btn btn-info--transition add_combo_profile"
                                                     id="profilemenu<?php echo $cat['id'];?>"
                                                     style="float: right;margin-left: 10px;" style="">Add</a>&nbsp;
                                            <a href="javascript:void(0);" class="btn btn-primary--transition  clearall"
                                               id="clear_<?php echo $cat['id'];?>"
                                               style="float: right;margin-left:10px;">Clear</a>&nbsp;

                                            &nbsp;
                                            <button type="button" class="close" id="clear_<?php echo $cat['id'];?>"
                                                    data-dismiss="modal" aria-hidden="false"
                                                    style="opacity: 1; text-shadow:none;margin-left: 10px;">
                                                <a href="javascript:void(0)" class="btn btn-danger">Close</a>
                                            </button>
                                            &nbsp;
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
                                    if ($combo_counter == count($mmm)) {
                                        //echo count($res['Combo']);
                                        ?>



                                        </div>
                                    <?php
                                    }
                                    ?>






















                                <?php

                                }

                            }
                        ?>
















                        <?php
                            foreach ($rescat as $cat) {
                                ?>
    <h4 style="margin:0px;" class="sidebar__subtitle " id="category<?php echo $cat['MenuCategory']['id'];?>"><?php echo $cat['MenuCategory']['title'];?></h4>
    <?php
                                $ks = 0;
                                foreach ($cat['Menu'] as $ks => $me) {
                                    if (!$me['showmenu'])
                                        continue;
                                    $submenuscat = $this->requestAction('restaurants/getMenucat/' . $me['id']);
                                    //var_dump($submenuscat);
                                    if ($me['price'] == 0 && count($submenuscat) > 0) {

                                        $me['price'] = $this->requestAction('restaurants/get_price/' . $me['id']);
                                        $me['price'] = number_format($me['price'], 2);
                                        $pr = $me['price'] . "+";
                                    } else {
                                        $pr = number_format($me['price'], 2);
                                    }
                                    ?>

        <div class="col-xs-12 col-sm-4 menutile"
             style="margin-bottom:1px; padding:10px;background: #fcfcfc;border:1px solid #f4f4f4;border-bottom:5px solid #efefef;">




        <div class="menucl menu-title" style="text-align: center;">

            <div class="menucl" style="">
                <?php if (count($submenuscat) > 0) { ?>
                                        <a href="#Modal<?php echo $me['id']; ?>" role="button" data-toggle="modal">
                                            <center><img class="i menutileimg"
                                                         src="<?php if ($me['image'] && file_exists(APP . "webroot/images/menus/" . $me['image'])) {
                                                             echo $this->webroot; ?>images/menus/<?php echo $me['image'];
                                                         } else {
                                                             echo $this->webroot . 'images/default.png';
                                                         } ?>"/></center>
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a href="javascript:void(0);" class="add_menu_profile "
                                           id="profilemenu<?php echo $me['id'];?>">
                                            <center><img class="i menutileimg"
                                                         src="<?php if ($me['image'] && file_exists(APP . "webroot/images/menus/" . $me['image'])) {
                                                             echo $this->webroot; ?>images/menus/<?php echo $me['image'];
                                                         } else {
                                                             echo $this->webroot . 'images/default.png';
                                                         }?>"/></center>
                                        </a>
                                    <?php }?>
            </div>
            <div class="clearfix"></div>
            <div class="modal  fade" id="Modal<?php echo $me['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?php echo $me['id'];?>Label" aria-hidden="true">
                <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close close<?php echo $me['id'];?>" data-dismiss="modal" aria-hidden="true" id="clear_<?php echo $me['id'];?>">x</button>
                            <div class="clearfix"></div>

                        </div>
                        <div class="modal-body">
                            <div class="col-sm-6" style="text-align: left;padding:0px;">
                                <h3><?php echo $me['menu_item'] . " : $ " . $pr;?></h3>
                                <p><?php if ($me['description'] != 'undefined') echo $me['description'];?></p>
                            </div>
                            <div class="col-sm-6">
                                <!--img width="150" src="<?php if ($me['image'] && file_exists(APP . "webroot/images/menus/" . $me['image'])) {
                                        echo $this->webroot; ?>images/menus/<?php echo $me['image'];
                                    } else {
                                        echo $this->webroot . 'images/default.png';
                                    }?>" /-->
                            </div>
                            <div class="clearfix"></div>
                            <div class="subitems_<?php echo $me['id'];?> optionals" >
                                <!--<span class="topright"><a href="javascript:void(0)" onclick="$('#Modal<?php echo $me['id'];?>').toggle();"><strong class="btn btn-danger">x</strong></a></span>-->

                                <div class="clearfix space10"></div>
                                <input type="checkbox" class="chk" value="" title="<?php echo $me['id'] . "_" . $me['menu_item'] . "-_" . $me['price'] . "_" . "";?>" checked="checked" style="display: none;" />

                                <?php
                                    //var_dump($submenuscat);
                                    $ch = 0;
                                    foreach ($submenuscat as $key => $subm) {
                                        $ch++;?>

                                        <input type="hidden" id="extra_no_<?php echo $subm['MenuCategory']['id'];?>"
                                               value="<?php echo $subm['MenuCategory']['itemno'];?>"/>
                                        <input type="hidden" id="required_<?php echo $subm['MenuCategory']['id'];?>"
                                               value="<?php echo $subm['MenuCategory']['is_required'];?>"/>
                                        <input type="hidden" id="multiple_<?php echo $subm['MenuCategory']['id'];?>"
                                               value="<?php echo $subm['MenuCategory']['is_multiple'];?>"/>
                                        <input type="hidden" id="upto_<?php echo $subm['MenuCategory']['id'];?>"
                                               value="<?php echo $subm['MenuCategory']['up_to'];?>"/>
                                        <div class="infolist col-xs-12"
                                             style="border-right: 5px solid #CCC;margin-bottom:10px">
                                            <input type="checkbox" class="chk" checked="checked" style="display: none;"
                                                   id="<?php echo $subm['MenuCategory']['id'];?>" title="___"
                                                   value="<?php echo ($key != 0) ? "| " . $subm['MenuCategory']['title'] : $subm['MenuCategory']['title'];?>"/>
                                            <a href="javascript:void(0);" <?php /*onclick="$($(this).parent().children('div:eq(0)')).toggle('slow'); $('.extra-<?php echo $subm['MenuCategory']['id'];?>').each(function(){$(this).removeAttr('checked');}) "*/
                                            ?> ><strong><?php echo $subm['MenuCategory']['title'];?></strong></a> <?php if ($subm['MenuCategory']['description'] && $subm['MenuCategory']['description'] != 'undefined') { ?>:<?php }?>
                                            <span><em> <?php echo $subm['MenuCategory']['description'];?></em></span>


                                            <br/>

							<span>
                            <?php
                                if ($subm['MenuCategory']['up_to'] == 1)
                                    $upto = "up to ";
                                else
                                    $upto = "exactly ";
                                if ($subm['MenuCategory']['is_required'] == '0') {
                                    if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                        echo "Select " . $upto . $subm['MenuCategory']['itemno'] . " Items ";
                                    echo "(Optional)";

                                } elseif ($subm['MenuCategory']['is_required'] == '1') {
                                    if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                        echo "Select " . $upto . $subm['MenuCategory']['itemno'] . " Items ";

                                    echo "(Mandatory)";
                                }
                            ?></span>
                                            <br/>
                                            <span style="color: red; font-weight: bold;"
                                                  class="error_<?php echo $subm['MenuCategory']['id'];?>"></span>

                                            <div>
                                                <?php
                                                    $k = 0;
                                                    foreach ($subm['Menu'] as $k => $m) {
                                                        //if($k%3 == 0 ){
                                                        ?>
                                                        <div class="subin">
                                                            <?php //}
                                                            ?>
                                                            <?php if ($subm['MenuCategory']['is_multiple'] == '1') { ?>
                                                                <div class="col-xs-12 " style="padding-left:0px;">
                                                                    <input type="checkbox" value="" name="extra"
                                                                           class="extra-<?php echo $subm['MenuCategory']['id']; ?> spanextra_<?php echo $m['id']; ?>"
                                                                           title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title']; ?>"
                                                                           id="extra_<?php echo $m['id']; ?>"/>&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                                        echo $m['menu_item'];
                                                                    } ?> &nbsp;&nbsp;
                                                                    <b>
                                                                        <a href="javascript:;" class="remspan"
                                                                           id="remspan_<?php echo $m['id']; ?>"
                                                                           style="text-decoration: none; color: #fff;"
                                                                           onclick=""><b>
                                                                                &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                                        <span
                                                                            class="span_<?php echo $m['id']; ?> allspan"
                                                                            id="sprice_<?php echo $m['price']; ?>">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                                        <a href="javascript:;" class="addspan"
                                                                           id="addspan_<?php echo $m['id']; ?>"
                                                                           onclick=""
                                                                           style="text-decoration: none; color: #fff;"><b>
                                                                                &nbsp;&nbsp;+&nbsp;&nbsp;</b></a></b>
                                                                </div>
                                                            <?php } else {
                                                                ?>
                                                                <div class="col-xs-12 " style="padding-left:0px;">
                                                                    <input type="radio" value=""
                                                                           name="extra_<?php echo $subm['MenuCategory']['id'];?>"
                                                                           class="extra-<?php echo $subm['MenuCategory']['id'];?>"
                                                                           title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title'];?>"
                                                                           id="extra_<?php echo $m['id'];?>"/>&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                                        echo $m['menu_item'];
                                                                    }?>
                                                                </div>
                                                            <?php
                                                            }?>
                                                            <?php
                                                                //if(($k+1)%3==0)
                                                                //{
                                                            ?>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <?php
                                                        //}
                                                    }

                                                ?>


                                            </div>
                                        </div>
                                        <?php
                                        if ($ch % 4 == 0) {
                                            ?>
                                            <div class="clearfix"></div>
                                        <?php
                                        }
                                    }
                                    ?>
                                <div class="clearfix"></div>
                                <div class="col-xs-12 alignr">

                                    &nbsp;<a href="javascript:void(0);" class="btn btn-info--transition add_menu_profile" id="profilemenu<?php echo $me['id'];?>" style="float: right;margin-left: 10px;" style="">Add</a>&nbsp;
                                    <?php if (count($submenuscat) > 0) { ?>&nbsp;<a href="javascript:void(0);"
                                                                                    class="btn btn-primary--transition  clearall"
                                                                                    id="clear_<?php echo $me['id']; ?>"
                                                                                    style="float: right;margin-left:10px;">Clear</a>&nbsp;<?php }?>

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
            <?php if (count($submenuscat) > 0) { ?>
                                        <!--<a href="javascript:void(0);" onclick="$('.optionals:not(.subitems_<?php echo $me['id']; ?>)').hide();$('.subitems_<?php echo $me['id']; ?>').toggle('slow');">-->
                                        <div>
                                            <div class="col-xs-12 col-sm-9" style="padding: 0;"><a
                                                    href="#Modal<?php echo $me['id']; ?>" role="button"
                                                    data-toggle="modal"><strong><?php echo $me['menu_item']; ?></strong>:
                                                    $<span
                                                        class="profileprice<?php echo $me['id']; ?>"><?php echo $pr; ?></span></a>
                                            </div>
                                            <div class="col-xs-12 col-sm-3"><a href="#Modal<?php echo $me['id']; ?>"
                                                                               role="button" data-toggle="modal"><span
                                                        class="glyphicon glyphicon-move"></span></a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php
                                    } else {
                                        ?>
                                        <div>
                                            <div class="col-xs-12 col-sm-9" style="padding: 0;"><a
                                                    href="javascript:void(0);" class="add_menu_profile "
                                                    id="profilemenu<?php echo $me['id'];?>">
                                                    <strong><?php echo $me['menu_item'];?></strong>: $<span
                                                        class="profileprice<?php echo $me['id'];?>"><?php echo $pr;?></span></a>
                                            </div>
                                            <div class="col-xs-12 col-sm-3"><a href="#Modal<?php echo $me['id'];?>"
                                                                               role="button" data-toggle="modal"><span
                                                        class="glyphicon glyphicon-move"></span></a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php
                                    }?>
                                    <?php //echo $me['description'];
                                    ?>
        </div>

        <div class="clearfix space10"></div>

        <!-- Sub Categories -->
        <!--
                <div class="subitems_<?php echo $me['id'];?> optionals" style="display: none;">
                <span class="topright"><a href="javascript:void(0)" onclick="$('.subitems_<?php echo $me['id'];?>').toggle();"><strong class="btn btn-danger">x</strong></a></span>
				<p>Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here </p>
                <div class="clearfix space10"></div>
                    <input type="checkbox" class="chk" value="" title="<?php echo $me['id'] . "_" . $me['menu_item'] . "_" . $me['price'] . "_" . "";?>" checked="checked" style="display: none;" />
                    <?php
                                    //var_dump($submenuscat);
                                    $ch = 0;
                                    foreach ($submenuscat as $subm) {
                                        $ch++;?>

                            <input type="hidden" id="extra_no_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['itemno'];?>" />
                            <input type="hidden" id="required_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_required'];?>" />
                            <input type="hidden" id="multiple_<?php echo $subm['MenuCategory']['id'];?>" value="<?php echo $subm['MenuCategory']['is_multiple'];?>" />
                            <div class="infolist col-xs-12  col-sm-4" style="border-right: 5px solid #CCC;min-height:200px;" >
                            <input type="checkbox" class="chk" checked="checked" style="display: none;" id="<?php echo $subm['MenuCategory']['id'];?>" title="___" value="<?php echo $subm['MenuCategory']['title'];?>" />
                            <a href="javascript:void(0);" <?php /*onclick="$($(this).parent().children('div:eq(0)')).toggle('slow'); $('.extra-<?php echo $subm['MenuCategory']['id'];?>').each(function(){$(this).removeAttr('checked');}) "*/
                                        ?> ><strong><?php echo $subm['MenuCategory']['title'];?></strong></a>
                              <br />
							<span>
                            <?php if ($subm['MenuCategory']['is_required'] == '0') {
                                            if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                                echo "SELCET " . $subm['MenuCategory']['itemno'] . " ITEMS ";
                                            echo "Optional";

                                        } elseif ($subm['MenuCategory']['is_required'] == '1') {
                                            if ($subm['MenuCategory']['itemno'] > 0 && $subm['MenuCategory']['is_multiple'] == '1')
                                                echo "SELCET " . $subm['MenuCategory']['itemno'] . " ITEMS ";

                                            echo "Mandatory";
                                        }
                                        ?></span>
                              <br />
                              <span style="color: red; font-weight: bold;" id="error_<?php echo $subm['MenuCategory']['id'];?>"></span>

                              <div>
                                <?php
                                        $k = 0;
                                        foreach ($subm['Menu'] as $k => $m) {
                                            //if($k%3 == 0 ){
                                            ?>
                                      <div class="subin">
                                <?php //}
                                            ?>
                                        <?php if ($subm['MenuCategory']['is_multiple'] == '1') { ?>
                                       <div class="col-xs-12 "  style="padding-left:0px;" >
                                            <input type="checkbox" value="" name="extra" class="extra-<?php echo $subm['MenuCategory']['id']; ?>" title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title']; ?>" id="extra_<?php echo $m['id']; ?>" />&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', '0.00'), 2) . ")";
                                            } ?>
                                       </div>
                                       <?php } else {
                                                ?>
                                        <div class="col-xs-12 " style="padding-left:0px;" >
                                            <input type="radio" value="" name="extra_<?php echo $subm['MenuCategory']['id'];?>" class="extra-<?php echo $subm['MenuCategory']['id'];?>" title="<?php echo $m['id'] . "_" . $m['menu_item'] . "_" . $m['price'] . "_" . $subm['MenuCategory']['title'];?>" id="extra_<?php echo $m['id'];?>" />&nbsp;&nbsp;<?php if ($m['price']) echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', $m['price']), 2) . ")"; else {
                                                    echo $m['menu_item'] . "  (+ $" . number_format(str_replace('$', '', '0.00'), 2) . ")";
                                                }?>
                                        </div>
                                       <?php
                                            }?>
                                 <?php
                                            if (($k + 1) % 3 == 0)
                                                //{
                                                ?>
                                         <div class="clearfix"></div>
                                        </div>
                                     <?php
                                            //}
                                        }
                                        /*
                                        if($k%3==0)
                                        {
                                            ?>
                                            <div class="col-xs-12 col-sm-4"></div>
                                            <div class="col-xs-12 col-sm-4"></div>
                                            <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        }
                                        if($k%3==1)
                                        {
                                            ?>

                                            <div class="col-xs-12 col-sm-4"></div>
                                            <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        }*/
                                        ?>


                           </div>
                         </div>
                    <?php
                                        if ($ch % 3 == 0) {
                                            ?>
                        <div class="clearfix"></div>
                        <?php
                                        }
                                    }

                                    ?>
                    <div class="clearfix"></div>
                   <div class="menucl menu-act col-xs-12 alignr">
                    <a href="javascript:void(0)" class="btn btn-primary--transition  clearall" id="clear_<?php echo $me['id'];?>" >Clear</a>
                    <a href="javascript:void(0)" class="btn btn-primary--transition add_menu_profile" id="profilemenu<?php echo $me['id'];?>">Add</a></div>
                </div>-->
        <!-- Sub End-->



        </div>
        </a>
        <?php
                                    if (($ks + 1) % 3 == 0) {
                                        ?>
                                        <div class="clearfix"></div>



                                    <?php
                                    }
                                }
                                if ($ks % 3 == 0) {
                                    ?>
                                    <div class="col-xs-12 col-sm-4"></div>
                                    <div class="col-xs-12 col-sm-4"></div>
                                    <div class="clearfix"></div>

                                <?php
                                }
                                if ($ks % 3 == 1) {
                                    ?>

                                    <div class="col-xs-12 col-sm-4"></div>
                                    <div class="clearfix"></div>

                                <?php
                                }
                                ?>
    <div class="clearfix"></div>
    <hr />
<?php
                            }
                        ?>

                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="scr-fixed">
                            <form
                                action="<?php echo $this->webroot; ?>restaurants/order/<?php echo $res['Restaurant']['id']; ?><?php if ($order) { ?>/<?php echo $order['Reservation']['id'];
                                } ?>" method="post"
                                onsubmit="if($('input.subtotal').val()=='0.00'){$('.error_order').show(function(){$('.error_order').fadeOut(5000);});return false;}else if( (Number($('input.subtotal').val()) < Number(<?php echo $res['Restaurant']['min_delivery']; ?>) ) && $('input[name=order_type]:checked').val()== 'delivery' ){ $('.error_delivery').show(function(){$('.error_delivery').fadeOut(5000);});return false;}">
                                <?php
                                    if ($order) {
                                        $menu_ids = $order['Reservation']['menu_ids'];
                                        $qtys = $order['Reservation']['qtys'];
                                        $arr_m = explode(',', $menu_ids);
                                        $arr_qty = explode(',', $qtys);
                                        $arr_extras = explode(',', $order['Reservation']['extras']);
                                        $list_ids = explode(',', $order['Reservation']['listid']);
                                        $prices = explode(',', $order['Reservation']['prs']);
                                        $order_type = $order['Reservation']['order_type'];
                                    } else
                                        $order_type = 'Pickup';
                                    //var_dump($list_ids);
                                ?>
                                <h5 class="sidebar__subtitle">Order Receipt</h5>

                                <div class="tab-content">

                                    <div id="" class="">

                                        <p class="tab-text">
                                        <ul class="listnone">
                                            <li class="active">
                                                <input type="radio"
                                                       name="order_type" <?php if ($order_type == 'Pickup') echo "checked='checked'"; ?>
                                                       value="Pickup"
                                                       onchange="if($(this).is(':checked')){$('.df').val('0');$('#df').hide(); var tax = $('.tax').text();var grandtotal = 0; var subtotal = $('.subtotal').text(); grandtotal = Number(grandtotal)+Number(tax)+Number(subtotal);  $('.grandtotal').text(grandtotal.toFixed(2));$('.grandtotal').val(grandtotal.toFixed(2)); }"/>
                                                Pickup
                                            </li>
                                            <li class="">
                                                <input
                                                    type="radio" <?php if ($order_type == 'delivery') echo "checked='checked'"; ?>
                                                    name="order_type" value="delivery"
                                                    onchange="if($(this).is(':checked')){$('#df').show(); var df ='<?php echo number_format(str_replace('$', '', $res['Restaurant']['delivery_fee']), '2'); ?>'; var tax = $('.tax').text(); var grandtotal = 0;var subtotal = $('.subtotal').text();  grandtotal = Number(grandtotal)+Number(df)+Number(subtotal)+Number(tax);  $('.df').val(df);$('.grandtotal').text(grandtotal.toFixed(2));$('.grandtotal').val(grandtotal.toFixed(2)); }"/>
                                                For Delivery
                                            </li>

                                        </ul>
                                        <div class="orders" id="clearorder"
                                             <?php if ($order && count($arr_m) > 0){ ?>style="overflow-y:scroll;height:260px;"<?php } ?>>

                                            <?php
                                                if ($order) {

                                                    foreach ($arr_m as $k => $me) {
                                                        $menu = $menus->findById($me);
                                                        $x = str_replace(array("% ", ':'), array(" ", ': '), $arr_extras[$k]);
                                                        $x = str_replace("%", ",", $x);
                                                        if (is_numeric($me)) {
                                                            $m = $menus->findById($me);
                                                            $tt = $m['Menu']['menu_item'];
                                                        } else {
                                                            $m = $combo1->findById(str_replace("C_", " ", $me));
                                                            $tt = $m['Combo']['title'];
                                                        }
                                                        ?>
                                                        <div id="list<?php echo $list_ids[$k];?>" class="infolist">
                                                            <strong
                                                                class="namemenu"><?php echo str_replace(":", ": ", $tt) . " " . $x;?></strong>

                                                            <div class="left">
                                                                <a id="dec<?php echo $list_ids[$k];?>"
                                                                   class="decrease small btn btn-danger"
                                                                   href="javascript:void(0);"
                                                                   style="padding: 6px;height: 20px;line-height: 6px">
                                                                    <strong>-</strong> &nbsp;
                                                                </a>
                                                                <span class="count"><?php echo $arr_qty[$k];?></span>
                                                                &nbsp;
                                                                <a id="inc<?php echo $list_ids[$k];?>"
                                                                   class="increase btn btn-success small "
                                                                   href="javascript:void(0);"
                                                                   style="padding: 6px;height: 20px;line-height: 6px">
                                                                    <strong>+</strong></a> &nbsp;
                                                                <input type="hidden" class="count" name="qtys[]"
                                                                       value="<?php echo $arr_qty[$k];?>"/>
                                                                <input type="hidden" class="menu_ids" name="menu_ids[]"
                                                                       value="<?php echo $me;?>"/>
                                                                <input type="hidden" name="extras[]"
                                                                       value="<?php echo $arr_extras[$k];?>"/>
                                                                <input type="hidden" name="listid[]"
                                                                       value="<?php echo $list_ids[$k];?>"/>
                                                                <input type="hidden" class="prs" name="prs[]"
                                                                       value="<?php echo str_replace('$', '', $prices[$k]);?>"/>
                                                                X $
                                                                <span
                                                                    class="amount"><?php echo number_format(str_replace('$', '', $prices[$k]), 2);?></span>
                                                            </div>
                                                            <div class="right">
                                                                <strong>
                                                                    $
                                                                    <span
                                                                        class="total"><?php echo number_format((str_replace('$', '', $prices[$k]) * $arr_qty[$k]), 2);?></span>
                                                                </strong>

                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    <?php
                                                    }

                                                }
                                            ?>

                                        </div>

                                        </p>
                                        <hr class="shop__divider"/>
                                        <div class="totals">
                                            <strong>Subtotal&nbsp;</strong>:&nbsp;$<span
                                                class="subtotal"><?php if ($order) {
                                                    echo $order['Reservation']['subtotal'];
                                                } else { ?>0.00<?php } ?></span>
                                            <input type="hidden" value="<?php if ($order) {
                                                echo $order['Reservation']['subtotal'];
                                            } else { ?>0.00<?php } ?>" class="subtotal" name="subtotal"/>

                                            <br/>

                                            <strong>Tax&nbsp;</strong>:&nbsp;$<span class="tax"><?php if ($order) {
                                                    echo $order['Reservation']['tax'];
                                                } else { ?>0.00<?php } ?></span>&nbsp;(<span
                                                id="tax"><?php echo str_replace('$', '', $res['Restaurant']['tax']); ?></span>%)
                                            <input type="hidden" class="tax" name="tax" value="<?php if ($order) {
                                                echo $order['Reservation']['tax'];
                                            } else { ?>0.00<?php } ?>"/>
                                            <br/>
                        <span id="df" style="display: none;">
                        <strong>Delivery
                            Fee&nbsp;</strong>:&nbsp;$<?php echo number_format(str_replace('$', '', $res['Restaurant']['delivery_fee']), 2); ?>
                            <input type="hidden" name="delivery_fee" class="df"
                                   value="<?php if ($order) echo str_replace('$', '', $res['Restaurant']['delivery_fee']); else echo "0.00"; ?>"/>
                         <br/>
                        </span>
                                            <strong>Total</strong>&nbsp;:&nbsp;$<span
                                                class="grandtotal"><?php if ($order) {
                                                    echo $order['Reservation']['g_total'];
                                                } else {
                                                    echo "0.00";
                                                } ?></span>
                                            <input type="hidden" value="<?php if ($order) {
                                                echo $order['Reservation']['g_total'];
                                            } else {
                                                echo '0.00';
                                            } ?>" class="grandtotal" name="g_total"/>
                                            <br/>
                                            <br/>

                                        </div>
                                        <div class="submits">
                                            <div style="float:left;"><input
                                                    <?php if ($closed){ ?>disabled="disabled"<?php } ?> type="submit"
                                                    value="Submit Order" class="btn btn-success"
                                                    style="font-size:11px !important;margin-bottom:5px;margin-right:10px;width:131px;"/>
                                            </div>
                                            <div style="float:left;"><a href="" class="btn btn-notice"
                                                                        style="color: #777;border:1px solid #ddd;width:131px;margin-bottom: 5px;font-size:11px">Start
                                                    Over</a></div>
                                            <div class="clearfix"></div>

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="error_order" style="display: none;margin-top:5px;color:red;">Order
                                            can't be blank
                                        </div>
                                        <div class="error_delivery" style="display: none;margin-top:5px;color:red;">
                                            Minimum amount for delivery is
                                            $<?php echo $res['Restaurant']['min_delivery']; ?> </div>

                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>



<script>
    function changetitle(type, id) {
    }
</script>
