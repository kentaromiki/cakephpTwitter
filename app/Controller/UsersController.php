<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {


public $uses = array('Data');

public $paginate = array(
            'Data' => array(
                'limit' =>10,                        //1ページ表示できるデータ数の設定
                'order' => array('created' => 'desc'),  //データを降順に並べる
            )
        );

public $components = array('Session');


public function index($name) {

  $this->loadModel('Data');

	    $this->loadModel('Follow');


	  
	  
	//$this->set('user', [
	//	'userName'=>'aaa'
	//	]);  
	  $this->set('user', $this->Auth->user());  
	  
	  
	  $options = array('limit'=>'300','order'=>array('created DESC'));
		
	    // SELECT * FROM datas に対応
	    $data = $this->Data->find('all', $options);
		//$data = $this->paginate('Data',$options);

		
	
	    $this->set('datas', $data);
		
		
		$follow = $this->paginate('Follow',array('username'=>$name));
        $this->set('follows', $follow);
		
		
		
			$col = $this->Data->find('count', array(
	'conditions' => array('name'=>  $name )
	));
	
	$this->set('tweetCnt', $col);
	
		
		
				
	$col = $this->Follow->find('count', array(
	'conditions' => array('followuser'=>  $name )
	));
	
	$this->set('followerCnt', $col);	
		
	$col2 = $this->Follow->find('count', array(
	'conditions' => array('username'=>  $name )
	));
	
	$this->set('followCnt', $col2);

	
	
	
	//$this->set('user', $this->Auth->user('username'));  

}

public function user($name){
  
  

  //public function posts(){
  
  
  $this->loadModel('Data');
  	$this->loadModel('Follow');

  
  $this->set('Data',$this->paginate());
  
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
  
	
	$col = $this->Data->find('count', array(
	'conditions' => array('name'=>  $name )
	));
	
	$this->set('tweetCnt', $col);
	




  
  
  
    // WHERE name = $name に対応
    //$options = array('order'=>array('created DESC'));
	
    $options = array('conditions' => array('username' => $name));
    //$options2 = array('conditions' => array('name' => $name));

    // SELECT * FROM datas に対応
    $follows = $this->Follow->find('all', $options);
	//$datadata = $this->Data->find('all', $options2);

	
	$data = $this->paginate('Data',array('name' => $name));
	
	
	

	
    $this->set('datas', $data);

    $this->set('name', $name);
	
	
	 //$this->loadModel('Follow');
	
		
	$col = $this->Follow->find('count', array(
	'conditions' => array('followuser'=>  $name )
	));
	
	$this->set('followerCnt', $col);	
		
	$col2 = $this->Follow->find('count', array(
	'conditions' => array('username'=>  $name )
	));
	
	$this->set('followCnt', $col2);
	
  
}
  
public function logout(){
  
   $this->Auth->logout();
    $this->redirect('login');
  
}
  
  
public function login(){
  
  
  
  if ($this->request->is('post')) {
  


      if($this->Auth->login()){
	    return $this->redirect(array('plugin' => 'users', 'controller' => 'index', 'action' => $this->request->Data('User.username') ));
		}	
      else{
        $this->Session->setFlash('ユーザーネームまたはパスワードに間違いがあります');
		}
  
  }
  
}
  
  
public function newGuest(){
  
  $this->loadModel('User');
  
  
  
  //$this->requestにPOSTされたデータが入っている
    //POSTメソッドかつユーザ追加が成功したら
    if($this->request->is('post')) {
	
	$name=$this->request->Data('User.name');
	$mail=$this->request->Data('User.mailaddress');
	$public=$this->request->Data('User.public');

	
	$userName=$this->request->Data('User.username');
	$password=$this->request->Data('User.password');
	
	

	
	if($this->User->save([
	'username'=>$userName,
	'password'=>$password,
	'name'=>$name,
	'public'=>$public,
	'mailaddress'=>$mail
	
	])){
      //ログイン
      //$this->request->dataの値を使用してログインする規約になっている
      $this->Auth->login();
      $this->redirect('finregister');
    }
  
  }
  
  	  $this->set('validationErrors', $this->User->validationErrors);

  
  
  
}
  
  
   
public function finRegister() {

  
    $this->set('user', $this->Auth->user());  

  
  
}
  
public function follower($name) {

      $this->set('user', $this->Auth->user());  
	  
	  $this->loadModel('Follow');
	
		$follow = $this->paginate('Follow',array('followuser'=>$name));
        $this->set('follows', $follow);
		
	$col = $this->Follow->find('count', array(
	'conditions' => array('followuser'=>  $name )
	));
	
	$this->set('followCnt', $col);
	
  
}
public function follow($name) {

      $this->set('user', $this->Auth->user());  
	  
	  $this->loadModel('Follow');
	
		$follow = $this->paginate('Follow',array('username'=>$name));
        $this->set('follows', $follow);
		
	$col = $this->Follow->find('count', array(
	'conditions' => array('username'=>  $name )
	));
	
	$this->set('followCnt', $col);
	
  
}

  
public function userserch($name) {

	
	  $this->loadModel('User');
	  $this->loadModel('Follow');


$serchUser;
	
	if ($this->request->is('post')) {
	
	
		$serchUser=$this->request->Data('serchUser.username');
	
	    // WHERE name = $name に対応
		
	    $options = array('conditions' => array('username like ?' =>  "%$serchUser%"));
		
	    // SELECT * FROM datas に対応
	    $users = $this->User->find('all', $options);
		
		
	
	    $this->set('findUser', $users);
	    
		
		   
	
	
		
		
	}

$options = array('conditions' => array('username' =>  $name));
		
	    // SELECT * FROM datas に対応
	    $users = $this->Follow->find('all', $options);
		
		
	
	    $this->set('userdata', $users);







	if ($this->request->is('post') || $this->request->is('put')) {
   if(!empty($this->data)){
   if(isset($this->request->data['but'])){
   
   $this->Session->setFlash('何かメッセージ'.$this->request->data['but']);
   
   $this->Follow->save([
	'username'=>$name,
	'followuser'=>$this->request->data['but']
	
	]);
	/*
    $this->Session->setFlash('何かメッセージ'$serchUser);

   
   $options = array('conditions' => array('username like ?' =>  "%$serchUser%"));
		
	    // SELECT * FROM datas に対応
	    $users = $this->User->find('all', $options);
		
		
	
	    $this->set('findUser', $users);
	    
   
   */
     
   

   
   }
   }
   
}
	
	
  
  
  
  
  
}
  
  
  
  
  
  
  
}
  
  
  
?>