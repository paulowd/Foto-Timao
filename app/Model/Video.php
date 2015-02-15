<?php 
	class Video extends AppModel {
    	public $displayField = 'titulo';
		public $belongsTo = array('Post');

		public $validate = array(
	        'player_id' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Selecione o player onde está hospedado o vídeo.',
	            'allowEmpty' => false
	        ),
	        'codigo' =>  array(
	           'notEmpty' => array(
	           		'message' => 'Informe o id do vídeo ou então cole sua url aqui.',
	            	'allowEmpty' => false
	           	),
	           'unique' => array(
	           		'rule' => 'unique',
	           		'message' => 'Este vídeo já está cadastrado no site.'
	           	)
	        ),
	        'titulo' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o título do vídeo.',
	            'allowEmpty' => false
	        )
	    );
	}
?>