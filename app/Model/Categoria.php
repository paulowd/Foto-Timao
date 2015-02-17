<?php 
	class Categoria extends AppModel {
    	public $displayField = 'nome';
		public $hasMany = array('Post');

		public $validate = array(
	        'nome' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o nome da categoria.',
	            'allowEmpty' => false
	        ),
	        'descricao' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Preencha uma descrição para a categoria.',
	            'allowEmpty' => false
	        )/*,
	        'slug' =>  array(
	        	'rule' => 'unique',
	            'message' => 'Já existe uma categoria com este nome.',
	            'allowEmpty' => true
	        )*/
	    );

		public function beforeValidate($options = array()) {
			$name = strtolower($this->data['Categoria']['nome']);
			$this->data['Categoria']['slug'] = Inflector::slug($name, '-');
		}
	}
?>