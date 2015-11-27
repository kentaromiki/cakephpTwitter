<?php
App::uses('AppController', 'Controller');

class DatasController extends AppController {



public $components = array('Session', 'Auth');

  //どのアクションが呼ばれてもはじめに実行される関数
  public function beforeFilter()
  {
    parent::beforeFilter();



    //未ログインでアクセスできるアクションを指定
    //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
    $this->Auth->allow('newguest', 'login');
	
	$this->set('datas', $this->Auth->login());
    $this->layout = 'main'; //レイアウトを指定
  }






  public function index() {
  
 $this->set('datas', $this->Auth->login());  
 

}

  public function mypage($name){
  //public function posts(){
  
   $this->set("title_for_layout","なんでも掲示板");

  
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
  
  
  
  
  
  
    // WHERE name = $name に対応
    //$options = array('order'=>array('created DESC'));
	
    $options = array('conditions' => array('name' => $name),'order'=>array('created DESC'));

    // SELECT * FROM datas に対応
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
        $this->Session->setFlash('ログイン失敗');
    

  
  }
  
  }
  
  
  public function newGuest(){
  
  
  $this->loadModel('Users');
  
  //$this->requestにPOSTされたデータが入っている
    //POSTメソッドかつユーザ追加が成功したら
    if($this->request->is('post')) {
	
		$userName=$this->request->Data('login.userName');
	$password=$this->request->Data('login.password');
	
	if($this->Users->save([
	'username'=>$userName,
	'password'=>$password
	
	])){
      //ログイン
      //$this->request->dataの値を使用してログインする規約になっている
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