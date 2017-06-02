<?php

class ReviewsController extends AppController{
	// public $uses = array('Review', 'Category', 'Country');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Review->locale = Configure::read('Config.language');
		$this->Review->bindTranslation(array('name' => 'nameTranslation'));
		$data = $this->Review->find('all', array(
			'conditions' => array('Review.active' => 1),
			'order' => array('Review.id' => 'desc')
		));
		// debug($data);
		$title_for_layout = __('Отзывы');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function add(){
		if($this->request->is('post')){
			$this->Review->create();
			$data = $this->request->data['Review'];

			// debug($data);
			// die;
			$this->Review->locale = 'ru';
			if($this->Review->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}


	public function admin_index(){
		$this->Review->locale = array('ru', 'kz');
		$this->Review->bindTranslation(array('name' => 'nameTranslation'));
		$data = $this->Review->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['Review']['anons'];
			$news_id = $this->request->data['Review']['news_id'];
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
			$this->Review->create();
			$data = $this->request->data['Review'];
			// debug($this->request->data);
			// debug($data);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Review->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Review->locale = 'en';
			}else{
				$this->Review->locale = 'ru';
			}
			// $this->Review->locale = 'ru';
			if($this->Review->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Review->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Review->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Review->id = $id;
			// $this->Review->locale = Configure::read('Config.languages');
			// debug($this->Review->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Review'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Review->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Review->locale = 'en';
			}else{
				$this->Review->locale = 'ru';
			}
			
			// $this->Review->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Review->save($data1)){
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
			$this->Review->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Review->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Review->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Review->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}