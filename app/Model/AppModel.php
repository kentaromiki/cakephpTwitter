<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {





public function maxLengthJp($check, $max) {
		$check_str = array_shift($check);
		$length = mb_strlen($check_str, mb_detect_encoding($check_str));
                // EUCとかの場合、エンコーディング指定しておく
		// $length = mb_strlen($check_str, mb_detect_encoding($check_str,"euc"));
		return ($length <= $max);
	}
	
	
	public function alphaNumericDashUnderscore($check) {
        // $data 配列はフォームの項目名をキーとして渡される。
        // この関数が汎用的に使えるように、値を展開する必要がある。
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }
	
	
	public function passwordConfirm($check){

        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['User']['password'] === $this->data['User']['password_confirm']){
            return true;
        }else{
            return false;
        }

    }
	
}


	
