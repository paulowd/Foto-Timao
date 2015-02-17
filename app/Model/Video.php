<?php 
	class Video extends AppModel {
    	public $displayField = 'titulo';
		public $belongsTo = array('Post', 'Player');
	    public $hasMany = array(
	        'Image' => array(
	            'className' => 'Attachment',
	            'foreignKey' => 'foreign_key',
	            'conditions' => array(
	                'Image.model' => 'Video',
	            ),
	        )//, 'Observacao'
	    );

		public $validate = array(
	        'player_id' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Selecione o player onde está hospedado o vídeo.',
	            'allowEmpty' => false
	        ),
	        'codigo' =>  array(
	           'not_blank' => array(
	           		'rule' => 'notEmpty',
	           		'message' => 'Informe o id do vídeo ou então cole sua url aqui.'
	           	),
	           'unico' => array(
	           		'rule' => 'isUnique',
	           		'message' => 'Este vídeo já está cadastrado no site.',
       				'required' => 'create'
	           	)
	        ),
	        'titulo' =>  array(
	        	'rule' => 'notEmpty',
	            'message' => 'Informe o título do vídeo.',
	            'allowEmpty' => false
	        )
	    );

		public function beforeValidate($options = array()) {
		}

	    public function createWithAttachments($data) {
			$codigo = strtolower($data['Video']['codigo']);

			if(strripos($codigo, 'youtube')){
				$codigoArray = explode('v=', $codigo);
				$codigo = $codigoArray[1];
				$codigoArray = explode('&', $codigo);
				$codigo = $codigoArray[0];
			} elseif(strripos($codigo, 'vimeo')) {
				$codigoArray = explode('/', $codigo);
				$codigo = end($codigoArray);
				$codigoArray = explode('?', $codigo);
				$codigo = $codigoArray[0];
				$codigoArray = explode('&', $codigo);
				$codigo = $codigoArray[0];
			} else {
				return false;
			}

			$data['Video']['codigo'] = $codigo;

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

			return false;
	    }
	}
?>