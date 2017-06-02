<?php

class RequestsController extends AppController{

	// public $uses = array('Request', 'Project');

	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$this->Request->locale = Configure::read('Config.language');
		// $this->News->locale = Configure::read('Config.language');
		$data = $this->Request->find('all');
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('News.created' => 'desc'),
		// 	'limit' => 3
		// 	));
		$this->set(compact('data'));
	}

	public function admin_index(){
			// $this->Request->Project->locale = 'ru';
			// $this->Request->Project->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Request->find('all');
			// debug($data);
			// die;
			$this->set(compact('data'));
		}

	public function add(){
		
		if($this->request->is('post')){
			$this->Request->create();
			$data = $this->request->data['Request'];

			// debug($data);
			// die;
			if($this->Request->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}



	public function admin_delete($id){
		if (!$this->Request->exists($id)) {
			throw new NotFounddException('Такой фотографии нету');
		}
		if($this->Request->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}