<?php 
	class Denuncia extends AppModel {
		public $belongsTo = array('User');

		public $validate = array(
	        'motivo' =>  array(
	        	'rule' => array('minLength', 10),
	            'message' => 'Por favor, entre com mais detalhes sobre sua denúncia.',
	            'allowEmpty' => false
	        )
	    );
	}
?>