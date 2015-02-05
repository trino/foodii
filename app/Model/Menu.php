<?php 
class Menu extends AppModel
{
    public $hasMany=array('MenuCategory'=>array('className'=>'Menu',
                                 'foreignKey'=>'menu_parent',
                                 'dependent'=>true,
                                 'exclusive'=>true,
                                 
                                )
                                
                                      
                );
    public $belongsTo = array(
		'MenuCategory' => array(
			'className' => 'MenuCategory',
			'foreignKey' => 'cat_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'order'
		)
	);   
}