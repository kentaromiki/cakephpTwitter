<?php
App::uses('AppModel', 'Model');

class Follow extends AppModel {



public $validate = array(
       
        // 複数のフィールドに対する一意性を検証 (AND)
        'username' => array(
            'rule' => array( 'isUnique', array( 'username', 'followuser'), false),
            'message' => 'culumn_a & culumn_b combination has already been used.'
        )
       
    );


}




?>