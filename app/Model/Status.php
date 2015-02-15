<?php 
	class Status extends AppModel {
		public $hasMany = array('User', 'Post', 'Denuncia');

		public $validate = array(
	        'name' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o nome da cidade.',
	            'allowEmpty' => false
	        ),
	        'cidade_id' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'É necessário escolher o estado ao qual a cidade pertence.',
	            'allowEmpty' => false
	        )
	    );
	}
?>