<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {


	public $components = array('Paginator');

	################################################
				//AUTORIZAÇÕES //
	################################################

	public function isAuthorized($user){
		if(in_array($this->action, array('edit','delete','add'))){
			if(($user['Groups']['level'] <= 3)and($user['Groups']['level']> 1)){ // PRIORIDADES => 3 = ADM , 2 = POSTERS , 1 = USERS
				return false;
			}	
		} 
		return true;
	}

	################################################
				//CONTROLLER DE VIEW //
	################################################

	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

	################################################
				//CONTROLLER DE CRIAÇÃO //
	################################################

	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Comment->Posts->find('list');
		$this->set(compact('posts','id'));
	}

	################################################
				//CONTROLLER DE EDIÇÃO //
	################################################

	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

	################################################
				//CONTROLLER DE DELEÇÃO //
	################################################
	
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
