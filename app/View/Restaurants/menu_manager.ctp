<div class="breadcrumbs">
<div class="container">
<div class="row">
<div class="col-xs-12">
<nav>
<ol class="breadcrumb">

<li><a href="<?php echo $this->webroot;?>/restaurants/dashboard">Dashboard</a></li>

<li><a href="">Menu manager</a></li>

</ol>
</nav>
</div>
</div>
</div>
</div>

<div class="container">
<!-- Big banner -->
<div class="row">
<div class="col-xs-12">
<div class="push-down-30">
<div class="banners--big">
Welcome, <?php echo $this->Session->read('name');?>
</div>
</div>
</div>
</div>
<div class="row">
<?php include('subpages/admin_menu.php')?>
<div class="col-xs-12  col-sm-9">
<div class="grid">
<h3 class="sidebar__title">Menu Manager</h3>
<hr class="shop__divider">
<div class="dashboard">

<div class="">



<div class="banners--big  banners--big-left clearfix">
<div class="row">
<div class="col-xs-12  col-md-6">

Start by adding a Category

</div>
<div class="col-xs-12  col-md-6">
<div class="banners--big__form">
<form action="" method="post" class="addcat">
<div class="form-group  form-group--form">

      <input required class="form-control  form-control--form"  type="text" placeholder="Category Title" name="cattitle" />

<input type="submit" value="Add" class="btn btn-darker" />

</div>
</form>
</div>
</div>
</div>
</div>



<div class="col-xs-12 col-sm-12">
<form action="" method="post" class="addcat">
</form>
</div>




