<?php 

class VideosController extends AppController {
	
	public $scaffold = 'admin1910';

	public function admin1910_add(){
		if(!empty($this->request->data && $this->request->is('post'))){
			if($this->Video->createWithAttachments($this->request->data)){
	            $this->Session->setFlash('Video cadastrado com sucesso.', 'default', array('class'=>'success'));
	            $this->redirect(array('action' => 'index'));
	        } else {
	        	$this->Session->setFlash('Não foi possível cadastrar o vídeo.');
	        	$this->set('validationErrorsArray', $this->Video->invalidFields());
	        }
		}

    	$status = $this->Video->Post->Status->find(
			'list', 
			array(
    			'conditions' => array('model' => 'Post')
    		)
    	);
		$this->set(compact('status'));

    	$categorias = $this->Video->Post->Categoria->find('list');
		$this->set(compact('categorias'));
    	$campeonatos = $this->Video->Post->Campeonato->find('list');
		$this->set(compact('campeonatos'));
    	$players = $this->Video->Player->find('list');
		$this->set(compact('players'));
	}
}
