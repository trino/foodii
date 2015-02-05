<?php
class MenusController extends AppController
{
    
    
    function getCat($id)
    {
        if($id==0)
        return 'Others';
        $this->loadModel('MenuCategory');
        $q = $this->MenuCategory->findById($id);
        return $q['MenuCategory']['title'];
    }
    
    
}
?>