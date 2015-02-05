<?php
$rand =  rand(100000000000,999999999999);
$rand2 =  rand(100000000000,999999999999);
$rand3 =  rand(100000000000,999999999999);

if($rand<0)
$rand = $rand*-1; 
?>
<div class="addopt" id="addopt_<?php echo $rand;?>" style="border:1px solid #DDD;padding:5px;">         
<div class="infolist2">
<div class="col-xs-12" style="padding-left: 0;padding-right:0;">
    <div class="col-xs-12 col-sm-12" style="padding-left: 0;padding-right:0;">
        <div class="col-xs-12 col-sm-8" style="padding-left: 0;padding-right:0;"><strong>Additional Items</strong></div><div class="col-xs-12 col-sm-4" style="padding-right: 0;text-align: right;"><a id="deletein<?php if(isset($cats_in))echo $cats_in['MenuCategory']['id'];?>" href="javascript:void(0)" class="rm btn btn-danger deletein">Delete</a></div><div class="clearfix"></div>
        <input type="text" id="<?php if(isset($cats_in)){echo 'sc'.$cats_in['MenuCategory']['id']; }?>" value="<?php if(isset($cats_in))echo $cats_in['MenuCategory']['title'];?>" placeholder="Category Name" class="addsubcat"/>
        <textarea class="myinputs scd" placeholder="Description" id="<?php if(isset($cats_in)){echo 'scd'.$cats_in['MenuCategory']['id']; }?>"><?php if(isset($cats_in))echo $cats_in['MenuCategory']['description'];?></textarea>
    </div>
    
    </div>
    <div class="clearfix"></div>
