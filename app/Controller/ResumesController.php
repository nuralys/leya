<?php

class ResumesController extends AppController{

	// public $uses = array('Resume', 'Project');

	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		// $this->Resume->locale = Configure::read('Config.language');
		// $this->News->locale = Configure::read('Config.language');
		$data = $this->Resume->find('all');
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('News.created' => 'desc'),
		// 	'limit' => 3
		// 	));
		$this->set(compact('data'));
	}

	public function admin_index(){
			// $this->Resume->Project->locale = 'ru';
			// $this->Resume->Project->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Resume->find('all', array(
				'reqursive' => -1
			));
			// debug($data);
			// die;
			$this->set(compact('data'));
		}

	public function send(){
		
		if($this->request->is('post')){
			$this->Resume->create();
			$data = $this->request->data['Resume'];

			// debug($data);
			// die;
			if($this->Resume->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}



	public function admin_delete($id){
		if (!$this->Resume->exists($id)) {
			throw new NotFounddException('Такой фотографии нету');
		}
		if($this->Resume->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}