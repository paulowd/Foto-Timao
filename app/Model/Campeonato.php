<?php 
	class Campeonato extends AppModel {
    	public $displayField = 'nome';
		public $hasMany = array('Post');

		public $validate = array(
	        'nome' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o nome do campeonato.',
	            'allowEmpty' => false
	        ),
	        'slug' =>  array(
	        	'rule' => 'unique',
	            'message' => 'Já existe um campenato cadastrado com este nome.',
	            'allowEmpty' => false
	        )
	    );

		public function beforeValidate($options = array()) {
			$name = strtolower($this->data['Campeonato']['nome']);
			$this->data['Campeonato']['slug'] = Inflector::slug($name, '-');
		}
	}
?>