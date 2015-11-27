<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

/*
public $hasMany = array(
        'CourseMembership'
    );
*/


  public $validate = array(
  
  'name' => array(
  
      array(
        'rule' => array('maxLengthJp', '20'),
        'message' => '名前は日本語にしてください。'
      ),
      array(
        'rule' => array('between', 4, 20), //4～20文字
        'message' => '名前は4文字以上20文字以内にしてください。'
      )
	  
    ),
  
    'username' => array(
      array(
        'rule' => 'isUnique', //重複禁止
        'message' => '既に使用されている名前です。'
      ),
      array(
        'rule' => 'alphaNumericDashUnderscore', //半角英数字のみ
        'message' => 'ユーザーネームは半角英数字にしてください。'
      ),
      array(
        'rule' => array('between', 4, 20), //4～20文字
        'message' => 'ユーザーネームは4文字以上20文字以内にしてください。'
      )
    ),
	
    'password' => array(
      array(
        'rule' => 'alphaNumeric',
        'message' => 'パスワードは半角英数字にしてください。'
      ),
      array(
        'rule' => array('between', 4, 8),
        'message' => 'パスワードは4文字以上8文字以内にしてください。'
      ),/*
	  array(
                'rule' => 'passwordConfirm', 
                'message' => 'パスワードが一致していません'
            ), */
	  
    ),
	'password_confirm' => array(
            array(
                'rule' => 'notEmpty', 
                'message' => 'パスワード(確認)を入力してください'
            ), 
        ),
	
	
	
	'mailaddress' => array(
	/*
      array(
        'rule' => array('email', true), //有効なアドレス
        'message' => 'メール入力してください'
      ),*/
      array(
        'rule' => array('maxLength', 100),
        'message' => 'メールアドレスは100文字までです。'
    ),
	  array(
        'rule' => 'notBlank()',
        'message' => 'メールアドレスは必須入力です。'
		)
    )
  );

  public function beforeSave($options = array()) {
    $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    return true;
  }
  /*
   public function passwordConfirm($check){

        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['User']['password'] === $this->data['User']['password_confirm']){
            return true;
        }else{
            return false;
        }

    }
  */
  
  
  
  
  


}




?>