<div class="clearfix"></div>
<div class="col-xs-12 col-sm-12">
<ul class="parentinfo">
<?php
foreach($cat as $cats)
{
    ?>
    <li class="infolistwhite row" id="catid<?php echo $cats['MenuCategory']['id'];?>" style="padding-bottom:0px;">
        
        <div class="col-xs-12 col-sm-4 cattitle<?php echo $cats['MenuCategory']['id'];?>" style="padding-top:7px;">

        <?php if($cats['MenuCategory']['cat_image']){?>
        <div class="col-sm-1" style="padding: 0;"><img style="max-width: 100%;" src="<?php echo $this->webroot;?>images/category/<?php echo $cats['MenuCategory']['cat_image'];?>"  /></div>
<?php }?>

        <div class="<?php if($cats['MenuCategory']['cat_image']){?>col-sm-8<?php }?>"><h4  class="sidebar__title" ><?php echo $cats['MenuCategory']['title'];?></h4></div>

        <div class="clearfix"></div>

        </div>

        <div class="col-xs-12 col-sm-8 marbot icon-move">
<a href="javascript:void(0)" id="editcat<?php echo $cats['MenuCategory']['id'];?>" onclick="$('.cattitle<?php echo $cats['MenuCategory']['id'];?>').html('<input class=\'myinputs catetitle<?php echo $cats['MenuCategory']['id'];?>\' type=\'text\' value = \'<?php echo $cats['MenuCategory']['title'];?>\'/><a href\'javascript:void(0);\' class=\'btn btn-success changeme\' id=\'change<?php echo $cats['MenuCategory']['id'];?>\'>Save</a>');$('#item<?php echo $cats['MenuCategory']['id'];?>').hide();" class="btn btn-success">Edit Category</a>
<a href="javascript:void(0)" id="addmenucat<?php echo $cats['MenuCategory']['id'];?>" class="btn btn-darker" onclick="$('#item<?php echo $cats['MenuCategory']['id']?>').show();$('.cattitle<?php echo $cats['MenuCategory']['id'];?>').html('<h3 class=\'sidebar__title\'><?php echo $cats['MenuCategory']['title'];?></h3>');clear_all('<?php echo $cats['MenuCategory']['id'];?>');">Add Item</a>
        <a href="javascript:void(0)" id="addimgcat<?php echo $cats['MenuCategory']['id'];?>" class="btn btn-info addimgcat">Add Image</a>
<a href="javascript:void(0)" id="deletecat<?php echo $cats['MenuCategory']['id'];?>" class="deletecat btn btn-danger">Delete</a>

        <span style="display: block;float:right;padding-top:7px;"><a href="javascript:void(0)" onclick="$('.parent<?php echo $cats['MenuCategory']['id'];?>').toggle();"><img style="width: 15px;" src="<?php echo $this->webroot?>img/move.png" /></a></span>

        <div style="clear: both;"></div>
</div>

        <div class="clearfix"></div>



        <div class="col-xs-12 col-sm-8 addmenu" style="display: none;margin-bottom:10px;" id="item<?php echo $cats['MenuCategory']['id'];?>">
            <div class="menu_item">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" class="menu_item_name" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" class="price" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" class="description" placeholder="" /></div>
                <div class="clearfix"></div>
                <input type="hidden" name="cat_id" class="cat_id" value="<?php $cats['MenuCategory']['id'];?>" />
                <input type="button" class="opt btn btn-info" onclick="$(this).parent().find('.radios').show();$('.hasopt<?php echo $cats['MenuCategory']['id'];?>').val(1);if($('#addopt<?php echo $cats['MenuCategory']['id'];?>').attr('style')=='display: none;'){$('#addopt<?php echo $cats['MenuCategory']['id'];?>').show();}else{$('#addopt<?php echo $cats['MenuCategory']['id'];?>').attr('style','display: none;');}$('#addopt<?php echo $cats['MenuCategory']['id'];?>').load('<?php echo $this->webroot;?>restaurants/optional/<?php echo $cats['MenuCategory']['id'];?>');" value="Has additional Items" />
                <input type="hidden" name="has_opt" value="0" class="hasopt<?php echo $cats['MenuCategory']['id'];?>" />
                
                 
                <div class="optional" id="addopt<?php echo $cats['MenuCategory']['id'];?>" style="display: none;">
                </div>
                
                <a href="javascript:void(0);" id="itemadd<?php echo $cats['MenuCategory']['id'];?>" class="btn btn-primary addmenubtn">Add</a>
                
            </div>
            
        </div>
        <div class="clearfix">
</div>


        <ul class="parentinfo2 parent<?php echo $cats['MenuCategory']['id'];?>" style="display: none;">
        <?php

        foreach($cats['Menu'] as $ms)
        {
            $query = $menu_s->findById($ms['id']);
            $me = $query['Menu'];
            ?>

            <li class="infolist infolist2 row" id="menu_list_<?php echo $me['id'];?>">
                <div class="col-xs-12 col-sm-3" style="margin-top:8px;">
                    <div style="width: 60%;float:right"><strong><?php echo $me['menu_item'];?></strong></div>
                    <div style="width: 37%;float:left"><span style="display:inline;" class="imgmenu" id="img<?php echo $me['id'];?>"><?php if($me['image']){?><img src="<?php echo $this->webroot;?>images/menus/<?php echo $me['image'];?>" style="max-width: 100%;" /><?php }?></span></div>
                    <div class="clearfix"></div>
                </div>
                <div  style="margin-top:8px;" class="col-xs-12 col-sm-1"><em>$<?php echo number_format($me['price'],2);?></em></div>
                <div  style="margin-top:8px;" class="col-xs-12 col-sm-3"><em><?php echo $me['description'];?></em></div>
                <div class="col-xs-12 col-sm-5">
                        <a href="javascript:void(0)" onclick="$('.item<?php echo $me['id'];?>').show();" id="editmenu<?php echo $me['id'];?>" class="btn btn-success">Edit</a>
                        <a href="javascript:void(0)" id="uploadimage<?php echo $me['id'];?>" class="uploadimg btn btn-info">Add Image</a>
                        <a href="javascript:void(0)"  id="deletemenu<?php echo $me['id'];?>" class="btn btn-danger deletemenu">Delete</a>
                        <br /><input type="checkbox" id="showmenu<?php echo $me['id'];?>" class="showmenu" <?php if($me['showmenu']){?>checked="checked"<?php }?> /> <strong>Show Menu</strong>
                </div>
                <div class="clearfix"></div>
                <div class="menu_item item<?php echo $me['id']?> col-xs-12 col-sm-8" style="display: none;margin-top:10px;">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" placeholder="" value="<?php echo $me['menu_item'];?>" id="menuname<?php echo $me['id'];?>" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" placeholder="" value="$<?php echo number_format($me['price'],2);?>" id="menuprice<?php echo $me['id'];?>" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" placeholder="" value="<?php echo str_replace('"',"'",$me['description']);?>" id="menudesc<?php echo $me['id'];?>" /></div>
                <div class="clearfix"></div>
                
                
                <input type="hidden" name="cat_id" value="<?php echo $cats['MenuCategory']['id'];?>" id="menucat<?php echo $me['id'];?>" />
                
                <input type="button" class="opt btn btn-info" onclick="$('#had_opt<?php echo $me['id'];?>').val(1);$('#addopt_item_<?php echo $me['id'];?>').toggle();if($('#addopt_item_<?php echo $me['id'];?>').html()=='')$('#addopt_item_<?php echo $me['id'];?>').load('<?php echo $this->webroot;?>restaurants/optionalM/<?php echo $me['id'];?>');" value="Show additional Items" />
                
                <?php
                if($query['MenuCategory'])
                {
                ?>
                
                <?php
                $ss = 0;
                foreach($query['MenuCategory'] as $scats){
                    
                    if(is_array($scats))
                    {
                        $ss++;
                        if($ss==1)
                        {
                        ?>
                        <input type="hidden" name="has_opt" value="1" id="had_opt<?php echo $me['id'];?>" />
                        <div class="optional" id="addopt_item_<?php echo $me['id'];?>" style="">
                        <?php }
                            echo $this->requestAction('/restaurants/optional_in/'.$scats['id']);
                            
                            ?>
                            
                            <?php
                        
                    }
                    
                }
                if($ss==0)
                {
                    ?>
                    <input type="hidden" name="has_opt" value="1" id="had_opt<?php echo $me['id'];?>" />
                    <div class="optional" id="addopt_item_<?php echo $me['id'];?>" style="display:none;"></div>
                    <?php
                }
                else
                if($ss>0)
                    {
                        ?>
                        <a href="javascript:void(0)" class="addmoresubM btn btn-warning" id="subM<?php if(isset($me['id']))echo $me['id'];?>" >+ Add Sub Category</a>
                        </div>
                        <?php
                    }
                ?>
                
                <?php }
                
                ?>
                <button class="btn btn-primary savemenu" id="save<?php echo $me['id']?>">Save</button>
                </div>
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




<?php include('subpages/combo_menu.php');?>

</div>
</div>

</div>


<div class="clearfix  hidden-xs"></div>
</div>
<hr class="shop__divider">

</div>
</div>
</div>
</div>

<script>
function clear_all(cat_id)
{
$('#addopt'+cat_id+' .addopt').each(function(){
$(this).remove();
});
$('#addopt'+cat_id).hide();
$('.hasopt'+cat_id).val(0);
}
</script>