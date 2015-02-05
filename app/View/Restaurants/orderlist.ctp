
<strong class="namemenu"><?php echo $menu['Menu']['menu_item'];?></strong>
<div class="left">
<a id="dec<?php echo $menu['Menu']['id'];?>" class="decrease small btn btn-danger" href="javascript:void(0);">
<strong>-</strong>
</a>
<span class="count">1</span>
<input type="hidden" class="count" name="qtys[]" value="1" />
<input type="hidden" class="menu_ids" name="menu_ids[]" value="<?php echo $menu['Menu']['id'];?>" />
<input type="hidden" class="prs" name="prs[]" value="<?php echo str_replace('$','',$menu['Menu']['price']);?>" />
X $
<span class="amount"><?php echo number_format(str_replace('$','',$menu['Menu']['price']),2);?></span>
</div>
<div class="right">
<strong>
$
<span class="total"><?php echo number_format(str_replace('$','',$menu['Menu']['price']),2);?></span>
</strong>
<a id="inc<?php echo $menu['Menu']['id'];?>" class="increase btn btn-success small " href="javascript:void(0);">
<strong>+</strong>
</a>
</div>
<div class="clearfix"></div>
