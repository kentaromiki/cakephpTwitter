<?php
App::uses('AppController', 'Controller');

class DatasController extends AppController {



public $components = array('Session', 'Auth');

  //�ǂ̃A�N�V�������Ă΂�Ă��͂��߂Ɏ��s�����֐�
  public function beforeFilter()
  {
    parent::beforeFilter();



    //�����O�C���ŃA�N�Z�X�ł���A�N�V�������w��
    //����ȊO�̃A�N�V�����ւ̃A�N�Z�X��login�Ƀ��_�C���N�g�����K��ɂȂ��Ă���
    $this->Auth->allow('newguest', 'login');
	
	$this->set('datas', $this->Auth->login());
    $this->layout = 'main'; //���C�A�E�g���w��
  }






  public function index() {
  
 $this->set('datas', $this->Auth->login());  
 

}

  public function mypage($name){
  //public function posts(){
  
   $this->set("title_for_layout","�Ȃ�ł��f����");

  
  if ($this->request->is('post')) {
	
	$Name=$this->request->Data('Datas.Name');
	$messe=$this->request->Data('Datas.message');
	
	$userName=$name;
	
	if($messe!=null){
	
	$this->Data->save([
	'name'=>$userName,
	'message'=>$messe
	
	]);
	
 }
  }
  
  
  
  
  
  
    // WHERE name = $name �ɑΉ�
    //$options = array('order'=>array('created DESC'));
	
    $options = array('conditions' => array('name' => $name),'order'=>array('created DESC'));

    // SELECT * FROM datas �ɑΉ�
    $datas = $this->Data->find('all', $options);

    $this->set('datas', $datas);
    $this->set('name', $name);
	
	
	
	
  
  }
  
  public function logout(){
  
   $this->Auth->logout();
    $this->redirect('login');
  
  }
  
  
  public function login(){
  
    

  
  if ($this->request->is('post')) {

      if($this->Auth->login())
        return $this->redirect('index');
      else
        $this->Session->setFlash('���O�C�����s');
    

  
  }
  
  }
  
  
  public function newGuest(){
  
  
  $this->loadModel('Users');
  
  //$this->request��POST���ꂽ�f�[�^�������Ă���
    //POST���\�b�h�����[�U�ǉ�������������
    if($this->request->is('post')) {
	
		$userName=$this->request->Data('login.userName');
	$password=$this->request->Data('login.password');
	
	if($this->Users->save([
	'username'=>$userName,
	'password'=>$password
	
	])){
      //���O�C��
      //$this->request->data�̒l���g�p���ă��O�C������K��ɂȂ��Ă���
      $this->Auth->login();
      $this->redirect('index');
    }
  
  }
  
  
  
  
  /*
  if ($this->request->is('post')) {

	$userName=$this->request->Data('login.userName');
	$password=$this->request->Data('login.password');

	
	if($userName!=null&&$password!=null){
	
	$this->Users->save([
	'username'=>$userName,
	'password'=>$password
	
	]);
	
	
 }
  



  
  }
  */
  }
  
  
  
  
  
  
  
  
  
  
  
  }
  
  
  
?>