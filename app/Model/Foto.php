<?php 
	class Foto extends AppModel {
		public $belongsTo = array('Post');
	    public $hasMany = array(
	        'Image' => array(
	            'className' => 'Attachment',
	            'foreignKey' => 'foreign_key',
	            'conditions' => array(
	                'Image.model' => 'Foto',
	            ),
	        )//, 'Observacao'
	    );

	    public function createWithAttachments($data) {
	        // Sanitize your images before adding them
	        $images = array();
	        if (is_array($data['Image'])) {
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
	        throw new Exception(__("A foto não pode ser salva. Tente novamente."));
	    }
	}
?>