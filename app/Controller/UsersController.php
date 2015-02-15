<?php 

class UsersController extends AppController {
	public $scaffold = 'admin1910';

    public function admin1910_login(){
    	if ($this->Auth->login()) {
	        $this->redirect($this->Auth->redirect());
	    } elseif($this->request->isPost()) {
	        $this->Session->setFlash(__('Usuário/senha inválido(a).', 'auth'));
	    }
    }

	public function admin1910_logout() {
	    $this->redirect($this->Auth->logout());
	}

	public function beforeFilter() {
    	parent::beforeFilter();

    	if($this->request->params['action'] == 'admin1910_login'){
    		$this->layout = 'admin1910_login';
    	}
    }
}
