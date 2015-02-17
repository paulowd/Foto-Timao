<?php 

class FotosController extends AppController {
	public $scaffold = 'admin1910';

	public function admin1910_add(){
		if(!empty($this->request->data && $this->request->is('post'))){
			if($this->Foto->createWithAttachments($this->request->data)){
	            $this->Session->setFlash('Foto cadastrada com sucesso.', 'default', array('class'=>'success'));
	            $this->redirect(array('action' => 'index'));
	        } else {
	        	$this->Session->setFlash('Não foi possível cadastrar a foto.');
	        	$this->set('validationErrorsArray', $this->Foto->invalidFields());
	            $this->redirect(array('action' => 'view', $id));
	        }
		}

    	$status = $this->Foto->Post->Status->find(
			'list', 
			array(
    			'conditions' => array('model' => 'Post')
    		)
    	);
		$this->set(compact('status'));

    	$categorias = $this->Foto->Post->Categoria->find('list');
		$this->set(compact('categorias'));
    	$campeonatos = $this->Foto->Post->Campeonato->find('list');
		$this->set(compact('campeonatos'));
	}
}
