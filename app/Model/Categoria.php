<?php 
	class Categoria extends AppModel {
    	public $displayField = 'nome';
		public $hasMany = array('Post');

		public $validate = array(
	        'name' =>  array(
	            'message' => 'Informe o nome da categoria.',
	            'allowEmpty' => false
	        ),
	        'name' =>  array(
	            'message' => 'Preencha uma descrição para a categoria.',
	            'allowEmpty' => false
	        ),
	        'slug' =>  array(
	        	'rule' => unique
	            'message' => 'Já existe uma categoria com este nome.',
	            'allowEmpty' => false
	        )
	    );

		public function beforeValidate($options = array()) {
			$name = strtolower($this->data['Categoria']['nome']);
			$this->data['Categoria']['slug'] = Inflector::slug($name, '-');
		}
	}
?>