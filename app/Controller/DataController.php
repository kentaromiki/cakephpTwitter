<?php
App::uses('AppController', 'Controller');

class DatasController extends AppController {

  public function index() {
    $this->set('message','Hello');
  

}

  public function posts($name){
    // WHERE name = $name �ɑΉ�
    $options = array('conditions' => array('name' => $name));
    // SELECT * FROM datas �ɑΉ�
    $datas = $this->Data->find('all', $options);

    $this->set('datas', $datas);
    $this->set('name', $name);
  
  
  }
  
  
  public function add(){
  
  if ($this->request->is('post')) {
  if($this->Data->save($this->request->Data)){
  
  $this->Session->setFlash('SaveOK');
  
  }
  }
  
  
  
  
  }
  
  
  
  
  
  }
?>