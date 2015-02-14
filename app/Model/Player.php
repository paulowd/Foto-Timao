<?php 
	class Player extends AppModel {
    	public $displayField = 'nome';
		public $hasMany = array('Bairro', 'Relato');
		public $belongsTo = array('Estado');

		public $validate = array(
	        'nome' =>  array(
	            'message' => 'Informe o nome do player.',
	            'allowEmpty' => false
	        ),
	        'codembed' =>  array(
	            'message' => 'Por favor insira um exemplo de embed do player a ser cadastrado.',
	            'allowEmpty' => false
	        )
	    );
	}
?>