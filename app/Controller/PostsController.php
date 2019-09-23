<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController
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
		$this->Post->recursive = 0;
		//$this->Paginator->settings = array('limit'=>2);
		$this->Paginator->settings = array('order' => array('Post.title' => 'asc'));
		$this->set('posts', $this->Paginator->paginate());
	}

	################################################
	//CONTROLLER DE VIEW //
	################################################

	public function view($id = null)
	{
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		App::import("Model", "Comment");
		$model = new Comment();
		$query = "Select * from comments where posts_id = " . $id;
		$comentario = $model->query($query);
		$users = $this->Post->Users->find('all');
		$categorias = $this->Post->Categorias->find('all');
		$this->set('post', $this->Post->find('first', $options));
		$this->set(compact('comentario', 'users', 'categorias'));
	}

	################################################
	//CONTROLLER DE CRIAÇÃO //
	################################################

	public function add()
	{
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Post->Categorias->find('list');
		$users = $this->Post->Users->find('list');
		$this->set(compact('categorias', 'users'));
	}

	################################################
	//CONTROLLER DE EDIÇÃO //
	################################################

	public function edit($id = null)
	{
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$categorias = $this->Post->Categorias->find('list');
		$users = $this->Post->Users->find('list');
		$this->set(compact('categorias', 'users'));
	}

	################################################
	//CONTROLLER DE DELEÇÃO //
	################################################

	public function delete($id = null)
	{
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
