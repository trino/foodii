<?php
class OrdersController extends AppController
{
    function checkSess()
    {
        if(!$this->Session->read('restaurant'))
        $this->redirect('/');
    }
    function pending()
    {
        $this->loadModel("Combo");
        $this->set("combo",$this->Combo);
        $this->checkSess();
        $limit = 10;
        $this->loadModel('Reservation');
        $this->paginate = array('conditions'=>array('res_id'=>$this->Session->read('id'),'approved'=>0,'cancelled'=>0,'ordered_by <>'=>''),'order'=>'id DESC','limit'=>$limit);
        $q = $this->paginate('Reservation');
        $c = $this->Reservation->find('count',array('conditions'=>array('res_id'=>$this->Session->read('id'),'approved'=>0,'cancelled'=>0,'ordered_by <>'=>''),'order'=>'id DESC'));
        $this->set('order',$q);
        $this->set('count',$c );
        $this->set('limit',$limit );
    }
    
    function delete($id)
    {
        $this->loadModel("Reservation");
        if($this->Reservation->delete(array('id'=>$id)))
        {
            $this->Session->setFlash("Order Succesfully Deleted.");
            if(isset($_GET['history']))
                $this->redirect('history');
            else
                $this->redirect('pending');
        }
    }
    
    function get_pending()
    {
        $this->checkSess();
        $this->loadModel('Reservation');
        $q = $this->Reservation->find('count',array('conditions'=>array('res_id'=>$this->Session->read('id'),'approved'=>0,'cancelled'=>0,'ordered_by <>'=>'')));
        echo $q;die();
        
    }
    function history()
    {
        $this->loadModel("Combo");
        $this->set("combo",$this->Combo);
        $this->checkSess();
        $this->loadModel('Reservation');
        $limit = 10;
        $this->paginate = array('conditions'=>array('res_id'=>$this->Session->read('id'),'ordered_by <>'=>'','OR'=>array('approved'=>1,'cancelled'=>1)),'order'=>'id DESC','limit'=>$limit);
        $q = $this->paginate('Reservation');
        $c = $this->Reservation->find('count',array('conditions'=>array('res_id'=>$this->Session->read('id'),'ordered_by <>'=>'','OR'=>array('approved'=>1,'cancelled'=>1)),'order'=>'id DESC'));
        $this->set('order',$q);
        $this->set('count',$c );
        $this->set('limit',$limit );
        $this->render('pending');
    }
    
    function view($id)
    {
        $this->loadModel("Combo");
        $this->set("combo",$this->Combo);
        $this->checkSess();
        $this->loadModel('Reservation');
        $this->set('order',$this->Reservation->findById($id));
        $this->loadModel('Menu');;
        $this->set('menu',$this->Menu);
    }
    
    function report()
    {
        if(isset($_GET['from']))
        {
            $from = $_GET['from'];
            $from = $from.' 00:00:00';
            $to = $_GET['to'].' 23:59:59';;
            
        }
        else
        $from = false;
        $this->checkSess();
        $this->loadModel('Reservation');
        if(!$from){
        $this->set('orders',false);
        }
        else
        $this->set('orders',$this->Reservation->find('all',array('conditions'=>array('approved'=>1,'order_time >='=>$from,'order_time <='=>$to))));
        $this->loadModel('Menu');;
        $this->set('menu',$this->Menu);
    }
    
    function approve($id)
    {
        $this->checkSess();
        $this->loadModel('Reservation');
        $this->Reservation->id = $id;
        $arr['approved'] = 1;
        $arr['cancelled'] = 0;
        $this->Reservation->save($arr);
        $this->Session->setFlash('Order approved succesfully');
        $this->redirect('view/'.$id);
    }
    function cancel($id)
    {
        $this->checkSess();
        $this->loadModel('Reservation');
        $this->Reservation->id = $id;
        $arr['approved'] = 0;
        $arr['cancelled'] = 1;
        $this->Reservation->save($arr);
        $this->Session->setFlash('Order cancelled succesfully');
        $this->redirect('view/'.$id);
    }
    function email1($id)
    {
        
        $this->layout = 'blank';
        $whole =  Router::url(null,true);
        $base_url_arr = explode('/orders',$whole);
        $base_url = $base_url_arr['0'];
        
        $this->set('base_url',$base_url);
        $this->loadModel('Reservation');
        $this->loadModel('Menu');
        $this->set('menu',$this->Menu);
        $this->set('order',$this->Reservation->findById($id));
        
        
    }
    function email2($id)
    {
        $this->layout = 'blank';
        $whole =  Router::url(null,true);
        $base_url_arr = explode('/orders',$whole);
        $base_url = $base_url_arr['0'];
        $this->set('base_url',$base_url);
        $this->loadModel('Reservation');
        $this->loadModel('Menu');
        $this->set('menu',$this->Menu);
        $this->set('order',$this->Reservation->findById($id));        
        
    }
    
}