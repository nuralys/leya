<?php

class AdvantagesController extends AppController{

	// public $uses = array('Advantage', 'Project');

	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$this->Advantage->locale = Configure::read('Config.language');
		// $this->News->locale = Configure::read('Config.language');
		$data = $this->Advantage->find('all');
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('News.created' => 'desc'),
		// 	'limit' => 3
		// 	));
		$this->set(compact('data'));
	}

	public function admin_index(){
			$this->Advantage->locale = 'ru';
			$this->Advantage->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Advantage->find('all');
			// debug($data);
			// die;
			$this->set(compact('data'));
		}

	public function admin_add(){
		// debug($this->request->data['Advantage']);
		// die;
		if($this->request->is('post')){
			$this->Advantage->create();
			$data = $this->request->data['Advantage'];
			if(!$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Advantage->locale = 'kz';
			}else{
				$this->Advantage->locale = 'ru';
			}
			if($this->Advantage->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$this->Advantage->Project->locale = 'ru';
			$projects = $this->Advantage->Project->find('list');

			$this->set(compact('projects'));

		// $projects = $this->Project->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('Project.created' => 'desc'),
		// 	'limit' => 3
		// 	));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Advantage->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Advantage->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Advantage->id = $id;
			$data1 = $this->request->data['Advantage'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Advantage->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Advantage->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Advantage->read(null, $id);
		}

			$projects = $this->Advantage->Project->find('list');
			// debug($projects);die;
			$this->set(compact('id', 'data', 'projects'));
		
	}

	public function admin_delete($id){
		if (!$this->Advantage->exists($id)) {
			throw new NotFounddException('Такой фотографии нету');
		}
		if($this->Advantage->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}