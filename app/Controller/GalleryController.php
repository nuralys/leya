<?php

class GalleryController extends AppController{

	// public $uses = array('Gallery', 'Project');

	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$this->Gallery->locale = Configure::read('Config.language');
		// $this->News->locale = Configure::read('Config.language');
		$data = $this->Gallery->find('all');
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('News.created' => 'desc'),
		// 	'limit' => 3
		// 	));
		$this->set(compact('data'));
	}

	public function admin_index(){
			// $this->Gallery->Project->locale = 'ru';
			// $this->Gallery->Project->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Gallery->find('all');
			// debug($data);
			// die;
			$this->set(compact('data'));
		}

	public function admin_add(){
		// debug($this->request->data['Gallery']);
		// die;
		if($this->request->is('post')){
			$this->Gallery->create();
			$data = $this->request->data['Gallery'];
			if(!$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Gallery->locale = 'kz';
			}else{
				$this->Gallery->locale = 'ru';
			}
			if($this->Gallery->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$this->Gallery->Project->locale = 'ru';
			$projects = $this->Gallery->Project->find('list');

			$this->set(compact('projects'));

		// $projects = $this->Project->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('Project.created' => 'desc'),
		// 	'limit' => 3
		// 	));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Gallery->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Gallery->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Gallery->id = $id;
			$data1 = $this->request->data['Gallery'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Gallery->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$this->Gallery->Project->locale = 'ru';
			$projects = $this->Gallery->Project->find('list');
			$this->set(compact('id', 'data', 'projects'));
		}
	}

	public function admin_delete($id){
		if (!$this->Gallery->exists($id)) {
			throw new NotFounddException('Такой фотографии нету');
		}
		if($this->Gallery->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}