<?php
App::uses('AppModel', 'Model');

class Follow extends AppModel {



public $validate = array(
       
        // �����̃t�B�[���h�ɑ΂����Ӑ������� (AND)
        'username' => array(
            'rule' => array( 'isUnique', array( 'username', 'followuser'), false),
            'message' => 'culumn_a & culumn_b combination has already been used.'
        )
       
    );


}




?>