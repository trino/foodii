define(['jquery','jqueryui/core'], function (jQuery) {


var path = window.location.pathname;
    if(path.replace('foodie','')!=path) {
        var base_url = 'http://localhost/foodie/';
    }else {
        var base_url = 'http://charlieschopsticks.com/';
    }


$('#password').keyup(function(e){
    if(e.keyCode == 13)
    {
        
        $('.loginbtn').click();
    }
});
$('#registerbtn').click(function(){
    //alert($('#email').val());
    //var email = $('#email').val();
    $.ajax({
       url:base_url+'restaurants/validateEmail',
       data:'email='+$('#email').val(),
       type:'post',
       success:function(res)
       {
        if(res=='1')
        {
            if($('#password1').val()!=$('#password2').val()){
            $('#confirmerror').show();
            $('#confirmerror').text('Password Do not match');
            $('#emailerror').hide();
            }
            else{
            $('#confirmerror').hide();
            $('#emailerror').hide();    
            $('#submitregister').click();
            }
         
        }
        else
        {
            $('#confirmerror').hide();
            $('#emailerror').show();
            $('#emailerror').text('Email already Taken');
       }
       } 
    });
})
if(path.replace('menuManager','')!=path)
            {
                $('.deletein').live('click',function(){
                    
                   var idin = $(this).attr('id');
                   $thiss = $(this);
                   //alert($thiss.parent('.addopt').text());
                   if(idin)
                   {
                     var idin = idin.replace('deletein','');
                     if(idin)
                     {
                        
                        $.ajax({
                           url:base_url+'restaurants/deleteAdditional/'+idin,
                           //url:base_url+'restaurants/profile/',
                           success:function(){
                            //alert($('#deletein'+idin).text());
                            $('#deletein'+idin).parent().parent().parent().parent().parent().remove();
                           }
                        });
                     }
                   } 
                });
                $('.addimgcat').each(function(){
                   var id = $(this).attr('id');
                   initiate_ajax_upload4(id); 
                });
                $('.is_multiple').live('change',function(){
                    //var name = $(this).attr('name').replace('r1_','');
                   $(this).closest('.addopt').find('.multi').val($(this).val());
                   //alert($('#multi'+name).val());
                   if($(this).val()==1)
                   {
                    $(this).closest('.addopt').find('.exact').show();
                   } 
                   else
                   $(this).closest('.addopt').find('.exact').hide();
                });
                $('.is_required').live('change',function(){
                   $(this).closest('.addopt').find('.is_req').val($(this).val()); 
                });
                $('.addmoresubM').live('click',function(){
                var id = $(this).attr('id').replace('subM','');
                $(this).remove();
                //alert('test');
                $.ajax({
                    url:base_url+'restaurants/optionalM/'+id,
                    success:function(res){
                        $('#addopt_item_'+id).append(res);
                        var k =0;
                        
                    }
                })
              });
               
                $('.savemenu').live('click',function(){
                   var save_id = $(this).attr('id').replace('save','');
                   var menu_name = $('#menuname'+save_id).val();
                   if(menu_name == '')
                    {
                        alert('Item name can\'t be blank');
                        $('#menuname'+save_id).focus();
                        return false;
                    }
                   var menu_price = $('#menuprice'+save_id).val();
                   var menu_desc = $('#menudesc'+save_id).val(); 
                   var menu_cat_id = $('#menucat'+save_id).val();
                   $.ajax({
                    url:base_url+'restaurants/addMenu/'+save_id,
                    data:'menu_item='+menu_name+'&price='+menu_price+'&description='+menu_desc+'&cat_id='+menu_cat_id,
                    type:'post',
                    success:function(res){
                        
                                                
                        $('.item'+save_id).hide();
                        var bug=0;
                        if($('#had_opt'+save_id).val() == 1)
                        {
                        //alert('test');
                        var z = 0;
                        var len = $('#addopt_item_'+save_id+' .addopt').length;
                        $('.additems').each(function(){
                                if($(this).val() == '')
                                {
                                    alert('Item name cannot be blank');
                                    $(this).focus();
                                    bug=1;
                                    return false
                                    
                                }
                                });
                                if(bug)
                                return false;
                        $('#addopt_item_'+save_id+' .addopt').each(function(){
                            
                            z++;
                            var opt_id = $(this).attr('id').replace('addopt_','');
                            var subcat = $('.addsubcat',this).val();
                            var subdes = $('.scd',this).val();
                            var scat_id = $('.addsubcat',this).attr('id').replace('sc','');
                            var is_required = $('.is_req',this).val();
                            var is_multiple = $('.multi',this).val();
                            var up_to = $('.up_to_selected',this).val();
                            var itemno = $('.itemno',this).val();
                            
                            if(is_required == '1' && is_multiple=='1')
                            {
                                if(itemno=='' || itemno=='0' || isNaN(itemno))
                                {
                                    alert('Invalid number');
                                    $('.itemno',this).focus();                                    
                                    return false;
                                    
                                }
                            }
                            
                            var u = 0;
                            var si = '';
                            var sp = '';
                            $this = $(this);
                            //var bug=0;
                            $('.additems',$this).each(function(){
                                
                                //alert($(this).val());
                                u++;
                                if(u==1){
                                si = $(this).val();
                                }
                                else{
                                    
                                si = si+','+$(this).val();
                                }
                            });
                            
                            itemno = parseFloat(itemno);
                            if(is_required == '1' && is_multiple=='1')
                            {
                            if(u < Number(itemno))
                            {
                                    alert('Number of items can\'t be smaller than "Exact Number of items"');
                                    $('.itemno',this).focus();
                                    $.ajax({
                                       url:base_url+'restaurants/removeMenu/'+res 
                                    });
                                    return false;
                            }
                            }
                            //alert(si);
                            var v = 0;
                            //opt_id = $(this).attr('id').replace('addopt_','');
                            $('.addprice',$this).each(function(){
                                v++;
                                if(v==1){
                                sp = $(this).val();
                                }
                                else{
                                   
                                sp = sp+','+$(this).val();
                                }
                            });
                            //alert(si);
                            $.ajax({
                               url:base_url+'restaurants/addSubCat/'+scat_id,
                               data:'menu='+res+'&subcat='+subcat+'&subdes='+subdes+'&si='+si+'&sp='+sp+'&is_required='+is_required+'&is_multiple='+is_multiple+'&itemno='+itemno+'&up_to='+up_to,
                               type:'post',
                               success:function()
                               {
                                  if(z==len)
                                  {
                                    $('#menu_list_'+save_id).load(base_url+'restaurants/loadMenu/'+res+'/'+menu_cat_id,function(){
                                        initiate_ajax_upload3('uploadimage'+res);
                                    });
                                  }
                               } 
                            });
                            
                        });
                    }
                    else
                    {
                        $('#menu_list_'+save_id).load(base_url+'restaurants/loadMenu/'+res+'/'+menu_cat_id,function(){
                                        initiate_ajax_upload3('uploadimage'+res);
                                    });
                    }
                    if(bug==0)
                    alert('Item updated successfully!');
                    
                    }  
                    });
                });
                }
                function initiate_ajax_upload3(button_id){                
                var button = $('#'+button_id), interval;
                var id = button_id.replace('uploadimage','');
                new AjaxUpload(button,{
                    action: base_url+"restaurants/upload_menu_img/"+id,                      
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Add Image');
                            window.clearInterval(interval);
                            this.enable();
                            //alert("#img"+id);
                            //$("#img"+id).html('<img src="'+base_url+'images/menus/'+response+'" />');
                            $('#'+button_id).parent().parent().load(base_url+'restaurants/loadMenu/'+id,function(){
                            initiate_ajax_upload3('uploadimage'+id);
                        });
                            }                        		
                    });                
            }
            function initiate_ajax_upload4(button_id){                
                var button = $('#'+button_id), interval;
                var id = button_id.replace('addimgcat','');
                new AjaxUpload(button,{
                    action: base_url+"restaurants/upload_cat_img/"+id,                      
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Add Image');
                            window.clearInterval(interval);
                            this.enable();
                            //alert("#img"+id);
                            //$("#img"+id).html('<img src="'+base_url+'images/menus/'+response+'" />');
                            $('.cattitle'+id).append('<br/><img src="'+base_url+'images/category/'+response+'" style="width:120px;border-radius:30px;" /><br/><br/>');
                            }
                    });                
            
            }
});