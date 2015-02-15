<?php 
	class Tag extends AppModel {
    	public $displayField = 'nome';
		public $hasAndBelongsToMany = array('Post');

		public $validate = array(
	        'nome' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o nome da tag.',
	            'allowEmpty' => false
	        ),
	        'slug' =>  array(
	        	'rule' => 'unique',
	            'message' => 'Esta tag já existe',
	            'allowEmpty' => false
	        )
	    );

		public function beforeValidate($options = array()) {
			$name = strtolower($this->data['Tag']['nome']);
			$this->data['Tag']['slug'] = Inflector::slug($name, '-');
		}
	}
?>