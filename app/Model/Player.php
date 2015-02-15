<?php 
	class Player extends AppModel {
    	public $displayField = 'nome';
		public $hasMany = array('Bairro', 'Relato');
		public $belongsTo = array('Estado');

		public $validate = array(
	        'nome' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o nome do player.',
	            'allowEmpty' => false
	        ),
	        'codembed' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Por favor insira um exemplo de embed do player a ser cadastrado.',
	            'allowEmpty' => false
	        )
	    );
	}
?>