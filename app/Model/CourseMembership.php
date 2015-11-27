<?php
App::uses('AppModel', 'Model');

class CourseMembership extends AppModel {
    public $belongsTo = array(
        'username', 'password'
    );
}




?>