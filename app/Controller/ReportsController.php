<?php

class ReportsController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->Report->locale = Configure::read('Config.language');
		$this->Report->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Report->find('all', array(
			'order' => array('Report.id' => 'desc')
		));
		$title_for_layout = __('Продукты');
		$this->set(compact('title_for_layout', 'data'));
	}

	public function admin_index(){
		$this->Report->locale = array('ru', 'kz');
		
		$data = $this->Report->find('all');
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Report->create();
			$data = $this->request->data['Report'];
			
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Report->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Report->locale = 'en';
			}else{
				$this->Report->locale = 'ru';
			}
			// $this->Report->locale = 'ru';
			if($this->Report->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
			$this->Report->Construction->locale = 'ru';
			$constructions = $this->Report->Construction->find('list');
			$this->set(compact('constructions'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Report->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Report->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Report->id = $id;
			// $this->Report->locale = Configure::read('Config.languages');
			// debug($this->Report->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Report'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Report->locale = 'kz';
				// $this->Category->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Report->locale = 'en';
				// $this->Category->locale = 'en';
			}else{
				$this->Report->locale = 'ru';
				// $this->Category->locale = 'ru';
			}
			
			// $this->Report->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Report->save($data1)){
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
			$this->Report->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Report->read(null, $id);
		}
			
				$this->Report->Category->locale = 'ru';
			$categories = $this->Report->Category->find('list');
			$this->set(compact('id', 'data', 'categories'));

	}

	public function admin_delete($id){
		if (!$this->Report->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Report->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Report->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Report->locale = Configure::read('Config.language');
		$this->Report->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$this->Report->Category->locale = Configure::read('Config.language');
		$this->Report->Category->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Report->findById($id);
	$aside = $this->Report->Category->find('all');
		$title_for_layout = $data['Report']['title'];
		$meta['keywords'] = $data['Report']['keywords'];
		$meta['description'] = $data['Report']['description'];
		$this->set(compact('data', '','title_for_layout' ,'meta', 'aside'));
	}

}