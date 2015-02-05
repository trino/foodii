<?php 
class Restaurant extends AppModel
{
     public $uses = array('Menu','Restaurant','ResImage');
	public $hasMany=array('Menu'=>array('className'=>'Menu',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true,
                                 'order' => 'display_order ASC'
                                ),
                                'ResImage'=>array('className'=>'ResImage',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true
                                ),
                                'MenuPdfs'=>array('className'=>'MenuPdfs',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true
                                ),
                                'MenuCategory'=>array('className'=>'MenuCategory',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true,
                                 'conditions' => array('MenuCategory.menu_parent' => '0'),
                                 'order' => 'order ASC'
                                ),
                                'ResImage'=>array('className'=>'ResImage',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true
                                ),
                                'Combo'=>array('className'=>'Combo',
                                 'foreignKey'=>'res_id',
                                 'dependent'=>true,
                                 'exclusive'=>true
                                )
                                
                                      
                );
     
}