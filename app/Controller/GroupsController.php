<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController {

	public $components = array('Paginator');

################################################
		//CONTROLLER DE AUTORIZAÇÃO //
################################################

	public function isAuthorized($user){
		if(in_array($this->action, array('edit','delete','add'))){
			if($user['Groups']['level'] < 3){// PRIORIDADES => 3 = ADM , 2 = POSTERS , 1 = USERS
				return false;
			}		
		} 
		return true;
	}

################################################
		//CONTROLLER DE INDEX //
################################################

	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->Paginator->paginate());
	}

################################################
		//CONTROLLER DE VIEW //
################################################

	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

################################################
		//CONTROLLER DE CRIAÇÃO //
################################################

	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
	}

################################################
		//CONTROLLER DE EDIÇÃO //
################################################

	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
	}

################################################
		//CONTROLLER DE DELEÇÃO //
################################################
	
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
