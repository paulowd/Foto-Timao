<?php 
	class Post extends AppModel {
		public $hasMany = array('Foto', 'Video');
		public $belongsTo = array('Categoria', 'Status', 'User', 'Campeonato');
		public $hasAndBelongsToMany = array('Tag');

		public $validate = array(
	        'categoria_id' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Selecione uma categoria para este post.',
	            'allowEmpty' => false
	        ),
	        'legenda' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Digite uma legenda para este post.',
	            'allowEmpty' => false
	        ),
	        'data' =>  array(
            	'rule' => 'date',
	            'message' => 'Informe uma data aproximada em que foi registrada a imagem.',
	            'allowEmpty' => false
	        )
	    );

	    public function createWithAttachments($data) {
	        // Sanitize your images before adding them
	        $images = array();
	        #var_dump($data['Image']); exit;
	        if (!empty($data['Image'][0])) {
	            foreach ($data['Image'] as $i => $image) {
	                if (is_array($data['Image'][$i])) {
	                    // Force setting the `model` field to this model
	                    $image['model'] = 'Post';

	                    // Unset the foreign_key if the user tries to specify it
	                    if (isset($image['foreign_key'])) {
	                        unset($image['foreign_key']);
	                    }

	                    if(!empty($image['attachment']['name']))
	                    	$images[] = $image;
	                }
	            }
	        }
	        $data['Image'] = $images;

	        // Try to save the data using Model::saveAll()
	        $this->create();
	        if ($this->saveAssociated($data)) {
	            return true;
	        }

	        // Throw an exception for the controller
	        throw new Exception(__("O produto não pode ser salvo. Tente novamente."));
	    }
	}
?>