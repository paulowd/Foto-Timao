<?php 
	class Denuncia extends AppModel {
		public $belongsTo = array('User');

		public $validate = array(
	        'motivo' =>  array(
	            'message' => 'Por favor, entre com detalhes sobre sua denúncia.',
	            'allowEmpty' => false
	        )
	    );
	}
?>