</div>
<?php
if(isset($cats_in)){
if($cats_in['Menu']){    
foreach($cats_in['Menu'] as $menu_in){
?>                                   
<div class="infolist">
    <div class="col-xs-12 col-sm-7">
    <strong>Item Name</strong>
    <input class="additems"  type="text" value="<?php echo $menu_in['menu_item'];?>" name="option[]" placeholder="" />
    </div>
    <div class="col-xs-12 col-sm-3">
        <strong>Price</strong>
        <input class="addprice" type="text" value="$<?php echo number_format($menu_in['price'],2);?>" name="option[]" placeholder="" />
    </div>
    <div class="col-xs-12 col-sm-2"><a onclick="$(this).parent().parent().remove();" href="javascript:void(0)" class="btn btn-danger" style="padding: 2px 7px;margin-top:29px;" >x</a></div>
    <div class="clearfix"></div>
    
</div>
<?php
}}
?>
<span id="action<?php echo $rand;?>"><a href="javascript:void(0)" class="addmore editmore btn btn-warning" id="addmore<?php echo $rand;?>" >+ Add More</a></span>
<div class="radios">
    <strong>These items are:</strong>
    <div class="infolist"><input <?php if($cats_in['MenuCategory']['is_required']==0){?>checked="checked"<?php }else{if(!isset($cats_in['MenuCategory']['is_required'])){?>checked="checked"<?php }}?> type="radio" name="r2_<?php echo $rand;?>" value="0" class="is_required" /> <strong>Optional</strong>&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" <?php if($cats_in['MenuCategory']['is_required']==1){?>checked="checked"<?php }?> name="r2_<?php echo $rand;?>" class="is_required" value="1" /> <strong>Required</strong></div>
    <strong>Customer can select:</strong>
    <div class="infolist"><input <?php if($cats_in['MenuCategory']['is_multiple']==0){?>checked="checked"<?php }else{if(!isset($cats_in['MenuCategory']['is_multiple'])){?>checked="checked"<?php }}?> type="radio" name="r1_<?php echo $rand;?>" value="0" class="is_multiple" /> <strong>Single</strong>&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" <?php if($cats_in['MenuCategory']['is_multiple']==1){?>checked="checked"<?php }?> name="r1_<?php echo $rand;?>" class="is_multiple" value="1" /> <strong>Multiple</strong></div>    
    <div class="infolist exact" style="<?php if(isset($cats_in['MenuCategory']['is_multiple']) && !$cats_in['MenuCategory']['is_multiple']){?>display: none;<?php }else{if(!isset($cats_in['MenuCategory']['is_multiple'])){?>display:none;<?php }}?>"><div><div class="col-xs-12 col-sm-6" style="padding-left:0;"><strong>Enter # of items</strong></div><div class="col-xs-12 col-sm-6"><input name="<?php echo $rand2;?>" type="radio" value="1" class="up_to <?php if(!isset($cats_in['MenuCategory']['up_to'])){?>up_to_selected<?php }else{if($cats_in['MenuCategory']['up_to']){?>up_to_selected<?php }}?>" <?php if(!isset($cats_in['MenuCategory']['up_to'])){?>checked="checked"<?php }else{if($cats_in['MenuCategory']['up_to']){?>checked="checked"<?php }}?>/> Up to &nbsp; <input name="<?php echo $rand2;?>" type="radio" value="0" class="up_to <?php if(isset($cats_in['MenuCategory']['up_to']) && !$cats_in['MenuCategory']['up_to']){?>up_to_selected<?php }?>" <?php if(isset($cats_in['MenuCategory']['up_to']) && !$cats_in['MenuCategory']['up_to']){?>checked="checked"<?php }?>/> Exactly</div><div style="clear:both;"></div></div><input <?php if(isset($cats_in['MenuCategory']['itemno']) && $cats_in['MenuCategory']['itemno']){?>value="<?php echo $cats_in['MenuCategory']['itemno'];?>"<?php }else{?>value="0"<?php }?> type="text" class="itemno"  id="itemno<?php echo $rand;?>" /></div>
    <input type="hidden" name="is_multiple" value="<?php echo $cats_in['MenuCategory']['is_multiple']; ?>" class="multi" />
    <input type="hidden" name="is_required" value="<?php echo $cats_in['MenuCategory']['is_required']; ?>" class="is_req" />
</div>
<?php
}
else
{
    ?>
    <div class="infolist">
    <div class="col-xs-12 col-sm-7">
        <strong>Item Name</strong>
        <input class="additems"  type="text" name="option[]" placeholder="" />
    </div>
    <div class="col-xs-12 col-sm-3">
        <strong>Price</strong>
        <input class="addprice" type="text" name="option[]" placeholder="" />
    </div>
    <div class="col-xs-12 col-sm-2"><a onclick="$(this).parent().parent().remove();" href="javascript:void(0)" class="btn btn-danger" style="padding: 2px 7px;" >x</a></div>
    <div class="clearfix"></div>
    
</div>
<span id="action<?php echo $rand;?>"><a href="javascript:void(0)" class="addmore btn btn-warning" id="addmore<?php echo $rand;?>" >+ Add More</a></span>
<div class="radios">
    <strong>These items are:</strong>
    <div class="infolist"><input checked="checked" type="radio" name="r2_<?php echo $rand;?>" value="0" class="is_required" /> <strong>Optional</strong>&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" name="r2_<?php echo $rand;?>" class="is_required" value="1" /> <strong>Required</strong></div>
    <strong>Customer can select:</strong>
    <div class="infolist"><input checked="checked" type="radio" name="r1_<?php echo $rand;?>" value="0" class="is_multiple" /> <strong>Single</strong>&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" name="r1_<?php echo $rand;?>" class="is_multiple" value="1" /> <strong>Multiple</strong></div>    
    <div class="infolist exact" style="display: none;"><div><div class="col-xs-12 col-sm-6" style="padding-left:0;"><strong>Enter # of items</strong></div><div class="col-xs-12 col-sm-6"><input name="<?php echo $rand3;?>" type="radio" value="1" class="up_to up_to_selected" checked="checked"/> Up to &nbsp; <input name="<?php echo $rand3;?>" type="radio" value="0" class="up_to"/> Exactly</div><div style="clear:both;"></div></div><input type="text" class="itemno"  id="itemno<?php echo $rand;?>" /></div>
    <input type="hidden" name="is_multiple" value="0" class="multi" />
    <input type="hidden" name="is_required" value="0" class="is_req" />
</div>
    <?php
}
?>
    
</div>