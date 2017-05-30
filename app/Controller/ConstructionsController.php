<?php

class ConstructionsController extends AppController{
	// public $uses = array('Construction', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Construction->locale = Configure::read('Config.language');
		$this->Construction->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Construction->find('all', array(
			'order' => array('Construction.id' => 'desc')
		));
		
		// debug($new);die;
		$title_for_layout = __('Новости');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function admin_index(){
		$this->Construction->locale = array('ru', 'kz');
		$this->Construction->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Construction->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['Construction']['anons'];
			$news_id = $this->request->data['Construction']['news_id'];
			// debug($news_id);
			// die;

			// debug($news_id);
			$setAnons = $this->_anons($news_id, $anons);
			if($setAnons){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Construction->create();
			$data = $this->request->data['Construction'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Construction->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Construction->locale = 'en';
			}else{
				$this->Construction->locale = 'ru';
			}
			// $this->Construction->locale = 'ru';
			if($this->Construction->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Construction->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Construction->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Construction->id = $id;
			// $this->Construction->locale = Configure::read('Config.languages');
			// debug($this->Construction->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Construction'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Construction->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Construction->locale = 'en';
			}else{
				$this->Construction->locale = 'ru';
			}
			
			// $this->Construction->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Construction->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Construction->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Construction->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Construction->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Construction->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Construction->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Construction->locale = Configure::read('Config.language');
		$this->Construction->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Construction->findById($id);
	
		$title_for_layout = $data['Construction']['title'];
		$meta['keywords'] = $data['Construction']['keywords'];
		$meta['description'] = $data['Construction']['description'];
		$this->set(compact('data', '','title_for_layout' ,'meta'));
	}

}