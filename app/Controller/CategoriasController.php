<?php
App::uses('AppController', 'Controller');

class CategoriasController extends AppController
{


	public $components = array('Paginator');

	################################################
	//CONTROLLER DE AUTORIZAÇÃO //
	################################################

	public function isAuthorized($user)
	{
		if (in_array($this->action, array('edit', 'delete', 'add'))) {
			if ($user['Groups']['level'] < 3) { // PRIORIDADES => 3 = ADM , 2 = POSTERS , 1 = USERS
				return false;
			}
		}
		return true;
	}

	################################################
	//CONTROLLER DE INDEX //
	################################################

	public function index()
	{
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->Paginator->paginate());
	}

	################################################
	//CONTROLLER DE VIEW //
	################################################

	public function view($id = null)
	{
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

	################################################
	//CONTROLLER DE CRIAÇÃO //
	################################################

	public function add()
	{
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('Categoria foi salva.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		}
	}

	################################################
	//CONTROLLER DE EDIÇÃO //
	################################################

	public function edit($id = null)
	{
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('Categoria criada com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

	################################################
	//CONTROLLER DE DELEÇÃO //
	################################################

	public function delete($id = null)
	{
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('The categoria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
