<?php 
	class Cidade extends AppModel {
		public $hasMany = array('Bairro', 'Relato');
		public $belongsTo = array('Estado');

		public $validate = array(
	        'name' =>  array(
	            'message' => 'Informe o nome da cidade.',
	            'allowEmpty' => false
	        ),
	        'cidade_id' =>  array(
	            'message' => 'É necessário escolher o estado ao qual a cidade pertence.',
	            'allowEmpty' => false
	        )
	    );
	}
?>