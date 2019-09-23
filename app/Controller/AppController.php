<?php


App::uses('Controller', 'Controller');


class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth'=> array(
            'loginRedirect'=>array('controller' => 'posts','actions'=>'index'),
            'loginRedirect'=>array('controller' => 'posts','actions'=>'index'),
            'authError'=>'Voce não tem acesso a esta pagina',
            'authorize' => array('Controller')
        )
    );

    public function isAuthorized($user){
        return true;
    }

    public function beforeFilter(){
        $this->Auth->allow('index','view'); 
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user',$this->Auth->user());
    }
}
